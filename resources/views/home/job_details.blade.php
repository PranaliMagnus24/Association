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
                        <h1 class="h2">{{ $job->company }}</h1>
                        <p>
                        {{ __('messages.The truthful and honest businessman will be in the company of the Prophets, the truthful ones (Siddeeqeen), and the martyrs (Shuhada) on the Day of Judgment.(Mishkat al-Masabih, Hadith 2828)') }}
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
                <div class="card mb-3 border-0 h-100">
                    <div class="card-body">
                        <div class="row">

                            <!-- Left Side: Job Details -->
                            <div class="col-lg-6">
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
                            @if(!empty($job->exp_req))
                        <div class="col-6 job-detail">
                        <strong><i class="fas fa-briefcase"></i> {{ __('messages.Experience') }}:-</strong>
                        <span>{{ ($job->exp_req ?? '') . ' years' }}</span>

                        </div>
                        @endif
                        <div class="col-6 job-detail">
                            <strong><i class="fas fa-map-marker-alt"></i> {{ __('messages.Location') }}:-</strong>
                            <span>{{ $job->cities->name }}</span>
                        </div>
                        </div>

                        <div class="row">
                        @if(!empty($job->vacancy))
                        <div class="col-6 job-detail">
                            <strong><i class="fa fa-tasks"></i> {{ __('messages.No. Of Position') }}:-</strong>
                            <span>{{ $job->vacancy }}</span>
                        </div>
                        @endif
                        @if(!empty($job->salary))
                        <div class="col-6 job-detail">
                        <strong><i class="fa fa-rupee-sign"></i> {{ __('messages.Salary') }}:-</strong>
                        <span>{{ $job->salary }}</span>

                        </div>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col-6 job-detail">
                        <strong><i class="fa fa-briefcase"></i> {{ __('messages.Job Type') }}:-</strong>

                        <span>{{ $job->job_type }}</span>
                        </div>
                        <div class="col-6 job-detail">
                        <strong><i class="fa fa-laptop-house"></i>{{ __('messages.Job Mode') }}:-</strong>

                        <span>{{ $job->job_mode }}</span>
                        </div>
                        </div>

                        <hr class="job_hr">
                       {{-- <div class="row">
                        <div class=" col-6 job-detail">
                        <strong><i class="fas fa-phone-alt"></i> Contact:-</strong>
                            <span>{{ $job->contact }}</span>
                        </div>
                        <div class="col-6 job-detail">
                        <strong><i class="fas fa-envelope"></i> Email:-</strong>
                            <span>{{ $job->email }}</span>
                        </div>
                        </div>--}}

                        <div class="job-detail">
                        <strong><i class="fas fa-tools"></i> {{ __('messages.Skills') }}:-</strong>
                        <span>{{ strip_tags($job->skill ?? '') }}</span>
                        </div>
                        <hr class="job_hr">
                        <div class="job-detail">
                        <strong><i class="fas fa-file-alt"></i> {{ __('messages.Job Description') }}:-</strong>
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
                            <div class="col-lg-6 mt-3">
                                <div class="card mb-3 border-0">
                                    <div class="card-body">

                                        <!-- Apply Form -->
                                        <div class="p-4 border rounded company-form position-relative">
                                            <!----loader----------->
                                        <div id="formLoader" class="d-none position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white" style="opacity: 0.7;">
                                            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                                <span class="visually-hidden">{{ __('messages.Loading') }} ...</span>
                                            </div>
                                        </div>
                                            <!----end loader---->
                                        <form action="{{ route('job.apply') }}" method="POST" id="JobApply" class="row g-3 needs-validation" enctype="multipart/form-data">
                                            @csrf
                                            <h5 class="fw-normal mb-3 pb-3 text-center text-dark" style="letter-spacing: 1px;"><strong>{{ __('messages.Apply Now') }}</strong></h5>

                                            <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <input type="hidden" name="form_type" value="apply_job">
                                                <input type="hidden" name="company_id" value="{{ $job->company_id }}">
                                                <input type="hidden" name="job_id" value="{{ $job->id }}">
                                                <div class="form-group">
                                                    <label for="cbxname" class="form-label">{{ __('messages.Full Name') }}<span style="color: red">*</span></label>
                                                    <input type="text" name="name" id="cbxname" placeholder="{{ GoogleTranslate::trans('Your Full Name', app()->getLocale()) }}" class="form-control fs-4">
                                                </div>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="cbxphone" class="form-label">{{ __('messages.Contact') }} <span style="color: red">*</span></label>
                                                    <input type="text" name="phone" id="cbxphone" placeholder="{{ GoogleTranslate::trans('Your Phone', app()->getLocale()) }}" class="form-control fs-4">
                                                </div>
                                                @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>


                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxemail" class="form-label">{{ __('messages.Email') }} <span style="color: red">*</span></label>
                                                    <input type="email" name="to" id="cbxemail" placeholder="Your Email" class="form-control fs-4">
                                                </div>
                                                @error('to')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>


                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxsubject" class="form-label">{{ __('messages.Subject') }} <span style="color: red">*</span></label>
                                                    <input type="subject" name="subject" id="cbxsubject" placeholder="{{ GoogleTranslate::trans('Your Subject', app()->getLocale()) }}" class="form-control fs-4">
                                                </div>
                                                @error('subject')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxmessage" class="form-label">{{ __('messages.Message') }}</label>
                                                    <textarea name="message" id="message" rows="10" cols="80" placeholder="{{ GoogleTranslate::trans('Your Message', app()->getLocale()) }}" class="form-control fs-4" style="height: 120px;"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxresume" class="form-label">{{ __('messages.Upload Resume') }} <span style="color: red">*</span></label>
                                                    <input type="file" name="upload_resume" id="cbxresume"  class="form-control fs-4">
                                                </div>
                                                @error('upload_resume')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12 text-center">
                                                <button class="btn btn-primary send-btn fs-4" type="submit">{{ __('messages.Apply') }}</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //Apply Job

    document.getElementById('JobApply').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    // Clear previous validation errors
    const errorMessages = document.querySelectorAll('.text-danger');
    errorMessages.forEach(error => error.remove());

    // Validate the form manually before submitting
    let isValid = true;

    // Validate Name field
    const name = document.getElementById('cbxname');
    if (!name.value.trim()) {
        isValid = false;
        const error = document.createElement('span');
        error.classList.add('text-danger');
        error.innerText = 'Name is required.';
        name.parentElement.appendChild(error);
    }

    // Validate Phone field
    const phone = document.getElementById('cbxphone');
    if (!phone.value.trim() || phone.value.length !== 10) {
        isValid = false;
        const error = document.createElement('span');
        error.classList.add('text-danger');
        error.innerText = 'Phone number is required.';
        phone.parentElement.appendChild(error);
    }

    // Validate Email field
    const email = document.getElementById('cbxemail');
    if (!email.value.trim() || !/\S+@\S+\.\S+/.test(email.value)) {
        isValid = false;
        const error = document.createElement('span');
        error.classList.add('text-danger');
        error.innerText = 'Email is required.';
        email.parentElement.appendChild(error);
    }

    // Validate Resume file
    const resume = document.getElementById('cbxresume');
    if (!resume.files.length) {
        isValid = false;
        const error = document.createElement('span');
        error.classList.add('text-danger');
        error.innerText = 'Resume upload is required.';
        resume.parentElement.appendChild(error);
    }

    // Validate Subject field
    const subject = document.getElementById('cbxsubject');
    if (!subject.value.trim()) {
        isValid = false;
        const error = document.createElement('span');
        error.classList.add('text-danger');
        error.innerText = 'Subject is required.';
        subject.parentElement.appendChild(error);
    }

    // If form is valid, proceed with the AJAX request
    if (isValid) {
        // Show Loader
        document.getElementById('formLoader').classList.remove("d-none");

        fetch("/apply-job", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: formData,
        })
        .then((response) => {
            // Debugging the response
            console.log('Response:', response);
            return response.json();
        })
        .then((data) => {
            console.log('Data:', data); // Check the response data

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
            console.log('Error:', error); // Log the error if any

            swal({
                title: "Error!",
                text: "Something went wrong. Please try again.",
                icon: "error",
                button: "OK",
            });
        })
        .finally(() => {
            // Hide Loader
            document.getElementById('formLoader').classList.add("d-none");
        });
    }
});


</script>
@include('home.includes.footer')

