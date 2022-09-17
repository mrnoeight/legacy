var wScreen = $(window).width();
var isRunMenu = false;
var lastScrollTop = 0, delta = 5;

if(!localStorage.getItem('isLoading')) {
    $('#preloader').removeClass('hideld');
    
}

var LANCASTER = {
    init: function () {
        // LANCASTER.global.popupSubmit();
        // $(".js_Submit").bind("click",LANCASTER.global.popupSubmit);
        LANCASTER.global.hideLoading();
        LANCASTER.global.scrollHeader();
        LANCASTER.global.location();
        
        LANCASTER.global.SliderAbout();
        LANCASTER.global.CustomWidthSlider();
        //LANCASTER.global.MenuScroll();
        LANCASTER.global.menuMobile();
        LANCASTER.global.language();
        LANCASTER.global.PartnerSlider();
        LANCASTER.global.PaddingLeft();
        LANCASTER.global.ScrollTop();
        

        var lightGl = $('.lightgallery').lightGallery({
            selector: '.linkLg',
            // pager: true,
          });

        // LANCASTER.global.animationScroll();
        // $('html').css("overflow","auto")

        $(window).scroll(function () {
            LANCASTER.global.scrollHeader();
            
            $(".lang").removeClass('active');
             $(".lang a").stop(true,true).fadeOut() 
        });
        $(window).bind('resize', function () {
            // LANCASTER.global.PosAboutSlider();
            LANCASTER.global.PaddingLeft();
            // $("html,body").scrollTop(0);
        });

        $(window).paroller();
        $('.parallax').parallax();

        $(window).on('unload', function(){

            //$("html,body").scrollTop(0);
   
         });

        $(window).on('hashchange', function() {
            LANCASTER.global.DeepLink();
        }); 

        //  $('html').css("overflow","auto")
        //  LANCASTER.global.animationScroll();
        //  LANCASTER.global.GallerySlider();
         
         $('.sliderUti .item').on("click",LANCASTER.global.OpenPopupUtilities);
         $('.jsClosePopupUti').on("click",LANCASTER.global.ClosePopupUtilities);
         $('.js-subMenuMb').on('click', LANCASTER.global.openSubMb);
    },
};

LANCASTER.global = {
    openSubMb: function () {
        if ($(this).hasClass('active')) {
            $(this).next().slideUp();
            $(this).removeClass('active');
          } else {
            $(this).next().slideDown();
            $(this).addClass('active');
          }
       
          
        return false;
	},
    DeepLink: function () {
        
        var link = location.hash;
            if(link) {
                LANCASTER.global.closeMenuMobile();
                console.log(link);

                if(link == "#rooftop") {
                    $("html, body").animate({ scrollTop: $("#floorplan").offset().top - $('.fixedHeader').innerHeight() }, 600);
                    $('.rooftopLink').click();
                    
                } else {
                    $("html, body").animate({ scrollTop: $(link).offset().top - $('.fixedHeader').innerHeight() }, 600);
                    console.log('out',link);
                }
            }
        
    },
    OpenPopupUtilities: function () {
        var id = $(this).attr('data-popup');
        $('#'+id).fadeIn(function(){
            LANCASTER.global.SliderAboutPopup();
        });
    },
    ClosePopupUtilities: function () {
        $('.popup').fadeOut(function(){
            $(".slideAboutPopup").slick('unslick');
            // $('.slideAboutPopup').remove();
            // $(this).append('<div class="slideAboutPopup"></div>');
        });
    },
    
    ScrollTop: function () {
        $("#scrollTop").bind("click", function (e) {
            $("html, body").animate({ scrollTop: 0 }, 600);
        });
    },
    
    hideLoading: function () {
        if(localStorage.getItem('isLoading')) {
            setTimeout(() => {
                $('html').css("overflow","auto")
                LANCASTER.global.animationScroll();
                LANCASTER.global.GallerySlider();
                LANCASTER.global.DeepLink();
             }, 300);
            
        } else {
            setTimeout(() => {
                $('#preloader .layer2').fadeOut(function () {
                     TweenMax.to(
                         $('#preloader'),
                         1,
                         { y: '-100%', autoAlpha: 0, ease: Power4.easeOut }
                     );
                     $('html').css("overflow","auto")
                     LANCASTER.global.animationScroll();
                     LANCASTER.global.GallerySlider();
                }); 
                localStorage.setItem('isLoading', true);
                LANCASTER.global.DeepLink();
             }, 1000);
        }
        
    },
    language: function () {
        $(".lang").bind("click", function (e) {
            if ($(this).hasClass('active')) {
                $(".lang").removeClass('active');
                $(".lang a").stop(true,true).fadeOut() 
            } else {
                $(".lang").addClass('active');
                $(".lang a").stop(true,true).fadeIn() 
            }
        });
        // const target = document.querySelector('.lang')

        // document.addEventListener('click', (event) => {
        // const withinBoundaries = event.composedPath().includes(target)

        // if (withinBoundaries) {
            
        // } else {
        //     $(".lang").removeClass('active');
        //     $(".lang a").stop(true,true).fadeOut() 
        // } 
        // })
    },
    popupSubmit: function () {
        swal("", "Đăng ký thành công", "success",{
            button: "Quay lại",
          });
        return false
    },
    PartnerSlider: function () {
        $(".partnerList").on("init", function (event, slick) {
            $(".partnerList").animate({
                opacity: 1,
            });
            
        });
        var slider = $(".partnerList").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            autoplay: false,
            speed: 1500,
            fade: false,
            autoplaySpeed: 5000,
            swipe: false,
            nextArrow : '<div class="btnSlider style2  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
            prevArrow : '<div class="btnSlider style2  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',

            responsive: [
                {
                    breakpoint: 1180,
                    settings: {
                        swipe: true,
                    }
                  },
                {
                  breakpoint: 851,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                  }
                },
                {
                    breakpoint: 480,
                    settings: "unslick",
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
            }
        );
        slider.on(
            "afterChange",
            function (event, slick, currentSlide, nextSlide) {
                console.log("afterChange");

            }
        );

    },
    menuMobile: function () {
        $(".js_menuMobile").bind("click", function (e) {
            if ($('.bar').hasClass('animate')) {
                LANCASTER.global.closeMenuMobile();

            } else {
                $('.bar').addClass('animate');
                $('.navMobile').addClass('active');
                TweenMax.set($(".navMobile li"), { y: 50, autoAlpha: 0 });
                $('.navMobile')
                    .stop(true,true).fadeIn(500,function() {
                        TweenMax.staggerTo(
                            $(".navMobile li"),
                            0.7,
                            { y: 0, autoAlpha: 1, ease: Power4.easeOut },
                            0.1
                        );
                    })
            }
        });
    },
    closeMenuMobile: function () {
        $('.bar').removeClass('animate');
        TweenMax.set($(".navMobile li"), { y: 50, autoAlpha: 0 });
        $('.navMobile').stop(true,true).fadeOut(500,)
    },
    MenuScroll: function () {
        $(document).ready(function () {
            $("nav a").bind("click", function (e) {
                e.preventDefault(); // prevent hard jump, the default behavior

                var target = $(this).attr("href"); // Set the target as variable
                LANCASTER.global.closeMenuMobile();
                // perform animated scrolling by getting top-position of target-element and set it as scroll target
                $("html, body")
                    .stop()
                    .animate(
                        {
                            scrollTop: $(target).offset().top,
                        },
                        600,
                        function () {
                            //location.hash = target; //attach the hash (#jumptarget) to the pageurl
                        }
                    );

                return false;
            });
        });

        $(window)
            .scroll(function () {
                var scrollDistance = $(window).scrollTop();

                // Show/hide menu on scroll
                //if (scrollDistance >= 850) {
                //		$('nav').fadeIn("fast");
                //} else {
                //		$('nav').fadeOut("fast");
                //}

                // Assign active class to nav links while scolling
                $(".section").each(function (i) {
                    
                    if ($(this).position().top <= scrollDistance +10) {
                        console.log($(this).attr("id"))
                        $(".menufix a.active").removeClass("active");
                        $("[data-link='#"+$(this).attr("id")+"']").addClass("active");
                    }
                });
            })
            .scroll();
    },
    PaddingLeft: function () {
        if($('.utilitiesSliderWrap').length) {
            $('.utilitiesSliderWrap').css('padding-left', $(".utilitiesWrap .container").offset().left + 80);
        }
    },
    PosAboutSlider: function () {
        if($('.slideAbout').length) {
            $('.slideAbout .slick-dots').css('left', $(".slideAbout .slick-active .container").offset().left);
            $('.aboutUsWrap .optionSlider').css('right', ($(window).width() - $(".slideAbout .w").innerWidth())/2 );
            console.log($(".slideAbout .w").innerWidth());
        }
        // if($('.slideAboutPopup').length) {
        //     $('.slideAboutPopup .slick-dots').css('left', $(".slideAboutPopup .item .container").offset().left);
        // }
        
    },
    SliderAbout: function () {
        $(".slideAbout").on("init", function (event, slick) {
            $(".slideAbout").animate({
                opacity: 1,
            });
            //LANCASTER.global.PosAboutSlider();
        });
        var slider = $(".slideAbout").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            autoplay: false,
            fade:true,
            speed: 1500,
            autoplaySpeed: 5000,
            adaptiveHeight: true,
        });

        slider.on(
            "beforeChange",
            function (event, slick, currentSlide, nextSlide) {}
        );
        slider.on(
            "afterChange",
            function (event, slick, currentSlide, nextSlide) {}
        );

        slider.next().find('.btnSliderNext').click(function(e) {
            $(this).parent().prev().slick("slickNext");
        });
        slider.next().find('.btnSliderPrev').click(function(e) {
            $(this).parent().prev().slick("slickPrev");
        });
    },
    SliderAboutPopup: function () {
        $(".slideAboutPopup").on("init", function (event, slick) {
            $(".slideAboutPopup").animate({
                opacity: 1,
            });
        });
        var slider = $(".slideAboutPopup").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            autoplay: false,
            speed: 1500,
            fade: true,
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
    GallerySlider: function () {
        $(".slideGallery").on("init", function (event, slick) {
            $(".slideGallery").animate({
                opacity: 1,
            });
            
        });
        var slider = $(".slideGallery").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            centerMode: true,
            centerPadding: '0px',
            dots: false,
            arrows: false,
            autoplay: false,
            speed: 1500,
            fade: false,
            autoplaySpeed: 5000,
            swipe: false,

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
                $(".linkLg").hide();
            }
        );
        slider.on(
            "afterChange",
            function (event, slick, currentSlide, nextSlide) {
                console.log("afterChange");
                $(".linkLg").show();
            }
        );
        $("#nextGallery").click(function(e) {
            slider.slick("slickNext");
        });
        $("#prevGallery").click(function(e) {
            slider.slick("slickPrev");
        });
    },

    

    CustomWidthSlider: function () {
        var slider;
        $(".utilitiesSliderWrap").each(function(){
            let slidesNumber = $(this).find('.sliderUti .hDot').length;
            console.log(slidesNumber);
            // $('.sliderUti .hDot').removeClass('hDot');
            let listSlider = $(this).find('.sliderUti').html();
            $(this).find('.sliderUti').append(listSlider);
            $(this).find('.sliderUti').append(listSlider);
            $(this).find('.sliderUti').append(listSlider);
            // let slidesList = $(this).find('.sliderUti').children();
            
            $(this).find('.sliderUti').on("init", function (event, slick) {
                $(".sliderUti").animate({
                    opacity: 1,
                });
                $(".sliderUti .slick-current").addClass("activeWidth");
                
                
            });
            slider = $(this).find('.sliderUti').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: true,
                dots:false,
                speed: 700,
                swipe: false,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 480,
                        settings: {
                            swipe: true,
                            arrows: true,
                            nextArrow : '<div class="btnSlider style2 btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
                            prevArrow : '<div class="btnSlider style2  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
                        }
                    },
                  ]
            });
            $(this).find('.sliderUtiWrap').append('<ul class="slick-dots"></ul>');
            for (let i = 0; i < slidesNumber; i++) {
                let dot
                if(i == 0) {
                    dot = '<li class="slick-active"><button class="slider__dot" data-slide-index="' + i + '">' + i + '</button></li>';
                } else {
                    dot = '<li><button class="slider__dot" data-slide-index="' + i + '">' + i + '</button></li>';
                }
                if(i == slidesNumber) {
                    dot = '<li class="slick-active"><button class="slider__dot" data-slide-index="' + 0 + '">' + 0 + '</button></li>';
                }
                
                $(this).find('.slick-dots').append(dot);
            }
            
            slider.on(
                "beforeChange",
                function (event, slick, currentSlide, nextSlide) {
                    console.log("123");
                    $(this).find('.slick-slide').removeClass('activeWidth');
                    //$(".slick-slide[data-slick-index='"+nextSlide+"']").addClass('activeWidth');
                }
            );
            slider.on(
                "afterChange",
                function (event, slick, currentSlide, nextSlide) {
                    console.log(nextSlide);
                    var index = $(this).find('.slick-current').attr("indexslider");
                    $(this).find('.slick-dots li').removeClass('slick-active');
                    $(this).find('.slick-dots li').eq(index).addClass('slick-active');
                    //
                    if(currentSlide==0) {
                        $(this).find('.slick-slide').not(".slick-current").removeClass('activeWidth');
                        $(this).find('.slick-current').addClass("activeWidth");
                    }
                    //$(this).find('.slick-slide').removeClass('activeWidth');
                    $(this).find('.slick-current').addClass('activeWidth');
                    
                    // var toClone1 = $(this).find('.slick-track').children('.slick-slide');
                    // $(this).find('.slick-track').append(toClone1)
                    // slider.slick('slickSetOption', 'infinite', true, true);
                }
            );
        })
        
        

        
        

        
        $('.slick-dots button').click(function(e) {
            let slideIndex = $(e.target).attr('data-slide-index');
            $(this).parents('.slick-slider').find('.slick-slide').removeClass('activeWidth');
            // $(this).parents('.slick-dots').find('li').removeClass('slick-active');
            // $(this).parent().addClass('slick-active');
            // $('.slick-dots li').removeClass('slick-active');
            // $('.slick-dots li').eq(slideIndex).addClass('slick-active')
            setTimeout( () => {
                $(this).parents('.slick-slider').slick('slickGoTo', slideIndex);
            }, 700)
        });

        $('.opSlideGallery .btnSliderNext').click(function(e) {
            $(this).parents('.sliderUtiWrap').find('.slick-slide').removeClass('activeWidth');
            // Delay until the slide is changed
            setTimeout( () => {
                $(this).parents('.sliderUtiWrap').find('.slick-slider').slick('slickNext');
            }, 700)
        });

        $('.opSlideGallery .btnSliderPrev').click(function(e) {
            $(this).parents('.sliderUtiWrap').find('.slick-slide').removeClass('activeWidth');
            // Delay until the slide is changed
            setTimeout( () => {
                $(this).parents('.sliderUtiWrap').find('.slick-slider').slick('slickPrev');
            }, 700)
        });

        
    },

    scrollHeader: function () {
        var scrollPos = $(window).scrollTop();
        clearTimeout($.data(this, 'scrollTimer'));
        // if (scrollPos > 0) {
        //     $("header").addClass("fixedHeader");
        // } else {
        //     $("header").removeClass("fixedHeader");
        // }
        if (scrollPos > 100) {
            $(".fixedHeader").addClass("show");
            $(".menuMobile").addClass("show");

            

            
        } else {
            $(".fixedHeader").removeClass("show");
            $(".menuMobile").removeClass("show");
        }
    },
    location: function () {
        
        $(".js-changeImg").click(function(e) {
            var _this = $(this)
            if(!$(this).hasClass("active")) {
                $(".js-changeImg,.itemLocation").removeClass('active');
                $(this).addClass('active');
                $(this).parent().addClass('active');
                TweenMax.set($(".itemLocationList .info li"), { y: 50, autoAlpha: 0 });
                var imgURL = $(this).attr("data");
                var imgURLMb = $(this).attr("data-mb");
                if(imgURL==="video") {
                    $('.videoMap').fadeIn();
                } else {
                    $('.videoMap').fadeOut();
                    $("#imgChange")
                    .stop(true,true).fadeOut(200, function() {
                        $("#imgChange").css("background", "url(" + imgURL + ")");
                        $("#imgChange img").attr("src", imgURLMb);
                    })
                    .stop(true,true).fadeIn(800,function() {
                        TweenMax.staggerTo(
                            _this.prev().find("li"),
                            1.0,
                            { y: 0, autoAlpha: 1, ease: Power4.easeOut },
                            0.2
                        );
                    })
                }
                
               
            }
            
        });
    },

    animationScroll: function () {
        var tl = new TimelineLite();
        var itemAwPageU = $(".stagger-up:visible");
        var goU = $(".go-up:visible");
        var itemAwPageL = $(".stagger-left:visible");
        var itemAwPageR = $(".stagger-right:visible");
        var itemAwPageD = $(".stagger-down:visible");
        tl.set(itemAwPageU, { visibility: "visible" });
        tl.set(itemAwPageL, { visibility: "visible" });
        tl.set(itemAwPageR, { visibility: "visible" });
        tl.set(itemAwPageD, { visibility: "visible" });
        tl.set(goU, { visibility: "visible" });
        tl.staggerFrom( goU, 1,
            {css:{scale:1.2, opacity:0}, 
            ease:Quad.easeInOut
        });
        tl.staggerFrom(
            itemAwPageD,
            1,
            { y: -50, autoAlpha: 0, ease: Power4.easeOut },
            0.2
        );
        tl.staggerFrom(
            itemAwPageU,
            1,
            { y: 50, autoAlpha: 0, ease: Power4.easeOut },
            0.2,
            "-=2"
        );
        tl.staggerFrom(
            itemAwPageL,
            1,
            { x: -50, autoAlpha: 0, ease: Power4.easeOut },
            0.2,
            "-=2"
        );
        tl.staggerFrom(
            itemAwPageR,
            1,
            { x: 50, autoAlpha: 0, ease: Power4.easeOut },
            0.2,
            "-=2"
        );
        

        var controller = new ScrollMagic.Controller();

        $(".animate").each(function (index, el) {
            var currentItem = this;
            TweenMax.set($(".animate"), { y: 50, autoAlpha: 0 });
            var scene = new ScrollMagic.Scene({
                triggerElement: currentItem,
                triggerHook: 0.85,
            })
                .on("enter", function (e) {
                    TweenMax.to(currentItem, 2, {
                        y: 0,
                        autoAlpha: 1,
                        ease: Power4.easeOut,
                    });
                })
                .addTo(controller);
        });

        TweenMax.set($(".overviewInfo .item"), {
            y: 50,
            autoAlpha: 0,
            visibility: "visible",
        });
        var scene = new ScrollMagic.Scene({
            triggerElement: ".overviewInfo",
            triggerHook: 0.8,
        })
            .on("enter", function (e) {
                TweenMax.staggerTo(
                    $(".overviewInfo .item"),
                    1.0,
                    { y: 0, autoAlpha: 1, ease: Power4.easeOut },
                    0.2
                );
            })
            .addTo(controller);

        TweenMax.set($(".itemLocationList .itemLocation"), {
            y: 50,
            autoAlpha: 0,
            visibility: "visible",
        });
        var scene = new ScrollMagic.Scene({
            triggerElement: ".itemLocationList",
            triggerHook: 0.8,
        })
            .on("enter", function (e) {
                TweenMax.staggerTo(
                    $(".itemLocationList .itemLocation"),
                    1.0,
                    { y: 0, autoAlpha: 1, ease: Power4.easeOut },
                    0.2
                );
            })
            .addTo(controller);
        TweenMax.set($(".partnerList .item"), {
            y: 50,
            autoAlpha: 0,
            visibility: "visible",
        });
        var scene = new ScrollMagic.Scene({
            triggerElement: ".partnerList",
            triggerHook: 0.8,
        })
            .on("enter", function (e) {
                TweenMax.staggerTo(
                    $(".partnerList .item"),
                    1.0,
                    { y: 0, autoAlpha: 1, ease: Power4.easeOut },
                    0.2
                );
            })
            .addTo(controller);
        TweenMax.set($(".listImg .imgPage"), {
            y: 50,
            autoAlpha: 0,
            visibility: "visible",
        }); 
        var scene = new ScrollMagic.Scene({
            triggerElement: ".listImg",
            triggerHook: 0.8,
        })
            .on("enter", function (e) {
                TweenMax.staggerTo(
                    $(".listImg .imgPage"),
                    1.0,
                    { y: 0, autoAlpha: 1, ease: Power4.easeOut },
                    0.2
                );
            })
        .addTo(controller);
        
        TweenMax.set($(".serviceSectionList .itemSer"), {
            y: 50,
            autoAlpha: 0,
            visibility: "visible",
        }); 
        var scene = new ScrollMagic.Scene({
            triggerElement: ".serviceSectionList",
            triggerHook: 0.8,
        })
            .on("enter", function (e) {
                TweenMax.staggerTo(
                    $(".serviceSectionList .itemSer"),
                    1.0,
                    { y: 0, autoAlpha: 1, ease: Power4.easeOut },
                    0.2
                );
            })
        .addTo(controller);

        
        TweenMax.set($(".newsList .item"), {
            y: 50,
            autoAlpha: 0,
            visibility: "visible",
        }); 
        var scene = new ScrollMagic.Scene({
            triggerElement: ".newsList",
            triggerHook: 0.8,
        })
            .on("enter", function (e) {
                TweenMax.staggerTo(
                    $(".newsList .item"),
                    1.0,
                    { y: 0, autoAlpha: 1, ease: Power4.easeOut },
                    0.2
                );
            })
        .addTo(controller);
    },
};
LANCASTER.init();

function hasTouch() {
    return (
        "ontouchstart" in document.documentElement ||
        navigator.maxTouchPoints > 0 ||
        navigator.msMaxTouchPoints > 0
    );
}

if (hasTouch()) {
    // remove all :hover stylesheets
    try {
        // prevent exception on browsers not supporting DOM styleSheets properly
        for (var si in document.styleSheets) {
            var styleSheet = document.styleSheets[si];
            if (!styleSheet.rules) continue;

            for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
                if (!styleSheet.rules[ri].selectorText) continue;

                if (styleSheet.rules[ri].selectorText.match(":hover")) {
                    styleSheet.deleteRule(ri);
                }
            }
        }
    } catch (ex) {}
}
