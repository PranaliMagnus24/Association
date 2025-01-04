<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.layouts.head')
   </head>
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
   </style>
   <body id="home-v1" class="home-page-one" data-style="default">
      <a href="#" class="scroll-top">
      <i class="fa fa-angle-up"></i>
      </a>
      @include('home.layouts.navbar')
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
                           <div class="col-lg-10 m-auto">
                              <div class="register-form-content">
                                 <div class="row justify-content-between">
                                    <!-- Signin Area Content Start -->
                                    <div class="col-lg-4 col-md-6 text-center">
    <div class="display-table">
        <div class="display-table-cell">
            <div class="signin-area-wrap">
                <h4 class="large-text">Already a Member?</h4>
                <div class="sign-form">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="Enter your Email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-control large-input">
                        @error('email')
                                      <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <input type="password" name="password" class="form-control large-input" id="yourPassword" required autocomplete="current-password">
                        @error('password')
                                      <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <x-primary-button class="btn btn-primary w-100 large-button">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                                    <!-- Signin Area Content End -->
                                    <!-- Regsiter Form Area Start -->
                                    <div class="col-lg-7 col-md-6 ml-auto">
                                       <div class="register-form-wrap">
                                          <h3>registration Form</h3>
                                          <div class="register-form">
                                          <form action="{{ route('membershipregistration.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                             <div class="row">
                                                   <div class="col-12 col-sm-6">
                                                      <div class="form-group">
                                                         <label for="register_name">First Name <span style="color: red">*</span> </label>
                                                         <input type="text" class="form-control" id="register_name" name="first_name" value="{{ old('first_name')}}">
                                                         @error('first_name')
                                      <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                      <div class="form-group">
                                                         <label for="middle_name">Middle Name</label>
                                                         <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name')}}">
                                                         @error('middle_name')
        <span class="text-danger">{{ $message }}</span>
         @enderror
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-12 col-sm-6">
                                                      <div class="form-group">
                                                         <label for="last_name">Last Name <span style="color: red">*</span> </label>
                                                         <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name')}}">
                                                         @error('last_name')
        <span class="text-danger">{{ $message }}</span>
         @enderror
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                      <div class="form-group">
                                                         <label for="phone">Mobile No.<span style="color: red">*</span> </label>
                                                         <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone')}}">
                                                         @error('phone')
        <span class="text-danger">{{ $message }}</span>
         @enderror
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-12 col-sm-6">
                                                      <div class="form-group">
                                                         <label for="register_email">Email <span style="color: red">*</span> </label>
                                                         <input type="email" class="form-control" id="register_email" name="email" value="{{ old('email')}}">
                                                         @error('email')
        <span class="text-danger">{{ $message }}</span>
         @enderror
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                      <div class="form-group">
                                                         <label for="register_password">Password <span style="color: red">*</span> </label>
                                                         <input type="password" class="form-control" id="register_password" name="password" value="{{ old('password')}}">
                                                         @error('password')
        <span class="text-danger">{{ $message }}</span>
         @enderror
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row mb-3">
    <div class="gender form-group col-md-6">
        <label class="g-name d-block">Gender</label>
        <select id="gender" name="gender" class="form-select" aria-label="Default select example" value="{{ old('gender') }}">
            <option selected>Select gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>

    <div class="form-group file-input col-md-6">
        <input type="file" name="profile_pic" id="customfile" class="d-none" value="{{ old('profile_pic') }}">
        <label class="custom-file" for="customfile"><i class="fa fa-upload"></i>Upload Your Photo</label>
    </div>
</div>


                                                <div class="form-group">
                                                   <div class="custom-control custom-checkbox float-lg-right">
                                                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                      <label class="custom-control-label" for="customCheck1"> I
                                                      have read and agree to the <a href="#">Alumni</a> Terms
                                                      of Service</label>
                                                   </div>
                                                   <input type="submit" class="btn btn-reg" value="Registration">
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- Regsiter Form Area End -->
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
         @include('home.layouts.footer')
      </div>
   </body>
</html>
