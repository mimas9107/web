<?php
/**
 * 此檔案根據 $config['css_framework'] 的設定產生導覽列，
 * 三個選項分別為：首頁 (index.php)、功能1 (func1.php)、聯絡我們 (contact.php)
 */
if(isset($config['css_framework']) && $config['css_framework'] === 'bootstrap'){
    // 使用 Bootstrap 產生導覽列
?>
<nav class="navbar navbar-dark bg-dark navbar-expand-md">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">首頁</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="func1.php">功能1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">聯絡我們</a>
        </li>
    </ul>
</nav>
<?php
} elseif(isset($config['css_framework']) && $config['css_framework'] === 'flatui'){
    // 使用 Flat UI 產生導覽列 (Flat UI 之結構與 Bootstrap 略有差異)
?>
<nav class="navbar navbar-inverse navbar-expand-md">
    <ul class="navbar-nav">
        <li><a href="index.php">首頁</a></li>
        <li><a href="func1.php">功能1</a></li>
        <li><a href="contact.php">聯絡我們</a></li>
    </ul>
</nav>
<?php
} else {
    // 不使用 CSS Framework 時，產生最基本的導覽列
?>
<nav>
    <ul>
        <li><a href="index.php">首頁</a></li>
        <li><a href="func1.php">功能1</a></li>
        <li><a href="contact.php">聯絡我們</a></li>
    </ul>
</nav>
<?php
}
?>
