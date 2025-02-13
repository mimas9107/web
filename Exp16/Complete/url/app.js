// 引入 url 模組
const url = require("url");

// 解析一個 URL 字符串
const myURL = new URL("https://example.com:8080/path/name?query=param#hash");

// 輸出 URL 各部分的組成
console.log("Host:", myURL.host); // 主機名稱和端口
console.log("Pathname:", myURL.pathname); // 路徑
console.log("Search:", myURL.search); // 查詢字符串
console.log("Hash:", myURL.hash); // 錨點
