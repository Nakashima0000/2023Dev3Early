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