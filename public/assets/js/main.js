var GLOBAL=this;"undefined"==typeof path_resource&&(path_resource=""),"undefined"==typeof CDN_DEV&&(CDN_DEV=""),"undefined"==typeof CDN_PROD&&(CDN_PROD=""),Object.defineProperties(GLOBAL,{isLocal:{get:function(){return window.location.hostname.includes("localhost")||window.location.hostname.includes("192.168")||window.location.origin.includes("file")||window.location.href.includes("")}}});var globalCssList=[],globalJsList=[path_resource+"assets/js/vendor/jquery/jquery.min.js",path_resource+"assets/js/digitop/bundle.js",path_resource+"assets/js/plugins/slick/slick.js",path_resource+"assets/js/plugins/owl/owl.carousel.js",path_resource+"assets/js/plugins/owl/owl.carousel.min.css",path_resource+"assets/js/plugins/owl/owl.theme.default.min.css",path_resource+"assets/js/vendor/sweetalert/sweetalert.min.js",path_resource+"assets/js/plugins/scrollmagic/ScrollMagic.min.js",path_resource+"assets/js/plugins/scrollmagic/plugins/animation.gsap.min.js",path_resource+"assets/js/plugins/scrollmagic/plugins/debug.addIndicators.min.js",path_resource+"assets/js/plugins/paroller/jquery.paroller.min.js",path_resource+"assets/js/plugins/paroller/parallax.min.js",path_resource+"assets/js/plugins/lightgallery/lightgallery.js",path_resource+"assets/js/digitop-common.js",path_resource+"assets/js/function.js"],MAIN={init:function(){var s=[];globalCssList.forEach((function(e){s.push(e)})),globalJsList.forEach((function(e){s.push(e)})),GLoader.loadScripts(s,{onComplete:function(s){var e=document.getElementsByTagName("main")[0];if(e){var o=e.getAttribute("id");o||console.log("[MAIN] Thẻ <main> hình như chưa có 'id' kìa. Mà nếu không cần thì thôi cũng chả sao!"),o?GLoader.loadScript(path_resource+"assets/js/pages/"+o+".js",(function(s){GLOBAL[o]&&void 0!==GLOBAL[o].init?GLOBAL[o].init():console.log("[MAIN] Không tìm thấy Class ["+o+"] nào để gọi init() cả.")})):console.log("[MAIN] Chả có Class JS (id) nào cho trang này để load cả.")}else console.log("[MAIN] Thẻ <main> trong HTML của bạn đâu?")}})}};MAIN.init();