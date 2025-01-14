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
                        <h1 class="h2">{{ $companypro->company_name }}</h1>
                     </div>
                  </div>
               </div>
            </div>
         </section>


<section class="job-details section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Card Container without borders -->
                <div class="card mb-3 border-0">
                    <div class="card-body">
                        <div class="row">
                            <!-- Left Side: Company Details -->
                            <div class="col-lg-6">
                                <!-- Company Details Section -->
                                <div class="card mb-3 border-0">
                                    <div class="card-header text-center bg-transparent">
                                        <h6>Company Details</h6>
                                    </div>
                                    <div class="card-body">
                                        <!-- Company Logo -->
                                        <div class="text-center">
                                            <img src="{{ $companypro->company_logo ? url('upload/'.$companypro->company_logo) : url('upload/download.png') }}" alt="Company Logo" style="max-width: 200px; margin-bottom: 20px;">
                                        </div>
                                        <!-- About Company -->
                                        <p>{!! $companypro->about_company !!}</p>
                                    </div>
                                </div>

                                <!-- Address Information -->
                                <div class="card mb-3 border-0">
                                    <div class="card-header text-center bg-transparent">
                                        <h5>Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>{!! $companypro->address_one !!}</p>
                                        <p>{!! $companypro->city !!}</p>
                                    </div>
                                </div>

                                <!-- Services Section -->
                                <div class="card mb-3 border-0">
                                    <div class="card-header text-center bg-transparent">
                                        <h5>Services</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>{!! $companypro->company_type !!}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side: Inquiry Form -->
                            <div class="col-lg-6">
                                <div class="card mb-3 border-0">
                                    <div class="card-header text-center bg-transparent">
                                        <h6>Business Inquiry</h6>
                                    </div>
                                    <div class="card-body">
                                    <form action="{{ route('send.email')}}" method="POST" id="contactForm">
                                    @csrf
                                            <div class="row">
                                                    <div class="col">
                                                    <input type="hidden" name="form_type" value="business">
                                                    <input type="hidden" name="company_id" value="{{ $companypro->id }}">
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

                                          <div class="col-4">
                                         <button class="btn btn-primary send-btn"  type="submit">Send</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center bg-transparent col-2">
                        <a href="{{ route('home.directory') }}" class="btn btn-secondary send-btn">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@include('home.includes.footer')

