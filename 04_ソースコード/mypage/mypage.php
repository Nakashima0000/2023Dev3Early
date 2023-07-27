<?php
            session_start();
            $me = $_SESSION['gakuseki'];
            require '../php/DB.php';
            $sel_user = new sel_user;
            $selectdata = $sel_user->select_user($me);
            $sel_ps = new sel_pos;
            $selectpost = $sel_ps->select_post($me);
  ?>
<!DOCTYPE html>
<html>
    <head>
        <!--ブートストラップが使えるようになる-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!--ブートストラップが使えるようになる-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!--CSSとリンクさせる-->
        <link href="./mypage.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- JSの読み込み -->
        <script src="./mypage.js" defer></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.0.min.js"></script>
    </head>
    <body>
        <!-- logo画像 -->
        <div class="container-fluid logo_img_div">
            <img src="http://shiny-iki-0256.girly.jp/system5/img/logo1.png" class="logo_img" >
        </div>
        <!-- -->
        <!-- ここに中身を入れる -->
        
        <div class="main">
            <div class="icon">
                <?php foreach($selectdata as $row) :?>
                    <?php if($row['image'] != null) :?>
                        <img src="<?= $row['image'] ?>" class="logo">
                    <?php else :?>
                        <img src="http://shiny-iki-0256.girly.jp/system5/img/初期設定アイコン.jpg" class="logo">
                    <?php endif; ?>
                    <div class="my_p_div">
                        <p class="name_p"><?= $row['user_name'] ?></p>
                        <div class="my_p_intro">
                            <input id="check1" class="my_p_check" type="checkbox">
                            <p class="my_p">
                                <?= nl2br($row['user_introduction']) ?>
                            </p>
                            <label class="tuduki" for="check1"></label>
                        </div>
                    </div>
                <?php endforeach ?>
                <div class="profile">
                    <div class="profile1">
                        <p class="pro1_p">
                            投稿<br>
                            <span class="pro1_cnt"><?= count($selectpost) ?></span><br>
                            件
                    </div>
                    <div class="profile2">
                        <button class="pro1_button" onclick="BtnClick();">プロフィール編集</button>
                    </div>
                </div>
            </div>
            <div class="post_main container-fluid">
                <ul class="post_ul">
                    <?php
                        foreach($selectpost as $row){
                            echo '<li class="post_li"><img src="'.$row['image'].'" alt="" class="post_img1"></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div id="back_modal1" onclick="BtnClick();"></div>
        <form action="" method="post" enctype="multipart/form-data">
            <div id="mdl1" class="modal1">
                <div class="btn_mdl">
                    <button type="submit" class="btn1" name="add" onclick="BtnClick();">完了</button>
                </div>
                <input type="hidden" name="POST_TOKEN" value="<?php echo $_SESSION["POST_TOKEN"]; ?>"/>
                <?php foreach($selectdata as $row):?>
                <div class="icon_mdl" >
                    <label class="up_img">
                        <p>＋</p>
                        <input type="file" name="icon_db" id="form" class="up_img1" accept=".jpg, .jpeg, .png, .gif">
                    </label>
                    <?php if($row['image'] != null) :?>
                        <img src="<?= $row['image'] ?>" class="logo2" id="img" accept="image/*">
                    <?php else :?>
                        <img src="http://shiny-iki-0256.girly.jp/system5/img/初期設定アイコン.jpg" class="logo2" id="img" accept="image/*">
                    <?php endif; ?>
                </div>
                <div class="txt_mdl">
                    <div class="name_mdl">
                        <div class="name_tag">
                            <p>名前</p>
                        </div>
                        <div class="name_txtbox">
                            <input type="text" name="name_db" value="<?= $row['user_name'] ?>"  placeholder="名前を入力">
                        </div>
                    </div>
                    <div class="cmt_mdl">
                        <div class="cmt_tag">
                            <p>自己紹介</p>
                        </div>
                        <div class="cmt_txtbox">
                            <textarea id="comment" name="intro_db" rows="10" maxlength="300" placeholder="自己紹介を入力" ><?= $row['user_introduction'] ?></textarea>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </form>
        <?php

        $up_user = new up_user;
        
        foreach($selectpost as $row){
            $img_file = $row['image'];
        }

        if(isset($_SESSION["POST_TOKEN"])){
        if ($_REQUEST["POST_TOKEN"] === $_SESSION["POST_TOKEN"]) {
            if(isset($_POST['add'])){
                $name = $_POST['name_db'];
                $intro = $_POST['intro_db'];
                echo 'a';
                if (isset($_FILES['icon_db'])) {
                    //$ftpimg = $ftp_img->ftpimg($_FILES);
                        if($_FILES['icon_db']['tmp_name'] != null){
                            $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
                            $image .= '.' . substr(strrchr($_FILES['icon_db']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
                            $file = "http://nakash.main.jp/system5/img/$image";
                            if (!empty($_FILES['icon_db']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
                                move_uploaded_file($_FILES['icon_db']['tmp_name'], '../img/' . $image);//imagesディレクトリにファイル保存
                            }
                            echo 'b';
                            $_FILES['icon_db']['tmp_name'] = null;
                            $up_user->update_user($name,$intro,$file);
                        }else{
                            echo 'c';
                            $up_user->update_user($name,$intro,$img_file);
                        }
                    
                }
            }
        }
        $_SESSION["POST_TOKEN"] = uniqid();
        }
            
        ?>
        <!--ここまで-->
        <!-- footer部分 -->
        <div class="container-fluid footer">
            <a href="ホーム画面.php" style="all:initial;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="footer_icon" viewBox="0 0 16 16" >
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
            <a href="投稿画面.php" style="all:initial;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="footer_icon" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
            <a href="メッセージ画面.php" style="all:initial;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="footer_icon" viewBox="0 0 16 16">
                    <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/>
                </svg>
            </a>
            <a href="マイページ画面.php" style="all:initial;">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="footer_icon" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </a>
        </div>
        <!-- -->
    </body>
</html>