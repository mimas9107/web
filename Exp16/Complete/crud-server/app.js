const https = require('https');
const mysql = require('mysql2');
const fs = require('fs');
const querystring = require('querystring');

// 設定 SSL 憑證
const options = {
  key: fs.readFileSync('server.key'),
  cert: fs.readFileSync('server.crt')
};

// 建立 MySQL 連線
const connection = mysql.createConnection({
  host: 'myMariaDB',
  user: 'my_user',  // 請根據實際設定替換
  password: 'my_password',  // 請根據實際設定替換
  database: 'user_db'  // 請根據實際資料庫名稱替換
});

// 建立 HTTPS 伺服器
const server = https.createServer(options, (req, res) => {
  res.setHeader('Content-Type', 'text/html');

  // 讀取表單 HTML
  if (req.method === 'GET' && req.url === '/') {
    fs.readFile('form.html', 'utf8', (err, data) => {
      if (err) {
        res.statusCode = 500;
        res.end('Error reading form.html');
        return;
      }
      res.statusCode = 200;
      res.end(data); // 回傳表單 HTML 給使用者
    });
  }

  // 處理 POST 請求
  if (req.method === 'POST') {
    let body = '';
    req.on('data', chunk => {
      body += chunk;
    });

    req.on('end', () => {
      const postData = querystring.parse(body);

      let message = '';
      let messageType = ''; // success 或 error

      // CREATE 操作
      if (req.url === '/create') {
        const { username, email, password } = postData;
        const sql = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';
        connection.execute(sql, [username, email, password], (err, result) => {
          if (err) {
            message = 'Error creating user: ' + err.message;
            messageType = 'error';
          } else {
            message = `User created with ID: ${result.insertId}`;
            messageType = 'success';
          }
          sendResponse(res, message, messageType);
        });
      }

      // UPDATE 操作
      else if (req.url === '/update') {
        const { id, username, email, password } = postData;
        const sql = 'UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?';
        connection.execute(sql, [username, email, password, id], (err, result) => {
          if (err) {
            message = 'Error updating user: ' + err.message;
            messageType = 'error';
          } else {
            message = 'User updated successfully';
            messageType = 'success';
          }
          sendResponse(res, message, messageType);
        });
      }

      // DELETE 操作
      else if (req.url === '/delete') {
        const { id } = postData;
        const sql = 'DELETE FROM users WHERE id = ?';
        connection.execute(sql, [id], (err, result) => {
          if (err) {
            message = 'Error deleting user: ' + err.message;
            messageType = 'error';
          } else {
            message = 'User deleted successfully';
            messageType = 'success';
          }
          sendResponse(res, message, messageType);
        });
      }
    });
  }

  // 處理 GET 請求，獲取用戶資料
  if (req.method === 'GET' && req.url.startsWith('/read')) {
    const urlParams = new URLSearchParams(req.url.split('?')[1]);
    const id = urlParams.get('id');
    //const id = 2;
    //console.log("跳過url parsing");
    
    if (id) {
      const sql = 'SELECT * FROM users WHERE id = ?';
      connection.execute(sql, [id], (err, results) => {
        let message = '';
        let messageType = ''; // success 或 error
        if (err) {
          message = 'Error retrieving user data: ' + err.message;
          messageType = 'error';
        } else if (results.length > 0) {
          message = `<h1>User Info</h1><pre>${JSON.stringify(results[0], null, 2)}</pre>`;
          messageType = 'success';
        } else {
          message = 'No user found with the given ID';
          messageType = 'error';
        }
        sendResponse(res, message, messageType);
      });
    } else {
      const message = 'User ID is required';
      const messageType = 'error';
      sendResponse(res, message, messageType);
    }
  }
});

// 用來動態插入訊息並回傳的函數
function sendResponse(res, message, messageType) {
  // 讀取並渲染模板
  fs.readFile('template.html', 'utf8', (err, template) => {
    if (err) {
      res.statusCode = 500;
      res.end('Error reading template.html');
      return;
    }
    // 替換模板中的占位符
    const htmlResponse = template
      .replace('{{message}}', message)
      .replace('{{messageType}}', messageType);

    res.statusCode = 200;
    res.end(htmlResponse);
  });
}

// 啟動伺服器
server.listen(3000, () => {
  console.log('HTTPS server is running at https://localhost:3000');
});
