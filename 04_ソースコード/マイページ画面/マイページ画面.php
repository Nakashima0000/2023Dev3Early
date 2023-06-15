<!DOCTYPE html>
<html>
    <head>
        <!--ブートストラップが使えるようになる-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!--ブートストラップが使えるようになる-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!--CSSとリンクさせる-->
        <link href="./マイページ画面.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- JSの読み込み -->
        <script src="./マイページ画面.js" defer></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.0.min.js"></script>
    </head>
    <body>
        <!-- logo画像 -->
        <div class="container-fluid logo_img_div">
            <img src="http://shiny-iki-0256.girly.jp/system5/system5_rogo.png" class="logo_img" >
        </div>
        <!-- -->
        <!-- ここに中身を入れる -->
        <div class="main">
            <div class="icon">
                <?php
                    require '../php/DB.php';
                    $hoge2 = new hoge2;
                    $selectdata = $hoge2->select_user();
                    foreach($selectdata as $row){
                        echo '<img src="' .$row['image']. '" class="logo">';
                        echo '<div class="my_p_div">';
                        echo '  <p class="name_p">' .$row['user_name']. '</p>';
                        echo '  <p class="my_p">' .$row['user_introduction']. '</p>';
                        echo '</div>';
                    }
                ?>
                <!--<img src="../img/000018.JPG" class="logo">
                <div class="my_p_div">
                    <p class="name_p">れい</p>
                    <p class="my_p">Fukuoka<br>aso 2年 cクラス</p>
                </div>-->
            </div>
            <div class="profile">
                <div class="profile1">
                    <p class="pro1_p">
                        投稿<br>
                        <span class="pro1_cnt">4</span><br>
                        件
                </div>
                <div class="profile2">
                    <button class="pro1_button" onclick="BtnClick();">プロフィール編集</button>
                </div>
            </div>
            <div class="post_main container-fluid">
                <ul class="post_ul">
                    <li class="post_li"><img src="../img/000018.JPG" alt="" class="post_img1"></li>
                    <li class="post_li"><img src="../img/IMG_2151.JPG" alt="" class="post_img1"></li>
                    <li class="post_li"><img src="../img/IMG_2231.jpg" alt="" class="post_img1"></li>
                    <li class="post_li"><img src="../img/IMG_2270.jpg" alt="" class="post_img1"></li>
                </ul>
            </div>
        </div>
        <div id="back_modal1" onclick="BtnClick();"></div>
        <div id="mdl1" class="modal1">
            <div class="btn_mdl">
                <button type="button" class="btn1" onclick="BtnClick();">完了</button>
            </div>
                <div class="icon_mdl" >
                    <label class="up_img">
                        <p>＋</p>
                        <input type="file" name="logo" id="form" class="up_img1" accept=".jpg, .jpeg, .png, .gif">
                    </label>
                    <img src="../img/000018.JPG" class="logo2" id="img" accept="image/*">
                </div>
            <div class="txt_mdl">
                <div class="name_mdl">
                    <div class="name_tag">
                        <p>名前</p>
                    </div>
                    <div class="name_txtbox">
                        <input type="text" value="れい"  placeholder="名前を入力">
                    </div>
                </div>
                <div class="cmt_mdl">
                    <div class="cmt_tag">
                        <p>自己紹介</p>
                    </div>
                    <div class="cmt_txtbox">
                        <textarea id="comment" rows="10" maxlength="300" placeholder="自己紹介を入力" >Fukuoka&#13;aso 2年 cクラス</textarea>
                    </div>
                </div>
            </div>
        </div>
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