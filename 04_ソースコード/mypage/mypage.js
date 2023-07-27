//modalの開閉
function BtnClick() {
    document.getElementById("mdl1").classList.toggle("modal2");
    document.getElementById("back_modal1").classList.toggle("back_modal1");
}

//画像アップロードのプレビュー
$('#form').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#img").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});

//「続きを読む」判定
$(function() {
    var $myp = $('.my_p');
    var $tuduki = $('.tuduki');
    var mypHeight = $myp.height();
    var lineHeight = parseFloat($myp.css('line-height'));
    var textNewHeight = lineHeight * 3;
    if(mypHeight > textNewHeight) {
        $myp.css({
            height: textNewHeight,
            overflow:'hidden',
        });
    }else {
        $tuduki.hide();
    }
    $tuduki.click(function () {
        if(textNewHeight == $myp.height()) {
            $myp.css({
                height: mypHeight,
                overflow:'visible',
                margin:'0 0 2vh 0',
            });
        }else {
            $myp.css({
                height: textNewHeight,
                overflow:'hidden',
                margin:'0 0 1vh 0',
            });
        }
    });
});