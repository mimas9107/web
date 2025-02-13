// 引入 path 模組
const path = require("path");

// 組合路徑
const filePath = path.join("/users", "node", "projects", "app.js");
console.log("Combined Path:", filePath);

// 解析路徑
console.log("Base name:", path.basename(filePath)); // 取得檔案名稱
console.log("Directory name:", path.dirname(filePath)); // 取得目錄名稱
console.log("File extension:", path.extname(filePath)); // 取得檔案副檔名
