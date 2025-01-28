

        <!--=========================-->
        <!--=        Navbar         =-->
        <!--=========================-->

        <header class="site-header header-fixed" data-responsive-width="991">

            <div class="header-topbar">
                <div class="container">
                    <div class="row align-items-center">
                    @php
    $getSetting = \App\Models\GeneralSetting::first();
@endphp
@if($getSetting)
<div class="col-lg-6 col-sm-7 col-7">
    <div class="preheader-left">
        <a href="mailto:{{ $getSetting->email }}"><strong>Email:</strong> {{ $getSetting->email }}</a>
        <a href="tel:{{ $getSetting->phone }}"><strong>Hotline:</strong> {{ $getSetting->phone }}</a>
    </div>
</div>
@else
<h1>Association</h1>
@endif

                        <div class="col-lg-6 col-sm-5 col-5 text-end">
                            <div class="preheader-right">

                            @if(Auth::check())

                        <form method="POST" action="{{ route('logout') }}">
                    @csrf
                      <input type="submit" value="Logout" class="btn mt-3 text-white" style=" height: 30px;
                     font-size: 16px; background-color:red;">
                     </form>
                   @else
                                <a href="{{ route('login') }}" class="btn-auth btn-auth-rev" title="Login">Login</a>

                                <a title="Register" class="btn-auth btn-auth" href="{{route('register')}}">Become a member</a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.header-topbar -->

            <div class="container">
                <div class="header-inner">
                    <nav id="site-navigation" class="main-nav">
                        <div class="site-logo">

                        @php
    $getSetting = \App\Models\GeneralSetting::first();
@endphp

@if($getSetting)
<a href="{{route('home.index')}}" class="logo">
<img src="{{ url('upload/' . $getSetting->header_logo) }}" alt="site logo" class="main-logo">
<img src="{{ url('upload/' . $getSetting->header_logo) }}" alt="site logo" class="logo-sticky">
</a>
@else
<h1>Association</h1>
@endif


                            <div class="burger-menu">
                                <span class="bar-one"></span>
                                <span class="bar-two"></span>
                                <span class="bar-three"></span>
                            </div>
                        </div>
                        <!-- /.site-logo -->

                        <div class="menu-wrapper main-nav-container canvas-menu-wrapper" id="mega-menu-wrap">
                            <div class="canvas-header">
                                <div class="mobile-offcanvas-logo">
                                    <a href="index.html">
                                        <img src="{{ url('upload/' . $getSetting->header_logo) }}" alt="site logo" class="logo-sticky">
                                    </a>
                                </div>

                                <div class="close-menu" id="page-close-main-menu">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>

                            <ul class="codeboxr-main-menu">
                                <li>
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="has-submenu menu-item-depth-0">
                                    <a href="javascript:void(0)">About</a>
                                    <ul class="sub-menu">
                                    <li><a href="{{route('home.about')}}">History</a></li>
                                    <li><a href="{{route('home.committee')}}">Committee</a></li>
                                    <li><a href="{{route('home.associate')}}">Our Associate</a></li>
                                    </ul>
                                </li>
                                 <li><a href="{{route('home.directory')}}">Directory</a></li>
                                 <li><a href="{{route('home.jobs')}}">Jobs</a></li>
                                 <li><a href="{{ route('home.islamictijarat')}}">Islamic Tijarat</a></li>
                                 <li><a href="{{ route('home.gallery')}}">Gallery</a></li>
                                <li class="menu-item-depth-0">
                                    <a href="{{ route('home.contact')}}">Contact</a>
                                </li>
                            </ul>
                            <!-------------Responsive display login and register button----------->
                            <div class="mobile-auth-buttons">
                                @if(Auth::check())
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <input type="submit" value="Logout" class="btn mt-3 text-white" style="height: 30px; font-size: 16px; background-color:red;">
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="btn-auth btn-auth-rev" title="Login">Login</a>
                                <a title="Register" class="btn-auth btn-auth" href="{{route('register')}}">Become a member</a>
                                @endif
                            </div>
                            <!-------------End Responsive display login and register button----------->

                        </div>
                        <!-- /.menu-wrapper -->
                    </nav>
                    <!-- /.site-nav -->
                </div>
                <!-- /.header-inner -->
            </div>
            <!-- /.container-full -->
        </header>
        <!-- /.site-header -->
