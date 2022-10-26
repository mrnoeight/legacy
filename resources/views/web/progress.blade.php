@extends('web.layouts.base')

@section('title', 'Tien do')

@section('hidden_page', 'Tien do')

@section('content')

<!-- MAIN PAGE -->
<main id="pProgress">
    <div class="bannerSubPage go-up">
        <img class="lazyload pc" data-src="{{ $oPage->banner_url }}" alt="">
        <img class="lazyload mb" data-src="{{ $oPage->banner_mb_url }}" alt="">
        <div class="container stagger-down">
            <h2 class="mainTt">{!! nl2br($oPage->head_title1) !!}</h2>
            <div class="copy">
                <p>{{ $oPage->head_desc1 }}</p>
            </div>
        </div>
    </div>
    <section class="section progressWrap">
        <div class="container">
            @foreach ($arrProgress as $year=>$arr)
            <div class="progresslist">
                @foreach ($arr as $p)
                <div data-popup="idProHere{{ $p->id }}" class="item animate">
                    <h3>{{tk1FormatDateLocal($p->block_date)}}</h3>
                    <div class="imgPage">
                        <div style="background: url({{ $p->gallery_url }}) center no-repeat">
                        </div>
                        <img data-src="{{ asset('assets/images/b.gif') }}" class="lazyload" />
                    </div>
                </div>
                @endforeach
                
                <div class="timeLine">
                    <p>{{ $year }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <div class="spaceH"></div>


</main>

@foreach ($arrProgress as $year=>$arr)
@foreach ($arr as $p)
<div id="idProHere{{$p->id}}" class="popup popupProgress">
    <div class="btnClose jsClosePopupProgress"></div>
    <h3>{{__('Tháng')}} {{ \Carbon\Carbon::parse($p->block_date)->formatLocalized('%m - %Y')  }}</h3>
    <div class="slideProgressPopup">
        @foreach ($p->getListGalleryImage() as $k=>$v)
        <div class="item">
            <div class="img">
                <img src="{{ $v }}" />
            </div>
        </div>
        @endforeach
        
    </div>
    <div class="copy">
        <p>{{ $p->head_title1 }}</p>
    </div>
</div>
@endforeach
@endforeach

@endsection