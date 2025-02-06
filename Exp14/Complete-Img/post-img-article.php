<h2>刊登文章</h2>
<p>這裡使用CKEditor讓使用者更方便輸入內容</p>
<p>在<code>&lt;head&gt;</code>中有透過CDN引用CKEditor</p>

<?php 
    if (!empty($error)) {
?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php 
    } else if (!empty($success)) {
?>
    <p style="color: green;"><?php echo $success; ?></p>
<?php 
    }
?>

<!-- enctype="multipart/form-data" => 支援檔案上傳 -->
<form method="POST" action="post.php" enctype="multipart/form-data">
    <label for="title">標題：</label><br>
    <input class="form-control" type="text" id="title" name="title" style="width: 300px;" required><br><br>

    <label for="content">內容：</label><br>
    <textarea name="content" id="content" rows="6" cols="60"></textarea><br><br>

    <label for="image">圖片上傳 (PNG/JPG)：</label><br>
    <input class="form-control" type="file" name="image" id="image" accept=".png, .jpg, .jpeg" /><br><br>  

    <button class="btn btn-primary" type="submit">發布</button>
</form>

<script>
    // 轉換 textarea 為 CKEditor 富文本編輯器
    CKEDITOR.replace('content');
</script>
