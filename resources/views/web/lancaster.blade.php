@extends('web.layouts.base')

@section('title') {{ $oPage->seo_title }} @endsection

@section('description') {{ $oPage->seo_description }} @endsection

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
    <section id="LancasterTheMaster" class="serviceWrap pd1"
        data-image-src="{{ asset('assets/images/demo/bg-service.jpg') }}" data-parallax="scroll" data-bleed="0"
        data-speed="0.4">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">{!! nl2br($arrText['lan.master']) !!}</h2>
            </div>
            <div class="serviceSectionList">
                <div class="itemSer ser1">
                    <h3>{!! nl2br($arrText['lan.basic']) !!}</h3>
                    @foreach ($oBasic as $ser)
                    <div class="item">
                        <img data-src="{{ $ser->banner_url }}" class="lazyload">
                        <p>{{ $ser->head_title1 }}</p>
                    </div>
                    @endforeach

                </div>
                <div class="itemSer ser2">
                    <h3>{!! nl2br($arrText['lan.advance']) !!}</h3>
                    @foreach ($oEnhance as $ser)
                    <div class="item">
                        <img data-src="{{ $ser->banner_url }}" class="lazyload">
                        <p>{{ $ser->head_title1 }}</p>
                    </div>
                    @endforeach

                </div>
                <div class="itemSer ser3">
                    <h3>{!! nl2br($arrText['lan.butler']) !!}</h3>
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
    @if (!in_array('lan.club', $arrSecDisables))
    <section id="LancasterClub" class="lancasterClubWrap">
        <div class="contentLans des">
            <img class="lazyload bgClubDes" data-src="{{asset('assets/images/demo/bg-club.jpg') }}" alt="">
            <svg width="1440" height="850" viewBox="0 0 1440 850" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="jsOpenCard" tooltip="card-platinum"
                    d="M217 527C206.6 529.8 207.667 538.167 209.5 542C224.833 595.5 256 704 258 710C260 716 265.833 716.167 268.5 715.5C360.5 689 546 635.6 552 634C558 632.4 558.167 625 557.5 621.5C542.167 568.667 511 461.1 509 453.5C507 445.9 500.5 446 497.5 447C408.333 472.5 227.4 524.2 217 527Z"
                    fill="" />
                <path class="jsOpenCard" tooltip="card-diamond"
                    d="M554.5 429.5C547.3 431.9 547.5 439.167 548.5 442.5C574.333 533.667 626.5 717.6 628.5 724C630.5 730.4 638.333 731 642 730.5C696.5 715 806.8 683.6 812 682C817.2 680.4 818.167 673 818 669.5C792.167 578.5 740 394.7 738 387.5C736 380.3 727.833 380.5 724 381.5C670.5 396.5 561.7 427.1 554.5 429.5Z"
                    fill="" />
                <path class="jsOpenCard" tooltip="card-gold"
                    d="M818 476C808.4 478.4 808 487.667 809 492L856 658C858.8 665.6 866.5 666.5 870 666C963.167 639.5 1150.7 586.2 1155.5 585C1160.3 583.8 1160.5 577.5 1160 574.5C1145 521.167 1114.4 412.5 1112 404.5C1109.6 396.5 1101 396.167 1097 397C1008 422.333 827.6 473.6 818 476Z"
                    fill="" />

                <g ovlCard="card-platinum" class="ovlCard" style="mix-blend-mode:color">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1440 0H0V850H1440V0ZM209.5 542C207.667 538.167 206.6 529.8 217 527C227.4 524.2 408.333 472.5 497.5 447C500.5 446 507 445.9 509 453.5C511 461.1 542.167 568.667 557.5 621.5C558.167 625 558 632.4 552 634C546 635.6 360.5 689 268.5 715.5C265.833 716.167 260 716 258 710C256 704 224.833 595.5 209.5 542Z"
                        fill="#242021" />
                </g>

                <g ovlCard="card-diamond" class="ovlCard" style="mix-blend-mode:color">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1440 0H0V850H1440V0ZM548.5 442.5C547.5 439.167 547.3 431.9 554.5 429.5C561.7 427.1 670.5 396.5 724 381.5C727.833 380.5 736 380.3 738 387.5C740 394.7 792.167 578.5 818 669.5C818.167 673 817.2 680.4 812 682C806.8 683.6 696.5 715 642 730.5C638.333 731 630.5 730.4 628.5 724C626.5 717.6 574.333 533.667 548.5 442.5Z"
                        fill="#242021" />
                </g>

                <g ovlCard="card-gold" class="ovlCard" style="mix-blend-mode:color">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1440 0H0V850H1440V0ZM809 492C808 487.667 808.4 478.4 818 476C827.6 473.6 1008 422.333 1097 397C1101 396.167 1109.6 396.5 1112 404.5C1114.4 412.5 1145 521.167 1160 574.5C1160.5 577.5 1160.3 583.8 1155.5 585C1150.7 586.2 963.167 639.5 870 666C866.5 666.5 858.8 665.6 856 658L809 492Z"
                        fill="#242021" />
                </g>
            </svg>

        </div>

        <div class="contentLans mb">
            <img class="lazyload bgClubMb" data-src="assets/images/demo/bg-club-mb.jpg" alt="">
            <svg width="744" height="712" viewBox="0 0 744 712" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path index="0" class="jsclickCardMobile" tooltip="card-platinum"
                    d="M24.4615 471.08C16.7236 473.17 17.5173 479.416 18.8813 482.278C30.2897 522.217 53.4784 603.216 54.9664 607.695C56.4545 612.174 60.7946 612.298 62.7787 611.801C131.229 592.018 269.245 552.153 273.709 550.959C278.173 549.764 278.297 544.24 277.801 541.627C266.393 502.185 243.204 421.884 241.716 416.21C240.228 410.537 235.392 410.611 233.16 411.358C166.818 430.394 32.1993 468.99 24.4615 471.08Z"
                    fill="" />
                <path index="1" class="jsclickCardMobile" tooltip="card-diamond"
                    d="M276.844 398.209C271.484 400.001 271.633 405.425 272.378 407.914C291.607 475.967 330.439 613.269 331.928 618.046C333.416 622.823 339.247 623.271 341.977 622.898C382.545 611.328 464.65 587.888 468.521 586.694C472.392 585.5 473.111 579.976 472.987 577.363C453.757 509.434 414.926 372.232 413.437 366.858C411.948 361.483 405.869 361.632 403.016 362.379C363.192 373.576 282.203 396.418 276.844 398.209Z"
                    fill="" />
                <path index="2" class="jsclickCardMobile" tooltip="card-gold"
                    d="M472.986 432.875C465.831 434.656 465.533 441.535 466.278 444.752L501.305 567.977C503.392 573.619 509.13 574.287 511.739 573.916C581.171 554.244 720.93 514.679 724.507 513.788C728.084 512.897 728.233 508.22 727.861 505.993C716.682 466.403 693.877 385.737 692.089 379.799C690.3 373.86 683.891 373.613 680.91 374.231C614.583 393.037 480.14 431.093 472.986 432.875Z"
                    fill="" />

                <!-- <g  ovlCard="card-platinum" class="ovlCard" style="mix-blend-mode:color">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M744 0H0V712H744V0ZM18.8813 482.278C17.5173 479.416 16.7236 473.17 24.4615 471.08C32.1993 468.99 166.818 430.394 233.16 411.358C235.392 410.611 240.228 410.537 241.716 416.21C243.204 421.884 266.393 502.185 277.801 541.627C278.297 544.24 278.173 549.764 273.709 550.959C269.245 552.153 131.229 592.018 62.7787 611.801C60.7946 612.298 56.4545 612.174 54.9664 607.695C53.4784 603.216 30.2897 522.217 18.8813 482.278Z" fill="#242021"/>
                    </g>
                    <g ovlCard="card-diamond" class="ovlCard" style="mix-blend-mode:color">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M744 0H0V712H744V0ZM272.378 407.914C271.633 405.425 271.484 400.001 276.844 398.209C282.203 396.418 363.192 373.576 403.016 362.379C405.869 361.632 411.948 361.483 413.437 366.858C414.926 372.232 453.757 509.434 472.987 577.363C473.111 579.976 472.392 585.5 468.521 586.694C464.65 587.888 382.545 611.328 341.977 622.898C339.247 623.271 333.416 622.823 331.928 618.046C330.439 613.269 291.607 475.967 272.378 407.914Z" fill="#242021"/>
                    </g>
                    <g ovlCard="card-gold" class="ovlCard" style="mix-blend-mode:color">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M744 0H0V712H744V0ZM466.278 444.752C465.533 441.535 465.831 434.656 472.986 432.875C480.14 431.093 614.583 393.037 680.91 374.231C683.891 373.613 690.3 373.86 692.089 379.799C693.877 385.737 716.682 466.403 727.861 505.993C728.233 508.22 728.084 512.897 724.507 513.788C720.93 514.679 581.171 554.245 511.739 573.916C509.13 574.287 503.392 573.619 501.305 567.977L466.278 444.752Z" fill="#242021"/>
                    </g> -->
            </svg>


            <!-- <img class="lazyload bgClubMb" data-src="assets/images/demo/bg-club-mb.jpg" alt=""> -->
        </div>

        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">{!! nl2br($arrText['lan.club']) !!}</h2>
                <p>{!! nl2br($arrText['lan.club_text']) !!}</p>
            </div>
        </div>
        <div rel="card-platinum" class="tooltipCard card-platinum right">
            <div class="closeTooltip jsCloseCard">
                <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 0.120014V19.5" stroke="currentcolor" />
                    <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                </svg>
            </div>
            <div class="copyCard">
                <h2>{{ $platinumCard->head_title1 }}</h2>
                <div class="text">
                    <p>{{ $platinumCard->head_tag1 }}
                    </p>
                </div>
            </div>
        </div>
        <div rel="card-diamond" class="tooltipCard card-diamond right">
            <div class="closeTooltip jsCloseCard">
                <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 0.120014V19.5" stroke="currentcolor" />
                    <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                </svg>
            </div>
            <div class="copyCard">
                <h2>{{ $diamondCard->head_title1 }}</h2>
                <div class="text">
                    <p>{{ $diamondCard->head_tag1 }}
                    </p>
                </div>
            </div>
        </div>

        <div rel="card-gold" class="tooltipCard card-gold left">
            <div class="closeTooltip jsCloseCard">
                <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 0.120014V19.5" stroke="currentcolor" />
                    <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                </svg>
            </div>
            <div class="copyCard">
                <h2>{{ $goldCard->head_title1 }}</h2>
                <div class="text">
                    <p>{{ $goldCard->head_tag1 }}
                    </p>
                </div>
            </div>
        </div>
        <div class="ovlCard"></div>
    </section>
    @endif

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
                <h2>{{ $diamondCard->head_title1 }}</h2>
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

    @if (!in_array('lan.consultant', $arrSecDisables))
    <section id="ConsultingTeam" class="teamPageWrap pd1" style="background: url({{ $oPCon->banner_url }}) center no-repeat" >
        <img class="lazyload bgClubMb" data-src="{{ asset('assets/images/demo/bg-team.jpg') }}" alt="">
        <div class="container">
            <div class="copy">
                <h2 class="mainTt">{!! nl2br($arrText['lan.consultant']) !!}</h2>
                <p>{!! nl2br($arrText['lan.consultant_text']) !!}</p>
                <div class="btnWrap">
                    <div class="btn openPopupTeam">
                        <span>{!! nl2br($arrText['lan.see']) !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

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