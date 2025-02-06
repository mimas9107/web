<h2>所有文章</h2>
<p>從資料庫中找出所有文章</p>

<?php
include 'db_connect.php';
$sql = "SELECT a.id, a.title, a.content, a.created_at, u.username 
        FROM articles AS a 
        JOIN users AS u ON a.user_id = u.id
        ORDER BY a.created_at DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>        
    <!-- 以下示範顯示子文章 -->
    <article style="border:1px solid #ccc; padding:10px; margin:10px 0;">
        <!-- 注意：若內容包含HTML標籤，可斟酌是否使用 htmlspecialchars()或htmlspecialchars_decode() -->
        <!-- <h3><?php // echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></h3> -->
        <h3><?php echo htmlspecialchars_decode($row['title']); ?></h3>
        <!-- 注意：若內容包含HTML標籤，可斟酌是否使用 htmlspecialchars()或htmlspecialchars_decode() -->
        <!-- <p><?php //echo htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'); ?></p> -->
        <p><?php echo htmlspecialchars_decode($row['content']); ?></p>
        <p>刊登者：<?php echo $row['username']; ?></p>
        <p>刊登日期：<?php echo $row['created_at']; ?></p>
    </article>
<?php 
    }
} else {
?>
    <p>目前尚無任何文章。</p>
<?php
}
?>
