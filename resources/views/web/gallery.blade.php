@extends('web.layouts.base')

@section('title') {{ $oPage->seo_title }} @endsection

@section('description') {{ $oPage->seo_description }} @endsection

@section('content')

<!-- MAIN PAGE -->
<main id="pGallery">
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

    <section class="section galleryWrap">
        <div class="container">
            <div class="ttPage">
                <h2 class="mainTt animate">{!! nl2br($oPage->mid_title1) !!}</h2>
            </div>
        </div>
        <div class="slideGalleryWrap animate">
            <div class="slideGalleryPage lightgallery">
                @foreach ($oPhotos as $photo)
                <div>
                    <div class="item" style="background: url({{ $photo->banner_url }}) center no-repeat">
                        <img data-src="{{ asset('assets/images/thumb2.gif') }}" class="lazyload" />
                        <span class="linkLg" data-src="{{ $photo->banner_url }}"
                            data-sub-html="<p>{{ $photo->head_title1 }}</p>"></span>
                    </div>
                </div>
                @endforeach
                
            </div>
            

        </div>

    </section>
    <div class="spaceH"></div>
    <section class="section galleryWrap">
        <div class="container">
            <div class="ttPage">
                <h2 class="mainTt animate">{!! nl2br($oPage->mid_desc1) !!}</h2>
            </div>
        </div>
        <div class="slideGalleryWrap animate">
            <div class="slideGalleryPage lightgallery">
                @foreach ($oVideos as $video)
                <div>
                    <div class="item" style="background: url({{ $video->banner_url }}) center no-repeat">
                        <img data-src="{{ asset('assets/images/thumb2.gif') }}" class="lazyload" />
                        <span class="linkLg video" data-src="{{ $video->block_name }}"
                            data-sub-html="<p>{{ $video->head_title1 }}</p>"></span>
                    </div>
                </div>
                @endforeach
                
            </div>

        </div>

    </section>
    <div class="spaceH"></div>

</main>

@endsection