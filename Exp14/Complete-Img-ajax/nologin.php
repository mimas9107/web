<?php
session_start();

include 'config.php';
include 'loadHTML.php';

$data = array('config' => $config);

echo loadHTML('head.php', $data);
echo loadHTML('header.php', $data);
?>
<div class="container">
    <h2>需要登入</h2>
    <div class="alert alert-warning">
        您尚未登入，請先登入以存取此頁面。
    </div>
    <a href="login.php" class="btn btn-primary">前往登入</a>
</div>
<?php 
echo loadHTML('footer.php', $data); 
?>
