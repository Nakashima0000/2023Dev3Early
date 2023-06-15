<!DOCTYPE html>
<html>
    <head>
        <!--ブートストラップが使えるようになる-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!--ブートストラップが使えるようになる-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!--CSSとリンクさせる-->
        <link href="../css/投稿画面.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- dropzone.js 画像ファイルアップロードするため -->
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <!-- JSの読み込み -->
        <script src="../js/投稿画面.js" defer></script>
        <!-- スライド機能-->
        <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    </head>
    <body>
        <!-- logo画像 -->
        <div class="container-fluid logo_img_div">
            <img src="http://shiny-iki-0256.girly.jp/system5/system5_rogo.png" class="logo_img" >
        </div>
        <!-- -->
        <!-- ここに中身を入れる -->
        <div class="main">
            <div class="post_btn">
                <button type="button" class="post_button">投稿</button>
            </div>
            <div class="post_sel_img">
                <!--<p>画像を選択してください</p>
                <img src="">-->
                <div id="not_img"><div class="sel_img2"><p>画像を選択してください</p></div></div>
                <ul class="slider" id="target">
                    <!--<li><img src="../img/000018.JPG" alt="" class="image"></li>
                    <li><img src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/img/img_02.jpg" alt="" class="image"></li>
                    <li><img src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/img/img_03.jpg" alt="" class="image"></li>
                    <li><img src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/img/img_04.jpg" alt="" class="image"></li>
                    <li><img src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/img/img_05.jpg" alt="" class="image"></li>
                    <li><img src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/img/img_06.jpg" alt="" class="image"></li>
                    -->
                </ul>
            </div>
            <div class="post_sel">
                <label class="sel">
                    <p>＋</p>
                    <input type="file" name="logo" id="form" class="up_sel" accept=".jpg, .jpeg, .png, .gif">
                </label>
            </div>
            <div class="text_area">
                <textarea name="kansou" rows="10" maxlength="300" placeholder="キャプションを入力..."></textarea>
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