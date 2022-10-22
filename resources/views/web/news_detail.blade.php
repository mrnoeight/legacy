@extends('web.layouts.base')

@section('title', 'News')

@section('hidden_page', 'News')

@section('content')

<!-- MAIN PAGE -->
<main id="pNewsDetail">
    <div class="bannerSubPage">
        <img data-src="{{ asset('assets/images/demo/banner-page-3.jpg') }}" alt="" class="lazyload">
    </div>
    <section class="section newsDetailWrap">
        <div class="container">
            <div class="top">
                <h4>Tin tức</h4>
                <h2 class="mainTt">{{ $news->head_title1 }}</h2>
                <p class="date">{{__('Ngày đăng')}}: <strong>{{ \Carbon\Carbon::parse($news->block_date)->formatLocalized('%d %B %Y')  }}</strong></p>
                <p class="cap">{{ $news->head_tag1 }} </p>
            </div>
            <div class="content">
                {!! $news->head_desc1 !!}
            </div>
        </div>
    </section>
    <div class="spaceH"></div>
    <section class="section newsWrap">
        <div class="container">
            <div class="newsList">
                @foreach ($oNews as $n)
                <div class="item">
                    <div class="imgPage">
                        <div style="background: url({{ $n->banner_url }}) center no-repeat"></div>
                        <img data-src="{{ asset('assets/images/b.gif') }}" class="lazyload" />
                    </div>
                    <div class="copy">
                        <h3>{{ $n->head_title1 }}</h3>
                        <div class="bot">
                            <p class="date">{{ \Carbon\Carbon::parse($n->block_date)->formatLocalized('%d %B %Y')  }}</p>
                            <a href="#">
                                <svg width="1em" height="1em" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.60078 7.20775C9.2464 7.21009 8.89694 7.29081 8.57751 7.4441C8.25809 7.59739 7.97664 7.81945 7.75338 8.09431L4.69437 6.68659C4.8382 6.24675 4.8382 5.77262 4.69437 5.33278L7.75338 3.92506C8.11423 4.35993 8.6173 4.65353 9.17381 4.75402C9.73031 4.85451 10.3045 4.75545 10.795 4.47431C11.2854 4.19317 11.6607 3.74803 11.8546 3.21745C12.0484 2.68686 12.0484 2.10495 11.8544 1.5744C11.6605 1.04386 11.2851 0.598782 10.7946 0.317732C10.304 0.0366813 9.72986 -0.0622786 9.17338 0.0383169C8.61689 0.138912 8.11387 0.432596 7.7531 0.867538C7.39233 1.30248 7.19699 1.85072 7.20156 2.4155C7.20336 2.55821 7.21741 2.7005 7.24354 2.84081L4.07657 4.29646C3.73893 3.96674 3.31137 3.74386 2.84746 3.65575C2.38354 3.56764 1.90391 3.61821 1.46865 3.80114C1.03339 3.98406 0.661861 4.2912 0.400609 4.68407C0.139356 5.07694 0 5.53807 0 6.00969C0 6.4813 0.139356 6.94244 0.400609 7.33531C0.661861 7.72818 1.03339 8.03531 1.46865 8.21824C1.90391 8.40116 2.38354 8.45173 2.84746 8.36362C3.31137 8.27551 3.73893 8.05264 4.07657 7.72292L7.24354 9.17856C7.21741 9.31887 7.20336 9.46117 7.20156 9.60387C7.20156 10.0778 7.34227 10.541 7.6059 10.9351C7.86953 11.3291 8.24424 11.6362 8.68264 11.8176C9.12104 11.999 9.60344 12.0464 10.0688 11.954C10.5342 11.8615 10.9617 11.6333 11.2973 11.2982C11.6328 10.9631 11.8613 10.5361 11.9539 10.0713C12.0465 9.60653 11.999 9.12475 11.8174 8.68692C11.6358 8.24908 11.3283 7.87486 10.9337 7.61157C10.5392 7.34828 10.0753 7.20775 9.60078 7.20775ZM9.60078 1.21744C9.83804 1.21744 10.07 1.2877 10.2672 1.41935C10.4645 1.55099 10.6183 1.7381 10.7091 1.95702C10.7999 2.17594 10.8236 2.41683 10.7773 2.64923C10.7311 2.88163 10.6168 3.0951 10.449 3.26266C10.2813 3.43021 10.0675 3.54431 9.83481 3.59054C9.60211 3.63677 9.36091 3.61304 9.14171 3.52236C8.92251 3.43169 8.73515 3.27813 8.60334 3.08111C8.47152 2.88409 8.40117 2.65245 8.40117 2.4155C8.40117 2.09775 8.52756 1.79302 8.75253 1.56834C8.9775 1.34366 9.28262 1.21744 9.60078 1.21744ZM2.40312 7.20775C2.16586 7.20775 1.93393 7.13748 1.73665 7.00584C1.53938 6.87419 1.38562 6.68708 1.29482 6.46816C1.20403 6.24925 1.18027 6.00836 1.22656 5.77596C1.27284 5.54355 1.3871 5.33008 1.55487 5.16253C1.72263 4.99498 1.93638 4.88087 2.16909 4.83464C2.40179 4.78842 2.64299 4.81214 2.86219 4.90282C3.08139 4.9935 3.26874 5.14706 3.40056 5.34408C3.53237 5.5411 3.60273 5.77273 3.60273 6.00969C3.60273 6.32743 3.47634 6.63216 3.25137 6.85684C3.0264 7.08152 2.72127 7.20775 2.40312 7.20775ZM9.60078 10.8019C9.36352 10.8019 9.13159 10.7317 8.93431 10.6C8.73704 10.4684 8.58328 10.2813 8.49248 10.0624C8.40169 9.84344 8.37793 9.60254 8.42422 9.37014C8.47051 9.13774 8.58476 8.92427 8.75253 8.75672C8.92029 8.58916 9.13404 8.47506 9.36675 8.42883C9.59945 8.3826 9.84065 8.40633 10.0598 8.49701C10.279 8.58769 10.4664 8.74125 10.5982 8.93826C10.73 9.13529 10.8004 9.36692 10.8004 9.60387C10.8004 9.92162 10.674 10.2264 10.449 10.451C10.2241 10.6757 9.91893 10.8019 9.60078 10.8019Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <a class="link" href="{{ route('news_detail', ['id'=>$n->id]) }}"></a>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <div class="spaceH"></div>


</main>

@endsection