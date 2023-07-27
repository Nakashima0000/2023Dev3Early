<?php
    class up_file{
        public function upfile($up){
            for($i = 0; $i < count($up["img"]["name"]); $i++ ){
                if($up['img']['tmp_name'][$i] != null){
                    $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
                    $image .= '.' . substr(strrchr($up['img']['name'][$i], '.'), 1);//アップロードされたファイルの拡張子を取得
                    $file = "img/$image";
                    if (!empty($up['img']['name'][$i])) {//ファイルが選択されていれば$imageにファイル名を代入
                        move_uploaded_file($up['img']['tmp_name'][$i], './img/' . $image);//imagesディレクトリにファイル保存
                    }
                    return $file;
                }else{
                    return 'false';
                }
            }   
        }
    }
?>