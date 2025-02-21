const express = require('express');
const bcrypt = require('bcryptjs');
const mysql = require('mysql2');

const router = express.Router();

// 建立 MySQL 連線
const db = mysql.createConnection({
  host: 'myMariadb',
  user: 'my_admin',
  password: 'P@ssw0rd',
  database: 'my_db'
});

// 登入 (POST /auth/login)
router.post('/login', (req, res) => {
  const { username, password } = req.body;
  db.execute('SELECT * FROM users WHERE username = ?', [username], (err, results) => {
    if (err || results.length === 0) {
      return res.render('login', { message: '帳號或密碼錯誤', messageType: 'error' });
    }
    const user = results[0];
    bcrypt.compare(password, user.password, (err, isMatch) => {
      if (isMatch) {
        req.session.userId = user.id;
        req.session.username = user.username;
        res.redirect('/');
      } else {
        res.render('login', { message: '帳號或密碼錯誤', messageType: 'error' });
      }
    });
  });
});

// 註冊 (POST /auth/register)
router.post('/register', (req, res) => {
  const { username, email, password } = req.body;
  bcrypt.hash(password, 10, (err, hashedPassword) => {
    if (err) {
      return res.render('register', { message: '註冊失敗', messageType: 'error' });
    }
    db.execute('INSERT INTO users (username, email, password) VALUES (?, ?, ?)', 
      [username, email, hashedPassword], 
      (err) => {
        if (err) {
          return res.render('register', { message: '註冊失敗', messageType: 'error' });
        }
        res.redirect('/login');
      });
  });
});

// 登出 (GET /auth/logout)
router.get('/logout', (req, res) => {
  req.session.destroy(err => {
    res.redirect('/login');
  });
});

// 檢查登入狀態 (GET /auth/status)
router.get('/status', (req, res) => {
    if (!req.session.userId) {
      return res.json({ loggedIn: false });
    }
    res.json({ loggedIn: true, username: req.session.username });
});

module.exports = router;
