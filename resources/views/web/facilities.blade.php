@extends('web.layouts.base')

@section('title') {{ $oPage->seo_title }} @endsection

@section('description') {{ $oPage->seo_description }} @endsection

@section('content')

<!-- MAIN PAGE -->
<main id="pFacilities">
    <div class="bannerSubPage go-up">
        <img class="lazyload pc" data-src="{{ asset('assets/images/demo/banner-page-1.jpg') }}" alt="">
        <img class="lazyload mb" data-src="{{ asset('assets/images/demo/banner-page-1.jpg') }}" alt="">
        <div class="container stagger-down">
            <h2 class="mainTt">{!! nl2br($oPage->head_title1) !!}</h2>
            <div class="copy">
                <p>{!! nl2br($oPage->head_desc1) !!}
                </p>
            </div>
        </div>
    </div>

    <section id="PrivateLegacyclub" class="section aboutUsWrap">
        <div class="slideAbout">
            <div class="item" style="background: url({{ asset('assets/images/demo/22.jpg') }}) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="{{ asset('assets/images/demo/22.jpg') }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">Private Legacy club</h2>
                        <p>Đắm mình trong làn nước xanh mát tại hồ bơi vô cực dành riêng cho những chủ nhân đặc quyền và
                            ngắm nhìn cảnh sắc Thành phố Hồ Chí Minh đầy năng động. Trải nghiệm độc bản dành cho chủ
                            nhân xứng tầm..</p>
                    </div>
                </div>
            </div>
            <div class="item" style="background: url({{ asset('assets/images/demo/30.jpg') }}) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="{{ asset('assets/images/demo/30.jpg') }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">Private GYM</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At nisi nulla nibh lectus donec.
                            Vitae faucibus donec non volutpat accumsan. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. At nisi nulla nibh lectus donec. Vitae faucibus donec non volutpat
                            accumsan.</p>
                    </div>
                </div>
            </div>
            <div class="item" style="background: url({{ asset('assets/images/demo/31.jpg') }}) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="{{ asset('assets/images/demo/31.jpg') }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">business lounge</h2>
                        <p>Không gian sống đủ đầy tại Lancaster Legacy được bổ sung thêm các tiện ích phục vụ công việc
                            như phòng họp, phòng sáng tạo... Mở ra cánh cửa thành công cho mọi gia chủ.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="optionSlider">

            <div class="btnSlider btnSliderPrev">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                </svg>

            </div>
            <div class="btnSlider btnSliderNext">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                </svg>

            </div>
        </div>
    </section>
    <div class="spaceH"></div>
    <section id="ShoppingCenter" class="section aboutUsWrap">
        <div class="slideAbout">
            <div class="item" style="background: url({{ asset('assets/images/demo/23.jpg') }}) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="{{ asset('assets/images/demo/23.jpg') }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">trung tâm<br />
                            thương mại</h2>
                        <p>Khu thương mại lấy cảm hứng từ phong cách thiết kế Da Vinci với những đường nét uốn lượn uyển
                            chuyển, hoà hợp với âm sắc đa dạng của thành phố, một điểm đến văn hoá, giải trí, làm việc
                            năng động dành cho cộng đồng tinh hoa.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item" style="background: url({{ asset('assets/images/demo/32.jpg') }}) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="{{ asset('assets/images/demo/32.jpg') }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">business lounge</h2>
                        <p>Khu thương mại lấy cảm hứng từ phong cách thiết kế Da Vinci với những đường nét uốn lượn uyển
                            chuyển, hoà hợp với âm sắc đa dạng của thành phố, một điểm đến văn hoá, giải trí, làm việc
                            năng động dành cho cộng đồng tinh hoa.</p>
                    </div>
                </div>
            </div>
            <div class="item" style="background: url({{ asset('assets/images/demo/33.jpg') }}) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="{{ asset('assets/images/demo/33.jpg') }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">business lounge</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At nisi nulla nibh lectus donec.
                            Vitae faucibus donec non volutpat accumsan. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. At nisi nulla nibh lectus donec. Vitae faucibus donec non volutpat
                            accumsan.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="optionSlider">

            <div class="btnSlider btnSliderPrev">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                </svg>

            </div>
            <div class="btnSlider btnSliderNext">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class="circle" cx="50" cy="50" r="48" stroke="#A3815F" stroke-width="2" fill="none" />
                </svg>

            </div>
        </div>
    </section>

    <section class="utilitiesWrap">
        <div class="container"></div>
        <div id="HealthUtility" class="utilitiesSliderWrap animate">
            <div class="copy">
                <h2 class="mainTt">tiện ích <br />
                    sức khoẻ</h2>
                <p>Trải nghiệm phòng gym hiện đại, khu vực yoga ngoài trời và không gian riêng tư dành cho gia đình được
                    lấp đầy bởi không gian tươi mát. Tất cả tiện ích tại Lancaster Legacy đều chú trọng yếu tố sức khỏe
                    thể chất và tinh thần của cư dân
                </p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti">
                    <div class="hDot" indexSlider="0">
                        <div data-popup="idUtiHere" class="item">
                            <img data-src="{{ asset('assets/images/demo/24.jpg') }}" alt="" class="lazyload">
                            <h2>Bể bơi <br />vô cực</h2>
                        </div>
                    </div>
                    <div class="hDot" indexSlider="1">
                        <div data-popup="idUtiHere" class="item">
                            <img data-src="{{ asset('assets/images/demo/34.jpg') }}" alt="" class="lazyload">
                            <h2>Gym</h2>
                        </div>
                    </div>
                    <div class="hDot" indexSlider="2">
                        <div data-popup="idUtiHere" class="item">
                            <img data-src="{{ asset('assets/images/demo/35.jpg') }}" alt="" class="lazyload">
                            <h2>XÔNG HƠI </h2>
                        </div>
                    </div>
                    <div class="hDot" indexSlider="3">
                        <div data-popup="idUtiHere" class="item">
                            <img data-src="{{ asset('assets/images/demo/36.jpg') }}" alt="" class="lazyload">
                            <h2>KHU VUI <br />CHƠI TRẺ EM</h2>
                        </div>
                    </div>
                    <div class="hDot" indexSlider="4">
                        <div data-popup="idUtiHere" class="item">
                            <img data-src="{{ asset('assets/images/demo/37.jpg') }}" alt="" class="lazyload">
                            <h2>YOGA <br />& Thiền </h2>
                        </div>
                    </div>
                    <div class="hDot" indexSlider="5">
                        <div data-popup="idUtiHere" class="item">
                            <img data-src="{{ asset('assets/images/demo/38.jpg') }}" alt="" class="lazyload">
                            <h2>công viên</h2>
                        </div>
                    </div>


                </div>
                <div class="opSlideGallery">
                    <div class="btnSlider btnSliderPrev">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>
                    <div class="btnSlider btnSliderNext">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>

                </div>
            </div>

        </div>
        <div id="Entertainment" class="utilitiesSliderWrap animate">
            <div class="copy">
                <h2 class="mainTt">giải trí</h2>
                <p>Không gian BBQ ấm cúng, khu vực thưởng rượu đầy sang trọng cùng chuỗi tiện ích độc đáo theo chủ đề
                    Sài Gòn xưa sẽ được tái hiện ngay tại Lancaster Legacy. Tất cả được kết hợp để tạo nên chất sống đầy
                    thi vị giữa đô thị năng động.</p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti">
                    <div class="hDot" indexSlider="0">
                        <div class="item">
                            <img data-src="{{ asset('assets/images/demo/25.jpg') }}" alt="" class="lazyload">
                            <h2>Nhà hàng</h2>
                        </div>
                    </div>
                    <div class="hDot" indexSlider="1">
                        <div class="item">
                            <img data-src="{{ asset('assets/images/demo/39.jpg') }}" alt="" class="lazyload">
                            <h2>BBQ</h2>
                        </div>
                    </div>
                    <div class="hDot" indexSlider="2">
                        <div class="item">
                            <img data-src="{{ asset('assets/images/demo/40.jpg') }}" alt="" class="lazyload">
                            <h2>GOLF</h2>
                        </div>
                    </div>


                </div>
                <div class="opSlideGallery">
                    <div class="btnSlider btnSliderPrev">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>
                    <div class="btnSlider btnSliderNext">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>

                </div>
            </div>

        </div>
        <div id="Business" class="utilitiesSliderWrap animate">
            <div class="copy">
                <h2 class="mainTt">BUSINESS</h2>
                <p>Không gian sống đủ đầy tại Lancaster Legacy được bổ sung thêm các tiện ích phục vụ công việc như
                    phòng họp, phòng sáng tạo... Mở ra cánh cửa thành công cho mọi gia chủ.
                </p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti sliderBusiness">
                    <div class="hDot" indexSlider="0">
                        <div class="item">
                            <img data-src="{{ asset('assets/images/demo/26.jpg') }}" alt="" class="lazyload">
                            <h2>BUSINESS LOUNGE</h2>
                        </div>
                    </div>
                    <div class="hDot" indexSlider="1">
                        <div class="item">
                            <img data-src="{{ asset('assets/images/demo/41.jpg') }}" alt="" class="lazyload">
                            <h2>work space</h2>
                        </div>
                    </div>
                </div>
                <div class="opSlideGallery">
                    <div class="btnSlider btnSliderPrev">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>
                    <div class="btnSlider btnSliderNext">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>

                </div>
            </div>

        </div>
    </section>


    <div id="idUtiHere" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            <div class="item" style="background: url({{ asset('assets/images/demo/42.jpg') }}) center no-repeat">
                <img data-src="{{ asset('assets/images/demo/8-mb.jpg') }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">Bể bơi vô cực</h2>
                        <p>Hồ bơi vô cực được xây dựng theo tiêu chuẩn thi đấu với 4 làn bơi riêng biệt cùng độ cao hoàn
                            hảo để tận hưởng trọn vẹn cảnh sắc tuyệt đẹp của Sài Gòn về đêm hoặc sớm bình minh.</p>
                    </div>
                </div>
            </div>
            <div class="item" style="background: url({{ asset('assets/images/demo/22.jpg') }}) center no-repeat">
                <img data-src="{{ asset('assets/images/demo/8-mb.jpg') }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">Lorem ipsum dolor sit amet</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At nisi nulla nibh lectus donec.
                            Vitae faucibus donec non volutpat accumsan. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. At nisi nulla nibh lectus donec. Vitae faucibus donec non volutpat
                            accumsan.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection