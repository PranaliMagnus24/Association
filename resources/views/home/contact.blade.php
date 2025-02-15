@include('home.includes.head')
@include('home.includes.navbar')

<style>
    .send-btn {
        height: 50px;
        width: 90px;
        font-size: 16px;
    }
</style>
<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ __('messages.Contact us') }}</h1>
                        <p>
                        {{ __('messages.When you deal with people, be honest, for honesty leads to righteousness, and righteousness leads to Paradise. – Hadith') }}
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
                <h2>{{ __('messages.address') }}</h2>
               <span>{{ $getSetting->address }}</span>
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
                <h2>{{ __('messages.E-mail') }}</h2>
                <span>{{ $getSetting->email }}</span>

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
                <h2>{{ __('messages.Phone') }}</h2>
                <span>{{ $getSetting->phone }}</span>

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
                <h1>{{ __('messages.Location Not Available') }}</h1>
            @endif
                                        <!-- Map Area End -->
                                    </div>



                                    <div class="col-lg-6 m-auto">
                                        <div class="contact-form-wrap position-relative">
                                            <h3>{{ __('messages.Send Message') }}</h3>
                                              <!----loader----------->
                                        <div id="formLoader" class="d-none position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white" style="opacity: 0.7;">
                                            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                                <span class="visually-hidden">{{ __('messages.Loading') }} ...</span>
                                            </div>
                                        </div>
                                            <!----end loader---->
                                            <form action="{{ route('send.email')}}" method="POST" id="contactForm">
                                            @csrf
                                                <div class="row">
                                                    <div class="col">
                                                    <input type="hidden" name="form_type" value="association">
                                                        <div class="form-group">
                                                            <label for="cbxname">{{ __('messages.Name') }} <span style="color: red">*</span></label>
                                                            <input type="text" name="name" id="cbxname" placeholder="{{ GoogleTranslate::trans('Your Full Name', app()->getLocale()) }}" class="form-control">
                                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="cbxemail">{{ __('messages.Phone') }} <span style="color: red">*</span></label>
                                                            <input type="text" name="phone"  id="cbxphone" placeholder="{{ GoogleTranslate::trans('Your Phone', app()->getLocale()) }}" class="form-control">
                                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                            <label for="cbxemail">{{ __('messages.Email') }} <span style="color: red">*</span></label>
                                                            <input type="email" name="to" id="cbxemail" placeholder="{{ GoogleTranslate::trans('Your Email', app()->getLocale()) }}" class="form-control">
                                                            @error('to')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                        </div>
                                                <div class="form-group">
                                                    <label for="cbxsubject">{{ __('messages.Subject') }}</label>
                                                    <input type="text" name="subject" id="cbxsubject" placeholder="{{ GoogleTranslate::trans('Subject', app()->getLocale()) }}" class="form-control">
                                                    @error('subject')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="cbxmessage">{{ __('messages.Message') }}</label>
                                                    <textarea name="message" id="cbxmessage" rows="10" cols="80" placeholder="{{ GoogleTranslate::trans('Your Message', app()->getLocale()) }}" class="form-control" style="height: 120px;"></textarea>
                                                    @error('message')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                </div>
                                                <!-- <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cbxsendme" name="cbxsendme" value="on">
                                                    <label class="custom-control-label" for="cbxsendme">Send Me CC</label>
                                                </div> -->
                                          <div class="col-4">
                                         <button class="btn btn-primary send-btn"  type="submit">{{ __('messages.Send') }}</button>
                                        </div>

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
