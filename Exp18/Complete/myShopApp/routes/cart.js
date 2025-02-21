const express = require('express');
const router = express.Router();
const mysql = require('mysql2');

const connection = mysql.createConnection({
    host: 'myMariaDB',
    user: 'my_admin',
    password: 'P@ssw0rd',
    database: 'my_db'
});

// 中介函數：檢查使用者是否登入
function requireLogin(req, res, next) {
  if (!req.session.userId) {
    return res.status(403).json({ message: 'Please log in first' });
  }
  next();
}

// 獲取購物車內容
router.get('/', requireLogin, (req, res) => {
  const sql = 'SELECT c.id, p.name AS product_name, p.price, c.quantity, p.stock_quantity FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = ?';
  connection.execute(sql, [req.session.userId], (err, results) => {
    if (err) {
      return res.status(500).send('Error retrieving cart');
    }
    res.status(200).json(results);
  });
});

// 新增商品到購物車
router.post('/add', requireLogin, (req, res) => {
  const { product_id, quantity } = req.body;
  const sql = 'INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)';
  connection.execute(sql, [req.session.userId, product_id, quantity], (err, result) => {
    if (err) {
      return res.status(500).json({ message: 'Error adding to cart', type: 'error' });
    }
    res.status(200).json({ message: 'Product added to cart', type: 'success' });
  });
});

// 更新購物車項目
router.post('/update', requireLogin, (req, res) => {
  const { id, quantity } = req.body;
  const sql = 'UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?';
  connection.execute(sql, [quantity, id, req.session.userId], (err, result) => {
    if (err) {
      return res.status(500).json({ message: 'Error updating cart', type: 'error' });
    }
    res.status(200).json({ message: 'Cart updated successfully', type: 'success' });
  });
});

// 刪除購物車項目
router.post('/remove', requireLogin, (req, res) => {
  const { id } = req.body;
  const sql = 'DELETE FROM cart WHERE id = ? AND user_id = ?';
  connection.execute(sql, [id, req.session.userId], (err, result) => {
    if (err) {
      return res.status(500).json({ message: 'Error removing item', type: 'error' });
    }
    res.status(200).json({ message: 'Item removed from cart', type: 'success' });
  });
});

module.exports = router;
