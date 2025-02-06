<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>範例網站</title>
<?php
    // 根據配置載入對應的 CSS Framework 連結
    if(isset($config['css_framework'])){
        if($config['css_framework'] === 'bootstrap'){
?>
    <!-- 載入 Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
        } else if($config['css_framework'] === 'flatui'){
?>
    <!-- 載入 Flat UI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/designmodo-flat-ui@2.3.0/dist/css/flat-ui.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/designmodo-flat-ui@2.3.0/dist/js/flat-ui.min.js"></script>
<?php
        } else {
?>
    <!-- 當設定為 none 時，可選擇不引入任何 CSS Framework -->
    <style type="text/css">
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    .container {
        width: 90%;
        margin: 0 auto;
    }
    nav ul {
        list-style: none;
        padding: 0;
    }
    nav ul li {
        display: inline-block;
        margin-right: 10px;
    }
    /* 內容區域 Flex 版面設定 */
    #main-content {
        display: flex;
        flex-wrap: wrap;
    }
    #article, #aside {
        box-sizing: border-box;
        padding: 10px;
    }
    </style>
<?php
        }
    }
?>
</head>
<body>
