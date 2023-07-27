<?php
    session_start();
    $me = $_SESSION['gakuseki'];                   
    require '../php/DB.php';
    $msg_list = new msg_list;
    $list_select = $msg_list->list_select($me);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--ブートストラップが使えるようになる-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!--ブートストラップが使えるようになる-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link href="./messagelist.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body>
        <!-- logo画像 -->
        <div class="container-fluid logo_img_div">
            <img src="http://shiny-iki-0256.girly.jp/system5/img/logo1.png" class="logo_img" >
        </div>
        <!-- -->
        <!-- ここに中身を入れる -->
        <form action="" method="post">
        <div class="search_box">
          <input type="text" name="search" id="search">
          <label for="search">
              検索
          </label>
          <button type="submit" name="search_btn" class="search_btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-search" viewBox="0 0 16  16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button>
        </div>
        </form>

        
        <div class="main">
            <?php if(isset($_POST['search_btn'])) :?>
                <?php
                    $user_sel = new user_sel;
                    $user_select = $user_sel->user_select($_POST['search']);
                ?> 
                <?php foreach($user_select as $row):?>
                    <a href="../message/message.php?user_id%5B%5D=<?= $_POST['search'] ?>" class="link">
                    <div class="list">
                        <div class="group">
                            <div class="msg_icon msg_picture">
                                <img src="<?=$row['image']?>" class="msg_picture">
                            </div>
                        </div>
                        <div class="group2">
                            <div class="msg_name">
                                <?=$row['user_name']?>
                            </div>
                            <div class="msg_content">
                                <?= $_POST['search'] ?>
                            </div>
                        </div>
                        <div class="group3">   
                            <div class="msg_time">
                            </div>
                            <div class="msg_unread">
                            </div>
                        </div>
                    </div>  
                    </a>
                <?php endforeach?>
            <?php else :?>
            <?php foreach($list_select as $row):?>
                <?php
                    $user_sel = new user_sel;
                    $user_select = $user_sel->user_select($row['id']);

                    $msg_new = new msg_new;
                    $new_select = $msg_new->new_select($me,$row['id']);
                ?>
                
            <a href="../message/message.php?user_id%5B%5D=<?= $row['id'] ?>" class="link">
            <div class="list">
                <?php foreach($user_select as $user):?>
                <div class="group">
                    <div class="msg_icon msg_picture">
                        <img src="<?=$user['image']?>" class="msg_picture">
                    </div>
                </div>
                <div class="group2">
                    <div class="msg_name">
                        <?=$user['user_name']?>
                    </div>
                <?php endforeach?>
                <?php foreach($new_select as $new):?>
                    <div class="msg_content">
                        <?=$new['message']?>
                    </div>
                </div>
                <div class="group3">   
                    <div class="msg_time">
                        <?=$new['time']?>
                    </div>
                    <div class="msg_unread">
                    <?php
                        if($new['already_read']==0) {
                            echo "・";
                        }
                    ?>
                    </div>
                </div>
                <?php endforeach?>
            </div>  
            </a>
            <?php endforeach?>
            <?php endif; ?>
        </div>  
        

        <div class="container-fluid footer">
            <a href="home.php" style="all:initial;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="footer_icon" viewBox="0 0 16 16" >
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            <a href="post.php" style="all:initial;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="footer_icon" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
            <a href="message.php" style="all:initial;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="footer_icon" viewBox="0 0 16 16">
                    <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/>
                </svg>
            </a>
            <a href="mypage.php" style="all:initial;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="footer_icon" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </a>
        </div>
    </body>
</html>    