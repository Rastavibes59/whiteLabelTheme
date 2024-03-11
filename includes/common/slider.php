<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" ></script>



<script>
                    var slideritems = $('.slider .sliderItem').length > 3 ? true : false;

$('.slider').slick({
    dots: slideritems,
    infinite: true,
    slide: '.sliderItem',
    slidesToShow: 3,
    slidesToScroll: 3,
    speed: 500,
    autoplay: true,
    autoplaySpeed: 3000,
    centerMode: true,
    centerPadding: 15,
    arrows: false,
    responsive: [{
            breakpoint: 768,
            settings: {
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }

    ]
});


</script>