@extends('web.layouts.base')

@section('title', 'Lancaster by Trung Thuy')

@section('hidden_page', 'Lancaster by Trung Thuy')

@section('content')

<!-- MAIN PAGE -->
<main id="pMaster">
    <div class="bannerSubPage go-up">
        <img class="lazyload pc" data-src="{{ $oPage->banner_url }}" alt="">
        <img class="lazyload mb" data-src="{{ $oPage->banner_mb_url }}" alt="">
        <div class="container stagger-down">
            <h2 class="mainTt">{!! nl2br($oPage->head_title1) !!}</h2>
            <div class="copy">
                <p>{{ $oPage->head_desc1 }}
                </p>
            </div>
        </div>
    </div>
    <section class="masterWrap">
        <div class="top" data-image-src="{{ $oPage->middle_banner_url }}" data-parallax="scroll" data-bleed="0"
            data-speed="0.4">
            <div class="container animate">
                <img data-src="{{ asset('assets/images/logo-big.png') }}" alt="" class="lazyload">
                <p>{{ $oPage->mid_desc1 }}</p>
            </div>
        </div>
        <div class="container">
            <div class="listImg">
                @foreach ($oMaster as $master)
                <div class="imgPage">
                    <div style="background: url({{ $master->banner_url }}) center no-repeat"></div>
                    <img data-src="{{ asset('assets/images/thumb3.gif') }}" class="lazyload" />
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="spaceH"></div>
    <section id="LancasterTheMaster" class="serviceWrap pd1" data-image-src="{{ asset('assets/images/demo/bg-service.jpg') }}"
        data-parallax="scroll" data-bleed="0" data-speed="0.4">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">LANCASTER THE MASTER</h2>
            </div>
            <div class="serviceSectionList">
                <div class="itemSer ser1">
                    <h3>dịch vụ <br />
                        cơ bản</h3>
                    @foreach ($oBasic as $ser)
                    <div class="item">
                        <img data-src="{{ $ser->banner_url }}" class="lazyload">
                        <p>{{ $ser->head_title1 }}</p>
                    </div>
                    @endforeach
                    
                </div>
                <div class="itemSer ser2">
                    <h3>dịch vụ <br />
                        nâng cao</h3>
                    @foreach ($oEnhance as $ser)
                    <div class="item">
                        <img data-src="{{ $ser->banner_url }}" class="lazyload">
                        <p>{{ $ser->head_title1 }}</p>
                    </div>
                    @endforeach
                    
                </div>
                <div class="itemSer ser3">
                    <h3>dịch vụ <br />
                        quản gia cao cấp</h3>
                    @foreach ($oButler as $ser)
                    <div class="item">
                        <img data-src="{{ $ser->banner_url }}" class="lazyload">
                        <p>{{ $ser->head_title1 }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="LancasterClub" class="lancasterClubWrap pd1">
        <img class="lazyload bgClubMb" data-src="{{ asset('assets/images/demo/bg-club-mb.jpg') }}" alt="">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">Lancaster the club</h2>
                <p>Lancaster Club kiến tạo nên cộng đồng tinh hoa ưu việt, nơi những tâm hồn đồng điệu về chất sống giao
                    lưu và chia sẻ các giá trị thành công; mở ra cánh cửa trải nghiệm không giới hạn và mang đến nhiều
                    ưu đãi vô cùng hấp dẫn cho chủ nhân sở hữu. </p>
            </div>
        </div>
        <div class="linkCard left">
            <div class="card"></div>
            <div class="clickCardDesktop jsOpenCard"></div>
            <div index="0" class="clickCardMobile"></div>
            <div class="tooltipCard right">
                <div class="closeTooltip">
                    <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0.120014V19.5" stroke="currentcolor" />
                        <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                    </svg>
                </div>
                <div class="copyCard">
                    <h2>{{ $platinumCard->head_title1 }}</h2>
                    <div class="text">
                        <p>{{ $platinumCard->head_tag1 }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="linkCard center ">
            <div class="card"></div>
            <div class="clickCardDesktop jsOpenCard"></div>
            <div index="1" class="clickCardMobile"></div>
            <div class="tooltipCard right">
                <div class="closeTooltip">
                    <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0.120014V19.5" stroke="currentcolor" />
                        <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                    </svg>
                </div>
                <div class="copyCard">
                    <h2>{{ $diamondCard->head_title1 }}</h2>
                    <div class="text">
                        <p>{{ $diamondCard->head_tag1 }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="linkCard right">
            <div class="card"></div>
            <div class="clickCardDesktop jsOpenCard"></div>
            <div index="2" class="clickCardMobile"></div>
            <div class="tooltipCard left">
                <div class="closeTooltip">
                    <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0.120014V19.5" stroke="currentcolor" />
                        <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                    </svg>
                </div>
                <div class="copyCard">
                    <h2>{{ $goldCard->head_title1 }}</h2>
                    <div class="text">
                        <p>{{ $goldCard->head_tag1 }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ovlCard"></div>
    </section>
    <section class="captionCardWrap">
        <div class="caption">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisi, adipiscing convallis ut ut diam ut
                praesent. Est pellentesque nulla ullamcorper nibh malesuada.Lorem ipsum dolor sit amet, consectetur
                adipiscing elit. Nisi, adipiscing convallis ut ut diam ut praesent. Est pellentesque</p>
        </div>
        <div class="sliderCard">
            <div class="item">
                <h2>{{ $platinumCard->head_title1 }}</h2>
                <div class="text">
                    <p>{{ $platinumCard->head_tag1 }}
                    </p>
                </div>
            </div>
            <div class="item">
                <h2>{{ $diamondCard->head_title1 }}d</h2>
                <div class="text">
                    <p>{{ $diamondCard->head_tag1 }}
                    </p>
                </div>
            </div>
            <div class="item">
                <h2>{{ $goldCard->head_title1 }}</h2>
                <div class="text">
                    <p>{{ $goldCard->head_tag1 }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="ConsultingTeam" class="teamPageWrap pd1" data-image-src="{{ asset('assets/images/demo/bg-team.jpg') }}"
        data-parallax="scroll" data-bleed="0" data-speed="0.4">
        <img class="lazyload bgClubMb" data-src="{{ asset('assets/images/demo/bg-team.jpg') }}" alt="">
        <div class="container">
            <div class="copy">
                <h2 class="mainTt">đội ngũ tư vấn</h2>
                <p>Lancaster Club kiến tạo nên cộng đồng tinh hoa ưu việt, nơi những tâm hồn đồng điệu về chất sống giao
                    lưu và chia sẻ các giá trị thành công; mở ra cánh cửa trải nghiệm không giới hạn và mang đến nhiều
                    ưu đãi vô cùng hấp dẫn cho chủ nhân sở hữu. </p>
                <div class="btnWrap">
                    <div class="btn openPopupTeam">
                        <span>SEE MORE</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>

<div class="popup PopupTeam">

    <div class="container">
        <div class="btnClose jsClosePopupTeam"></div>
        <div class="slideTeamPopup">
            @foreach ($arrConsultants as $k => $arr)
            <div class="item">
                @foreach ($arr as $c)
                <div class="teamSmall">
                    <div class="imgPage">
                        <div style="background: url({{ $c->banner_url }}) center no-repeat"></div>
                        <img data-src="{{ asset('assets/images/thumb4.gif') }}" class="lazyload" />
                    </div>
                    <div class="copy">
                        <h2>{{ $c->head_title1 }}</h2>
                        <p>{{ $c->head_tag1 }}</p>
                        <div class="text">
                            <p>{{ $c->head_desc1 }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            
            
            
            
            
            
            
            
        </div>
    </div>

</div>

@endsection