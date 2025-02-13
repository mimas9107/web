const mysql = require("mysql2");

// 設定與 MariaDB 的連接
const connection = mysql.createConnection({
    host: "myMariaDB",
    user: "my_user", // 請根據實際設定替換
    password: "my_password", // 請根據實際設定替換
    database: "user_db", // 請根據實際資料庫名稱替換
});

// 連接到資料庫
connection.connect((err) => {
    if (err) {
        console.error("Error connecting to the database:", err.stack);
        return;
    }
    console.log("Connected to the database");
});

// 1. 寫入資料（新增使用者）
const addUser = (username, email, password) => {
    const sql =
        "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    connection.execute(sql, [username, email, password], (err, result) => {
        if (err) {
            console.error("Error inserting data:", err);
            return;
        }
        console.log("User added with ID:", result.insertId);
    });
};

// 2. 讀取資料（查詢使用者）
const getUser = (id) => {
    const sql = "SELECT * FROM users WHERE id = ?";
    connection.execute(sql, [id], (err, results) => {
        if (err) {
            console.error("Error retrieving data:", err);
            return;
        }
        if (results.length > 0) {
            console.log("User found:", results[0]);
        } else {
            console.log("No user found with ID:", id);
        }
    });
};

// 3. 更新資料（更新使用者資料）
const updateUser = (id, newUsername, newEmail, newPassword) => {
    const sql =
        "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
    connection.execute(
        sql,
        [newUsername, newEmail, newPassword, id],
        (err, result) => {
            if (err) {
                console.error("Error updating data:", err);
                return;
            }
            if (result.affectedRows > 0) {
                console.log("User updated successfully");
            } else {
                console.log("No user found with ID:", id);
            }
        }
    );
};

// 4. 刪除資料（刪除使用者）
const deleteUser = (id) => {
    const sql = "DELETE FROM users WHERE id = ?";
    connection.execute(sql, [id], (err, result) => {
        if (err) {
            console.error("Error deleting data:", err);
            return;
        }
        if (result.affectedRows > 0) {
            console.log("User deleted successfully");
        } else {
            console.log("No user found with ID:", id);
        }
    });
};

// 測試用例
// 1. 寫入一個新使用者
addUser("john_doe", "john@example.com", "password123");

// 2. 讀取使用者資料
getUser(1); // 假設你要查詢 ID 為 1 的使用者

// 3. 更新使用者資料
updateUser(1, "john_doe_updated", "john_new@example.com", "newpassword123");

// 4. 刪除使用者資料
deleteUser(1);

// 關閉連接
connection.end();
