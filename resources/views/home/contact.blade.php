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
                        <h1 class="h2">Contact us</h1>
                        <p>
                        When you deal with people, be honest, for honesty leads to righteousness, and righteousness leads to Paradise. – Hadith
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
                                            <form action="{{ route('send.email')}}" method="POST" id="contactForm">
                                            @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="cbxname">Name</label>
                                                            <input type="text" name="name" required id="cbxname" placeholder="Your Full Name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="cbxemail">Phone</label>
                                                            <input type="text" name="phone" required id="cbxphone" placeholder="Your Phone" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                            <label for="cbxemail">Email</label>
                                                            <input type="email" name="to" required id="cbxemail" placeholder="Your Email" class="form-control">
                                                        </div>
                                                <div class="form-group">
                                                    <label for="cbxsubject">Subject</label>
                                                    <input type="text" name="subject" id="cbxsubject" placeholder="Subject" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="cbxmessage">Message</label>
                                                    <textarea name="message" id="message" rows="10" cols="80" placeholder="Your Message" class="form-control"></textarea>
                                                </div>
                                                <!-- <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cbxsendme" name="cbxsendme" value="on">
                                                    <label class="custom-control-label" for="cbxsendme">Send Me CC</label>
                                                </div> -->
                                          <div class="col-4">
                                         <button class="btn btn-primary send-btn"  type="submit">Send</button>
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


        <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
<script>
    document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    fetch("{{ route('send.email') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {

                swal({
                    title: "Success!",
                    text: data.message,
                    icon: "success",
                    button: "OK",
                }).then(() => {
                    form.reset();
                });
            } else {

                swal({
                    title: "Error!",
                    text: data.message,
                    icon: "error",
                    button: "OK",
                });
            }
        })
        .catch((error) => {

            swal({
                title: "Error!",
                text: "Something went wrong. Please try again.",
                icon: "error",
                button: "OK",
            });
        });
});

</script>


         @include('home.includes.footer')
