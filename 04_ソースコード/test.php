
<h1>画像アップロード</h1>
<!--送信ボタンが押された場合-->
<?php if (isset($_POST['upload'])): ?>
    <p><?php echo $message; ?></p>
<?php else: ?>
    <form method="post" enctype="multipart/form-data">
        <p>アップロード画像</p>
        <input type="file" name="image[]" multiple>
        <button><input type="submit" name="upload" value="送信"></button>
    </form>
<?php endif;?>

<?php
    if (isset($_POST['upload'])) {//送信ボタンが押された場合
        for($i = 0; $i < count($_FILES["image"]["name"]); $i++ ){
            $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
            $image .= '.' . substr(strrchr($_FILES['image']['name'][$i], '.'), 1);//アップロードされたファイルの拡張子を取得
            $file = "img/$image";
            echo $file;
            if (!empty($_FILES['image']['name'][$i])) {//ファイルが選択されていれば$imageにファイル名を代入
                move_uploaded_file($_FILES['image']['tmp_name'][$i], './img/' . $image);//imagesディレクトリにファイル保存
                if (exif_imagetype($file)) {//画像ファイルかのチェック
                    $message = '画像をアップロードしました';
                } else {
                    $message = '画像ファイルではありません';
                }
            }
        }
    }
?>