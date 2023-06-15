<div class="slider">   
    <div><img src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/img/img_02.jpg"></div>
    <div><img src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/img/img_03.jpg"></div>   
    <div><img src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/img/img_04.jpg"></div>
</div>


<style>
    /*--スライダーの位置とサイズ調整--*/
    .slider{
        width:100%;
        margin:0 auto;
    }

    /*--------画像サイズ調整---------*/
    img{ 
        width:100%; 
        height:100vw;
        object-fit: cover;
    }
  
    /*-----------height調整----------*/
    .slick-slide{ 
        height:100vw!important;
        width:100%;
    }

    /*-----------矢印表示----------*/
    .slick-next{
         right:0!important; 
    }
    .slick-prev{ 
        left:0!important; 
    }
    .slick-prev,.slick-next {
        width: 80px!important;
        height: 80px!important;
    }
    .slick-prev:before, .slick-next:before {
        font-size: 80px!important;/*少し大きくする*/
    }
    .slick-arrow{ 
        z-index:2!important; 
        
    }
    .slick-disabled {
        opacity: 0!important;
    }
    .slick-dots {
        bottom:25px!important;
    }
    .slick-dots li button:before{
	    font-size:20px!important;
    }
    
    .slick-dots li button:before {
        color:white!important;/*ドットボタンの現在地表示の色*/
        opacity: .5!important;
    }
    .slick-dots li.slick-active button:before{
        opacity: 1!important;
    }
</style>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>


<script>
	$('.slider').slick({
	    autoplay: false,         //自動再生
	    //autoplaySpeed: 2000,    //自動再生のスピード
	    //speed: 800,	            //スライドするスピード
	    dots: true,             //スライドしたのドット
	    arrows: true,           //左右の矢印
	    infinite: false,         //スライドのループ
	});
</script>