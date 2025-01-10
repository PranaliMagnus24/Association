
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
    $getSetting = \App\Models\GeneralSetting::first();
@endphp
@if($getSetting)
    <title>{{$getSetting->association_name}}</title>
    @else
<h1>Mi.Association</h1>
@endif
    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@yourtwitterusername">
    <meta name="twitter:creator" content="@yourtwitterusername">
    <meta name="twitter:url" content="http://twitter.com">
    <meta name="twitter:title" content="Your home page title, max 140 char">
    <!-- maximum 140 char -->
    <meta name="twitter:description" content="Your site description, maximum 140 char ">
    <!-- maximum 140 char -->
    <meta name="twitter:image" content="{{asset('homecss/assets/images/twittercardimg/twittercard-144-144.png')}}">
    <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends here -->

    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="Your home page title">
    <meta property="og:url" content="http://your domain here.com">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="Your site name here">
    <!--meta property="fb:admins" content="" /-->
    <!-- use this if you have  -->
    <meta property="og:type" content="website">
    <!-- 'article' for single page  -->
    <meta property="og:image" content="{{asset('homecss/assets/images/opengraph/fbphoto-476-476.png')}}">
    <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends here -->

    <!-- desktop bookmark -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('upload/' . $getSetting->association_logo) }}">
    <meta name="theme-color" content="#ffffff">

    <!-- icons & favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <!-- this icon shows in browser toolbar -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('upload/' . $getSetting->association_logo) }}')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('upload/' . $getSetting->association_logo) }}')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('upload/' . $getSetting->association_logo) }}')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('upload/' . $getSetting->association_logo) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('upload/' . $getSetting->association_logo) }}">


    <!-- Dependency Styles -->
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/bootstrap/css/bootstrap.min.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/fontawesome/css/all.min.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/owl-carousel/css/owl.carousel.min.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/magnific-popup/magnific-popup.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/nice-select/nice-select.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/awesome-notifications/style.css')}}" media="all">

    <!-- Site Stylesheet -->
    <link id="cbx-style" rel="stylesheet" href="{{asset('homecss/assets/css/style-default.css')}}" type="text/css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">



    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
