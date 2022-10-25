    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="wrap wrap-1200">
            <div>
                <a href="1-home.html" class="logo"><img src="{{ asset('assets/img/bg/logo.svg') }}"
                        alt="Take1 logo" /></a>
                <p class="copyright">Copyright 2021 All rights reserved</p>
            </div>

            <div>
                <nav>
                    <h5 class="hidden">Footer Navigation</h5>
                    <ul class="menu">
                        <li><a href="{{ route('casting_board') }}">
                                <h6>Casting board</h6>
                            </a></li>
                        <li><a href="{{ route('our_talent') }}">
                                <h6>Meet our talents</h6>
                            </a></li>
                        <li><a href="{{ route('talent_service') }}">
                                <h6>Talent services</h6>
                            </a></li>
                        <li><a href="{{ route('casting_service') }}">
                                <h6>Casting services</h6>
                            </a></li>
                        <li><a href="{{ route('about') }}">
                                <h6>About us</h6>
                            </a></li>
                    </ul>
                </nav>

                <nav>
                    <h5 class="hidden">Social Channels</h5>
                    <ul class="social-link">
                        <li><a href="https://www.twitter.com/" target="_blank"><img
                                    src="{{ asset('assets/img/bg/twitter.svg') }}" alt="twitter logo" />
                                <h6 class="hidden">twitter</h6>
                            </a></li>
                        <li><a href="https://www.youtube.com/" target="_blank"><img
                                    src="{{ asset('assets/img/bg/youtube.svg') }}" alt="youtube logo" />
                                <h6 class="hidden">youtube</h6>
                            </a></li>
                        <li><a href="https://www.facebook.com/" target="_blank"><img
                                    src="{{ asset('assets/img/bg/facebook.svg') }}" alt="facebook logo" />
                                <h6 class="hidden">facebook</h6>
                            </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <div class="curve-deco type-1"></div>
    <div class="curve-deco type-2"></div>
    <!-- END FOOTER -->

    <!-- POPUP -->
    <div id="popup-loading">
        <div class="dot-wrap">
            <b></b><b></b><b></b><b></b><b></b>
            <b></b><b></b><b></b><b></b><b></b>
        </div>
    </div>

    <div id="popup-alert" class="popup-content">
        <div class="main-content">
            <a href="#" role="button" class="btn-close"><i></i></a>
            <section class="heading-wrap">
                <h3 class="heading title"></h3>
                <p class="desc"></p>
            </section>
        </div>
    </div>

    <div id="popup-warning" class="popup-content">
        <div class="main-content">
            <a href="#" role="button" class="btn-close"><i></i></a>
            <section class="heading-wrap">
                <h3 class="heading title"></h3>
                <p class="desc"></p>
            </section>

            <div class="btn-grid-wrap">
                <a href="#" role="button" class="btn-cancel btn-gray">Cancel</a>
                <a href="#" role="button" class="btn-submit btn-red">Remove</a>
            </div>
        </div>
    </div>


    <!-- <div id="popup-login" class="popup-content">
        <div class="main-content">
            <a href="#" role="button" class="btn-close"><i></i></a>
            <section class="heading-wrap">
                <h3 class="heading">Log In To Hire This Talent</h3>
                <p class="desc">Don’t have an account? <a href="6-signup.html" role="button" class="btn-txt">Sign up
                        here</a></p>
            </section>

            <form class="login-form" data-url="json/submit-form-fail.json">
                <p class="warning-server">Server errors show here!!!</p>
                <div class="input-wrap">
                    <div class="posrel">
                        <input name="email" type="text" class="input js-required js-email" autocomplete="off"
                            required-txt="Enter your Email Address" email-txt="Please enter a valid email address" />
                        <label class="txt-label" for="email-address">Email Address</label>
                    </div>
                    <p class="warning">Enter your Email Address</p>
                </div>
                <div class="input-wrap">
                    <div class="posrel">
                        <input name="password" type="password" class="input js-required js-min" autocomplete="off"
                            data-min="2" required-txt="Please enter your password"
                            min-txt="Password must be at least two characters" />
                        <label class="txt-label" for="password">Password</label>
                        <a href="#" role="button" class="btn-show-pw"></a>
                    </div>
                    <p class="warning"></p>
                </div>
                <div class="form-wrap keep-login-wrap">
                    <div class="chx-wrap">
                        <div class="holder">
                            <input type="checkbox" name="keep-login" id="chx-keep-login" />
                            <label for="chx-keep-login">Keep me log in</label>
                        </div>
                        <p class="warning"></p>
                    </div>
                    <a href="#" role="button" class="btn-txt">Forgot Password?</a>
                </div>

                <a href="#" role="button" class="btn-submit btn-gold">Log In</a>
                <p class="sep-line"><b>or log in with</b></p>
                <div class="form-wrap col-2">
                    <a href="#" role="button" class="btn-icon">
                        <figure>
                            <img src="{{ asset('assets/img/social/facebook.svg') }}" alt="facebook" />
                            <figcaption>facebook</figcaption>
                        </figure>
                    </a>
                    <a href="#" role="button" class="btn-icon">
                        <figure>
                            <img src="{{ asset('assets/img/social/google.svg') }}" alt="google" />
                            <figcaption>google</figcaption>
                        </figure>
                    </a>
                </div>
            </form>
        </div>
    </div> -->


    <!-- JAVASCRIPT -->
    <script type="text/javascript">
        var web_root = '{{ route("home") }}';
    </script>
    <!-- <script>    
        var path_resource = "https://lancaster.nextcreative.vn/legacy/";
        function randomVersion(){return"?v="+ +new Date+(99*Math.random()<<0)}"function"!=typeof Object.assign&&Object.defineProperty(Object,"assign",{value:function(t,n){"use strict";if(null==t)throw new TypeError("Cannot convert undefined or null to object");for(var e=Object(t),r=1;r<arguments.length;r++){var i=arguments[r];if(null!=i)for(var o in i)Object.prototype.hasOwnProperty.call(i,o)&&(e[o]=i[o])}return e},writable:!0,configurable:!0}),String.prototype.includes||(String.prototype.includes=function(t,n){"use strict";return"number"!=typeof n&&(n=0),!(n+t.length>this.length)&&-1!==this.indexOf(t,n)}),Array.prototype.find||Object.defineProperty(Array.prototype,"find",{value:function(t){if(null==this)throw TypeError('"this" is null or not defined');var n=Object(this),e=n.length>>>0;if("function"!=typeof t)throw TypeError("predicate must be a function");for(var r=arguments[1],i=0;i<e;){var o=n[i];if(t.call(r,o,i,n))return o;i++}},configurable:!0,writable:!0}),Object.defineProperties(Array.prototype,{first:{get:function(){return 0==this.length?null:this[0]}},last:{get:function(){return 0==this.length?null:this[this.length-1]}},randomIndex:{get:function(){return Math.floor(Math.random()*this.length)}},randomElement:{get:function(){return this[this.randomIndex]}}}),Object.assign(Array.prototype,{getRandom:function(t){var n=new Array(t),e=this.length,r=new Array(e);if(e<t)throw new RangeError("getRandom: more elements taken than available");for(;t--;){var i=Math.floor(Math.random()*e);n[t]=this[i in r?r[i]:i],r[i]=--e in r?r[e]:e}return n},getHalfRandom:function(){var t=Math.ceil(this.length/2);return this.getRandom(t)},shuffle:function(){var t,n,e=this.length;if(0==e)return this;for(;--e;)t=Math.floor(Math.random()*(e+1)),n=this[e],this[e]=this[t],this[t]=n;return this},moveIndex:function(t,n){if(n>=this.length)for(var e=n-this.length+1;e--;)this.push(void 0);return this.splice(n,0,this.splice(t,1)[0]),this}}),Object.assign(String.prototype,{isEmpty:function(){return null===this||null!==this.match(/^ *$/)},replaceAt:function(){return this.substr(0,index)+replacement+this.substr(index+replacement.length)}});
        var GLoader={version:"1.7",tmpScriptData:[],loadScript:function(t,n){t||n&&n();var e=!1,o=-1<t.indexOf(".js")?"js":"css",r={status:!1,message:""},s="js"==o?document.createElement("script"):document.createElement("link");function a(){e||(e=!0,r.status=!0,r.message="Script was loaded successfully",n&&n(r))}function l(){e||"complete"===s.readyState&&a()}function i(){e||(e=!0,r.status=!1,r.message="Failed to load script.",n&&n(r))}s.setAttribute("data-loader","GLoader"),"js"==o?(s.setAttribute("type","text/javascript"),isLocal?s.setAttribute("src",t):GLoader.loadFile(t,{onComplete:function(e){GLoader.embedScript(s,GLoader.getFileName(t),e),n&&n(r)},onError:i})):(s.setAttribute("rel","stylesheet"),s.setAttribute("type","text/css"),s.setAttribute("href",t)),"js"==o?document.body.appendChild(s):(document.head.appendChild(s),s.onload=a,s.onreadystatechange=l,s.onerror=i),isLocal&&(s.onload=a,s.onreadystatechange=l,s.onerror=i)},isExisted:function(e){var t=!1,n=this.getFileName(e),e="js_"+n;if(0!=document.getElementsByName(e).length)return!0;for(var o,r=document.getElementsByTagName("script"),s=0;s<r.length;s++)r[s].src&&(o=r[s].src,this.getFileName(o).toLowerCase()==n.toLowerCase()&&(t=!0));return t},embedScript:function(e,t,n){(e.getAttribute("name")||"").isEmpty()&&e.setAttribute("name",name),isLocal||e.removeAttribute("name"),e.textContent=n},loadScripts:function(n,e){var o=(e=e||{}).onComplete||null,r=e.onProcess||null;if(0!=n.length)if(isLocal){var s=0,a=n.length;GLoader.loadScript(n[s],function e(t){r&&r(s/a);s++;s==a?(t.status=!0,t.message="All scripts were loaded.",r&&r(1),o&&o(t)):GLoader.isExisted(n[s])?(console.log('[GLoader] The script "'+n[s]+'" was existed -> Skipped.'),e&&e()):GLoader.loadScript(n[s],e)})}else{n.filter(function(e){return-1<e.indexOf(".css")}).map(function(e){return GLoader.loadScript(e)});for(var t=[],l=[],i=0,u=0;u<n.length;u++){var d,c,p=n[u];p.indexOf(".js")<=-1||(d="js_"+GLoader.getFileName(p),GLoader.isExisted(GLoader.getFileName(p))||((c=document.createElement("script")).setAttribute("name",d),c.setAttribute("data-loader","GLoader"),c.setAttribute("type","text/javascript"),document.body.appendChild(c),t.push(n[u]),l.push({id:i,url:p,name:d}),i++))}var f=-1,m=[];this.loadMultiFile(t,{maxQueue:7,onProgress:function(e,t,n){var o=l.find(function(e){return e.url==t});o.data=n,m.push(o),m.find(function(e){return e.id==f+1})&&(m.sort(function(e,t){return e.id-t.id}),function(){for(var e=0;e<m.length;e++){var t=m[e];if(t.id!=f+1)return;f++,GLoader.embedScript(document.getElementsByName(t.name)[0],t.name,t.data),m.shift(),e--}}()),null!=r&&r(e)},onComplete:function(){o&&o()}})}else o&&o()},loadPhoto:function(e,t,n){var o=new Image;o.onload=function(){void 0!==n&&n(e)},o.onerror=function(){void 0!==n&&n(null)},o.src=e},loadPhotos:function(e,n,o){var r=e,s=0,a=r.length,l={status:!1,message:""},i=[],u=r[s];this.loadPhoto(u,n,function e(t){s++;s==a?(l.status=!0,l.message="All photos were loaded.",l.photos=i,o&&o(l)):(i.push(t),u=r[s],GLoader.loadPhoto(u,n,e))})},loadFile:function(e,t){var n=(t=null!=t?t:{}).hasOwnProperty("onProgress")?t.onProgress:null,o=t.hasOwnProperty("onComplete")?t.onComplete:null,r=t.hasOwnProperty("onError")?t.onError:null,t=t.hasOwnProperty("responseType")?t.responseType:"text",s=new XMLHttpRequest;s.open("GET",e,!0),s.responseType=t,s.onprogress=function(e){e=e.loaded/e.total;null!=n&&n(e)},s.onreadystatechange=function(){s.readyState,s.readyState,s.readyState},s.onload=function(){s.readyState===s.DONE&&parseInt(s.status.toString())<400?null!=o&&o(s.response,e):null!=r&&r("Status error "+this.status,"",e)},s.onerror=function(e){console.log(e),null!=r&&r("Loading error")},s.send()},loadMultiFile:function(o,e){var t=this,r=(e=null!=e?e:{}).hasOwnProperty("onProgress")?e.onProgress:null,n=e.hasOwnProperty("onComplete")?e.onComplete:null,s=e.hasOwnProperty("onError")?e.onError:null,a=e.hasOwnProperty("maxQueue")?e.maxQueue:5,l=e.hasOwnProperty("responseType")?e.responseType:"text",i=0,u=0,d=0,c=0;if(0!=o.length&&null!=o||v(),o.length<a)for(let e=0;e<o.length;e++){var p=o[e];t.loadFile(p,{responseType:l,onError:h,onComplete:g})}else f();function f(){var e;u<o.length&&i<a&&(i++,e=o[u],u++,t.loadFile(e,{responseType:l,onComplete:y,onError:h}),f())}function m(e,t){var n=++d/o.length;r&&r(n,e,t)}function h(e,t,n){s&&s(e),void 0!==t&&y(t,n)}function g(e,t){c++,m(t,e),c>=o.length&&v()}function y(e,t){i--,m(t,e),(u>=o.length&&0==i?v:f)()}function v(){n&&n()}},getFileName:function(e){-1<e.indexOf("?")&&(e=e.substring(0,e.indexOf("?")));var t=0<=e.indexOf("\\")?e.lastIndexOf("\\"):e.lastIndexOf("/"),t=e.substring(t);return 0!==t.indexOf("\\")&&0!==t.indexOf("/")||(t=t.substring(1)),t}};
    </script> -->
    <script type="text/javascript" src="{{ asset('assets/js/lib/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lib/jquery.touch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lib/tween.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <script type="text/javascript" defer src="{{ asset('assets/js/myfunc.js') }}"></script>
    <!-- Unexpected case-->
    <noscript>
        <div>For full functionality of this site it is necessary to enable JavaScript. Here are the <a
                href="http://www.enable-javascript.com/" target="_blank">instructions how to enable JavaScript in your
                web browser</a>.
        </div>
    </noscript>

    @if (isset($request) && $request->route()->named('megapay_callback'))
    <script type="text/javascript">
        $( window ).on( "load", function() {

            @if ($result['resultMsg'] == 'SUCCESS')
                APP.popup._alert.update('Payment Success', 'Thank you for purchasing the upgrade package!', '<a class="btn-gold-back" href="{{ route('home') }}">back to homepage</a>');
                APP.popup._alert.show();

                var delay = 5000; 
                var url = "{{ route('home') }}";
                setTimeout(function(){ window.location = url; }, delay);
            @else
                APP.popup._alert.update('Payment failed', 'We are unable to process payment for this transaction. Please try again or contact us.', '<a class="btn-gold-back" href="{{route('client_membership')}}" role="button">retry payment</a>');
                APP.popup._alert.show();
            @endif
        });
    </script>
    @endif

    @if (isset($request) && $request->route()->named('payoo_callback'))
    <script type="text/javascript">
        $( window ).on( "load", function() {

            @if ($result['status'] == '1' && $is_good)
                APP.popup._alert.update('Payment Success', 'Thank you for purchasing the upgrade package!', '<a class="btn-gold-back" href="{{ route('home') }}">back to homepage</a>');
                APP.popup._alert.show();

                var delay = 5000; 
                var url = "{{ route('home') }}";
                setTimeout(function(){ window.location = url; }, delay);
            @else
                APP.popup._alert.update('Payment failed', 'We are unable to process payment for this transaction. Please try again or contact us.', '<a class="btn-gold-back" href="{{route('client_membership')}}" role="button">retry payment</a>');
                APP.popup._alert.show();
            @endif
        });
    </script>
    @endif