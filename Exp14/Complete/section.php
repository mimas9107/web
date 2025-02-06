<?php
// 若使用 Bootstrap 或 Flat UI，計算 aside 與 article 在 12 欄網格中的分配
if (isset($config['css_framework']) && 
    ($config['css_framework'] === 'bootstrap' || $config['css_framework'] === 'flatui')) {
    $aside_cols = round(12 * $config['layout']['aside_width'] / 100);
    if ($aside_cols < 1) {
        $aside_cols = 1;
    }
    $article_cols = 12 - $aside_cols;
    if ($article_cols < 1) {
        $article_cols = 1;
    }
}
?>
<section class="container my-3">
    <div id="main-content" class="row">
<?php 
    if ($config['layout']['aside_position'] === 'left') {
?>
        <!-- 側邊欄置左 -->
        <aside id="aside" 
            <?php if (isset($aside_cols) && isset($article_cols)): ?>
                class="col-md-<?php echo $aside_cols; ?> col-sm-12"
            <?php endif; ?>>
            <h2>側邊欄</h2>
            <p>這裡是 aside 區域，位於左側。</p>
        </aside>

        <article id="article"
            <?php if (isset($aside_cols) && isset($article_cols)): ?>
                class="col-md-<?php echo $article_cols; ?> col-sm-12"
            <?php endif; ?>>

            <?php echo loadHTML($target, array('config' => $config)); ?>
        </article>
<?php 
    }
    else {  /* aside_position 為 'right' */
?>
        <!-- 側邊欄置右 -->
        <article id="article"
            <?php if (isset($aside_cols) && isset($article_cols)): ?>
                class="col-md-<?php echo $article_cols; ?> col-sm-12"
            <?php endif; ?>>

            <?php echo loadHTML($target, array('config' => $config)); ?>
        </article>

        <aside id="aside"
            <?php if (isset($aside_cols) && isset($article_cols)): ?>
                class="col-md-<?php echo $aside_cols; ?> col-sm-12"
            <?php endif; ?>>
            <h2>側邊欄</h2>
            <p>這裡是 aside 區域，位於右側。</p>
        </aside>             
<?php 
    }    
?>
    </div>
</section>
<?php
    if($target == 'post-article.php') {
?>
    <style type="text/css">
        #article {
            column-count: 1;
        }
    </style>
<?php
    }
?>

