const express = require('express');
const router = express.Router();
const mysql = require('mysql2');

// 建立 MySQL 連線（可重複使用 users.js 中的連線設定）
const connection = mysql.createConnection({
    host: 'myMariaDB',
    user: 'my_admin',
    password: 'P@ssw0rd',
    database: 'my_db'
});

router.get('/', (req, res) => {
  const sql = 'SELECT * FROM products';
  connection.execute(sql, (err, results) => {
    if (err) {
      return res.status(500).send('Error retrieving products');
    }
    res.status(200).json(results);
  });
});

module.exports = router;
