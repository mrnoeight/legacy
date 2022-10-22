    <title>@yield('title', 'Take1')</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="vi"/>

    

    <meta name="title" content="@yield('title', 'Take1')"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="@yield('title', 'Take1')"/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>

    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height"/>
    <meta name="apple-touch-fullscreen" content="yes"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="format-detection" content="telephone=no"/>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/icon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/icon/site.webmanifest') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"/>
    <!--[if IE]><link rel="stylesheet" href="{{ asset('css/ie.css') }}"/><![endif]-->