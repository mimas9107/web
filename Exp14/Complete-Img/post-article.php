<h2>刊登文章</h2>
<p>這裡使用CKEditor讓使用者更方便輸入內容</p>
<p>在<code>&lt;head&gt;</code>中有透過CDN引用CKEditor</p>

<?php
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    // 內容可能包含HTML標籤，根據需求可做進一步過濾或XSS防護
    $content = $_POST['content'];

    if (empty($title) || empty($content)) {
        $error = "請輸入完整標題與內容。";
    } else {
        include 'db_connect.php';
        // 將文章存入資料庫
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("INSERT INTO articles (user_id, title, content) VALUES (?, ?, ?)");
        // 注意：若內容包含HTML標籤，可斟酌是否使用 htmlspecialchars()
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
        $stmt->bind_param("iss", $user_id, $title, $content);
        if ($stmt->execute()) {
            $success = "文章刊登成功！";
        } else {
            $error = "刊登失敗，請稍後再試。";
        }
        $stmt->close();
    }
}
?>

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

<form method="POST" action="post.php">
    <label for="title">標題：</label><br>
    <input class="form-control" type="text" id="title" name="title" style="width: 300px;" required><br><br>

    <label for="content">內容：</label><br>
    <textarea name="content" id="content" rows="6" cols="60"></textarea><br><br>

    <button class="btn btn-primary" type="submit">發布</button>
</form>

<script>
    // 轉換 textarea 為 CKEditor 富文本編輯器
    CKEDITOR.replace('content');
</script>
