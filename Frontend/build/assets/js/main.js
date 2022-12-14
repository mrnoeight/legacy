var GLOBAL = this;
if (typeof path_resource == "undefined") path_resource = "";
if (typeof CDN_DEV == "undefined") CDN_DEV = "";
if (typeof CDN_PROD == "undefined") CDN_PROD = "";

Object.defineProperties(GLOBAL, {
    // Dont edit structure this, super risky.
    // Must be read only.
    isLocal: {
        get: function () {
            // return false;
            return window.location.hostname.includes('localhost')
                || window.location.hostname.includes('192.168')
                || window.location.origin.includes('file')
                || window.location.href.includes("https://dev4.digitop.vn/demo")
                ;
        }
    },
});


var globalCssList = [
    // main CSS files:
    // path_resource + "assets/css/main.css", // generate from SASS
    // path_resource + "assets/css/pure.css", // will overwrite SASS
    // Helper CSS file: preloader & some quick styling css
    // path_resource + "assets/css/helper.css",
    // More CSS file to inject? Use this:
    // path_resource + "assets/css/test.css", 
];

var globalJsList = [
    path_resource + "assets/js/vendor/jquery/jquery.min.js",
    path_resource + "assets/js/digitop/bundle.js",
    path_resource + "assets/js/plugins/slick/slick.js",
    path_resource + "assets/js/plugins/owl/owl.carousel.js",
    path_resource + "assets/js/plugins/owl/owl.carousel.min.css",
    path_resource + "assets/js/plugins/owl/owl.theme.default.min.css",
    // vendor
    path_resource + "assets/js/vendor/sweetalert/sweetalert.min.js",
    path_resource + "assets/js/plugins/scrollmagic/ScrollMagic.min.js", 
    path_resource + "assets/js/plugins/scrollmagic/plugins/animation.gsap.min.js", 
    path_resource + "assets/js/plugins/scrollmagic/plugins/debug.addIndicators.min.js",
    path_resource + "assets/js/plugins/paroller/jquery.paroller.min.js",
    path_resource + "assets/js/plugins/paroller/parallax.min.js",
    path_resource + "assets/js/plugins/lightgallery/lightgallery.js",
    // common scripts will execute in all templates:
    path_resource + "assets/js/digitop-common.js",
];

var MAIN = {
    init: function () {
        // Inject JS and CSS files:
        // These scripts will be available in every pages.
        var scriptArr = [];
        globalCssList.forEach(function (css) {
            scriptArr.push(css);
        });
        globalJsList.forEach(function (js) {
            scriptArr.push(js);
        });

        GLoader.loadScripts(scriptArr, {
            onComplete: function (result) {
                // inject page script (if any):
                var mainTag = document.getElementsByTagName("main")[0];
                if (!mainTag) {
                    console.log("[MAIN] Th??? <main> trong HTML c???a b???n ????u?");
                    return;
                }

                var pageID = mainTag.getAttribute("id");
                if (!pageID) {
                    console.log("[MAIN] Th??? <main> h??nh nh?? ch??a c?? 'id' k??a. M?? n???u kh??ng c???n th?? th??i c??ng ch??? sao!");
                    //return;
                }

                if (pageID) {
                    GLoader.loadScript(path_resource + "assets/js/pages/" + pageID + ".js", function (script) {
                        if (GLOBAL[pageID] && typeof GLOBAL[pageID].init != "undefined") {
                            GLOBAL[pageID].init();
                        } else {
                            console.log("[MAIN] Kh??ng t??m th???y Class [" + pageID + "] n??o ????? g???i init() c???.");
                        }
                    });
                }
                else {
                    console.log("[MAIN] Ch??? c?? Class JS (id) n??o cho trang n??y ????? load c???.");
                }
            }
        }
        );
        // End MAIN init.
    }
};

// Execute INIT:
MAIN.init();