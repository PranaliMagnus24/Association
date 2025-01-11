
      @include('home.includes.head')

   <style>
    .large-text {
    font-size: 1.5rem; /* Adjust as needed */
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
.form-control {
        height: 50px;
        font-size: 16px;
    }
   </style>

      @include('home.includes.navbar')
      <div id="main_content" class="main-content">
         <!--==========================-->
         <!--=         Banner         =-->
         <!--==========================-->
         <section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Membership Form</h1>
                        <p>
                           Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!--=         Register        =-->
         <!--===========================-->
<section id="page-content-wrap">
    <div class="register-page-wrapper section-padding">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="register-page-inner">
             <div class="col-lg-8 m-auto">
            <div class="register-form-content">
                <div class="row justify-content-center">
                                    <!-- Signin Area Content Start -->
                <div class="col-lg-12 text-center">
                <div class="display-table">
                                            <div class="display-table-cell">
                                                <div class="signin-area-wrap">
                                                    <h4 class="large-text">Register here!</h4>
                                                    <div class="sign-form">
                                                        <form action="{{ route('membershipregistration.store') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row justify-content-center">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="register_name">First Name <span style="color: red">*</span></label>
                                                                        <input type="text" class="form-control" id="register_name" name="first_name" value="{{ old('first_name') }}">
                                                                        @error('first_name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="middle_name">Middle Name</label>
                                                                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
                                                                        @error('middle_name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="last_name">Last Name <span style="color: red">*</span></label>
                                                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                                                                        @error('last_name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">Mobile No.<span style="color: red">*</span></label>
                                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                                                        @error('phone')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="register_email">Email <span style="color: red">*</span></label>
                                                                        <input type="email" class="form-control" id="register_email" name="email" value="{{ old('email') }}">
                                                                        @error('email')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="register_password">Password <span style="color: red">*</span></label>
                                                                        <input type="password" class="form-control" id="register_password" name="password" value="{{ old('password') }}">
                                                                        @error('password')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="gender form-group">
                                                                        <label class="g-name d-block">Gender</label>
                                                                        <select id="gender" name="gender" class="form-select form-control" aria-label="Default select example" value="{{ old('gender') }}">
                                                                            <option selected>Select gender</option>
                                                                            <option value="male">Male</option>
                                                                            <option value="female">Female</option>
                                                                            <option value="other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group file-input form-control">
                                                                    <label class="custom-file" for="customfile"><i class="fa fa-upload"></i>Upload Your Photo</label>
                                                                        <input type="file" name="profile_pic" id="customfile" class="d-none" value="{{ old('profile_pic') }}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="custom-control custom-checkbox float-lg-right">

                                                                        <label class="custom-control-label" for="customCheck1"> I have read and agree to the <a href="#">M.I.M.A</a> Terms of Service</label>
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <input type="submit" class="btn btn-reg" value="Registration">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Signin Area Content End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
         <!----footer------>
         @include('home.includes.footer')
      </div>

