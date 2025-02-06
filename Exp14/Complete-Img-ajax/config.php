<?php
/**
 * 配置設定檔
 * 可設定 css_framework 為：
 *  - 'none'：不使用 CSS Framework
 *  - 'bootstrap'：使用 Bootstrap 框架 (https://getbootstrap.com/)
 *  - 'flatui'：使用 Flat UI 框架 (https://designmodo.github.io/Flat-UI/)
 */
$config = array(
    'css_framework' => 'bootstrap',  // 修改為 'bootstrap' 或 'flatui' 可調整樣式

    // 版面分配設定：針對主要內容與側邊欄在桌面版之寬度百分比，以及主要內容內部呈現之欄數
    'layout' => array(
        'article_width'  => 70,    // 主要內容所佔百分比（例如 70%）
        'aside_width'    => 30,    // 側邊欄所佔百分比（例如 30%）
        'columns'        => 2,     // 主要內容內部呈現欄數，可選 1、2、3 欄
        'aside_position' => 'right'// 側邊欄位置：'left' 或 'right'
    ),

    // RWD 斷點設定：針對手機、平板與桌面版之 CSS 媒體查詢條件
    'rwd' => array(
        'mobile'  => '(max-width: 576px)',
        'tablet'  => '(min-width: 577px) and (max-width: 992px)',
        'desktop' => '(min-width: 993px)'
    )
);
?>