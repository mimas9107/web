const express = require("express");
const router = express.Router();
//
const bcrypt = require("bcryptjs");
const mysql = require("mysql2");

// 設定 MySQL 連線
const db = mysql.createConnection({
    host: "myMariadb",
    user: "my_admin",
    password: "P@ssw0rd",
    database: "my_app",
});
db.connect((err) => {
    if (err) console.error("Database connection failed: " + err.stack);
    else console.log("Connected to database.");
});

// 處理登入 (POST /auth/login)
router.post("/login", (req, res) => {
    const { username, password } = req.body;
    db.execute(
        "SELECT * FROM users WHERE username = ?",
        [username],
        (err, results) => {
            if (err || results.length === 0) {
                return res.render("login", {
                    message: "Invalid username or password",
                    messageType: "error",
                });
            }
            const user = results[0];
            bcrypt.compare(password, user.password, (err, isMatch) => {
                if (isMatch) {
                    req.session.userId = user.id;
                    req.session.username = user.username;
                    res.redirect("/");
                } else {
                    res.render("login", {
                        message: "Invalid username or password",
                        messageType: "error",
                    });
                }
            });
        }
    );
});

// 處理登出 (GET /auth/logout)
router.get("/logout", (req, res) => {
    req.session.destroy((err) => {
        res.redirect("/login");
    });
});

// 處理註冊 (POST /auth/register)
router.post("/register", (req, res) => {
    const { username, email, password } = req.body;
    bcrypt.hash(password, 10, (err, hashedPassword) => {
        if (err) {
            return res.render("register", {
                message: "Error creating account",
                messageType: "error",
            });
        }
        db.execute(
            "INSERT INTO users (username, email, password) VALUES (?, ?, ?)",
            [username, email, hashedPassword],
            (err) => {
                if (err) {
                    return res.render("register", {
                        message: "Error creating account",
                        messageType: "error",
                    });
                }
                res.redirect("/login");
            }
        );
    });
});

module.exports = router;
