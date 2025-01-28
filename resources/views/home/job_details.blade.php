@include('home.includes.head')
@include('home.includes.navbar')
<style>
    .job-detail {
    display: flex;
    margin-bottom: 10px;
}

.job-detail strong {
    width: 150px; /* Adjust as per your label width requirement */
    text-align: left;
}

.job-detail span {
    flex: 1;
    text-align: left;
}

.company-form {
               width: 100%;
               max-width: 600px;
               border: 1px solid #ddd;
               box-shadow: 0 4px 8px rgba(0,0,0,0.1);
           }

           @media (min-width: 768px) {
               .company-form {
                   width: 600px;
               }
           }
           .job_details{
               width: 100%;
               max-width: 600px;
               margin: 12px auto; /* Default: Center alignment for small screens */
               border: 1px solid #ddd;
               box-shadow: 0 4px 8px rgba(0,0,0,0.1);
               /* margin-left: -182px; */
           }
           @media (min-width: 768px) {
               .job_details {
                   width: 600px;
                   margin-left: -182px; /* Left alignment for desktop */
        margin-right: 0; /* Ensure it doesn't center */
               }
            }

            .job_hr {
    border: none; /* Removes default border style */
    height: 2px; /* Sets the thickness of the hr */
    background-color: #000; /* Sets the color of the hr */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Adds shadow to the hr */
    margin: 20px 0; /* Adjusts spacing around the hr */
}


</style>

<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{$job->company}}</h1>
                        <p>
                        The truthful and honest businessman will be in the company of the Prophets, the truthful ones (Siddeeqeen), and the martyrs (Shuhada) on the Day of Judgment.
                        (Mishkat al-Masabih, Hadith 2828)
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>


         <section class="job-details section-padding mt-0">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Card Container without borders -->
                <div class="card mb-3 border-0">
                    <div class="card-body">
                        <div class="row">

                            <!-- Left Side: Job Details -->
                            <div class="col-lg-6 mb-4">
    <div class="card mb-3 border-0">
        <div class="card-body">
            <div class="card text-center job_details">
                <div class="card-body">
                <h5 class="card-title mt-3 text-dark text-start"><strong>{{ $job->job_title }}</strong></h5>
                <div class="job-detail">
               <span> <i class="fas fa-building"></i>&nbsp;{{ $job->company }}</span>

                        </div>
                <hr class="job_hr"><br>
                    {{--<p class="card-text mt-3" style="font-size: 16px; color: #555;">
                        <strong>Job Details </strong>
                    </p>--}}

                    <div class="card-text text-left">
                        <div class="row">
                        <div class="col-6 job-detail">
                        <strong><i class="fas fa-briefcase"></i> Experience:-</strong>

                            <span>{{ $job->exp_req }}</span>
                        </div>
                        <div class="col-6 job-detail">
                            <strong><i class="fas fa-map-marker-alt"></i> Location:-</strong>
                            <span>{{ $job->cities->name }}</span>
                        </div>
                        </div>

                        <hr class="job_hr">
                        <div class="row">
                        <div class=" col-6 job-detail">
                        <strong><i class="fas fa-phone-alt"></i> Contact:-</strong>
                            <span>{{ $job->contact }}</span>
                        </div>
                        <div class=" col-6 job-detail">
                        <strong><i class="fas fa-envelope"></i> Email:-</strong>
                            <span>{{ $job->email }}</span>
                        </div>
                        </div>

                        <div class="job-detail">
                        <strong><i class="fas fa-tools"></i> Skills:-</strong>
                            <span>{{ strip_tags($job->skill) }}</span>
                        </div>
                        <hr class="job_hr">
                        <div class="job-detail">
                        <strong><i class="fas fa-file-alt"></i> Job Description:-</strong>
                            <span>{!! $job->job_desc !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    <!----------Job Details End----------->

                            <!-- Right Side: Inquiry Form -->
                            <div class="col-lg-6 m-auto">
                                <div class="card mb-3 border-0">
                                    <div class="card-body">

                                        <!-- Apply Form -->
                                        <div class="p-4 border rounded company-form">
                                        <form action="{{ route('job.apply') }}" method="POST" id="JobApply" class="row g-3 needs-validation" enctype="multipart/form-data">
                                            @csrf
                                            <h5 class="fw-normal mb-3 pb-3 text-center text-dark" style="letter-spacing: 1px;"><strong>Apply Now</strong></h5>

                                            <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <input type="hidden" name="form_type" value="apply_job">
                                                <input type="hidden" name="company_id" value="{{ $job->company_id }}">
                                                <input type="hidden" name="job_id" value="{{ $job->id }}">
                                                <div class="form-group">
                                                    <label for="cbxname" class="form-label">Full Name<span style="color: red">*</span></label>
                                                    <input type="text" name="name" id="cbxname" placeholder="Your Full Name" class="form-control fs-4">
                                                </div>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="cbxphone" class="form-label">Contact No. <span style="color: red">*</span></label>
                                                    <input type="text" name="phone" id="cbxphone" placeholder="Your Phone" class="form-control fs-4">
                                                </div>
                                                @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>


                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxemail" class="form-label">Email <span style="color: red">*</span></label>
                                                    <input type="email" name="to" id="cbxemail" placeholder="Your Email" class="form-control fs-4">
                                                </div>
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>


                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxsubject" class="form-label">Subject <span style="color: red">*</span></label>
                                                    <input type="subject" name="subject" id="cbxsubject" placeholder="Your Subject" class="form-control fs-4">
                                                </div>
                                                @error('subject')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxmessage" class="form-label">Message</label>
                                                    <textarea name="message" id="message" rows="10" cols="80" placeholder="Your Message" class="form-control fs-4" style="height: 120px;"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxsubject" class="form-label">Upload Resume</label>
                                                    <input type="file" name="upload_resume" id="cbxsubject"  class="form-control fs-4">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12 text-center">
                                                <button class="btn btn-primary send-btn fs-4" type="submit">Apply</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                         <!------------------End apply form-------------------------->
                                    </div>
                                </div>
                            </div>
                              <!-- End Right Side: Inquiry Form -->
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>


<script>
    //Apply Job

    document.getElementById('JobApply').addEventListener('submit', function (e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);

        fetch("/apply-job", {
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

