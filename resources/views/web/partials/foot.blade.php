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