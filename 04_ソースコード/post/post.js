//画像アップロードのプレビュー
function selectimg(e) {
    for (i = 0; i < e.files.length; i++) {
        var reader = new FileReader();
        reader.onload = async function (e) {
            $('.slider').slick('slickAdd','<li><img src="' + e.target.result + '" alt="" class="image"></li>');
            imageCheck();
            const sleep = (second) => new Promise(resolve => setTimeout(resolve, second * 1000));
            await sleep(0.5);
            //alert($('.slider').slick('getDotCount') + 1);
            var cnt = $('.slider').slick('getDotCount');
            //await sleep(0.5);
            //alert(cnt);
            //await sleep(0.5);
            //$('slider').slick('slickGoTo',cnt,false );
        }
        reader.readAsDataURL(e.files[i]);
    }
};




//スライダー
$('.slider').slick({
    autoplay: false,//自動的に動き出すか。初期値はfalse。
    infinite: false,//スライドをループさせるかどうか。初期値はtrue。
    slidesToShow: 1,//スライドを画面に3枚見せる
    slidesToScroll: 1,//1回のスクロールで3枚の写真を移動して見せる
    prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
    nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
    centerMode: true,//要素を中央ぞろえにする
	variableWidth: true,//幅の違う画像の高さを揃えて表示
    dots: true,//下部ドットナビゲーションの表示
});



//画像選択されてないときの表示
function imageCheck() {
    if($("#target .image").length == 0) { //idが[target]の中のクラス名が[image]の数を取得
        var ulElement = document.getElementById( "not_img" ) ;//cssを変更したい要素の[id]を取得
        ulElement.style.display = "block";//cssの変更
    }else {
        var ulElement = document.getElementById( "not_img" ) ;//cssを変更したい要素の[id]を取得
        ulElement.style.display = "none";//cssの変更
    }
}

//ページ読み込み時に実行
window.onload = function(){
    imageCheck();
}