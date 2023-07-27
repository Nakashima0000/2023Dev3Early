<?php
require '../php/DB.php';

session_start();

if(!empty($_POST["gakuseki"]) && !empty($_POST["password"])){
  $gakuseki = $_POST["gakuseki"];
  $password = $_POST["password"];

  $logincheck = new logincheck;
  $login_check = $logincheck->login_check($gakuseki,$password);
  
if($login_check['count'] == 1){
  $_SESSION['gakuseki'] = $gakuseki;
  
  header('Location:http://shiny-iki-0256.girly.jp/system5/home/home.php');
}else{
  $alert = "<script type='text/javascript'>alert('idまたはパスワードが間違ってます。');</script>";
  echo $alert;
 }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新規登録画面</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container-fliud con">
    <div class="logo">
      <img src="http://shiny-iki-0256.girly.jp/system5/img/logo1.png" alt="ロゴ">
      </div>
    <h2></h2>
    <div class="input-container">
    <form action="" method="post">
        <div class="input-container">
          <input type="number" patten="^[0~9]" maxlength="7" id="gakuseki" name="gakuseki" required>
          <label for="gakuseki">学籍番号</label>
        </div>
        <div class="input-container">
          <input type="password" id="password" name="password" required>
          <label for="password">パスワード</label>
        </div>
        <div>
          <input type="submit" name ="btn" value="ログイン" id="btn">
        </div>
        </form>
        <h2 class="head-border">または</h2>
      </div>
      <div class="signup-link">
      アカウントを持ってない場合 <a href="http://shiny-iki-0256.girly.jp/system5/新規登録画面/新規登録画面.php">登録はこちら</a>
      </div>
    </div>
</body>
</html>