
@include('home.includes.head')
@include('home.includes.navbar')

<style>
        .registration-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4A90E2;
        }
        p {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="email"], input[type="text"], input[type="file"] {
            font-size: 14px;
        }
        select {
            font-size: 14px;
        }
        textarea {
            height: 120px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4A90E2;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #357ABD;
        }
        small {
            font-size: 12px;
            color: #888;
        }
        a {
            color: #4A90E2;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .info {
            font-size: 14px;
            margin-bottom: 20px;
            background-color: #F8F8F8;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #E1E1E1;
        }
        .info strong {
            color: #333;
        }
        .form-section {
            margin-bottom: 20px;
        }
    </style>


<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">{{ __('messages.Upload CV') }}</h1>
                    <p>
                        {{ __('messages.The truthful and honest businessman will be in the company of the Prophets, the truthful ones (Siddeeqeen), and the martyrs (Shuhada) on the Day of Judgment.(Mishkat al-Masabih, Hadith 2828)') }}
                    </p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="page-content-wrap">
    <div class="registration-form py-5 bg-light mt-5 mb-5">
        <div class="container">
            <form id="registrationForm" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="form-section">
                    <label for="name">{{ __('messages.Name') }} <span style="color: red;">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('messages.Enter your name') }}">
                    <span class="text-danger error" id="nameError"></span>
                </div>

                <!-- Email -->
                <div class="form-section">
                    <label for="email">{{ __('messages.Email') }} <span style="color: red;">*</span></label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="{{ __('messages.Enter your email') }}">
                    <span class="text-danger error" id="emailError"></span>
                </div>

                <!-- Phone -->
                <div class="form-section">
                    <label for="phone">{{ __('messages.Phone') }} <span style="color: red;">*</span></label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="{{ __('messages.Enter your phone number') }}">
                    <span class="text-danger error" id="phoneError"></span>
                </div>

                <!-- Qualification -->
                <div class="form-section">
                    <label for="qualification">{{ __('messages.Qualification') }} <span style="color: red;">*</span></label>
                    <input type="text" id="qualification" name="qualification" class="form-control" placeholder="{{ __('messages.Enter your qualification') }}">
                    <span class="text-danger error" id="qualificationError"></span>
                </div>

                <!-- Experience -->
                <div class="form-section">
                    <label for="experience">{{ __('messages.Experience') }}</label>
                    <input type="text" id="experience" name="experience" class="form-control" placeholder="{{ __('messages.Enter your experience') }}">
                    <span class="text-danger error" id="experienceError"></span>
                </div>

                <!-- Skills -->
                <div class="form-section">
                    <label for="skills">{{ __('messages.Skills') }} <span style="color: red;">*</span></label>
                    <input type="text" id="skills" name="skills" class="form-control" placeholder="{{ __('messages.Enter your skills') }}">
                    <span class="text-danger error" id="skillsError"></span>
                </div>

                <!-- Preferred Job Location -->
                <div class="form-section">
                    <label for="joblocation">{{ __('messages.Preferred Job Location') }}</label>
                    <input type="text" id="joblocation" name="joblocation" class="form-control" placeholder="{{ __('messages.Add Location') }}">
                    <span class="text-danger error" id="joblocationError"></span>
                </div>

                <!-- Resume Upload -->
                <div class="form-section">
                    <label for="upload_resume">{{ __('messages.Upload Resume') }} <span style="color: red;">*</span></label>
                    <input type="file" id="upload_resume" name="upload_resume" class="form-control" accept=".pdf,.doc,.docx">
                    <span class="text-danger error" id="upload_resumeError"></span>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="submitBtn">{{ __('messages.Submit') }}</button>
            </form>
        </div>
    </div>
</section>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#registrationForm').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            $('.error').text(''); // clear error messages

            $.ajax({
                url: "{{ route('registration.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $('#registrationForm')[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Thank you for your registration!',
                            showConfirmButton: true,
                        });
                    }
                },
                error: function(response) {
                    let errors = response.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#' + key + 'Error').text(value[0]);
                    });
                }
            });
        });
    });
</script>





@include('home.includes.footer')
