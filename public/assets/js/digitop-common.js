var wScreen=$(window).width(),isRunMenu=!1,lastScrollTop=0,delta=5;localStorage.getItem("isLoading")||$("#preloader").removeClass("hideld");var LANCASTER={init:function(){LANCASTER.global.hideLoading(),LANCASTER.global.scrollHeader(),LANCASTER.global.location(),LANCASTER.global.SliderAbout(),LANCASTER.global.CustomWidthSlider(),LANCASTER.global.menuMobile(),LANCASTER.global.language(),LANCASTER.global.PartnerSlider(),LANCASTER.global.PaddingLeft(),LANCASTER.global.ScrollTop();$(".lightgallery").lightGallery({selector:".linkLg"});$(window).scroll((function(){LANCASTER.global.scrollHeader(),$(".lang").removeClass("active"),$(".lang a").stop(!0,!0).fadeOut()})),$(window).bind("resize",(function(){LANCASTER.global.PaddingLeft()})),setTimeout(()=>{$(window).paroller(),$(".parallax").parallax()},2e3),$(window).on("unload",(function(){$("html,body").scrollTop(0)})),$(window).on("hashchange",(function(){LANCASTER.global.DeepLink()})),$(".sliderUti .item").on("click",LANCASTER.global.OpenPopupUtilities),$(".jsClosePopupUti").on("click",LANCASTER.global.ClosePopupUtilities),$(".js-subMenuMb").on("click",LANCASTER.global.openSubMb)}};function hasTouch(){return"ontouchstart"in document.documentElement||navigator.maxTouchPoints>0||navigator.msMaxTouchPoints>0}if(LANCASTER.global={openSubMb:function(){return $(this).hasClass("active")?($(this).next().slideUp(),$(this).removeClass("active")):($(this).next().slideDown(),$(this).addClass("active")),!1},DeepLink:function(){var e=location.hash;e&&(LANCASTER.global.closeMenuMobile(),console.log(e),"#rooftop"==e?($("html, body").animate({scrollTop:$("#floorplan").offset().top-$(".fixedHeader").innerHeight()},600),$(".rooftopLink").click()):($("html, body").animate({scrollTop:$(e).offset().top-$(".fixedHeader").innerHeight()},600),console.log("out",e)))},OpenPopupUtilities:function(){var e=$(this).attr("data-popup");$("#"+e).fadeIn((function(){LANCASTER.global.SliderAboutPopup()}))},ClosePopupUtilities:function(){$(".popup").fadeOut((function(){$(".slideAboutPopup").slick("unslick")}))},ScrollTop:function(){$("#scrollTop").bind("click",(function(e){$("html, body").animate({scrollTop:0},600)}))},hideLoading:function(){localStorage.getItem("isLoading")?setTimeout(()=>{$("html").css("overflow","auto"),LANCASTER.global.animationScroll(),LANCASTER.global.GallerySlider(),LANCASTER.global.DeepLink()},300):setTimeout(()=>{$("#preloader .layer2").fadeOut((function(){TweenMax.to($("#preloader"),1,{y:"-100%",autoAlpha:0,ease:Power4.easeOut}),$("html").css("overflow","auto"),LANCASTER.global.animationScroll(),LANCASTER.global.GallerySlider()})),localStorage.setItem("isLoading",!0),LANCASTER.global.DeepLink()},1e3)},language:function(){$(".lang").bind("click",(function(e){$(this).hasClass("active")?($(".lang").removeClass("active"),$(".lang a").stop(!0,!0).fadeOut()):($(".lang").addClass("active"),$(".lang a").stop(!0,!0).fadeIn())}))},popupSubmit:function(){return swal("","Đăng ký thành công","success",{button:"Quay lại"}),!1},PartnerSlider:function(){$(".partnerList").on("init",(function(e,i){$(".partnerList").animate({opacity:1})}));var e=$(".partnerList").slick({infinite:!0,slidesToShow:3,slidesToScroll:1,dots:!1,arrows:!0,autoplay:!1,speed:1500,fade:!1,autoplaySpeed:5e3,swipe:!1,nextArrow:'<div class="btnSlider style2  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',prevArrow:'<div class="btnSlider style2  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',responsive:[{breakpoint:1180,settings:{swipe:!0}},{breakpoint:851,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:"unslick"}]});e.on("beforeChange",(function(e,i,t,o){console.log("beforeChange")})),e.on("afterChange",(function(e,i,t,o){console.log("afterChange")}))},menuMobile:function(){$(".js_menuMobile").bind("click",(function(e){$(".bar").hasClass("animate")?LANCASTER.global.closeMenuMobile():($(".bar").addClass("animate"),$(".navMobile").addClass("active"),TweenMax.set($(".navMobile li"),{y:50,autoAlpha:0}),$(".navMobile").stop(!0,!0).fadeIn(500,(function(){TweenMax.staggerTo($(".navMobile li"),.7,{y:0,autoAlpha:1,ease:Power4.easeOut},.1)})))}))},closeMenuMobile:function(){$(".bar").removeClass("animate"),TweenMax.set($(".navMobile li"),{y:50,autoAlpha:0}),$(".navMobile").stop(!0,!0).fadeOut(500)},MenuScroll:function(){$(document).ready((function(){$("nav a").bind("click",(function(e){e.preventDefault();var i=$(this).attr("href");return LANCASTER.global.closeMenuMobile(),$("html, body").stop().animate({scrollTop:$(i).offset().top},600,(function(){})),!1}))})),$(window).scroll((function(){var e=$(window).scrollTop();$(".section").each((function(i){$(this).position().top<=e+10&&(console.log($(this).attr("id")),$(".menufix a.active").removeClass("active"),$("[data-link='#"+$(this).attr("id")+"']").addClass("active"))}))})).scroll()},PaddingLeft:function(){$(".utilitiesSliderWrap").length&&$(".utilitiesSliderWrap").css("padding-left",$(".utilitiesWrap .container").offset().left+80)},PosAboutSlider:function(){$(".slideAbout").length&&($(".slideAbout .slick-dots").css("left",$(".slideAbout .slick-active .container").offset().left),$(".aboutUsWrap .optionSlider").css("right",($(window).width()-$(".slideAbout .w").innerWidth())/2),console.log($(".slideAbout .w").innerWidth()))},SliderAbout:function(){$(".slideAbout").on("init",(function(e,i){$(".slideAbout").animate({opacity:1}),$(window).paroller()}));var e=$(".slideAbout").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,dots:!0,arrows:!1,autoplay:!1,fade:!0,speed:1500,autoplaySpeed:5e3,adaptiveHeight:!0});e.on("beforeChange",(function(e,i,t,o){})),e.on("afterChange",(function(e,i,t,o){})),e.next().find(".btnSliderNext").click((function(e){$(this).parent().prev().slick("slickNext")})),e.next().find(".btnSliderPrev").click((function(e){$(this).parent().prev().slick("slickPrev")}))},SliderAboutPopup:function(){$(".slideAboutPopup").on("init",(function(e,i){$(".slideAboutPopup").animate({opacity:1})}));var e=$(".slideAboutPopup").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,dots:!0,arrows:!0,autoplay:!1,speed:1500,fade:!0,autoplaySpeed:5e3,adaptiveHeight:!0,nextArrow:'<div class="btnSlider  btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',prevArrow:'<div class="btnSlider  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>'});e.on("beforeChange",(function(e,i,t,o){})),e.on("afterChange",(function(e,i,t,o){}))},GallerySlider:function(){$(".slideGallery").on("init",(function(e,i){$(".slideGallery").animate({opacity:1})}));var e=$(".slideGallery").slick({infinite:!0,slidesToShow:3,slidesToScroll:3,centerMode:!0,centerPadding:"0px",dots:!1,arrows:!1,autoplay:!1,speed:1500,fade:!1,autoplaySpeed:5e3,swipe:!1,responsive:[{breakpoint:1180,settings:{swipe:!0}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]});e.on("beforeChange",(function(e,i,t,o){console.log("beforeChange"),$(".linkLg").hide()})),e.on("afterChange",(function(e,i,t,o){console.log("afterChange"),$(".linkLg").show()})),$("#nextGallery").click((function(i){e.slick("slickNext")})),$("#prevGallery").click((function(i){e.slick("slickPrev")}))},CustomWidthSlider:function(){var e;$(".utilitiesSliderWrap").each((function(){let i=$(this).find(".sliderUti .hDot").length;console.log(i);let t=$(this).find(".sliderUti").html();$(this).find(".sliderUti").append(t),$(this).find(".sliderUti").append(t),$(this).find(".sliderUti").append(t),$(this).find(".sliderUti").on("init",(function(e,i){$(".sliderUti").animate({opacity:1}),$(".sliderUti .slick-current").addClass("activeWidth"),$(".sliderUti .slick-current h2").addClass("show")})),e=$(this).find(".sliderUti").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,variableWidth:!0,dots:!1,speed:700,swipe:!1,arrows:!1,responsive:[{breakpoint:480,settings:{swipe:!0,arrows:!0,nextArrow:'<div class="btnSlider style2 btnSliderNext"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>',prevArrow:'<div class="btnSlider style2  btnSliderPrev"><svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none"><circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none"/></svg></div>'}}]}),$(this).find(".sliderUtiWrap").append('<ul class="slick-dots"></ul>');for(let e=0;e<i;e++){let t;t=0==e?'<li class="slick-active"><button class="slider__dot" data-slide-index="'+e+'">'+e+"</button></li>":'<li><button class="slider__dot" data-slide-index="'+e+'">'+e+"</button></li>",e==i&&(t='<li class="slick-active"><button class="slider__dot" data-slide-index="0">0</button></li>'),$(this).find(".slick-dots").append(t)}e.on("beforeChange",(function(e,i,t,o){console.log("123"),$(".sliderUti .slick-slide h2").removeClass("show"),$(this).find(".slick-slide").removeClass("activeWidth")})),e.on("afterChange",(function(e,i,t,o){console.log(o);var s=$(this).find(".slick-current").attr("indexslider");$(this).find(".slick-dots li").removeClass("slick-active"),$(this).find(".slick-dots li").eq(s).addClass("slick-active"),0==t&&($(this).find(".slick-slide").not(".slick-current").removeClass("activeWidth"),$(this).find(".slick-current").addClass("activeWidth")),$(this).find(".slick-current").addClass("activeWidth"),setTimeout(()=>{$(this).find(".slick-current h2").addClass("show")},1e3)}))})),$(".slick-dots button").click((function(e){let i=$(e.target).attr("data-slide-index");$(".sliderUti .slick-slide h2").removeClass("show"),$(this).parents(".slick-slider").find(".slick-slide").removeClass("activeWidth"),setTimeout(()=>{$(this).parents(".slick-slider").slick("slickGoTo",i)},700)})),$(".opSlideGallery .btnSliderNext").click((function(e){$(".sliderUti .slick-slide h2").removeClass("show"),$(this).parents(".sliderUtiWrap").find(".slick-slide").removeClass("activeWidth"),setTimeout(()=>{$(this).parents(".sliderUtiWrap").find(".slick-slider").slick("slickNext")},700)})),$(".opSlideGallery .btnSliderPrev").click((function(e){$(".sliderUti .slick-slide h2").removeClass("show"),$(this).parents(".sliderUtiWrap").find(".slick-slide").removeClass("activeWidth"),setTimeout(()=>{$(this).parents(".sliderUtiWrap").find(".slick-slider").slick("slickPrev")},700)}))},scrollHeader:function(){var e=$(window).scrollTop();clearTimeout($.data(this,"scrollTimer")),e>100?($(".fixedHeader").addClass("show"),$(".menuMobile").addClass("show")):($(".fixedHeader").removeClass("show"),$(".menuMobile").removeClass("show"))},location:function(){$(".js-changeImg").click((function(e){var i=$(this);if(!$(this).hasClass("active")){$(".js-changeImg,.itemLocation").removeClass("active"),$(this).addClass("active"),$(this).parent().addClass("active"),TweenMax.set($(".itemLocationList .info li"),{y:50,autoAlpha:0});var t=$(this).attr("data"),o=$(this).attr("data-mb");"video"===t?$(".videoMap").fadeIn():($(".videoMap").fadeOut(),$("#imgChange").stop(!0,!0).fadeOut(200,(function(){$("#imgChange").css("background","url("+t+")"),$("#imgChange img").attr("src",o)})).stop(!0,!0).fadeIn(800,(function(){TweenMax.staggerTo(i.prev().find("li"),1,{y:0,autoAlpha:1,ease:Power4.easeOut},.2)})))}}))},animationScroll:function(){var e=new TimelineLite,i=$(".stagger-up:visible"),t=$(".go-up:visible"),o=$(".stagger-left:visible"),s=$(".stagger-right:visible"),l=$(".stagger-down:visible");e.set(i,{visibility:"visible"}),e.set(o,{visibility:"visible"}),e.set(s,{visibility:"visible"}),e.set(l,{visibility:"visible"}),e.set(t,{visibility:"visible"}),e.staggerFrom(t,1,{css:{scale:1.2,opacity:0},ease:Quad.easeInOut}),e.staggerFrom(l,1,{y:-50,autoAlpha:0,ease:Power4.easeOut},.2),e.staggerFrom(i,1,{y:50,autoAlpha:0,ease:Power4.easeOut},.2,"-=2"),e.staggerFrom(o,1,{x:-50,autoAlpha:0,ease:Power4.easeOut},.2,"-=2"),e.staggerFrom(s,1,{x:50,autoAlpha:0,ease:Power4.easeOut},.2,"-=2");var a=new ScrollMagic.Controller;$(".animate").each((function(e,i){var t=this;TweenMax.set($(".animate"),{y:50,autoAlpha:0});new ScrollMagic.Scene({triggerElement:t,triggerHook:.85}).on("enter",(function(e){TweenMax.to(t,2,{y:0,autoAlpha:1,ease:Power4.easeOut})})).addTo(a)})),TweenMax.set($(".overviewInfo .item"),{y:50,autoAlpha:0,visibility:"visible"});new ScrollMagic.Scene({triggerElement:".overviewInfo",triggerHook:.8}).on("enter",(function(e){TweenMax.staggerTo($(".overviewInfo .item"),1,{y:0,autoAlpha:1,ease:Power4.easeOut},.2)})).addTo(a);TweenMax.set($(".itemLocationList .itemLocation"),{y:50,autoAlpha:0,visibility:"visible"});new ScrollMagic.Scene({triggerElement:".itemLocationList",triggerHook:.8}).on("enter",(function(e){TweenMax.staggerTo($(".itemLocationList .itemLocation"),1,{y:0,autoAlpha:1,ease:Power4.easeOut},.2)})).addTo(a);TweenMax.set($(".partnerList .item"),{y:50,autoAlpha:0,visibility:"visible"});new ScrollMagic.Scene({triggerElement:".partnerList",triggerHook:.8}).on("enter",(function(e){TweenMax.staggerTo($(".partnerList .item"),1,{y:0,autoAlpha:1,ease:Power4.easeOut},.2)})).addTo(a);TweenMax.set($(".listImg .imgPage"),{y:50,autoAlpha:0,visibility:"visible"});new ScrollMagic.Scene({triggerElement:".listImg",triggerHook:.8}).on("enter",(function(e){TweenMax.staggerTo($(".listImg .imgPage"),1,{y:0,autoAlpha:1,ease:Power4.easeOut},.2)})).addTo(a);TweenMax.set($(".serviceSectionList .itemSer"),{y:50,autoAlpha:0,visibility:"visible"});new ScrollMagic.Scene({triggerElement:".serviceSectionList",triggerHook:.8}).on("enter",(function(e){TweenMax.staggerTo($(".serviceSectionList .itemSer"),1,{y:0,autoAlpha:1,ease:Power4.easeOut},.2)})).addTo(a);TweenMax.set($(".newsList .item"),{y:50,autoAlpha:0,visibility:"visible"});new ScrollMagic.Scene({triggerElement:".newsList",triggerHook:.8}).on("enter",(function(e){TweenMax.staggerTo($(".newsList .item"),1,{y:0,autoAlpha:1,ease:Power4.easeOut},.2)})).addTo(a)}},LANCASTER.init(),hasTouch())try{for(var si in document.styleSheets){var styleSheet=document.styleSheets[si];if(styleSheet.rules)for(var ri=styleSheet.rules.length-1;ri>=0;ri--)styleSheet.rules[ri].selectorText&&styleSheet.rules[ri].selectorText.match(":hover")&&styleSheet.deleteRule(ri)}}catch(e){}