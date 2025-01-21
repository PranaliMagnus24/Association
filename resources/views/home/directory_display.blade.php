@include('home.includes.head')
@include('home.includes.navbar')

<style>
 .send-btn {
        height: 50px;
        width: 90px;
        font-size: 16px;
    }


     .large-text {
 font-size: 1.5rem; /* Adjust as needed */
}
    .form-control {
     height: 50px;
     font-size: 16px;
 }
 .large-input {
 font-size: 1.2rem; /* Adjust as needed */
 padding: 10px; /* Adjust as needed */
}

.large-button {
 font-size: 1.2rem; /* Adjust as needed */
 padding: 10px; /* Adjust as needed */
}
select.form-select {
width: 100%;
padding: 10px;
border: 1px solid #ced4da;
border-radius: 0.25rem;
font-size: 15px !important;
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
                                <div class="card mb-3 border-0">
                                    <div class="card-body">
                                        <div class="card text-center" style="width: 100%; max-width: 400px; margin: 20px auto; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                            <div class="card-body">
                                                <img
                                                    src="{{ $companypro->company_logo ? url('upload/'.$companypro->company_logo) : url('upload/download.png') }}"
                                                    alt="Company Logo"
                                                    class="img-fluid mb-3"
                                                    style="max-width: 250px; border-radius: 5px; max-height: 250px;"
                                                >
                                                <hr class="my-3" style="border-top: 2px solid #ddd; width: 80%; margin: 0 auto;">
                                                <h5 class="card-title mt-3 text-info">{{ $companypro->company_name }}</h5>
                                            </div>
                                        </div>
                                 <!------------Address------------->
                                 <div class="card text-center" style="width: 100%; max-width: 400px; margin: 20px auto; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                    <div class="card-body">
                                        <p class="card-text mt-3" style="font-size: 16px; color: #555;">
                                            <strong>Address</strong> <br>
                                            {{ $companypro->address_one }} <br><br>{{ $companypro->cities->name }},
                                            {{ $companypro->states->name }},
                                            {{ $companypro->countries->name }}
                                        </p>
                                    </div>
                                </div>
                                <!----------End Address------>
                                 <!------------Technology------------->
                                 <div class="card text-center" style="width: 100%; max-width: 400px; margin: 20px auto; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                    <div class="card-body">
                                    <p class="card-text mt-3" style="font-size: 16px; color: #555;">
                                     <strong>Services/Expertise</strong> <br>
                                  @if(!empty($companypro->technologies) && is_array(json_decode($companypro->technologies, true)))
                                    <p>{{ implode(', ', json_decode($companypro->technologies, true)) }}</p>
                                     @else
                                 <p>No technologies selected</p>
                               @endif
                                 </p>

                                    </div>
                                </div>
                                <!----------End technology------>
                            </div>
                        </div>
                    </div>

                            <!-- Right Side: Inquiry Form -->
                            <div class="col-lg-6">
                                <div class="card mb-3 border-0">
                                    <div class="card-body">
                                        <!-- About Company -->
                                        <div class="mt-4">
                                            <p>{!! $companypro->about_company !!}</p>
                                        </div>

                                        <!-- Contact Form -->
                                        <div class="p-4 border rounded" style="width: 600px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                        <form action="{{ route('send.email') }}" method="POST" id="contactForm" class="row g-3 needs-validation">
                                            @csrf
                                            <h5 class="fw-normal mb-3 pb-3 text-center text-info" style="letter-spacing: 1px;">Send a Business Inquiry</h5>

                                            <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <input type="hidden" name="form_type" value="business">
                                                <input type="hidden" name="company_id" value="{{ $companypro->id }}">
                                                <div class="form-group">
                                                    <label for="cbxname" class="form-label">Name <span style="color: red">*</span></label>
                                                    <input type="text" name="name" id="cbxname" placeholder="Your Full Name" class="form-control fs-4">
                                                </div>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="cbxphone" class="form-label">Phone <span style="color: red">*</span></label>
                                                    <input type="text" name="phone" id="cbxphone" placeholder="Your Phone" class="form-control fs-4">
                                                </div>
                                                @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxemail" class="form-label">Email <span style="color: red">*</span></label>
                                                    <input type="email" name="to" id="cbxemail" placeholder="Your Email" class="form-control fs-4">
                                                </div>
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxsubject" class="form-label">Subject</label>
                                                    <input type="text" name="subject" id="cbxsubject" placeholder="Subject" class="form-control fs-4">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxmessage" class="form-label">Message</label>
                                                    <textarea name="message" id="message" rows="10" cols="80" placeholder="Your Message" class="form-control fs-4" style="height: 120px;"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 text-center">
                                                <button class="btn btn-primary send-btn fs-4" type="submit">Send</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card-footer text-center bg-transparent">
                        <a href="{{ route('home.directory') }}" class="btn btn-secondary send-btn">Back</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.includes.footer')

