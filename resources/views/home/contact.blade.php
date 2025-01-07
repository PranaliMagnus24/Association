@include('home.includes.head')
@include('home.includes.navbar')


<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Contact us</h1>
                        <p>
                           Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
<!--=============================-->
        <!--=         Contact Us        =-->
        <!--=============================-->
        <section id="page-content-wrap">
            <div class="contact-page-wrap section-padding">
                <div class="container">
                @php
                       $getSetting = \App\Models\GeneralSetting::first();
                         @endphp
                <div class="row">
        <div class="col-md-4">
          <div class="contact-info">
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fas fa-map-marked"></i>
              </div>
              <div class="contact-info-text">
                <h2>address</h2>
               <span>{{$getSetting->address}}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-info">
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="contact-info-text">
                <h2>E-mail</h2>
                <span>{{$getSetting->email}}</span>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-info">
            <div class="contact-info-item">
              <div class="contact-info-icon">
                <i class="fas fa-clock"></i>
              </div>
              <div class="contact-info-text">
                <h2>Phone</h2>
                <span>{{$getSetting->phone}}</span>

              </div>
            </div>
          </div>
        </div>
      </div><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-content-inner">
                            @php
                       $getSetting = \App\Models\GeneralSetting::first();
                        @endphp

                                 <div class="row">
                                    <div class="col-lg-5">
                                        <!-- Map Area Start -->
                                        @if($getSetting && $getSetting->location_url)
                                        <div class="map-area-wrap">
                                        <iframe src="{{$getSetting->location_url}}"></iframe>
                                        </div>
                                        @else
                <h1>Location Not Available</h1>
            @endif
                                        <!-- Map Area End -->
                                    </div>



                                    <div class="col-lg-6 m-auto">
                                        <div class="contact-form-wrap">
                                            <h3>Send Message</h3>
                                            <form action="#" id="cbx-contact-form">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="cbxname">Name</label>
                                                            <input type="text" name="cbxname" required id="cbxname" placeholder="Your Full Name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="cbxemail">Email</label>
                                                            <input type="email" name="cbxemail" required id="cbxemail" placeholder="Your Email" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="cbxsubject">Subject</label>
                                                    <input type="text" name="cbxsubject" id="cbxsubject" placeholder="Subject" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="cbxmessage">Message</label>
                                                    <textarea name="cbxmessage" id="cbxmessage" rows="10" cols="80" placeholder="Your Message" class="form-control"></textarea>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cbxsendme" name="cbxsendme" value="on">
                                                    <label class="custom-control-label" for="cbxsendme">Send Me CC</label>
                                                </div>

                                                <button class="btn btn-reg">Send</button>
                                                <div id="cbx-formalert"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


         @include('home.includes.footer')
