



        <!--=========================-->
        <!--=        Navbar         =-->
        <!--=========================-->
        <header class="site-header header-fixed" data-responsive-width="991">
            <div class="header-topbar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-7 col-7">
                            <div class="preheader-left">
                                <a href="mailto:info@codeboxr.com"><strong>Email:</strong> info@codeboxr.com</a>
                                <a href="mailto:info@construc.com"><strong>Hotline:</strong> 880 454 5477</a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-5 col-5 text-end">
                            <div class="preheader-right">

                                <a href="{{ route('home.membershiplogin') }}" class="btn-auth btn-auth-rev" title="Login">Login</a>
                                <a title="Register" class="btn-auth btn-auth" href="{{route('home.membershipregistration')}}">Become a member</a>
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
    <img src="{{ url('upload/' . $getSetting->association_logo) }}" alt="site logo" class="main-logo">
    <img src="{{ url('upload/' . $getSetting->association_logo) }}" alt="site logo" class="logo-sticky">
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
                                        <img src="{{asset('homecss/assets/images/logo/logo.svg')}}" alt="site logo" class="logo-sticky">
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
                                <li><a href="about.html">About</a></li>
                                <li><a href="event.html">Event</a></li>
                                <li><a href="gallery.html">Gallery</a></li>

                                <li class="has-submenu menu-item-depth-0">
                                    <a href="blog.html">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li>
                                            <a href="single-blog.html">Single Blog Right Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="single-blog-leftsidebar.html">Single Bolg Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="single-blog-nosidebar.html">Single Blog No Sidrebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-submenu menu-item-depth-0">
                                    <a href="#">Pages</a>

                                    <ul class="sub-menu">
                                        <li class="has-submenu">
                                            <a href="gallery.html">Gallery</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="gallery.html">Gallery</a>
                                                </li>
                                                <li>
                                                    <a href="single-album.html">Single Album</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="committee.html">Committee</a></li>
                                        <li><a href="directory.html">Directory</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="career.html">Career</a></li>
                                        <li>
                                            <a href="typography.html">Typography</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-depth-0">
                                    <a href="contact.html">Contact</a>
                                </li>



                            </ul>
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
