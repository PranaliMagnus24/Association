<style>
    .close{
        float: right;
        font-size: 30px;
        font-weight: 700;
        line-height: 1;
        border:none;
        background-color:#fff;
        color: #051441;
        text-shadow: 0 1px 0 #fff;
        filter: alpha(opacity = 20);
        opacity: .2;
    }

</style>
<!--=========================-->
        <!--=        Footer         =-->
        <!--=========================-->
        <footer id="footer-area">
            <!-- Footer Widget Start -->
            <div class="footer-widget section-padding">
                <div class="container">
                    <div class="row">
                        <!-- Single Widget Start -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-widget-wrap">

                            @php
                       $getSetting = \App\Models\GeneralSetting::first();
                         @endphp
                                <div class="widgei-body">
                                    <div class="footer-about">
                                    @if($getSetting)
                                    <img src="{{ url('upload/general_setting/' . $getSetting->footer_logo) }}" alt="Logo" style="max-width: 130px; background-color:#fff;">

                                        @else
                                     <h1>{{ __('messages.Association') }}</h1>
                                    @endif

                                        <p>
                                        {{ $getSetting->description }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Widget End -->

                        <!-- Single Widget Start -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-widget-wrap">
                                <h4 class="widget-title">{{ __('messages.Get In Touch') }}</h4>
                                <div class="widgei-body">
                                    <p>
                                    {{ __('messages.May Allah show mercy to a man who is generous when he buys, sells, and demands his due.') }}
                                    </p>
                                    <div class="newsletter-form">
                                    <a href="tel:{{ $getSetting->phone }}">{{ __('messages.Phone') }} : {{ $getSetting->phone }}</a><br>
                                        <!-- <a href="#">Fax: +88474 156 362</a> <br> -->
                                        <a href="mailto:{{ $getSetting->email }}">{{ __('messages.Email') }} : {{ $getSetting->email }}</a>

                                    </div>
                                    <div class="footer-social-icons">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-vimeo-v"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Widget End -->

                        <!-- Single Widget Start -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-widget-wrap">
                                <h4 class="widget-title">{{ $getSetting->association_name }}</h4>
                                <div class="widgei-body">
                                    <ul class="double-list footer-list clearfix">
                                        <li><a href="{{route('home.about')}}">{{ __('messages.About') }}</a></li>
                                        <li><a href="{{route('home.directory')}}">{{ __('messages.Directory') }}</a></li>
                                        <li><a href="{{route('home.contact')}}">{{ __('messages.Contact') }}</a></li>
                                        <li><a href="{{route('home.gallery')}}">{{ __('messages.Gallery') }}</a></li>
                                        <li><a href="{{route('home.committee')}}">{{ __('messages.Committee') }}</a></li>
                                        <li><a href="{{route('home.faq')}}">{{ __('messages.FAQ') }}</a></li>
                                        <li><a href="javascript:void(0)">{{ __('messages.Terms & Condition') }}</a></li>
                                        <li><a href="javascript:void(0)">{{ __('messages.Privacy Policy') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Widget End -->

                        <!-- Single Widget Start -->
                        <!-- <div class="col-lg-2 col-sm-6">
                            <div class="single-widget-wrap">
                                <h4 class="widget-title">{{ $getSetting->association_name }}</h4>
                                <div class="widgei-body">
                                    <ul class="footer-list clearfix">
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Directory</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Gallery</a></li>
                                        <li><a href="#">Committee</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">T & C</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- Single Widget End -->
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Bottom Start -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="footer-bottom-text">
                            <p> &#xA9; <?=date("Y") ?> {{ __('messages.All Rights Reserved by Muslim Industrialists and Merchants Association (MIMA). Design and Developed By') }}  <a href="https://magnusideas.com" target="_blank">{{ __('messages.Magnus Ideas Pvt. Ltd.') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<!-----Popup Image ------>
            @if(Route::is('home.index'))
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-center">
        <img src="{{asset('homecss/assets/images/about-page/2.jpg')}}" alt="" class="w-100">

      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
@endif
<!--Popup Image end---->
             <!-- Footer Bottom End -->
        </footer>

    <!-- Dependency Scripts -->

    {{--<script class="script-js" src="{{asset('homecss/assets/vendors/jquery/jquery.min.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script class="script-js" src="{{asset('homecss/assets/vendors/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/isotope/isotope.pkgd.min.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/jquery-waypoints/jquery.waypoints.min.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/smooth-scroll/jquery.smooth-scroll.min.js')}}"></script>
    <!-- <script class="script-js" src="{{asset('homecss/assets/vendors/nice-select/jquery.nice-select.min.js')}}"></script> -->
    <script class="script-js" src="{{asset('homecss/assets/vendors/countdown/jquery.countdown.min.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/jquery-validate/jquery.validate.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/awesome-notifications/index.var.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>


    <!-- Site Scripts -->
    <script src="{{asset('homecss/assets/js/app.js')}}?@php echo time(); @endphp"></script>
    <script src="{{ asset('vendor/smart-ads/js/smart-banner.min.js') }}"></script>

    </body>

</html>
