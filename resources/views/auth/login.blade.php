<style>
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

@include('home.includes.head')

@include('home.includes.navbar')
<section id="page-title-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 m-auto text-center">
                  <div class="page-title-content">
                     <h1 class="h2">Member Login</h1>
                     <p>
                        Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need
                     </p>
                     <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="pt-4 pb-5">
                        <h5 class="card-title text-center pb-0 fs-2">Login here !</h5>
                    </div>
                    <div>


                    <div class="card mb-3">
                        <div class="card-body pt-5 pb-2">
                     <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="email" class="form-control fs-4" id="yourUsername":value="old('email')" required autofocus autocomplete="username" >
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control fs-4" id="yourPassword"
                            required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember_me">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                      </div>
                    </div>
                    <div class="flex items-center justify-end mt-4 col-12">
                   @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

            <x-primary-button class="btn btn-primary w-100 form-control fs-4">
                {{ __('Log in') }}
            </x-primary-button>
                </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{route('register')}}">Create an account</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@include('home.includes.footer')
