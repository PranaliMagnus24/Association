<!----------------------------Navbar---------------------->

<body id="home-v1" class="home-page-one" data-style="default">
    <!------------script for visitor count in google tracker---------->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W93SVR4V" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!----------------header----------------->
        <header class="site-header header-fixed" data-responsive-width="991">
            <!--------------------Top bar--------------->
            <div class="header-topbar">
                <div class="container">
                    <div class="row align-items-center">
                        @php
                        $getSetting = \App\Models\GeneralSetting::first();
                        @endphp
                        @if($getSetting)
                        <div class="col-lg-6 col-sm-7 col-7">
                            <div class="preheader-left">
                                <a href="mailto:{{ $getSetting->email }}">
                                    <strong>{{ __('messages.Email') }}:</strong> {{ $getSetting->email }}
                                </a>
                                <a href="tel:{{ $getSetting->phone }}">
                                    <strong>{{ __('messages.Hotline') }}:</strong> {{ $getSetting->phone }}
                                </a>
                            </div>
                        </div>
                        @else
                        <h1>Association</h1>
                        @endif
                        <div class="col-lg-6 col-sm-5 col-5 text-end">
                            <div class="preheader-right">
                                @if(Auth::check())
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-primary dropdown-toggle fs-4" type="button" id="userDropdown" data-bs-auto-close="true" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ ucfirst(Auth::user()->name) }}

                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                        <li>
                                            @if(Auth::user()->role === 'admin')
                                            <a class="dropdown-item fs-4" href="{{ url('/admin/dashboard') }}">{{ __('messages.My Profile') }}</a>
                                            @else
                                            <a class="dropdown-item fs-4" href="{{ url('/member') }}">{{ __('messages.My Profile') }}</a>
                                            @endif
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-danger fs-4">{{ __('messages.Logout') }}</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <a href="{{ route('login') }}" class="btn-auth btn-auth-rev" title="Login">{{ __('messages.Login') }}</a>
                                <a title="Register" class="btn-auth btn-auth" href="{{ route('register') }}">{{ __('messages.Become a member') }}</a>
                                @endif
                                <div class="language-selector d-inline-block">
                                    <select class="form-select changeLang" style="width: 100px; height: 39px; line-height: 12px;">
                                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                                        <option value="ur" {{ session()->get('locale') == 'ur' ? 'selected' : '' }}>Urdu</option>
                                        <option value="hi" {{ session()->get('locale') == 'hi' ? 'selected' : '' }}>Hindi</option>
                                        <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                                        <option value="mr" {{ session()->get('locale') == 'mr' ? 'selected' : '' }}>Marathi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.End header-topbar -->
             <div class="container">
                <div class="header-inner">
                    <nav id="site-navigation" class="main-nav">
                        <div class="site-logo">
                            @php
                            $getSetting = \App\Models\GeneralSetting::first();
                            @endphp
                            @if($getSetting)
                            <a href="{{route('home.index')}}" class="logo">
                                <img src="{{ url('upload/general_setting/' . $getSetting->header_logo) }}" alt="site logo" class="main-logo">
                                <img src="{{ url('upload/general_setting/' . $getSetting->header_logo) }}" alt="site logo" class="logo-sticky">
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
                                    <a href="{{url('/')}}">
                                        <img src="{{ url('upload/general_setting/' . $getSetting->header_logo) }}" alt="site logo" class="logo-sticky">
                                    </a>
                                </div>

                                <div class="close-menu" id="page-close-main-menu">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>

                            <ul class="codeboxr-main-menu">
                                <li>
                                    <a href="{{url('/')}}">{{ __('messages.Home') }}</a>
                                </li>
                                <li class="has-submenu menu-item-depth-0">
                                    <a href="javascript:void(0)">{{ __('messages.About') }}</a>
                                    <ul class="sub-menu">
                                    <li><a href="{{route('home.about')}}">{{ __('messages.History') }}</a></li>
                                    <li><a href="{{route('home.committee')}}">{{ __('messages.Committee') }}</a></li>
                                    <li><a href="{{route('home.associate')}}">{{ __('messages.Our Associates') }}</a></li>
                                    </ul>
                                </li>
                                {{-- <li><a href="{{route('home.directory')}}">{{ __('messages.Directory') }}</a></li>--}}
                                <li><a href="{{route('directory.list')}}">{{ __('messages.Directory') }}</a></li>
                                 <li><a href="{{route('home.jobs')}}">{{ __('messages.Jobs') }}</a></li>
                                 <li><a href="{{route('home.events')}}">{{ __('messages.Events') }}</a></li>
                                 <li><a href="{{ route('home.gallery')}}">{{ __('messages.Gallery') }}</a></li>
                                 <li><a href="{{ route('home.islamictijarat')}}">{{ __('messages.Islamic Tijarat') }}</a></li>
                                <li class="menu-item-depth-0">
                                    <a href="{{ route('home.contact')}}">{{ __('messages.Contact') }}</a>
                                </li>
                                <li class="menu-item-depth-0">
                                    <a href="{{ route('registration.index')}}">{{ __('messages.Upload CV') }}</a>
                                </li>
                            </ul>
                            <!-------------Responsive display login and register button----------->
                            <div class="mobile-auth-buttons">
                                @if(Auth::check())
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-primary dropdown-toggle fs-4" type="button" id="userDropdown" data-bs-auto-close="true" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ ucfirst(Auth::user()->name) }}

                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                        <li>
                                            @if(Auth::user()->role === 'admin')
                                            <a class="dropdown-item fs-4" href="{{ url('/admin/dashboard') }}">{{ __('messages.My Profile') }}</a>
                                            @else
                                            <a class="dropdown-item fs-4" href="{{ url('/member') }}">{{ __('messages.My Profile') }}</a>
                                            @endif
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-danger fs-4">{{ __('messages.Logout') }}</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <a href="{{ route('login') }}" class="btn-auth btn-auth-rev" title="Login">{{ __('messages.Login') }}</a>
                                <a title="Register" class="btn-auth btn-auth" href="{{ route('register') }}">{{ __('messages.Become a member') }}</a>
                               {{-- <a title="Register" class="btn-auth btn-auth" href="{{ route('home.membership') }}">{{ __('messages.Become a member') }}</a>--}}
                                @endif
                                <div class="language-selector mt-3">
                                    <select class="form-select changeLang">
                                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                                        <option value="ur" {{ session()->get('locale') == 'ur' ? 'selected' : '' }}>Urdu</option>
                                        <option value="hi" {{ session()->get('locale') == 'hi' ? 'selected' : '' }}>Hindi</option>
                                        <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                                        <option value="mr" {{ session()->get('locale') == 'mr' ? 'selected' : '' }}>Marathi</option>
                                    </select>
                                </div>
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
        <script type="text/javascript">
        var url = "{{ route('changeLang') }}"; // Fetches the route for changing the language.

        $(".changeLang").change(function() {
            var selectedLang = $(this).val();

            // Change the text direction based on the selected language
            if (selectedLang === "ar" || selectedLang === "ur") {
                $("html").attr("dir", "rtl"); // Right to Left direction for Arabic/Urdu
            } else {
                $("html").attr("dir", "ltr"); // Left to Right direction for other languages
            }

            // Redirect to change the language
            window.location.href = url + "?lang=" + selectedLang; // Redirects to the appropriate language URL.
        });


        $(document).ready(function(){
        $(document).on('click', function (e) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').removeClass('show');
            }
        });

        $('.dropdown-toggle').dropdown();
    });
    </script>
