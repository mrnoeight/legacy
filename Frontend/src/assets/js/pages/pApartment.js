var isCheckLenght = false;
var isSlickRoof=false;
var pApartment = {
    init: function () {
        //pAbout.galleryInit();
        $(window).on('resize', pApartment.onResize);
        pApartment.OpenCard();
        pApartment.checklenght();
        // pApartment.sliderRoofMobile();
        // PRELOADER.hide();
        $('.btnTab').on("click",pApartment.TabDepartment);
        $('.ShowMore').on("click",pApartment.ShowMore);
        $('.ShowLess').on("click",pApartment.ShowLess);
        $('.mainLinkFl').on("click",pApartment.ShowFloorPlan);
        $('.jsCloseTow').on("click",pApartment.CloseFloorPlan);
        $('.listPlanTow a').on("click",pApartment.OpenTowerDetail);
    },

    onResize: function (e) {
        pApartment.checklenght();
        if($('#tab2').is(':visible')) {
            pApartment.sliderRoofMobile();
        }
        
    },

    OpenTowerDetail: function (e) {
        $('.listPlanTow a').removeClass('active');
        $('.floorplanImg').hide();
        var floorplan = $(this).attr('floor');
        var floorDetail = $(this).attr('floorDetail');
        $('#'+floorDetail).fadeIn();
        $('.floorplanDetail h2').html(floorplan)
        $(this).addClass('active')
        $('.floorplanDetail').fadeIn();

        return false;
    },

    CloseFloorPlan: function (e) {
        $(".tooltipCard").fadeOut(function(){})
        $('.mainLinkFl,.ttTowWrap').fadeIn();
        $('.ovlTowSvg').fadeOut();
        $('.floorplanDetail').fadeOut();
    },

    ShowFloorPlan: function (e) {
        var ovl = $(this).attr('ovl');
        var tooltip = $(this).attr('tooltip');
        var tower = $(this).attr('tower');
        $('.mainLinkFl,.ttTowWrap').fadeOut();
        $('.'+ovl).fadeIn();
        $('.'+tooltip).fadeIn().addClass('active');
        // $('.floorplanDetail').fadeIn();
        $('.'+tooltip).find('.listPlanTow a:first-child').click();
        $('.floorplanDetail .top p span').html(tower);
    },

    sliderRoofMobile: function () {
        if($(window).innerWidth() < 481) {
            console.log(isSlickRoof);
            if(!isSlickRoof) {
                isSlickRoof=true;

                var slider = $(".sliderrooftop").slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: true,
                    autoplay: false,
                    speed: 500,
                    autoplaySpeed: 5000,
                    // adaptiveHeight: true,
                    nextArrow : '<div class="btnSlider  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
                    prevArrow : '<div class="btnSlider  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',
                    });
        
                    slider.on(
                        "afterChange",
                        function (event, slick, currentSlide, nextSlide) {
                            console.log('#roof'+currentSlide)
                            $('.capRoof').hide();
                            $('#roof'+currentSlide).show();
                
                        }
                    );
            }
        }
    },

    ShowMore: function () {
        $(this).parents('.checklenght').find('.itemPlace').show();
        $(this).hide();
        $(this).parents('.checklenght').find('.ShowLess').show();
    },

    ShowLess: function () {
        $(this).parents('.checklenght').find('.itemPlace').each(function(){
            var index = $(this).attr('index');
            if(index > 4) {
                $(this).hide();
                $(this).parents('.checklenght').find('.ShowMore').show();
                $(this).parents('.checklenght').find('.ShowLess').hide();
            }
        });
    },
    
    checklenght: function () {
        if($(window).innerWidth() < 481) {
            $(".checklenght .itemPlace").each(function(){
                var index = $(this).attr('index');
                if(index > 4) {
                    $(this).hide();
                    $(this).parents('.checklenght').find('.ShowMore').show();
                }
            });
        } else {
            $(".checklenght .itemPlace").show();
            $(".checklenght .btn").hide();
        }
    },

    TabDepartment: function () {
        if(!$(this).hasClass("active")) {
            $('.btnTab').removeClass('active');
            $(this).addClass('active');
            var id = $(this).attr('data-tab');
            $('.ctTab').hide();
            $('#'+id).fadeIn(function(){
                pApartment.sliderRoofMobile();
            });
        }
    },
    OpenCard: function () {
        $( ".jsOpenFloor" )
        .mouseover(function() {
          $('.rooftopDesk').addClass('active');
          $(this).find(".tooltipCard ").addClass('show');
          $(this).addClass('active');
          $('.ovlCard').stop(true,true).fadeIn();
        })
        .mouseleave(function() {
            $('.rooftopDesk').removeClass('active');
           $(this).find(".tooltipCard ").removeClass('show');
            $(this).removeClass('active');
            $('.ovlCard').stop(true,true).fadeOut();
            
        });
      },

  
}

