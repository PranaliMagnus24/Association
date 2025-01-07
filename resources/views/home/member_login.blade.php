
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
                           <div class="col-lg-10 m-auto">
                              <div class="register-form-content">
                              <div class="row justify-content-center">
    <!-- Signin Area Content Start -->
    <div class="col-lg-6 text-center">
        <div class="display-table">
            <div class="display-table-cell">
                <div class="signin-area-wrap">
                    <h4 class="large-text">Already a Member?</h4>
                    <div class="sign-form">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <input type="text" placeholder="Enter your Email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <input type="password" placeholder="Enter your Password" name="password" class="form-control" id="yourPassword" required autocomplete="current-password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <x-primary-button class="btn btn-primary w-100 form-control">
                                {{ __('Log in') }}
                            </x-primary-button>
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

