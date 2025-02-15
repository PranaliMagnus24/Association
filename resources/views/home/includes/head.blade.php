<!DOCTYPE html>
<html @if(app()->getLocale()=='en') translate="no" @else lang="{{ app()->getLocale() }}" @endif dir="{{ in_array(app()->getLocale(), ['ar', 'ur']) ? 'rtl' : 'ltr' }}">
<head>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W93SVR4V');</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-009NER9Q8R"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-009NER9Q8R');
</script>


    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
    $getSetting = \App\Models\GeneralSetting::first();
@endphp
@if($getSetting)
<title>{{ $getSetting ? $getSetting->association_name : 'Mi.Association' }}</title>
    @else
<h1>Mi.Association</h1>
@endif
    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@mimaindia">
    <meta name="twitter:creator" content="@mimaindia">
    <meta name="twitter:url" content="http://mimaindia.org">
    <meta name="twitter:title" content="{{$getSetting->association_name}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="en" />
    <!-- maximum 140 char -->
    <meta name="twitter:description" content="{{$getSetting->description}}">
    <!-- maximum 140 char -->
    <meta name="twitter:image" content="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends here -->

    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="{{$getSetting->association_name}}">
    <meta property="og:url" content="http://mimaindia.org">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="{{$getSetting->association_name}}">
    <!--meta property="fb:admins" content="" /-->
    <!-- use this if you have  -->
    <meta property="og:type" content="website">
    <!-- 'article' for single page  -->
    <meta property="og:image" content="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends here -->

    <!-- desktop bookmark -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- icons & favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <!-- this icon shows in browser toolbar -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}')}}">

    <link rel="apple-touch-icon" sizes="60x60" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}">


    <!-- Dependency Styles -->
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/bootstrap/css/bootstrap.min.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/fontawesome/css/all.min.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/owl-carousel/css/owl.carousel.min.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/magnific-popup/magnific-popup.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/nice-select/nice-select.css')}}" type="text/css">
    <link class="script-css" rel="stylesheet" href="{{asset('homecss/assets/vendors/awesome-notifications/style.css')}}" media="all">

    <!-- Site Stylesheet -->
    <link id="cbx-style" rel="stylesheet" href="{{asset('homecss/assets/css/style-default.css')}}?@php echo time(); @endphp" type="text/css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    </head>
