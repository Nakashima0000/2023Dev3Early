<?php
require '../php/DB.php';

session_start();

  if (!empty($_POST["email"]) && !empty($_POST["gakuseki"]) && !empty($_POST["username"]) && !empty($_POST["password"])){
    // 入力したものを格納
    $email = $_POST["email"];
    $gakuseki = $_POST["gakuseki"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $checkuser = new checkuser;
    $check_user = $checkuser->check_user($gakuseki);

  if ($check_user['count'] == 0){
    $newuser = new newuser;
    $check = $newuser->check_text($email,$gakuseki,$username,$password);
    $_SESSION['gakuseki'] = $gakuseki;
    header('Location:http://shiny-iki-0256.girly.jp/system5/home/home.php');
  } else {
    $alert = "<script type='text/javascript'>alert('すでに登録されています。');</script>";
    echo $alert;
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>新規登録画面</title>
  <link rel="stylesheet" href="new.css">
</head>

<body>
<a href="http://shiny-iki-0256.girly.jp/system5/login/login.php" class="example">
  <img width="80" src="../img/modoru.png" alt="modoru">
</a>
<!--<svg xmlns="http://www.w3.org/2000/svg" width="100" height="70" class="icon" fill="currentColor" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>-->
</svg>
</div>
  <div class="container-fliud con">
    <div class="logo">
      <img src="../img/icon.png" alt="ロゴ">
    </div>
    <div class="input-container">
      <form action="" method="post">
        <div class="input-container">
          <input type="email" size="150" id="email" class="inp" name="email" required>
          <label for="email">メールアドレス</label>
        </div>
        <div class="input-container">
          <input type="number" pattern="^[0-9]"maxlength="7" id="gakuseki" class="inp" name="gakuseki" required>
          <label for="gakuseki">学籍番号</label>
        </div>
        <div class="input-container">
          <input type="text" id="username" class="inp" name="username" required>
          <label for="username">ユーザーネーム</label>
        </div>
        <div class="input-container">
          <input type="password" id="password" class="inp" name="password" required>
          <label for="password">パスワード</label>
        </div>
        <div>
          <input type="submit" id="btn" name="btn" value="登録する">
        </div>
      </form>
    </div>
  </div>
</body>

</html>
