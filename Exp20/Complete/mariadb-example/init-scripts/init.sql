-- 切換到指定的資料庫
USE project_db;

-- 確保使用者存在，然後授予權限
CREATE USER IF NOT EXISTS 'project_user'@'%' IDENTIFIED BY 'projectpassword';
GRANT ALL PRIVILEGES ON project_db.* TO 'project_user'@'%';
FLUSH PRIVILEGES;

-- 建立 `users` 表
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 測試插入一些初始資料
INSERT INTO users (username, email, password) VALUES
('admin', 'admin@example.com', 'hashedpassword1'),
('user1', 'user1@example.com', 'hashedpassword2');
