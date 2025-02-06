<?php
/**
 * style.php
 *
 * 此檔案根據傳入的 $config 設定產生動態 CSS 程式碼，
 * 並以 <style> 區塊包裹，供 head 模組載入。
 *
 */
?>
<style>
<?php 
    if (isset($config['css_framework'])){
        if ($config['css_framework'] === 'bootstrap' || $config['css_framework'] === 'flatui'){
?>
    /* 針對 Bootstrap 或 Flat UI 之多欄排版設定 */
    @media (min-width: 993px) {
        #article {
            -webkit-column-count: <?php echo $config['layout']['columns']; ?>;
            -moz-column-count: <?php echo $config['layout']['columns']; ?>;
            column-count: <?php echo $config['layout']['columns']; ?>;
        }
    }
    @media (max-width: 992px) {
        #article {
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
        }
    }
<?php
        }
        else {
?>
    @media <?php echo $config['rwd']['desktop']; ?> {
        #article {
            width: <?php echo $config['layout']['article_width']; ?>%;
            -webkit-column-count: <?php echo $config['layout']['columns']; ?>;
            -moz-column-count: <?php echo $config['layout']['columns']; ?>;
            column-count: <?php echo $config['layout']['columns']; ?>;
        }
        #aside {
            width: <?php echo $config['layout']['aside_width']; ?>%;
        }
    }
    @media <?php echo $config['rwd']['tablet']; ?>,
        <?php echo $config['rwd']['mobile']; ?> {
        #article, #aside {
            width: 100%;
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
        }
    }
<?php
        }
    }
?>
</style>