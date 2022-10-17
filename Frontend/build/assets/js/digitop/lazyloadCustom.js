
(function () {
    if (typeof window.CustomEvent === "function") return false; //If not IE

    function CustomEvent(event, params) {
        params = params || { bubbles: false, cancelable: false, detail: undefined };
        var evt = document.createEvent('CustomEvent');
        evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
        return evt;
    }

    CustomEvent.prototype = window.Event.prototype;

    window.CustomEvent = CustomEvent;
})();


document.getElementsByClassName = function (cl) {
    var retnode = [];
    var elem = this.getElementsByTagName('*');
    for (var i = 0; i < elem.length; i++) {
        if ((' ' + elem[i].className + ' ').indexOf(' ' + cl + ' ') > -1) retnode.push(elem[i]);
    }
    return retnode;
};



var lazyloadCustom = {

    version: 1.0,

    element: document.createElement("child"),

    // isAllowTrigger: true,

    start: function (hasCallback) {
        var scope = this;

        var array = document.getElementsByClassName("lazyload");
        //console.log(array.length);
        scope.loadMultiFile(array, {
            hasCallback: hasCallback,
            onComplete: function () {
                //console.log("complete");
            }
        });
    },

    reCheck: function (tick) {

        tick = tick || 250;

        var scope = this;

        setInterval(function () {
            if (document.getElementsByClassName("lazyload").length > 0) scope.start();
        }, tick);

    },


    checkImageLoaded: function (callback) {
        var scope = this;

        // if (!scope.isAllowTrigger) return;

        var array = document.getElementsByClassName("lazyload");

        if (array.length == 0) {
            onComplete();
        } else {
            scope.element.addEventListener("oncomplete", function (e) {
                onComplete();
            });
        }

        function onComplete() {
            if (callback) callback();
            // scope.isAllowTrigger = false;
        }

    },


    loadFile: function (element, options) {

        element = typeof element != "undefined" ? element : {};

        options = typeof options != "undefined" ? options : {};

        var onProgress = options.hasOwnProperty("onProgress") ? options['onProgress'] : null;
        var onComplete = options.hasOwnProperty("onComplete") ? options['onComplete'] : null;
        var onError = options.hasOwnProperty("onError") ? options['onError'] : null;
        var responseType = options.hasOwnProperty("responseType") ? options['responseType'] : 'text';

        function removeClassAndAdd(element, classRemove, classAdd) {
            if (element.classList) element.classList.remove(classRemove);
            if (element.classList) element.classList.add(classAdd);
        }

        removeClassAndAdd(element, 'lazyload', 'lazyloading');

        element.addEventListener("load", function () {
            removeClassAndAdd(element, 'lazyloading', 'lazyloaded');

            if (onComplete) onComplete("", element);
        })

        element.addEventListener("error", function () {
            removeClassAndAdd(element, 'lazyloading', 'lazyloaderror');

            if (onError) onError("", element);
        })
        element.setAttribute("src", element.getAttribute("data-src"))

    },

    loadMultiFile: function (_array, options) {

        var array = _array.slice();
        //  var array = Array.of(_array);
        //console.log(array);

        var scope = this;

        options = options != undefined ? options : {};

        var onProgress = options.hasOwnProperty("onProgress") ? options['onProgress'] : null;
        var onComplete = options.hasOwnProperty("onComplete") ? options['onComplete'] : null;
        var onError = options.hasOwnProperty("onError") ? options['onError'] : null;

        var maxQueue = options.hasOwnProperty("maxQueue") ? options['maxQueue'] : 5;

        var hasCallback = options.hasOwnProperty("hasCallback") ? options['hasCallback'] : false;

        var responseType = options.hasOwnProperty("responseType") ? options['responseType'] : 'text';

        var currentQueueCount = 0
            , currentIdLoading = 0
            , idComplete = 0;

        var count = 0;

        if (array.length == 0 || array == null) {
            _onComplete();
        }

        if (array.length < maxQueue) {
            //length < maxQueue
            for (let i = 0; i < array.length; i++) {
                var element = array[i];
                scope.loadFile(element,
                    {
                        // onProgress: _onProgress,
                        responseType: responseType,
                        onError: _onError,
                        onComplete: onCompleteSmallQuality,
                    });
            }
        } else {
            //load per [maxQueue] each
            loadedInQueue();
        }

        function loadedInQueue() {
            //
            if (currentIdLoading < array.length) {

                if (currentQueueCount < maxQueue) {

                    currentQueueCount++;

                    var urlLoading = array[currentIdLoading];
                    currentIdLoading++;
                    //console.log(currentIdLoading)
                    scope.loadFile(urlLoading,
                        {
                            responseType: responseType,
                            onComplete: __onComplete,
                            // onProgress: _onProgress,
                            onError: _onError,
                        });

                    loadedInQueue();
                }
            }
        }


        function _onProgress(url, data) {
            idComplete++;
            var precent = (idComplete) / (array.length);

            if (onProgress) onProgress(precent, url, data);
        }

        function _onError(errorString, data, _url) {
            if (onError) onError(errorString);

            if (typeof data != "undefined")
                __onComplete(data, _url);
        }

        function onCompleteSmallQuality(data, _url) {
            count++;

            _onProgress(_url, data);
            if (count >= array.length) {
                _onComplete();
            }

            // else {
            //     loadedInQueue();
            // };
        }

        function __onComplete(data, _url) {
            currentQueueCount--;

            _onProgress(_url, data);

            //console.log(currentIdLoading, array.length)
            if (currentIdLoading >= array.length && currentQueueCount == 0) {
                _onComplete();
            } else {
                loadedInQueue();
            };
        }

        // scope.element = document.createElement("child");

        function _onComplete() {
            // //console.log("complete");
            // create and dispatch the event
            var event = new CustomEvent("oncomplete", {
                // detail: {
                //     hazcheeseburger: true
                // }
            });

            if (hasCallback) {
                scope.element.dispatchEvent(event);

                if (onComplete) onComplete();
            }
        }
    },
}


lazyloadCustom.start({ hasCallback: true });

lazyloadCustom.checkImageLoaded(function () {
    lazyloadCustom.reCheck();
});

