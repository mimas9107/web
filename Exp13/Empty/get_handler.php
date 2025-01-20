<?php
    if () {

        echo "您以 GET 方法送出的文字是: " . htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    } else {
        echo "請使用 GET 方法提交資料。";
    }
?>