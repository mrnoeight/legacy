var pGallery = {
  init: function () {
    //pAbout.galleryInit();
    pGallery.GallerySliderPage();
    $(window).on('resize', pGallery.onResize);
    pGallery.onResize();

    // PRELOADER.hide();

   
  },

  onResize: function (e) {

  },

  GallerySliderPage: function () {
    $(".slideGalleryPage").on("init", function (event, slick) {
        $(".slideGalleryPage").animate({
            opacity: 1,
        });
        
    });
    var slider = $(".slideGalleryPage").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '0px',
        dots: false,
        arrows: true,
        autoplay: false,
        speed: 1500,
        fade: false,
        autoplaySpeed: 5000,
        variableWidth: true,
        swipe: false,
        nextArrow : '<div class="btnSlider  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
        prevArrow : '<div class="btnSlider  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',

        responsive: [
            {
                breakpoint: 1180,
                settings: {
                    swipe: true,
                }
            },
			
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: false,
              }
            },
            
            
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
    });

    slider.on(
        "beforeChange",
        function (event, slick, currentSlide, nextSlide) {
            console.log("beforeChange");
            //$(this).find(".linkLg").hide();
        }
    );
    slider.on(
        "afterChange",
        function (event, slick, currentSlide, nextSlide) {
            console.log("afterChange");
            //$(this).find(".linkLg").show();
        }
    );
  },
}

