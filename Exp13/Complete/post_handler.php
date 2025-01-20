<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $text = $_POST['text_input'] ?? '';
        echo "您以 POST 方法送出的文字是: " . htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    } else {
        echo "請使用 POST 方法提交資料。";
    }
?>