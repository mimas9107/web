var express = require("express");
//
const fs = require("fs");
const mysql = require("mysql2");
//
var router = express.Router();

// 建立 MySQL 連線
const connection = mysql.createConnection({
    host: "myMariaDB",
    user: "my_user", // 請根據實際設定替換
    password: "my_password", // 請根據實際設定替換
    database: "user_db", // 請根據實際資料庫名稱替換
});

/* GET users listing. */
router.get("/", function (req, res, next) {
    //
    const { id } = req.query;

    if (id) {
        const sql = "SELECT * FROM users WHERE id = ?";
        connection.execute(sql, [id], (err, results) => {
            let message = "";
            let messageType = ""; // success 或 error
            if (err) {
                message = "Error retrieving user data: " + err.message;
                messageType = "error";
            } else if (results.length > 0) {
                message = `<h1>User Info</h1><pre>${JSON.stringify(
                    results[0],
                    null,
                    2
                )}</pre>`;
                messageType = "success";
            } else {
                message = "No user found with the given ID";
                messageType = "error";
            }
            sendResponse(res, message, messageType);
        });
    } else {
        const message = "User ID is required";
        const messageType = "error";
        sendResponse(res, message, messageType);
    }
    //res.send("respond with a resource");
});

/* POST users/create 操作 */
router.post("/create", (req, res) => {
    // 直接從 req.body 獲取資料
    const { username, email, password } = req.body;
    const sql =
        "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    connection.execute(sql, [username, email, password], (err, result) => {
        if (err) {
            message = "Error creating user: " + err.message;
            messageType = "error";
        } else {
            message = `User created with ID: ${result.insertId}`;
            messageType = "success";
        }
        sendResponse(res, message, messageType);
    });
});

/* POST users/update 操作 */
router.post("/update", (req, res) => {
    // 直接從 req.body 獲取資料
    const { id, username, email, password } = req.body;
    const sql =
        "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
    connection.execute(sql, [username, email, password, id], (err, result) => {
        if (err) {
            message = "Error updating user: " + err.message;
            messageType = "error";
        } else {
            message = "User updated successfully";
            messageType = "success";
        }
        sendResponse(res, message, messageType);
    });
});

/* POST users/delete 操作 */
router.post("/delete", (req, res) => {
    // 直接從 req.body 獲取資料
    const { id } = req.body;
    const sql = "DELETE FROM users WHERE id = ?";
    connection.execute(sql, [id], (err, result) => {
        if (err) {
            message = "Error deleting user: " + err.message;
            messageType = "error";
        } else {
            message = "User deleted successfully";
            messageType = "success";
        }
        sendResponse(res, message, messageType);
    });
});

// 用來動態插入訊息並回傳的函數
function sendResponse(res, message, messageType) {
    // 讀取並渲染模板
    // fs.readFile("public/template.html", "utf8", (err, template) => {
    //     if (err) {
    //         res.statusCode = 500;
    //         res.end("Error reading template.html");
    //         return;
    //     }
    //     // 替換模板中的占位符
    //     const htmlResponse = template
    //         .replace("{{message}}", message)
    //         .replace("{{messageType}}", messageType);
    res.statusCode = 200;
    //res.end(htmlResponse);
    res.json({ message: message, type: messageType }).end();
    //});
}

module.exports = router;
