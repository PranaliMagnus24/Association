
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
                     <h1 class="h2">Forgot Password</h1>
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
              <img src="{{asset('homecss/assets/images/login_register/login.png')}}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%; object-fit: cover;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form method="POST" action="{{ route('password.email') }}" class="row g-3 needs-validation">
        @csrf
        <!-- <div class="d-flex align-items-center mb-3 pb-1">
        <img src="{{asset('homecss/assets/images/logo/mima-svg.svg')}}" alt=""class="h1 fw-bold mb-0">
                  </div> -->
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Forgot-Password</h5>
        <!-- Email Address -->

           <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" :value="old('email')" class="form-control fs-4" id="email"
                      required autofocus>
                      @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                    </div>

        <div class="flex items-center justify-end mt-4 col-12">
            <x-primary-button class="btn btn-primary w-100 form-control fs-4">
                {{ __('Email Password Reset Link') }}
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


{{--@if (session('status'))
{{ dd(session()->all()) }}

    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('status') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>

@endif---}}

@include('home.includes.footer')
