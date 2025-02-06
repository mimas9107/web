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
            <h2>主要內容 (多欄)</h2>
            <p>此為 <code>&lt;article id="article"&gt;</code> 容器，內含多個子文章。若在 <code>config.php</code> 中將 <code>columns</code> 設定為 2 (或 3)，則桌面版可見多欄排版。</p>

            <!-- 以下示範 3 個子文章，以便顯示「2欄」效果 (或更多) -->
            <article>
                <h3>子文章 1</h3>
                <p>這裡是第 1 篇子文章內容。透過 CSS 多欄排版，可與其他文章並排顯示。</p>
            </article>

            <article>
                <h3>子文章 2</h3>
                <p>這裡是第 2 篇子文章內容。藉由多欄排版設定，桌面版可同時顯示兩篇或三篇文章在同一列。</p>
            </article>

            <article>
                <h3>子文章 3</h3>
                <p>這裡是第 3 篇子文章內容。實際欄數取決於 <code>config.php</code> 中的 <code>layout.columns</code> 值。</p>
            </article>
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
            <h2>主要內容 (多欄)</h2>
            <p>此為 <code>&lt;article id="article"&gt;</code> 容器，內含多個子文章。若在 <code>config.php</code> 中將 <code>columns</code> 設定為 2 (或 3)，則桌面版可見多欄排版。</p>

            <!-- 示範 3 個子文章 -->
            <article>
                <h3>子文章 1</h3>
                <p>這裡是第 1 篇子文章內容。透過 CSS 多欄排版，可與其他文章並排顯示。</p>
            </article>

            <article>
                <h3>子文章 2</h3>
                <p>這裡是第 2 篇子文章內容。藉由多欄排版設定，桌面版可同時顯示兩篇或三篇文章在同一列。</p>
            </article>

            <article>
                <h3>子文章 3</h3>
                <p>這裡是第 3 篇子文章內容。實際欄數取決於 <code>config.php</code> 中的 <code>layout.columns</code> 值。</p>
            </article>
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

