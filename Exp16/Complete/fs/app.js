// 引入 fs 模組
const fs = require("fs");

// 寫入檔案
fs.writeFile("example.txt", "Hello, Node.js!", (err) => {
    if (err) {
        console.error("Error writing to file:", err);
    } else {
        console.log("File written successfully.");
    }
});

// 讀取檔案
fs.readFile("example.txt", "utf8", (err, data) => {
    if (err) {
        console.error("Error reading file:", err);
    } else {
        console.log("File content:", data);
    }
});
