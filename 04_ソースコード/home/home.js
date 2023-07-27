$('.slider').slick({
  autoplay: false,         //自動再生
  dots: true,             //スライドしたのドット
  arrows: true,           //左右の矢印
  infinite: false,         //スライドのループ
});

var button=document.getElementsByClassName("favorite");
  
for (i = 0; i < button.length; i++) {
  button[i].addEventListener("click", function() {//step3
    this.classList.toggle('pink');//step4
    var a1=this.getElementsByClassName('bi-heart');
    var a2=this.getElementsByClassName('bi-heart-fill');
    a1[0].classList.toggle("pink2");
    a2[0].classList.toggle("pink2");
  });
}
