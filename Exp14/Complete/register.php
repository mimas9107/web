<?php
session_start();

$error = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   include 'db_connect.php';
 
   $username = trim($_POST['username']);
   $password = trim($_POST['password']);
   $email    = trim($_POST['email']);
   $confirm_password = trim($_POST['confirm_password']);
   
    // 確保欄位填寫完整
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "請填寫所有欄位";
    } 
    // 驗證 Email 格式
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "請輸入有效的 Email 地址";
    } 
    // 密碼與確認密碼需一致
    elseif ($password !== $confirm_password) {
        $error = "密碼不一致";
    } else {
       // 檢查該帳號或Email是否已存在
       $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
       $stmt->bind_param("ss", $username, $email);
       $stmt->execute();
       $stmt->store_result();
       if ($stmt->num_rows > 0) {
           $error = "帳號或 Email 已存在，請選擇其他名稱或 Email";
       } else {
           // 插入新帳號
           $hashed_password = password_hash($password, PASSWORD_DEFAULT);
           $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
           $stmt->bind_param("sss", $username, $email, $hashed_password);
           if ($stmt->execute()) {
               $success = "註冊成功，請登入";
           } else {
               $error = "註冊失敗，請稍後再試";
           }
       }
       $stmt->close();
    }
    $conn->close();
}

include 'config.php';
include 'loadHTML.php';

$data = array('config' => $config, 'error' => $error, 'success' => $success);

echo loadHTML('head.php', $data);
echo loadHTML('header.php', $data);
?>
<div class="container">
    <h2>註冊新帳號</h2>
    <?php 
        if (!empty($error)) {
    ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php 
        } else if (!empty($success)) {
    ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php
        }
    ?>
    <form action="register.php" method="post">
        <div class="form-group">
            <label for="username">帳號：</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email：</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">密碼：</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">確認密碼：</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">註冊</button>
        <a href="login.php" class="btn btn-secondary">返回登入</a>
    </form>
</div>
<?php 
echo loadHTML('footer.php', $data); 
?>
