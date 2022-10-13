var isCheckLenght = false;
var isSlickRoof=false;
var pApartment = {
    init: function () {
        //pAbout.galleryInit();
        $(window).on('resize', pApartment.onResize);
        pApartment.OpenCard();
        pApartment.checklenght();
        pApartment.popupFloorPlanDetail();
        pApartment.selectFloorPlan();
        // pApartment.sliderRoofMobile();
        // PRELOADER.hide();
        $('.btnTab').on("click",pApartment.TabDepartment);
        $('.ShowMore').on("click",pApartment.ShowMore);
        $('.ShowLess').on("click",pApartment.ShowLess);
        $('.js-mainLinkFl').on("click",pApartment.ShowFloorPlan);
        $('.jsCloseTow').on("click",pApartment.CloseFloorPlan);
        $('.listPlanTow a').on("click",pApartment.OpenTowerDetail);
        $('.js-closefloorplandetailMb').on("click",pApartment.CloseFloorPlanMobile);
    },

    onResize: function (e) {
        pApartment.checklenght();
        if($('#tab2').is(':visible')) {
            pApartment.sliderRoofMobile();
        }
        
    },
    
    CloseFloorPlanMobile: function (e) {
        $('.floorplanDetail').fadeOut();
        $('.floorplanDetail select').fadeOut();
        return false;
        
    },

    selectFloorPlan: function (e) {
        $(".listPlanTowSelect").change(function () {
            $('.floorplanImg').hide();
            var floorplan = $(this).find(':selected').attr('floor');
            var floorDetail =$(this).find(':selected').attr('floorDetail');
            $('#'+floorDetail).fadeIn(function(){
                $(this).css('display', 'inline-block');
            });
            $('.floorplanDetail h2').html(floorplan)
            $(this).addClass('active')
            $('.floorplanDetail').fadeIn();

            $('.floorplanDetail option').each(function(){
                if($(this).attr('floorDetail') == floorDetail) {
                    $(this).parent().show();
                    $(this).prop("selected", "selected")
                }
                
            });

        return false;
       });
        
    },

    popupFloorPlanDetail: function (e) {
        $('.js-floorplandetail').on("click",function(){
            $('#FloorPlanDetail').stop(true,true).fadeIn();
        });

        $('.js-closefloorplandetail').on("click",function(){
            $('#FloorPlanDetail').stop(true,true).fadeOut();
        });
        
    },

    OpenTowerDetail: function (e) {
        $('.listPlanTow a').removeClass('active');
        $('.floorplanImg').hide();
        var floorplan = $(this).attr('floor');
        var floorDetail = $(this).attr('floorDetail');
        $('#'+floorDetail).fadeIn(function(){
            $(this).css('display', 'inline-block');
        });
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
        
        $('.floorplanDetail .top p span').html(tower);
        if($(window).width()>1023) {
            $('.'+tooltip).find('.listPlanTow a:first-child').click();
        }
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

