var isSlick=false;
var isSlickCard=false;
var pMaster = {
  init: function () {

    //pAbout.galleryInit();
    $(window).on('resize', pMaster.onResize);
    pMaster.onResize();
    // pMaster.OpenCard();
    pMaster.OpenText();
    pMaster.SliderService();
    // pMaster.carouselTeam();
    // PRELOADER.hide();

    $('.openPopupTeam').on("click",pMaster.OpenPopupTeam);
    $('.jsClosePopupTeam').on("click",pMaster.ClosePopupTeam);
    $('.jsclickCardMobile').on("click",pMaster.OpenCardMobile);
    $('.jsOpenCard').on("click",pMaster.OpenCard);
	$('.jsCloseCard').on("click",pMaster.CloseCard);
    // $('.closeTooltip').on("click",pMaster.CloseCard)
    // $('.ovlCard').on("click",pMaster.CloseCard)
  },

  onResize: function (e) {
    pMaster.widthSlider();
	pMaster.SliderService();
  },
    // OpenCard: function () {
    //     $('.jsOpenCard').on("click",function(){
    //         $(this).next().addClass('show');
    //         $(this).parent().addClass('active');
    //         $('.ovlCard').fadeIn();
    //     });
    // },

    OpenCardMobile: function () {
		$(".jsclickCardMobile").removeClass('active');
		$(this).addClass('active');
		$('.contentLans.mb').addClass('active');
		var index = $(this).attr("index")
		var tooltip = $(this).attr('tooltip');
			$('.ovlCard').hide();
			$("[ovlCard="+tooltip+"]").show();
		if(!isSlickCard) {
			$('.caption').hide();
			$('.sliderCard').addClass('show');
			$(".sliderCard").on("init", function (event, slick) {
			$(".sliderCard").animate({
				opacity: 1,
			});
			isSlickCard=true;
			//LANCASTER.global.PosAboutSlider();
			});
			var slider = $(".sliderCard").slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			arrows: true,
			autoplay: false,
			speed: 500,
			autoplaySpeed: 5000,
			adaptiveHeight: true,
			nextArrow : '<div class="btnSlider  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
			prevArrow : '<div class="btnSlider  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
			});

			slider.on(
				"afterChange",
				function (event, slick, currentSlide, nextSlide) {
					$('.jsclickCardMobile[index="'+currentSlide+'"]').click();
		
				}
			);
			$(".sliderCard").slick('slickGoTo', index);
		} else {
			$(".sliderCard").slick('slickGoTo', index);
		}
    },

    SliderService: function () {
		if($(window).innerWidth() > 1180) {
			if(isSlick) {
				$(".serviceSectionList").slick('unslick');
				isSlick=false;
			}
			
			
		} else {
			if(!isSlick) {
				$(".serviceSectionList").on("init", function (event, slick) {
					$(".serviceSectionList").animate({
						opacity: 1,
					});
					isSlick=true;
					//LANCASTER.global.PosAboutSlider();
				});
				var slider = $(".serviceSectionList").slick({
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					arrows: true,
					autoplay: false,
					speed: 500,
					autoplaySpeed: 5000,
					adaptiveHeight: true,
					nextArrow : '<div class="btnSlider  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
					prevArrow : '<div class="btnSlider  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
				});

        
			}
			
		}
      
  },
    OpenText: function () {
      $( ".teamSmall" )
      .mouseover(function() {
        $(this).addClass('active');
        $(this).find(".text").slideDown();
      })
      .mouseleave(function() {
        $(this).removeClass('active');
        $(this).find(".text").slideUp();
      });
    },
	OpenCard: function () {
		if(!$(this).hasClass("active")){
			$(this).addClass("active");
			var tooltip = $(this).attr('tooltip');
			$('.ovlCard').hide();
			$('.lancasterClubWrap .tooltipCard').removeClass('show');
			$("[rel="+tooltip+"]").addClass('show');
			$("[ovlCard="+tooltip+"]").show();
		}
	},
	CloseCard: function () {
		$(".jsOpenCard").removeClass("active");
		$('.ovlCard').hide();
		$('.lancasterClubWrap .tooltipCard').removeClass('show');
	},
    // OpenCard: function () {
    //   $( ".jsOpenCard" )
    //   .mouseover(function() {
    //     $('.lancasterClubWrap').addClass('active');
    //     $(this).parent().find(".tooltipCard ").addClass('show');
    //     $(this).parent().addClass('active');
    //     $('.ovlCard').stop(true,true).fadeIn();
    //   })
    //   .mouseleave(function() {
    //     $('.lancasterClubWrap').removeClass('active');
    //      $(this).parent().find(".tooltipCard ").removeClass('show');
    //       $(this).parent().removeClass('active');
    //       $('.ovlCard').stop(true,true).fadeOut();
    //   });
    // },
    
    // CloseCard: function () {
    //     $('.tooltipCard').removeClass('show');
    //     setTimeout(() => {
    //         $('.linkCard').removeClass('active');
    //     }, 500);
    //     $('.ovlCard').fadeOut();
    // },
    
  
   OpenPopupTeam: function () {
    $('.popup').fadeIn(function(){
        pMaster.carouselTeam();
        $("html,body").css('overflow',"hidden");
        
    });
    },
    ClosePopupTeam: function () {
        $('.popup').fadeOut(function(){
            $("html,body").css('overflow',"auto");
            $(".slideTeamPopup").slick('unslick');
            $(".slideTeamPopup").animate({
                opacity: 0,
            }); 
        });
    },
    
  
  widthSlider: function (e) {
    var width = $(".slideTeamPopup").innerWidth()/5;
    $('.slideTeamPopup .item').css('width',width);
    $('.slideTeamPopup .big').css('width',width*2);
    
    // console.log(width);
    },

  carouselTeam: function () {
    //pMaster.widthSlider();
    $(".slideTeamPopup").on("init", function (event, slick) {
        setTimeout(() => {
            $(".slideTeamPopup").animate({
                opacity: 1,
            }); 
        }, 500);
        
    });
    var slider = $(".slideTeamPopup").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        dots: true,
        arrows: true,
        autoplay: false,
        speed: 500,
        fade: false,
        autoplaySpeed: 5000,
        swipe: false,
        // variableWidth: true,
        nextArrow : '<div class="btnSlider  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
        prevArrow : '<div class="btnSlider  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
        

        responsive: [
            {
                breakpoint: 1180,
                settings: {
                    swipe: true,
					slidesToShow: 3,
					slidesToScroll: 3,
					
                }
              },
			{
				breakpoint: 850,
				settings: {
				  slidesToShow: 2,
				  slidesToScroll: 2,
				}
			},
            {
              breakpoint: 480,
              settings: "unslick"
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

  }
}

