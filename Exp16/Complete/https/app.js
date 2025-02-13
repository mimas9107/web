// 引入 https 和 fs 模組
const https = require("https");
const fs = require("fs");

// 設定 SSL 憑證
const options = {
    key: fs.readFileSync("server.key"), // 私密金鑰
    cert: fs.readFileSync("server.crt"), // 憑證
};

// 建立 HTTPS 伺服器
const server = https.createServer(options, (req, res) => {
    res.setHeader("Content-Type", "text/html");
    res.statusCode = 200;
    res.end("<h1>Welcome to the secure homepage!</h1>");
});

// 伺服器監聽 3000 埠口
server.listen(3000, () => {
    console.log("Secure server running at https://localhost:3000/");
});
