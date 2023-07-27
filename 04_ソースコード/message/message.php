<?php
    session_start();
    $me = $_SESSION['gakuseki'];
    require '../php/DB.php';
    if(isset($_GET['user_id'])){
        $data = $_GET['user_id'];
        $you = $data[0];
        $_SESSION['you'] = $you;
    }else{
        $you = $_SESSION['you'];
    }
    

    $user_sel = new user_sel;
    $selectdata = $user_sel->user_select($you);

    $msg_sel = new msg_sel;
    $msgdata = $msg_sel->msg_select($me,$you);

    $msg = '';
    if(isset($_REQUEST["POST_TOKEN"])){
        if ($_REQUEST["POST_TOKEN"] === $_SESSION["POST_TOKEN"]) {

            if(isset($_POST['btn'])){
                $msg = $_POST['msg'];
                if($msg!=''){
                    $msg_send = new msg_send;
                    $senddata = $msg_send->send_select($me,$you,$msg);
                    $msg = '';

                    header("Location:./message.php#br");
                    exit;
                }
                
                
            }
            
        }
        $_SESSION["POST_TOKEN"] = uniqid();
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <!--ブートストラップが使えるようになる-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!--ブートストラップが使えるようになる-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!--CSSとリンクさせる-->
        <link href="./message.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- JSの読み込み -->
    </head>
    <body>
        <!-- ここに中身を入れる -->
        <div class="main">
            <div class="header">
                <div class="back_icon">
                    <?php
                        echo '<a href="'.$_SERVER['HTTP_REFERER'].'" class="back_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </a>';
                    ?>
                </div>

                    
                <?php foreach($selectdata as $row):?>
                <div class="msg_name">
                    <p><?=$row['user_name']?></p>
                </div>
            </div>
            <div class="message">
                <?php 
                foreach($msgdata as $now) {
                    if($now['sender_id'] == $you) {
                        echo '<div class="msg_left">';
                        echo '<img class="left_icon" src="'.$row['image'].'">';
                        echo '<p class="left_msg">'.$now['message'].'</p>';
                        echo '<p class="left_time">'.$now['time'].'</p>';
                        echo '</div>';
                    }else {
                        echo '<div class="msg_right">';
                        echo '<p class="right_time">'.$now['time'].'</p>';
                        echo '<p class="right_msg">'.$now['message'].'</p>';
                        echo '</div>';
                    }
                }
                ?>
            <div style="height:7vh;" id="br"></div>
                
            </div>
            <?php endforeach?>
            <?php
           
            ?>
            <form  method="post">
            <div class="footer">
                <div class="text_box">
                    <textarea class="txt" placeholder="メッセージ..." name="msg"></textarea>
                </div>
                <div class="msg_btn">
                    <button type="submit" class="btn_sub" name="btn">送信</button>
                </div>
            </div>
            <input type="hidden" name="POST_TOKEN" value="<?php echo $_SESSION["POST_TOKEN"]; ?>"/>
            </form>

            
        </div>
        <!--ここまで-->
    </body>
</html>