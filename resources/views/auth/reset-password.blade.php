
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
                     <h1 class="h2">Reset Password</h1>
                     <p>
                        Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need
                     </p>
                     <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="vh-100" style="background-color:rgb(241, 233, 235);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{asset('homecss/assets/images/login_register/login.png')}}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%; object-fit: cover;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="POST" action="{{ route('password.store') }}" class="row g-3 needs-validation">
                                        @csrf
                                <!-- <div class="d-flex align-items-center mb-3 pb-1">
                                <img src="{{asset('homecss/assets/images/logo/mima-svg.svg')}}" alt=""class="h1 fw-bold mb-0">
                                </div> -->
                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Reset your password</h5>
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="email" name="email" class="form-control fs-4" id="email" :value="old('email', $request->email)" required autofocus autocomplete="username">
                                    </div>
                                    @error('email')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group has-validation">
                                        <input type="password" name="password" class="form-control fs-4" id="password" required autocomplete="new-password">
                                    </div>
                                    @error('password')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                                </div>
                                <div class="col-12">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group has-validation">
                                        <input type="password"
                        name="password_confirmation" class="form-control fs-4" id="password_confirmation" required autocomplete="new-password">
                    </div>
                    @error('password_confirmation')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
                <div class="pt-1 mb-6 text-center">
                    <x-primary-button class="btn btn-primary btn-lg btn-block w-50 form-control fs-4"
        data-mdb-button-init
        data-mdb-ripple-init>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>

        @if(session('status'))
       <span class="text-success">{{ session('status') }}</span>
        @endif
    </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif




  @include('home.includes.footer')



