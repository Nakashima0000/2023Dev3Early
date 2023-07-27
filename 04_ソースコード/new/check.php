<?php
require("./DB.php");
session_start();
 
/* 会員登録の手続き以外のアクセスを飛ばす */
if (!isset($_SESSION['join'])) {
    header('Location: 新規登録画面.php');
    exit();
}
 
if (!empty($_POST['check'])) {
    // パスワードを暗号化
    $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);
 
    // 入力情報をデータベースに登録
    $statement = $db->prepare("INSERT INTO members SET name=?, email=?, password=?");
    $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        $hash
    ));
 
    unset($_SESSION['join']);   // セッションを破棄
    header('Location: 新規登録画面.php');   // 新規登録画面.phpへ移動
    exit();
}
?>