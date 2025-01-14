
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
                                    <img src="{{ url('upload/' . $getSetting->association_logo) }}" alt="Logo" style="max-width: 130px; background-color:#fff;">

                                        @else
                                     <h1>Association</h1>
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
                                <h4 class="widget-title">Get In Touch</h4>
                                <div class="widgei-body">
                                    <p>
                                    May Allah show mercy to a man who is generous when he buys, sells, and demands his due.
                                    </p>
                                    <div class="newsletter-form">
                                    <a href="tel:{{ $getSetting->phone }}">Phone: {{ $getSetting->phone }}</a><br>
                                        <!-- <a href="#">Fax: +88474 156 362</a> <br> -->
                                        <a href="mailto:{{ $getSetting->email }}">Email: {{ $getSetting->email }}</a>
                                        <!-- <form id="cbx-subscribe-form">
                                            <input name="email" type="email" placeholder="Enter Your Email" id="subscribe" required>
                                            <button type="submit">
                                                <i class="far fa-paper-plane"></i>
                                            </button>

                                            <p id="cbx-subscribe-form-error"></p>
                                        </form> -->
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
                                        <li><a href="{{route('home.about')}}">About</a></li>
                                        <li><a href="{{route('home.directory')}}">Directory</a></li>
                                        <li><a href="{{route('home.contact')}}">Contact</a></li>
                                        <li><a href="{{route('home.gallery')}}">Gallery</a></li>
                                        <li><a href="{{route('home.committee')}}">Committee</a></li>
                                        <li><a href="{{route('home.faq')}}">FAQ</a></li>
                                        <li><a href="javascript:void(0)">Term's & Condition</a></li>
                                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
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
                                <p> &#xA9; <?=date("Y") ?> All Rights Reserved by Muslim Industrialists and Merchants Association (MIMA). Design and Developed By  <a href="https://magnusideas.com" target="_blank">Magnus Ideas Pvt. Ltd.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            @if(Route::is('home.index'))
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--         <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body text-center">
        <img src="{{asset('homecss/assets/images/about-page/2.jpg')}}" alt="" class="w-100">

      </div>
      <div class="modal-footer">
        <!--         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>
            <!-- Footer Bottom End -->
            @endif
        </footer>




    <!-- /#site -->


    <!-- Dependency Scripts -->

    <script class="script-js" src="{{asset('homecss/assets/vendors/jquery/jquery.min.js')}}"></script>
    <script class="script-js" src="{{asset('homecss/assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

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
    <script src="{{asset('homecss/assets/js/app.js')}}"></script>

