<?php
session_start();

// 若使用者已登入，則跳轉到首頁
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (empty($username) || empty($password)) {
         $error = "請輸入帳號與密碼。";
    } else {
         // 準備查詢語法，假設密碼已使用 password_hash() 加密
         $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
         $stmt->bind_param("s", $username);
         $stmt->execute();
         $result = $stmt->get_result();
         if ($result->num_rows > 0) {
             $row = $result->fetch_assoc();
             // 使用 password_verify() 驗證密碼
             if (password_verify($password, $row['password'])) {
                  // 登入成功，將使用者資訊寫入 Session
                  $_SESSION['user_id'] = $row['id'];
                  $_SESSION['username'] = $row['username'];
                  // 登入成功後導向 index.php
                  header("Location: index.php");
                  exit;
             } else {
                  $error = "帳號或密碼錯誤。";
             }
         } else {
             $error = "帳號或密碼錯誤。";
         }
         $stmt->close();
    }
}


include 'config.php';
include 'loadHTML.php';

$data = array('config' => $config, 'error' => $error);

echo loadHTML('head.php', $data);
echo loadHTML('header.php', $data);
?>
<div class="container">
    <h2>登入</h2>
    <?php 
        if (!empty($error)) {
    ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php
        }
    ?>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">帳號：</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">密碼：</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">登入</button>
        <a href="register.php" class="btn btn-secondary">註冊新帳號</a>
    </form>
</div>
<?php 
echo loadHTML('footer.php', $data); 
?>
