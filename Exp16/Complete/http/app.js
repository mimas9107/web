// 引入 http 模組
const http = require("http");

// 建立 HTTP 伺服器
const server = http.createServer((req, res) => {
    // 設定回應的內容類型為 HTML
    res.setHeader("Content-Type", "text/html");

    // 取得請求的 URL 和方法
    const method = req.method;
    const url = req.url;

    if (url === "/") {
        if (method === "GET") {
            res.statusCode = 200;
            res.end(
                "<h1>Welcome to the homepage!<h1><form method='post' action='/'><input type='type' name='mytext' /><button type='submit'>Send</button></form>"
            );
        } else if (method === "POST") {
            // 讀取 POST 請求的資料
            let body = "";
            req.on("data", (chunk) => {
                body += chunk;
            });
            req.on("end", () => {
                res.statusCode = 200;
                res.end(`<h1>Received POST data: ${body}</h1>`);
            });
        }
    }
});

// 伺服器監聽 3000 埠口
server.listen(3000, () => {
    console.log("Server running at http://localhost:3000/");
});
