@extends('web.layouts.base')

@section('title', 'Thong tin can ho')

@section('hidden_page', 'Thong tin can ho')

@section('content')

<!-- MAIN PAGE -->
<main id="pApartment">
    <div class="bannerSubPage go-up">
        <img class="lazyload pc" data-src="{{ asset('assets/images/demo/banner-page-4.jpg') }}" alt="">
        <img class="lazyload mb" data-src="{{ asset('assets/images/demo/banner-page-4-mb.jpg') }}" alt="">
        <div class="container stagger-down">
            <h2 class="mainTt">thông tin <br>Căn hộ</h2>
            <div class="copy">
                <p>Mỗi căn hộ được may đo tỉ mỉ bởi bàn tay nghệ nhân của những nhà kiến trúc uy tín bậc nhất trên thị
                    trường bất động sản, mở ra không gian sống đậm chất thượng lưu.
                </p>
            </div>
        </div>
    </div>
    <section id="masterplan" class="masterPlan  pd1">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">master plan</h2>

                <p>With 2000m2 of green space and two direct city views swimming pools,
                    Lancaster Legacy opens up a classy and standard living space for the elite..</p>
            </div>
            <div class="row checklenght animate">
                <img data-src="{{ asset('assets/images/demo/master-plan.jpg') }}" class="lazyload" />
                <div class="listMasterPlan">
                    <div class="left">
                        <div index="1" class="itemPlace">
                            <span>01</span>
                            <p>CỔNG VÀO DỰ ÁN</p>
                        </div>
                        <div index="2" class="itemPlace">
                            <span>02</span>
                            <p>KHU VỰC ĐÓN/ TRẢ KHÁCH
                                KHU THƯƠNG MẠI</p>
                        </div>
                        <div index="3" class="itemPlace">
                            <span>03</span>
                            <p>KHU THƯƠNG MẠI</p>
                        </div>
                        <div index="4" class="itemPlace">
                            <span>04</span>
                            <p>KHU VỰC ĐƯA/ ĐÓN CƯ DÂN</p>
                        </div>
                        <div index="5" class="itemPlace">
                            <span>05</span>
                            <p>SẢNH CHỜ DÀNH CHO CƯ DÂN</p>
                        </div>
                        <div index="6" class="itemPlace">
                            <span>06</span>
                            <p>TƯỢNG ĐÀI CẢNH QUAN</p>
                        </div>
                        <div index="7" class="itemPlace">
                            <span>07</span>
                            <p>LỐI ĐI DÀNH CHO KHÁCH HÀNG KHU THƯƠNG MẠI</p>
                        </div>
                        <div index="8" class="itemPlace">
                            <span>08</span>
                            <p>CẢNH QUAN THỰC VẬT</p>
                        </div>
                    </div>
                    <div class="right">
                        <div index="9" class="itemPlace">
                            <span>09</span>
                            <p>LỐI ĐI DÀNH CHO XE ĐẨY</p>
                        </div>
                        <div index="10" class="itemPlace">
                            <span>10</span>
                            <p>ĐƯỜNG GIAO THÔNG</p>
                        </div>
                        <div index="11" class="itemPlace">
                            <span>11</span>
                            <p>LỐI ĐI XUỐNG HẦM</p>
                        </div>
                        <div index="12" class="itemPlace">
                            <span>12</span>
                            <p>KHU VỰC GIAO ĐỒ</p>
                        </div>
                        <div index="13" class="itemPlace">
                            <span>13</span>
                            <p>KHU VỰC CẢNH QUAN</p>
                        </div>
                        <div index="14" class="itemPlace">
                            <span>14</span>
                            <p>KHU VỰC THÔNG HƠI</p>
                        </div>
                        <div index="15" class="itemPlace">
                            <span>15</span>
                            <p>LỐI ĐI BỘ</p>
                        </div>
                    </div>
                </div>
                <div class="btnWrap center">
                    <div class="btn whiteBg ShowMore">
                        <span>SEE MORE</span>
                    </div>
                    <div class="btn whiteBg ShowLess">
                        <span>SEE LESS</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id="floorplan" class="floorplanWrap pd1">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">Mặt bằng tiện ích</h2>
            </div>
            <div class="btnTabWrap animate">
                <div data-tab="tab1" class="btnTab active">Tiện ích tầng 6</div>
                <div data-tab="tab2" class="btnTab rooftopLink">Tiện ích tầng thượng</div>
            </div>
            <div id="tab1" class="ctTab">
                <div class="row checklenght animate">
                    <img data-src="{{ asset('assets/images/demo/floorplan.png') }}" class="lazyload" />
                    <div class="listMasterPlan">
                        <div class="left">
                            <div index="1" class="itemPlace">
                                <span>01</span>
                                <p>KHU VỰC CHECK-IN VÀO BỂ BƠI</p>
                            </div>
                            <div index="2" class="itemPlace">
                                <span>02</span>
                                <p>HỒ JACUZZI</p>
                            </div>
                            <div index="3" class="itemPlace">
                                <span>03</span>
                                <p>CHÒI NGHỈ CHÂN</p>
                            </div>
                            <div index="4" class="itemPlace">
                                <span>04</span>
                                <p>HỒ SỤC MASSAGE</p>
                            </div>
                            <div index="5" class="itemPlace">
                                <span>05</span>
                                <p>KHU VỰC TẮM NẮNG</p>
                            </div>
                            <div index="6" class="itemPlace">
                                <span>06</span>
                                <p>HỒ BƠI NÔNG</p>
                            </div>
                            <div index="7" class="itemPlace">
                                <span>07</span>
                                <p>HỒ BƠI VÔ CỰC</p>
                            </div>
                            <div index="8" class="itemPlace">
                                <span>08</span>
                                <p>KHU VỰC NGẮM CẢNH</p>
                            </div>
                            <div index="9" class="itemPlace">
                                <span>09</span>
                                <p>CẢNH QUAN XANH</p>
                            </div>
                            <div index="10" class="itemPlace">
                                <span>10</span>
                                <p>HỒ BƠI CHO TRẺ EM</p>
                            </div>
                        </div>
                        <div class="right">

                            <div index="11" class="itemPlace">
                                <span>11</span>
                                <p>ĐÀI CẢNH QUAN</p>
                            </div>
                            <div index="12" class="itemPlace">
                                <span>12</span>
                                <p>KHU VỰC BBQ</p>
                            </div>
                            <div index="13" class="itemPlace">
                                <span>13</span>
                                <p>KHU VỰC DÀNH CHO GIA ĐÌNH</p>
                            </div>
                            <div index="14" class="itemPlace">
                                <span>14</span>
                                <p>KHU LUYỆN TẬP YOGA NGOÀI TRỜI</p>
                            </div>
                            <div index="15" class="itemPlace">
                                <span>15</span>
                                <p>KHU VUI CHƠI CHO TRẺ EM</p>
                            </div>
                        </div>
                        <div class="btnWrap center">
                            <div class="btn transBg ShowMore">
                                <span>SEE MORE</span>
                            </div>
                            <div class="btn transBg ShowLess">
                                <span>SEE LESS</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="tab2" class="ctTab">
                <div class="rooftopDesk">
                    <div class="l">
                        <div class="floorItem rightAl jsOpenFloor">
                            <div class="floor">
                                <img data-src="{{ asset('assets/images/demo/toa-c.png') }}" class="lazyload" />
                                <h3>toà c</h3>
                            </div>
                            <div class="tooltipCard right">
                                <div class="closeTooltip">
                                    <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0.120014V19.5" stroke="currentcolor" />
                                        <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                                    </svg>
                                </div>
                                <div class="copyCard">
                                    <h2>toà c</h2>
                                    <div class="listMasterPlanTool">
                                        <div class="itemPlace">
                                            <span>01</span>
                                            <p>KHU VỰC THƯ GIÃN NGOÀI TRỜI</p>
                                        </div>
                                        <div class="itemPlace">
                                            <span>02</span>
                                            <p>VƯỜN NƯỚNG BBQ</p>
                                        </div>
                                        <div class="itemPlace">
                                            <span>03</span>
                                            <p>KHU VỰC ĂN UỐNG</p>
                                        </div>
                                        <div class="itemPlace">
                                            <span>04</span>
                                            <p>KHU VỰC NGHỈ CHÂN</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="floorItem rightAl jsOpenFloor">
                            <div class="floor">
                                <img data-src="{{ asset('assets/images/demo/toa-b.png') }}" class="lazyload" />
                                <h3>toà B</h3>
                            </div>
                            <div class="tooltipCard right">
                                <div class="closeTooltip">
                                    <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0.120014V19.5" stroke="currentcolor" />
                                        <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                                    </svg>
                                </div>
                                <div class="copyCard">
                                    <h2>toà b</h2>
                                    <div class="listMasterPlanTool">
                                        <div class="itemPlace">
                                            <span>01</span>
                                            <p>KHU VỰC THƯ GIÃN NGOÀI TRỜI</p>
                                        </div>
                                        <div class="itemPlace">
                                            <span>02</span>
                                            <p>VƯỜN NƯỚNG BBQ</p>
                                        </div>
                                        <div class="itemPlace">
                                            <span>03</span>
                                            <p>KHU VỰC ĂN UỐNG</p>
                                        </div>
                                        <div class="itemPlace">
                                            <span>04</span>
                                            <p>KHU VỰC GHẾ NGỒI KIỂU BẬC THANG</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <img data-src="{{ asset('assets/images/demo/toa-b.png') }}" class="lazyload"/> -->
                    </div>
                    <div class="r">
                        <div class="floorItem leftAl jsOpenFloor">
                            <div class="floor">
                                <img data-src="{{ asset('assets/images/demo/toa-a.png') }}" class="lazyload" />
                                <h3>toà A</h3>
                            </div>
                            <div class="tooltipCard col2 left">
                                <div class="closeTooltip">
                                    <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0.120014V19.5" stroke="currentcolor" />
                                        <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                                    </svg>
                                </div>
                                <div class="copyCard">
                                    <div class="left">
                                        <h2>toà a</h2>
                                        <div class="listMasterPlanTool">
                                            <div class="itemPlace">
                                                <span>01</span>
                                                <p>LỐI VÀO KHU VỰC HỒ BƠI</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>02</span>
                                                <p>KHU VỰC THƯ GIÃN NGOÀI TRỜI</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>03</span>
                                                <p>KHU VỰC TẮM NẮNG</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>04</span>
                                                <p>KHU VỰC NHÀ TẮM</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>05</span>
                                                <p>HỒ BƠI CẠN</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>06</span>
                                                <p>JACUZZI</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="listMasterPlanTool">
                                            <div class="itemPlace">
                                                <span>07</span>
                                                <p>KHU VỰC GHẾ NGỒI THƯ GIÃN DƯỚI NƯỚC</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>08</span>
                                                <p>HỒ BƠI VÔ CỰC</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>09</span>
                                                <p>KHU VUI CHƠI TRẺ EM</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>10</span>
                                                <p>ĐƯỜNG CHẠY BỘ</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>11</span>
                                                <p>KHU VỰC THỂ THAO NGOÀI TRỜI</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>12</span>
                                                <p>KHU VỰC GHẾ NGỒI THƯ GIÃN</p>
                                            </div>
                                            <div class="itemPlace">
                                                <span>13</span>
                                                <p>KHU VỰC CẢNH QUAN</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rooftopMobile">
                    <div class="sliderrooftop">
                        <div class="item" style="background: url({{ asset('assets/images/demo/toa-a.png') }}) center no-repeat;">
                            <h2>Toa A</h2>
                        </div>
                        <div class="item" style="background: url({{ asset('assets/images/demo/toa-b.png') }}) center no-repeat;">
                            <h2>Toa B</h2>
                        </div>
                        <div class="item" style="background: url({{ asset('assets/images/demo/toa-c.png') }}) center no-repeat;">
                            <h2>Toa C</h2>
                        </div>


                    </div>
                    <div id="roof0" class="capRoof">
                        <h2>Tòa c</h2>
                        <div class="listMasterPlanTool">
                            <div class="itemPlace">
                                <span>01</span>
                                <p>KHU VỰC THƯ GIÃN NGOÀI TRỜI</p>
                            </div>
                            <div class="itemPlace">
                                <span>02</span>
                                <p>VƯỜN NƯỚNG BBQ</p>
                            </div>
                            <div class="itemPlace">
                                <span>03</span>
                                <p>KHU VỰC ĂN UỐNG</p>
                            </div>
                            <div class="itemPlace">
                                <span>04</span>
                                <p>KHU VỰC NGHỈ CHÂN</p>
                            </div>
                        </div>
                    </div>
                    <div id="roof1" class="capRoof">
                        <h2>Tòa b</h2>
                        <div class="listMasterPlanTool">
                            <div class="itemPlace">
                                <span>01</span>
                                <p>KHU VỰC THƯ GIÃN NGOÀI TRỜI</p>
                            </div>
                            <div class="itemPlace">
                                <span>02</span>
                                <p>VƯỜN NƯỚNG BBQ</p>
                            </div>
                            <div class="itemPlace">
                                <span>03</span>
                                <p>KHU VỰC ĂN UỐNG</p>
                            </div>
                            <div class="itemPlace">
                                <span>04</span>
                                <p>KHU VỰC GHẾ NGỒI KIỂU BẬC THANG</p>
                            </div>
                        </div>
                    </div>
                    <div id="roof2" class="capRoof checklenght">
                        <h2>Tòa a</h2>
                        <div class="listMasterPlanTool">
                            <div index="1" class="itemPlace">
                                <span>01</span>
                                <p>LỐI VÀO KHU VỰC HỒ BƠI</p>
                            </div>
                            <div index="2" class="itemPlace">
                                <span>02</span>
                                <p>KHU VỰC THƯ GIÃN NGOÀI TRỜI</p>
                            </div>
                            <div index="3" class="itemPlace">
                                <span>03</span>
                                <p>KHU VỰC TẮM NẮNG</p>
                            </div>
                            <div index="4" class="itemPlace">
                                <span>04</span>
                                <p>KHU VỰC NHÀ TẮM</p>
                            </div>
                            <div index="5" class="itemPlace">
                                <span>05</span>
                                <p>HỒ BƠI CẠN</p>
                            </div>
                            <div index="6" class="itemPlace">
                                <span>06</span>
                                <p>JACUZZI</p>
                            </div>
                            <div index="7" class="itemPlace">
                                <span>07</span>
                                <p>KHU VỰC GHẾ NGỒI THƯ GIÃN DƯỚI NƯỚC</p>
                            </div>
                            <div index="8" class="itemPlace">
                                <span>08</span>
                                <p>HỒ BƠI VÔ CỰC</p>
                            </div>
                            <div index="9" class="itemPlace">
                                <span>09</span>
                                <p>KHU VUI CHƠI TRẺ EM</p>
                            </div>
                            <div index="10" class="itemPlace">
                                <span>10</span>
                                <p>ĐƯỜNG CHẠY BỘ</p>
                            </div>
                            <div index="11" class="itemPlace">
                                <span>11</span>
                                <p>KHU VỰC THỂ THAO NGOÀI TRỜI</p>
                            </div>
                            <div index="12" class="itemPlace">
                                <span>12</span>
                                <p>KHU VỰC GHẾ NGỒI THƯ GIÃN</p>
                            </div>
                            <div index="13" class="itemPlace">
                                <span>13</span>
                                <p>KHU VỰC CẢNH QUAN</p>
                            </div>
                        </div>
                        <div class="btnWrap center">
                            <div class="btn transBg ShowMore">
                                <span>SEE MORE</span>
                            </div>
                            <div class="btn transBg ShowLess">
                                <span>SEE LESS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="ovlCard"></div>
    </section>

    <!-- <div class="spaceH"></div> -->

    <section class="towerFloorplanWrap">
        <div class="leftT">
            <div class="towerWrap">
                <img data-src="{{ asset('assets/images/demo/tower.jpg') }}" alt="" class="lazyload">
                <svg width="630" height="850" viewBox="0 0 630 850" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Tower A -->
                    <path id="shapeTowA" class="mainLinkFl js-mainLinkFl" ovl="ovlTowA" tooltip="tooltipTowA"
                        tower="Tòa A"
                        d="M319.5 154.5L327 150L348.5 160.5L352 158L358.5 161.5L361 160.5L374.5 166L375.5 110L399.5 98L594.5 177L592.5 179L608 185.5V189.5L598 196L587.5 250L594.5 253L592.5 263L583.5 269.5L581.5 280L588.5 284L586.5 293.5L577.5 299.5L576.5 308.5L582.5 311L581 320.5L572 327.5L571 334.5L576.5 338L575.5 347L567 354L566 360.5L572 363.5L570 371.5L561 379V385L566 388.5V394.5L557 402.5L556 409L561 412V418.5L552.5 426.5L551.5 432L557 435.5L545 493L521.5 613L520 615L523 617.5V620.5L525 621.5L523 633L526.5 636L518 674.5L516 687L495 709L468 734.5C465.333 737.5 459.1 743.6 455.5 744C451.9 744.4 447.667 742.5 446 741.5L436.5 734L420.5 751V755L418 758.5C418.4 762.1 417.5 765 417 766L398.5 788L399.5 793.5L382 815C378.8 819.8 372.333 818 369.5 816.5L312.5 772.5C313.3 771.7 312.833 769.167 312.5 768C303.5 760.833 284.7 745.9 281.5 743.5C278.3 741.1 275.833 735.5 275 733C271.833 724.5 265.2 705.8 264 699C262.8 692.2 259.167 688.5 257.5 687.5L244 675.5L240 627.5L304 575L308 581L307.5 569L313.5 564L309.5 403.5L303 398.5L302 373L308 369L303 194.5L288 187V167L312.5 154.5V153L314.5 152L319.5 154.5Z"
                        fill="" />
                    <g class="ovlTowSvg ovlTowA" style="mix-blend-mode:color">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M630 0H0V850H630V0ZM327 150L319.5 154.5L314.5 152L312.5 153V154.5L288 167V187L303 194.5L308 369L302 373L303 398.5L309.5 403.5L313.5 564L307.5 569L308 581L304 575L240 627.5L244 675.5L257.5 687.5C259.167 688.5 262.8 692.2 264 699C265.2 705.8 271.833 724.5 275 733C275.833 735.5 278.3 741.1 281.5 743.5C284.7 745.9 303.5 760.833 312.5 768C312.833 769.167 313.3 771.7 312.5 772.5L369.5 816.5C372.333 818 378.8 819.8 382 815L399.5 793.5L398.5 788L417 766C417.5 765 418.4 762.1 418 758.5L420.5 755V751L436.5 734L446 741.5C447.667 742.5 451.9 744.4 455.5 744C459.1 743.6 465.333 737.5 468 734.5L495 709L516 687L518 674.5L526.5 636L523 633L525 621.5L523 620.5V617.5L520 615L521.5 613L545 493L557 435.5L551.5 432L552.5 426.5L561 418.5V412L556 409L557 402.5L566 394.5V388.5L561 385V379L570 371.5L572 363.5L566 360.5L567 354L575.5 347L576.5 338L571 334.5L572 327.5L581 320.5L582.5 311L576.5 308.5L577.5 299.5L586.5 293.5L588.5 284L581.5 280L583.5 269.5L592.5 263L594.5 253L587.5 250L598 196L608 189.5V185.5L592.5 179L594.5 177L399.5 98L375.5 110L374.5 166L361 160.5L358.5 161.5L352 158L348.5 160.5L327 150Z"
                            fill="#242021" />
                    </g>
                    <g class="ovlTowSvg ovlTowA" style="mix-blend-mode:luminosity">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M630 0H0V850H630V0ZM327 150L319.5 154.5L314.5 152L312.5 153V154.5L288 167V187L303 194.5L308 369L302 373L303 398.5L309.5 403.5L313.5 564L307.5 569L308 581L304 575L240 627.5L244 675.5L257.5 687.5C259.167 688.5 262.8 692.2 264 699C265.2 705.8 271.833 724.5 275 733C275.833 735.5 278.3 741.1 281.5 743.5C284.7 745.9 303.5 760.833 312.5 768C312.833 769.167 313.3 771.7 312.5 772.5L369.5 816.5C372.333 818 378.8 819.8 382 815L399.5 793.5L398.5 788L417 766C417.5 765 418.4 762.1 418 758.5L420.5 755V751L436.5 734L446 741.5C447.667 742.5 451.9 744.4 455.5 744C459.1 743.6 465.333 737.5 468 734.5L495 709L516 687L518 674.5L526.5 636L523 633L525 621.5L523 620.5V617.5L520 615L521.5 613L545 493L557 435.5L551.5 432L552.5 426.5L561 418.5V412L556 409L557 402.5L566 394.5V388.5L561 385V379L570 371.5L572 363.5L566 360.5L567 354L575.5 347L576.5 338L571 334.5L572 327.5L581 320.5L582.5 311L576.5 308.5L577.5 299.5L586.5 293.5L588.5 284L581.5 280L583.5 269.5L592.5 263L594.5 253L587.5 250L598 196L608 189.5V185.5L592.5 179L594.5 177L399.5 98L375.5 110L374.5 166L361 160.5L358.5 161.5L352 158L348.5 160.5L327 150Z"
                            fill="#242021" fill-opacity="0.8" />
                    </g>

                    <!-- Tower C -->

                    <path id="shapeTowC" class="mainLinkFl js-mainLinkFl" ovl="ovlTowC" tooltip="tooltipTowC"
                        tower="Tòa C"
                        d="M307.5 569.5V576L295 569.5L272.5 123L254.5 114.5L252 71.5L360 25.5L383 35V40.5L393 44.5L400.5 40.5L425.5 50.5L422.5 103.5L426 105V109L399.5 98L376 110L374.5 147L373 147.5V156.5H374V159.5H373V165.5L361 159.5L358.5 161L352 157.5L347.5 159.5L326.5 150L319.5 154L314.5 152.5L312 155L287.5 167L288.5 187L303.5 194.5L307.5 369L302 373.5L303.5 399L309.5 404.5L313 564.5L307.5 569.5Z"
                        fill="" />

                    <g class="ovlTowSvg ovlTowC" style="mix-blend-mode:color">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M630 0H0V850H630V0ZM307.5 576V569.5L313 564.5L309.5 404.5L303.5 399L302 373.5L307.5 369L303.5 194.5L288.5 187L287.5 167L312 155L314.5 152.5L319.5 154L326.5 150L347.5 159.5L352 157.5L358.5 161L361 159.5L373 165.5V159.5H374V156.5H373V147.5L374.5 147L376 110L399.5 98L426 109V105L422.5 103.5L425.5 50.5L400.5 40.5L393 44.5L383 40.5V35L360 25.5L252 71.5L254.5 114.5L272.5 123L295 569.5L307.5 576Z"
                            fill="#242021" />
                    </g>
                    <g class="ovlTowSvg ovlTowC" style="mix-blend-mode:luminosity">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M630 0H0V850H630V0ZM307.5 576V569.5L313 564.5L309.5 404.5L303.5 399L302 373.5L307.5 369L303.5 194.5L288.5 187L287.5 167L312 155L314.5 152.5L319.5 154L326.5 150L347.5 159.5L352 157.5L358.5 161L361 159.5L373 165.5V159.5H374V156.5H373V147.5L374.5 147L376 110L399.5 98L426 109V105L422.5 103.5L425.5 50.5L400.5 40.5L393 44.5L383 40.5V35L360 25.5L252 71.5L254.5 114.5L272.5 123L295 569.5L307.5 576Z"
                            fill="#242021" fill-opacity="0.8" />
                    </g>

                    <!-- Tower B -->

                    <path id="shapeTowB" class="mainLinkFl js-mainLinkFl" ovl="ovlTowB" tooltip="tooltipTowB"
                        tower="Tòa B"
                        d="M293.5 568.5L271.5 126V124L247 111L240 114.5L237.5 78.5L215 70L45 139L142.5 579.5C136.9 583.5 136.167 587.5 136.5 589L151.5 649L214 694L243 669L236 614.5L293.5 568.5Z"
                        fill="" />

                    <g class="ovlTowSvg ovlTowB" style="mix-blend-mode:color">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M630 0H0V850H630V0ZM271.5 126L293.5 568.5L236 614.5L243 669L214 694L151.5 649L136.5 589C136.167 587.5 136.9 583.5 142.5 579.5L45 139L215 70L237.5 78.5L240 114.5L247 111L271.5 124V126Z"
                            fill="#242021" />
                    </g>
                    <g class="ovlTowSvg ovlTowB" style="mix-blend-mode:luminosity">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M630 0H0V850H630V0ZM271.5 126L293.5 568.5L236 614.5L243 669L214 694L151.5 649L136.5 589C136.167 587.5 136.9 583.5 142.5 579.5L45 139L215 70L237.5 78.5L240 114.5L247 111L271.5 124V126Z"
                            fill="#242021" fill-opacity="0.8" />
                    </g>


                </svg>

                <div class="ttTowWrap">
                    <span class="ttTow js-mainLinkFl" ovl="ovlTowA" tooltip="tooltipTowA" tower="Tòa A">Tòa A</span>
                    <span class="ttTow js-mainLinkFl" ovl="ovlTowB" tooltip="tooltipTowB" tower="Tòa B">Tòa B</span>
                    <span class="ttTow js-mainLinkFl" ovl="ovlTowC" tooltip="tooltipTowC" tower="Tòa C">Tòa C</span>
                </div>



                <div class="tooltipCard tooltipTowA left">
                    <div class="closeTooltip jsCloseTow">
                        <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0.120014V19.5" stroke="currentcolor" />
                            <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                        </svg>
                    </div>
                    <div class="copyCard">
                        <h2>toà a</h2>
                        <p>Tòa A sở hữu vị trí đẹp nhất cũng như hội tụ nhiều tiện ích đắt giá, độc nhất mà không có bất
                            kỳ tòa tháp nào sở hữu, mang đến trải nghiệm sống độc quyền cho cư dân tương lai, khẳng định
                            vị thế khác biệt cho gia chủ.</p>
                        <div class="listPlanTow">
                            <a floorDetail="tow-a-1" floor="Tầng 8  -  16" href="#">Tầng 8 - 16</a>
                            <a floorDetail="tow-a-2" floor="Tầng 17  -  18" href="#">Tầng 17 - 18</a>
                            <a floorDetail="tow-a-3" floor="Tầng 21  -  25" href="#">Tầng 21 - 25</a>
                            <a floorDetail="tow-a-4" floor="Tầng 26  -  27" href="#">Tầng 26 - 27</a>
                            <a floorDetail="tow-a-5" floor="Tầng 30" href="#">Tầng 30</a>
                        </div>
                        <select class="listPlanTowSelect">
                            <option value="" hidden>chọn tầng</option>
                            <option floorDetail="tow-a-1" floor="Tầng 8  -  16">Tầng 8 - 16</option>
                            <option floorDetail="tow-a-2" floor="Tầng 17  -  18" href="#">Tầng 17 - 18</option>
                            <option floorDetail="tow-a-3" floor="Tầng 21  -  25" href="#">Tầng 21 - 25</option>
                            <option floorDetail="tow-a-4" floor="Tầng 26  -  27" href="#">Tầng 26 - 27</option>
                            <option floorDetail="tow-a-5" floor="Tầng 30" href="#">Tầng 30</option>
                        </select>
                    </div>
                </div>

                <div class="tooltipCard tooltipTowC right">
                    <div class="closeTooltip jsCloseTow">
                        <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0.120014V19.5" stroke="currentcolor" />
                            <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                        </svg>
                    </div>
                    <div class="copyCard">
                        <h2>toà C</h2>
                        <p>Sở hữu tầm nhìn vòng cung 180 độ ôm trọn cảnh quan trải dài từ Quận 1 đến Quận 5, Tháp Trúc
                            mang đến cho chủ nhân khung cảnh đầy thi vị và sắc màu của Sài Gòn, một góc độ khác của
                            thành phố hơn 300 năm tuổi đầy bản sắc.</p>
                        <div class="listPlanTow">
                            <a floorDetail="tow-c-1" floor="Tầng 8  -  10" href="#">Tầng 8 - 10</a>
                            <a floorDetail="tow-c-2" floor="Tầng 11  -  13" href="#">Tầng 11 - 13</a>
                            <a floorDetail="tow-c-3" floor="Tầng 12B  -  16" href="#">Tầng 12B - 16</a>
                            <a floorDetail="tow-c-4" floor="Tầng 22  -  23" href="#">Tầng 22 - 23</a>
                            <a floorDetail="tow-c-5" floor="Tầng 28" href="#">Tầng 28</a>
                        </div>
                        <select class="listPlanTowSelect">
                            <option value="" hidden>chọn tầng</option>
                            <option floorDetail="tow-c-1" floor="Tầng 8  -  10" href="#">Tầng 8 - 10</option>
                            <option floorDetail="tow-c-2" floor="Tầng 11  -  13" href="#">Tầng 11 - 13</option>
                            <option floorDetail="tow-c-3" floor="Tầng 12B  -  16" href="#">Tầng 12B - 16</option>
                            <option floorDetail="tow-c-4" floor="Tầng 22  -  23" href="#">Tầng 22 - 23</option>
                            <option floorDetail="tow-c-5" floor="Tầng 28" href="#">Tầng 28</option>
                        </select>
                    </div>
                </div>

                <div class="tooltipCard tooltipTowB right">
                    <div class="closeTooltip jsCloseTow">
                        <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0.120014V19.5" stroke="currentcolor" />
                            <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                        </svg>
                    </div>
                    <div class="copyCard">
                        <h2>toà B</h2>
                        <p>Với mật độ căn hộ thấp nhất toàn khu và kiến trúc hiện đại với 4 thang máy thông minh, Tòa
                            Tùng được kiến tạo để gia chủ tận hưởng sự yên tĩnh, thư thái trong chính tổ ấm đẳng cấp của
                            mình.</p>
                        <div class="listPlanTow">
                            <a floorDetail="tow-b-1" floor="Tầng 8  -  11" href="#">Tầng 8 - 11</a>
                            <a floorDetail="tow-b-2" floor="Tầng 12  -  15" href="#">Tầng 12 - 15</a>
                            <a floorDetail="tow-b-3" floor="Tầng 21  -  25" href="#">Tầng 21 - 25</a>
                            <a floorDetail="tow-b-4" floor="Tầng 28  -  29" href="#">Tầng 28 - 29</a>
                            <a floorDetail="tow-b-5" floor="Tầng 33  -  34" href="#">Tầng 33 - 34</a>
                        </div>
                        <select class="listPlanTowSelect">
                            <option value="" hidden>chọn tầng</option>
                            <option floorDetail="tow-b-1" floor="Tầng 8  -  11" href="#">Tầng 8 - 11</option>
                            <option floorDetail="tow-b-2" floor="Tầng 12  -  15" href="#">Tầng 12 - 15</option>
                            <option floorDetail="tow-b-3" floor="Tầng 21  -  25" href="#">Tầng 21 - 25</option>
                            <option floorDetail="tow-b-4" floor="Tầng 28  -  29" href="#">Tầng 28 - 29</option>
                            <option floorDetail="tow-b-5" floor="Tầng 33  -  34" href="#">Tầng 33 - 34</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="rightT">
            <div class="mainInfoTw">
                <div class="copy">
                    <h2 class="mainTt">mặt bằng toà</h2>
                    <p>Lancaster Legacy sở hữu 3 tòa tháp riêng biệt với công năng và hướng nhìn khác nhau, song tất cả
                        đều sở hữu phong cách kiến trúc hiện đại, pha lẫn yếu tố “Zen”, với những hình khối mạnh mẽ, kết
                        hợp cùng các gam màu tinh tế tạo nên sự vững chãi về mặt thị giác.</p>
                </div>
            </div>
            <div class="floorplanDetail">
                <div>
                    <div class="top">
                        <div>
                            <img class="lazyload btnBackAr js-closefloorplandetailMb"
                                data-src="{{ asset('assets/images/btn-back.png') }}" alt="">
                            <p> Mặt bằng toà / <span></span></p>
                        </div>

                        <h2 class="mainTt"></h2>

                        <select class="listPlanTowSelect">
                            <option floorDetail="tow-a-1" floor="Tầng 8  -  16">Tầng 8 - 16</option>
                            <option floorDetail="tow-a-2" floor="Tầng 17  -  18" href="#">Tầng 17 - 18</option>
                            <option floorDetail="tow-a-3" floor="Tầng 21  -  25" href="#">Tầng 21 - 25</option>
                            <option floorDetail="tow-a-4" floor="Tầng 26  -  27" href="#">Tầng 26 - 27</option>
                            <option floorDetail="tow-a-5" floor="Tầng 30" href="#">Tầng 30</option>
                        </select>

                        <select class="listPlanTowSelect">
                            <option floorDetail="tow-c-1" floor="Tầng 8  -  10" href="#">Tầng 8 - 10</option>
                            <option floorDetail="tow-c-2" floor="Tầng 11  -  13" href="#">Tầng 11 - 13</option>
                            <option floorDetail="tow-c-3" floor="Tầng 12B  -  16" href="#">Tầng 12B - 16</option>
                            <option floorDetail="tow-c-4" floor="Tầng 22  -  23" href="#">Tầng 22 - 23</option>
                            <option floorDetail="tow-c-5" floor="Tầng 28" href="#">Tầng 28</option>
                        </select>

                        <select class="listPlanTowSelect">
                            <option floorDetail="tow-b-1" floor="Tầng 8  -  11" href="#">Tầng 8 - 11</option>
                            <option floorDetail="tow-b-2" floor="Tầng 12  -  15" href="#">Tầng 12 - 15</option>
                            <option floorDetail="tow-b-3" floor="Tầng 21  -  25" href="#">Tầng 21 - 25</option>
                            <option floorDetail="tow-b-4" floor="Tầng 28  -  29" href="#">Tầng 28 - 29</option>
                            <option floorDetail="tow-b-5" floor="Tầng 33  -  34" href="#">Tầng 33 - 34</option>
                        </select>
                    </div>
                    <!----------------- Tower A -->
                    <div id="tow-a-1" class="floorplanImg towA">
                        <img data-src="{{ asset('assets/images/demo/toa-a-1.jpg') }}" alt="" class="lazyload">
                        <svg width="660" height="433" viewBox="0 0 660 433" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail" class="js-floorplandetail"
                                d="M30.5 155V80H34.5V82.5H129V69.5H164.5V68.5H166.5V170.5H199V191.5H143V193H89V153.5H68V155H30.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M167.5 68.5H166V171H199V172H232.5V82.5H167.5V68.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M299.5 82.5H232.5V172H299.5V82.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M358.5 82.5H299.5V172H358.5V82.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M417.5 82.5H358.5V172H406.5V171H417.5V82.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M511 82.5H417.5V170.5H406.5L407 221H447.5V210H511V221H532V191.5H554.5V187.5H552V93H514.5V80H511V82.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M406.5 219.5H401V245H406.5V271H417.5V359H511V361H514.5V348.5H552V254H554.5V250.5H532V221H511V231.5H447V221H406.5V219.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M406.5 269.5H350.5V374H352.5V359H417.5V271H406.5V269.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M350.5 269.5H256.5V359H317V371.5H349V374H350.5V269.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M199 271H162V374H164V372H195.5V359H256.5V269.5H199V271Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M50 287H18.5L19 359H123.5V371.5H160V374H162V271H199V250.5H168V249H89V287H79.5V288.5H50V287Z"
                                fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-a-1" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-a-1" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FCAB61;"></span>
                            <p>Căn hộ 3 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>
                    </div>
                    <div id="tow-a-2" class="floorplanImg towA">
                        <img data-src="{{ asset('assets/images/demo/toa-a-2.jpg') }}" alt="" class="lazyload">
                        <svg width="660" height="433" viewBox="0 0 660 433" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail" class="js-floorplandetail"
                                d="M30.5 155V80H34.5V82.5H129V69.5H164.5V68.5H166.5V170.5H199V191.5H143V193H89V153.5H68V155H30.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M167.5 68.5H166V171H199V172H232.5V82.5H167.5V68.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M299.5 82.5H232.5V172H299.5V82.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M358.5 82.5H299.5V172H358.5V82.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M417.5 82.5H358.5V172H406.5V171H417.5V82.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M511 82.5H417.5V170.5H406.5L407 221H447.5V210H511V221H532V191.5H554.5V187.5H552V93H514.5V80H511V82.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M406.5 219.5H401V245H406.5V271H417.5V359H511V361H514.5V348.5H552V254H554.5V250.5H532V221H511V231.5H447V221H406.5V219.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M406.5 269.5H350.5V374H352.5V359H417.5V271H406.5V269.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M350.5 269.5H256.5V359H317V371.5H349V374H350.5V269.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M199 271H162V374H164V372H195.5V359H256.5V269.5H199V271Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M50 287H18.5L19 359H123.5V371.5H160V374H162V271H199V250.5H168V249H89V287H79.5V288.5H50V287Z"
                                fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-a-2" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-a-2" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FCAB61;"></span>
                            <p>Căn hộ 3 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>
                    </div>
                    <div id="tow-a-3" class="floorplanImg towA">
                        <img data-src="{{ asset('assets/images/demo/toa-a-3.jpg') }}" alt="" class="lazyload">
                        <svg width="660" height="433" viewBox="0 0 660 433" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M34.5 80.5H30.5L31 155H68V153.5H89.5V193.5H143V192H199.5V171H175V68.5H173.5V70H129.5V83H34.5V80.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M176 68.5H174.5V171H199.5V172.188H233V83H176V68.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M300 83H233V172H300V83Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M359.5 83H300V172.5H359.5V83Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M418.5 83H359.5V172.5H407.5V171H418.5V83Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M512 83H418.5V171H408V221.5H448.5V210.5H512.5V221.5H533.5V192H556V188H553.5V93.5H516V80.5H512V83Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M407.5 219.5H402V245H407.5V271H418.5V359H512V361H515.5V348.5H553V254H555.5V250.5H533V221H512V231.5H448V221H407.5V219.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M407.5 270.5H351.5V375H353.5V360H418.5V272H407.5V270.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M351.5 270.5H257V360H318V373H349.5V375H351.5V270.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M257 270.5H199.5V272H198.5V360H257V270.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M50 288H19V360H124V373H160.5V375.5H164.5V373H196V360H198.5V271.5H199.5V251H168.5V249.5H89.5V288H79.5V289H50V288Z"
                                fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-a-3" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-a-3" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #DDFCE2;"></span>
                            <p>Căn hộ 4 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FCAB61;"></span>
                            <p>Căn hộ 3 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>

                    </div>
                    <div id="tow-a-4" class="floorplanImg towA">
                        <img data-src="{{ asset('assets/images/demo/toa-a-4.jpg') }}" alt="" class="lazyload">
                        <svg width="660" height="433" viewBox="0 0 660 433" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M34.5 80.5H30.5L31 155H68V153.5H89.5V193.5H143V192H199.5V171H175V68.5H173.5V70H129.5V83H34.5V80.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M176 68.5H174.5V171H199.5V172.188H233V83H176V68.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M300 83H233V172H300V83Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M359.5 83H300V172.5H359.5V83Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M418.5 83H359.5V172.5H407.5V171H418.5V83Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M512 83H418.5V171H408V221.5H448.5V210.5H512.5V221.5H533.5V192H556V188H553.5V93.5H516V80.5H512V83Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M407.5 219.5H402V245H407.5V271H418.5V359H512V361H515.5V348.5H553V254H555.5V250.5H533V221H512V231.5H448V221H407.5V219.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M407.5 270.5H351.5V375H353.5V360H418.5V272H407.5V270.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M351.5 270.5H257V360H318V373H349.5V375H351.5V270.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M257 270.5H199.5V272H198.5V360H257V270.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M50 288H19V360H124V373H160.5V375.5H164.5V373H196V360H198.5V271.5H199.5V251H168.5V249.5H89.5V288H79.5V289H50V288Z"
                                fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-a-4" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-a-4" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #DDFCE2;"></span>
                            <p>Căn hộ 4 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FCAB61;"></span>
                            <p>Căn hộ 3 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>

                    </div>
                    <div id="tow-a-5" class="floorplanImg towA">
                        <img data-src="{{ asset('assets/images/demo/toa-a-5.jpg') }}" alt="" class="lazyload">
                        <svg width="660" height="433" viewBox="0 0 660 433" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M34.5 80.5H30.5L31 155H68V153.5H89.5V193.5H143V192H199.5V171H175V68.5H173.5V70H129.5V83H34.5V80.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M176 68.5H174.5V171H199.5V172.188H233V83H176V68.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M300 83H233V172H300V83Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M359.5 83H300V172.5H359.5V83Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M418.5 83H359.5V172.5H407.5V171H418.5V83Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M512 83H418.5V171H408V221.5H448.5V210.5H512.5V221.5H533.5V192H556V188H553.5V93.5H516V80.5H512V83Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M407.5 219.5H402V245H407.5V271H418.5V359H512V361H515.5V348.5H553V254H555.5V250.5H533V221H512V231.5H448V221H407.5V219.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M407.5 270.5H351.5V375H353.5V360H418.5V272H407.5V270.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M351.5 270.5H257V360H318V373H349.5V375H351.5V270.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M257 270.5H199.5V272H198.5V360H257V270.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M50 288H19V360H124V373H160.5V375.5H164.5V373H196V360H198.5V271.5H199.5V251H168.5V249.5H89.5V288H79.5V289H50V288Z"
                                fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-a-5" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-a-5" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #DDFCE2;"></span>
                            <p>Căn hộ 4 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FCAB61;"></span>
                            <p>Căn hộ 3 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>

                    </div>

                    <!----------------- Tower C  -->

                    <div id="tow-c-1" class="floorplanImg towC">
                        <img data-src="{{ asset('assets/images/demo/toa-c-1.jpg') }}" alt="" class="lazyload">
                        <svg width="512" height="512" viewBox="0 0 512 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M218.5 54H114.5V58H117L116.5 135.812H102V197H99.5V199H219L219.5 110H218V83H218.5V54Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359 54H218.5V83H218V110H219.5V111.5H241.5V110H303V135H359V54Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M303 110H241.5V135H278.5V210.5H359.5V135H303V110Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 336H99.5V338H102L101.5 379.5H116.5V451H114.5V455H243.5V433H219.5V336Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M359 210.5H241.5V278.5H359V210.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 199H99.5V201H116.5V267.5H219.5V199Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 267.5H117V334H99.5V336H219.5V267.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359 278.5H241.5V346.5H344.5V280H359V278.5Z" fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-c-1" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-c-1" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FCAB61;"></span>
                            <p>Căn hộ 3 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #DCFDF5;"></span>
                            <p>Căn hộ Officetel</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FAFDC7;"></span>
                            <p>Căn hộ Officetel</p>
                        </div>
                    </div>
                    <div id="tow-c-2" class="floorplanImg towC">
                        <img data-src="{{ asset('assets/images/demo/toa-c-2.jpg') }}" alt="" class="lazyload">
                        <svg width="512" height="512" viewBox="0 0 512 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M218.5 54H114.5V58H117L116.5 135.812H102V197H99.5V199H219L219.5 110H218V83H218.5V54Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 336H99.5V338H102L101.5 379.5H116.5V451H114.5V455H243.5V433H219.5V336Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M359 210.5H241.5V278.5H359V210.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359 278.5H241.5V346.5H344.5V280H359V278.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M212.5 199H99.5V201H116.5V334H99.5V336H219.5V208H212.5V199Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359.5 54H218.5V83H218V176H243V135H278.5V193H279.5V210.5L359.5 211V54Z" fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-c-2" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-c-2" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #DEFADA;"></span>
                            <p>Căn hộ 3 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3BS</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2B</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1B+1</p>
                        </div>
                    </div>
                    <div id="tow-c-3" class="floorplanImg towC">
                        <img data-src="{{ asset('assets/images/demo/toa-c-3.jpg') }}" alt="" class="lazyload">
                        <svg width="512" height="512" viewBox="0 0 512 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M218.5 54H114.5V58H117L116.5 135.812H102V197H99.5V199H219L219.5 110H218V83H218.5V54Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359.5 54H218.5V83H218V176H243V135H278.5V193H279.5V210.5L359.5 211V54Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 336H99.5V338H102L101.5 379.5H116.5V451H114.5V455H243.5V433H219.5V336Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M359 210.5H241.5V278.5H359V210.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 199H99.5V201H116.5V267.5H219.5V199Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 267.5H117V334H99.5V336H219.5V267.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359 278.5H241.5V346.5H344.5V280H359V278.5Z" fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-c-3" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-c-3" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>
                    </div>
                    <div id="tow-c-4" class="floorplanImg towC">
                        <img data-src="{{ asset('assets/images/demo/toa-c-4.jpg') }}" alt="" class="lazyload">
                        <svg width="512" height="512" viewBox="0 0 512 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M218.5 54H114.5V58H117L116.5 135.812H102V197H99.5V199H219L219.5 110H218V83H218.5V54Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359.5 54H218.5V83H218V176H243V135H278.5V193H279.5V210.5L359.5 211V54Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 336H99.5V338H102L101.5 379.5H116.5V451H114.5V455H243.5V433H219.5V336Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M359 210.5H241.5V278.5H359V210.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 199H99.5V201H116.5V267.5H219.5V199Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 267.5H117V334H99.5V336H219.5V267.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359 278.5H241.5V346.5H344.5V280H359V278.5Z" fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-c-4" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-c-4" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>
                    </div>
                    <div id="tow-c-5" class="floorplanImg towC">
                        <img data-src="{{ asset('assets/images/demo/toa-c-5.jpg') }}" alt="" class="lazyload">
                        <svg width="512" height="512" viewBox="0 0 512 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M218.5 54H114.5V58H117L116.5 135.812H102V197H99.5V199H219L219.5 110H218V83H218.5V54Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359.5 54H218.5V83H218V176H243V135H278.5V193H279.5V210.5L359.5 211V54Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 336H99.5V338H102L101.5 379.5H116.5V451H114.5V455H243.5V433H219.5V336Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 199H99.5V201H116.5V267.5H219.5V199Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M219.5 267.5H117V334H99.5V336H219.5V267.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M359 210.5H241V346.5H344.5V280H359V210.5Z" fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-c-5" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-c-5" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #DEFADA;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>
                    </div>

                    <!----------------- Tower B  -->

                    <div id="tow-b-1" class="floorplanImg towB">
                        <img data-src="{{ asset('assets/images/demo/toa-b-1.jpg') }}" alt="" class="lazyload">
                        <svg width="540" height="512" viewBox="0 0 540 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M317 326H294V353H268V374H315.5V430H335.5V459.5H334V492.5H409.5V386.5H423V353.5H425.5V351H317V326Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M194.5 17.5H119L119.5 89.5H105.5V124.5H103V126.5H211.5V148H213H233.5V129H235V106H213.5V55H194.5V54H193.5V21.5H194.5V17.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M233.5 374.5V354H232V338.5H211.5V346.5H103V348H105.5V386H119V493H195V460H193.5V430H213V374.5H233.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M211.5 126.5H103V128H119V199.5H213V148H211.5V126.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M213 199.5H119V273H213V199.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M213 273H119V344.5H103V346.5H212V338.5H213V273Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M409.5 118.5H334V122.5H335V153H282.5V185H296.5V202H315.5V265.5H409.5V231H425.5V227H423V191.5H409.5V118.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M409.5 265.5H315.5V326H317V351H425.5V349H409.5V265.5Z" fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-b-1" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-b-1" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                    </div>

                    <div id="tow-b-2" class="floorplanImg towB">
                        <img data-src="{{ asset('assets/images/demo/toa-b-2.jpg') }}" alt="" class="lazyload">
                        <svg width="540" height="512" viewBox="0 0 540 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M317 326H294V353H268V374H315.5V430H335.5V459.5H334V492.5H409.5V386.5H423V353.5H425.5V351H317V326Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M194.5 17.5H119L119.5 89.5H105.5V124.5H103V126.5H211.5V148H213H233.5V129H235V106H213.5V55H194.5V54H193.5V21.5H194.5V17.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M233.5 374.5V354H232V338.5H211.5V346.5H103V348H105.5V386H119V493H195V460H193.5V430H213V374.5H233.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M211.5 126.5H103V128H119V199.5H213V148H211.5V126.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M213 199.5H119V273H213V199.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M213 273H119V344.5H103V346.5H212V338.5H213V273Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M409.5 118.5H334V122.5H335V153H282.5V185H296.5V202H315.5V265.5H409.5V231H425.5V227H423V191.5H409.5V118.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M409.5 265.5H315.5V326H317V351H425.5V349H409.5V265.5Z" fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-b-2" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-b-2" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                    </div>
                    <div id="tow-b-3" class="floorplanImg towB">
                        <img data-src="{{ asset('assets/images/demo/toa-b-3.jpg') }}" alt="" class="lazyload">
                        <svg width="540" height="512" viewBox="0 0 540 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M194.5 17.5H119.5L119 89.5H106V125H103.5V128.5H119L119.5 163H213.5V148H233.5V129H235V106H213.5V55H195V54H193.5V21.5H194.5V17.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M213.5 163H119V236.5H213.5V163Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M213.5 236.5H119V310.5H213.5V236.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M213 310H119V345.5H103V349H106L105.5 387H119.5V494H195V460.5H193.5V430.5H213.5V374.5H233.5V354.5H232.5V339H213V310Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M410 119H334V123H336V153.5H283.5V185H296.5V203H316V229.5H426V227H423.5V192H410V119Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M426.5 229.5H316V267.5H324V278.5H316V290.5H410V231H426.5V229.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M410 291H316V327H318V352H426V350H410V291Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M317.5 326.5H294.5V354H269V374.5H315.5V430.5H336V460.5H334.5V494H410.5V387H424V354H426.5V352H317.5V326.5Z"
                                fill="" />
                        </svg>

                    </div>
                    <div data-text="tow-b-3" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-b-3" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #DDFCE2;"></span>
                            <p>Căn hộ 4 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>
                    </div>


                    <div id="tow-b-4" class="floorplanImg towB">
                        <img data-src="{{ asset('assets/images/demo/toa-b-4.jpg') }}" alt="" class="lazyload">
                        <svg width="540" height="512" viewBox="0 0 540 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M194.5 17.5H119.5L119 89.5H106V125H103.5V128.5H119L119.5 163H213.5V148H233.5V129H235V106H213.5V55H195V54H193.5V21.5H194.5V17.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M213.5 163H119V236.5H213.5V163Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M213.5 236.5H119V310.5H213.5V236.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M213 310H119V345.5H103V349H106L105.5 387H119.5V494H195V460.5H193.5V430.5H213.5V374.5H233.5V354.5H232.5V339H213V310Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M410 119H334V123H336V153.5H283.5V185H296.5V203H316V229.5H426V227H423.5V192H410V119Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M426.5 229.5H316V267.5H324V278.5H316V290.5H410V231H426.5V229.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M410 291H316V327H318V352H426V350H410V291Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M317.5 326.5H294.5V354H269V374.5H315.5V430.5H336V460.5H334.5V494H410.5V387H424V354H426.5V352H317.5V326.5Z"
                                fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-b-4" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-b-4" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #DDFCE2;"></span>
                            <p>Căn hộ 4 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>
                    </div>

                    <div id="tow-b-5" class="floorplanImg towB">
                        <img data-src="{{ asset('assets/images/demo/toa-b-5.jpg') }}" alt="" class="lazyload">
                        <svg width="540" height="512" viewBox="0 0 540 512" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M317 326H294V353H268V374H315.5V430H335.5V459.5H334V492.5H409.5V386.5H423V353.5H425.5V351H317V326Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M194.5 17.5H119L119.5 89.5H105.5V124.5H103V128.5H119V163H213V148H233.5V129H235V106H213.5V55H194.5V54H193.5V21.5H194.5V17.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M410 119H334.5V122.5H335.5V153H283V185H296.5V202.5H316V229H426.5V227H423.5V192H410V119Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M426.5 229.5H316V267.5H324V278.5H316V290.5H410V231H426.5V229.5Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M410 291H316V327H318V352H426V350H410V291Z" fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M211.5 346.5H103V348.5H105.5V386.5H119V492.5H194.5V459.5H193.5V430H213V374H233.5V353.5H232V338.5H211.5V346.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail" d="M213 162.5H119V273H213V162.5Z"
                                fill="" />
                            <path id-floorplan="" class="js-floorplandetail"
                                d="M213 273H119V344.5H103V346.5H211.5V338H213V273Z" fill="" />
                        </svg>
                    </div>
                    <div data-text="tow-b-5" class="copy mb">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>
                    <div rel="tow-b-5" class="hintFp">
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #D9EEFB;"></span>
                            <p>Căn hộ 2 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #FDE3DC;"></span>
                            <p>Căn hộ 3 phòng ngủ</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #AAB3A1;"></span>
                            <p>Căn hộ 1 phòng ngủ + 1</p>
                        </div>
                        <div id-floorplan="" class="item js-floorplandetail">
                            <span style="background-color: #E3E1E1;"></span>
                            <p>Căn hộ STUDIO</p>
                        </div>
                    </div>

                    <div class="copy">
                        <ul>
                            <li>Diện tích thể hiện trong bản vẽ là diện tích tim tường (GSA)</li>
                            <li>Bản vẽ này chỉ dùng cho mục đích tham khảo. Thông tin chính thức sẽ được căn cứ trên hợp
                                đồng.</li>
                            <li>Tên căn hộ và ký hiệu căn hộ chính thức sẽ được ghi rõ trong hợp đồng.</li>
                            <li>Diện tích thể hiện trong bản vẽ có thể khác với thực tế. Diện tích sử dụng căn hộ sau
                                cùng sẽ được xác nhận bởi đơn vị đo đạc.</li>
                        </ul>
                    </div>



                </div>
            </div>
        </div>
    </section>

</main>

@endsection