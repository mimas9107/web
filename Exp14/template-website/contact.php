<?php
/**
 * 主程式 index.php
 * 本檔案依序載入各 HTML 部件，並組合成完整 HTML 頁面回傳給使用者
 */

// 載入配置設定檔與自訂載入函式
include 'config.php';
include 'loadHTML.php';

// 將 $config 變數傳遞至各部件檔案中
$data = array('config' => $config);

// 組合 HTML 頁面
$html  = loadHTML('head.php', $data);
$html .= loadHTML('header.php', $data);
$html .= loadHTML('nav.php', $data);


// $html .= loadHTML('section.php', $data);
$html .= loadHTML('contact_section.php', $data);

$html .= loadHTML('footer.php', $data);

// 輸出完整 HTML 頁面
echo $html;
