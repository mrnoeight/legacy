var isCheckLenght=!1,isSlickRoof=!1,pApartment={init:function(){$(window).on("resize",pApartment.onResize),pApartment.OpenCard(),pApartment.checklenght(),pApartment.popupFloorPlanDetail(),pApartment.selectFloorPlan(),$(".btnTab").on("click",pApartment.TabDepartment),$(".ShowMore").on("click",pApartment.ShowMore),$(".ShowLess").on("click",pApartment.ShowLess),$(".js-mainLinkFl").on("click",pApartment.ShowFloorPlan),$(".jsCloseTow").on("click",pApartment.CloseFloorPlan),$(".listPlanTow a").on("click",pApartment.OpenTowerDetail),$(".js-closefloorplandetailMb").on("click",pApartment.CloseFloorPlanMobile)},onResize:function(e){pApartment.checklenght(),$("#tab2").is(":visible")&&pApartment.sliderRoofMobile()},CloseFloorPlanMobile:function(e){return $(".floorplanDetail").fadeOut(),$(".floorplanDetail select").fadeOut(),!1},selectFloorPlan:function(e){$(".listPlanTowSelect").change((function(){$(".floorplanImg").hide(),$(".hintFp").hide();var e=$(this).find(":selected").attr("floor"),t=$(this).find(":selected").attr("floorDetail");return $("#"+t).fadeIn((function(){$(this).css("display","inline-block")})),$("[rel="+t+"]").css("display","flex"),$(".floorplanDetail h2").html(e),$(this).addClass("active"),$(".floorplanDetail").fadeIn(),$(".floorplanDetail option").each((function(){$(this).attr("floorDetail")==t&&($(this).parent().show(),$(this).prop("selected","selected"))})),!1}))},popupFloorPlanDetail:function(e){$(".js-floorplandetail").on("click",(function(){$("#FloorPlanDetail").stop(!0,!0).fadeIn()})),$(".js-closefloorplandetail").on("click",(function(){$("#FloorPlanDetail").stop(!0,!0).fadeOut()}))},OpenTowerDetail:function(e){$(".listPlanTow a").removeClass("active"),$(".floorplanImg").hide(),$(".hintFp").hide();var t=$(this).attr("floor"),o=$(this).attr("floorDetail");return $("#"+o).fadeIn((function(){$(this).css("display","inline-block")})),$("[rel="+o+"]").css("display","flex"),$(".floorplanDetail h2").html(t),$(this).addClass("active"),$(".floorplanDetail").fadeIn(),!1},CloseFloorPlan:function(e){$(".tooltipCard").fadeOut((function(){})),$(".mainLinkFl,.ttTowWrap").fadeIn(),$(".ovlTowSvg").fadeOut(),$(".floorplanDetail").fadeOut()},ShowFloorPlan:function(e){var t=$(this).attr("ovl"),o=$(this).attr("tooltip"),i=$(this).attr("tower");$(".mainLinkFl,.ttTowWrap").fadeOut(),$("."+t).fadeIn(),$("."+o).fadeIn().addClass("active"),$(".floorplanDetail .top p span").html(i),$(window).width()>1023&&$("."+o).find(".listPlanTow a:first-child").click()},sliderRoofMobile:function(){$(window).innerWidth()<481&&(console.log(isSlickRoof),isSlickRoof||(isSlickRoof=!0,$(".sliderrooftop").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,dots:!0,arrows:!0,autoplay:!1,speed:500,autoplaySpeed:5e3,nextArrow:'<div class="btnSlider  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',prevArrow:'<div class="btnSlider  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>'}).on("afterChange",(function(e,t,o,i){console.log("#roof"+o),$(".capRoof").hide(),$("#roof"+o).show()}))))},ShowMore:function(){$(this).parents(".checklenght").find(".itemPlace").show(),$(this).hide(),$(this).parents(".checklenght").find(".ShowLess").show()},ShowLess:function(){$(this).parents(".checklenght").find(".itemPlace").each((function(){$(this).attr("index")>4&&($(this).hide(),$(this).parents(".checklenght").find(".ShowMore").show(),$(this).parents(".checklenght").find(".ShowLess").hide())}))},checklenght:function(){$(window).innerWidth()<481?$(".checklenght .itemPlace").each((function(){$(this).attr("index")>4&&($(this).hide(),$(this).parents(".checklenght").find(".ShowMore").show())})):($(".checklenght .itemPlace").show(),$(".checklenght .btn").hide())},TabDepartment:function(){if(!$(this).hasClass("active")){$(".btnTab").removeClass("active"),$(this).addClass("active");var e=$(this).attr("data-tab");$(".ctTab").hide(),$("#"+e).fadeIn((function(){pApartment.sliderRoofMobile()}))}},OpenCard:function(){$(".jsOpenFloor").mouseover((function(){$(".rooftopDesk").addClass("active"),$(this).find(".tooltipCard ").addClass("show"),$(this).addClass("active"),$(".ovlCard").stop(!0,!0).fadeIn()})).mouseleave((function(){$(".rooftopDesk").removeClass("active"),$(this).find(".tooltipCard ").removeClass("show"),$(this).removeClass("active"),$(".ovlCard").stop(!0,!0).fadeOut()}))}};