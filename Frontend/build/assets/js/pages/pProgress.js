var pProgress = {
  init: function () {
    //pAbout.galleryInit();
    $(window).on('resize', pProgress.onResize);
    pProgress.onResize();

    // PRELOADER.hide();
    $('.progresslist .item').on("click",pProgress.OpenPopupProgress);
    $('.jsClosePopupProgress').on("click",pProgress.ClosePopupProgress)
   
  },

  onResize: function (e) {

  },

  OpenPopupProgress: function () {
    var id = $(this).attr('data-popup');
        $('#'+id).fadeIn(function(){
          pProgress.ProgressSliderPage();
        });
    },
    ClosePopupProgress: function () {
        $('.popup').fadeOut(function(){
            $(".slideProgressPopup").slick('unslick');
            // $('.slideProgressPopup').remove();
            // $(this).append('<div class="slideProgressPopup"></div>');
        });
    },

  ProgressSliderPage: function () {
    $(".slideProgressPopup").on("init", function (event, slick) {
        $(".slideProgressPopup").animate({
            opacity: 1,
        });
    });
    var slider = $(".slideProgressPopup").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        autoplay: false,
        speed: 1500,
        autoplaySpeed: 5000,
        adaptiveHeight: true,
        nextArrow : '<div class="btnSlider  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
        prevArrow : '<div class="btnSlider  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
    });

    slider.on(
        "beforeChange",
        function (event, slick, currentSlide, nextSlide) {}
    );
    slider.on(
        "afterChange",
        function (event, slick, currentSlide, nextSlide) {}
    );
  },
}

