
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
<section class="vh-100" style="background-color:rgb(241, 233, 235);">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="{{asset('homecss/assets/images/login_register/login1.png')}}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%; object-fit: cover;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}" novalidate>
                               @csrf

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <input type="hidden" name="role" value="{{ request()->routeIs('bazar') ? 'bazar' : 'user' }}">

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="yourName" class="form-label">First Name <span style="color:red;">*</span></label>
                            <input type="text" name="first_name" class="form-control fs-4" id="yourName" value="{{ old('first_name') }}" required autofocus autocomplete="first_name" required>
                              @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-6">
                            <label for="yourLastName" class="form-label">Last Name <span style="color:red;">*</span></label>
                            <input type="text" name="last_name" class="form-control fs-4" id="yourLastName" value="{{ old('last_name') }}" required autocomplete="last_name" required>
                               @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-6">
                            <label for="yourEmail" class="form-label">Email <span style="color:red;">*</span></label>
                            <input type="email" name="email" class="form-control fs-4" id="yourEmail" value="{{ old('email') }}" required autocomplete="username" required>
                              @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="yourPhone" class="form-label">Mobile No. <span style="color:red;">*</span></label>
                                <input type="text" name="phone" class="form-control fs-4" id="yourPhone" value="{{ old('phone') }}"
                            required autocomplete="phone" required>
                            @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">


                            <div class="col-6">
                                <label for="yourPassword" class="form-label">Gender</label>
                                <select id="gender" name="gender" class="form-select form-control" aria-label="Default select example">
                                    <option selected>Select gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                        <div class="col-6">
                                <label for="yourPassword" class="form-label">Password <span style="color:red;">*</span></label>
                                <input type="password" name="password" class="form-control fs-4" id="yourPassword"
                            required autocomplete="new-password" required>
                            @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="yourPassword" class="form-label">Confirm Password <span style="color:red;">*</span></label>
                                <input type="password"  class="form-control fs-4" id="yourPassword"
                                         name="password_confirmation"  autocomplete="new-password">
                                  @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="pt-1 mb-6 text-center">
                            <x-primary-button class="btn btn-primary btn-lg btn-block w-50 form-control fs-4" data-mdb-button-init data-mdb-ripple-init>
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>

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



