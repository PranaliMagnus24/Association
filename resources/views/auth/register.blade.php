
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

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="pt-4 pb-5">
                        <h5 class="card-title text-center pb-0 fs-2">Register here!</h5>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body pt-5 pb-2">
                            <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}" novalidate>
                               @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="yourName" class="form-label">First Name <span style="color:red;">*</span></label>
                            <input type="text" name="first_name" class="form-control fs-4" id="yourName" :value="old('first_name')" required autofocus autocomplete="first_name" required>
                              @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-6">
                            <label for="yourMiddleName" class="form-label">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control fs-4" id="yourMiddleName" :value="old('middle_name')"  autocomplete="middle_name">
                               @error('middle_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="yourLastName" class="form-label">Last Name <span style="color:red;">*</span></label>
                            <input type="text" name="last_name" class="form-control fs-4" id="yourLastName" :value="old('last_name')" required autocomplete="last_name" required>
                               @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-6">
                            <label for="yourEmail" class="form-label">Email <span style="color:red;">*</span></label>
                            <input type="email" name="email" class="form-control fs-4" id="yourEmail" :value="old('email')" required autocomplete="username" required>
                              @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="yourPhone" class="form-label">Mobile No. <span style="color:red;">*</span></label>
                                <input type="text" name="phone" class="form-control fs-4" id="yourPhone"
                            required autocomplete="phone" required>
                            @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="yourPassword" class="form-label">Password <span style="color:red;">*</span></label>
                                <input type="password" name="password" class="form-control fs-4" id="yourPassword"
                            required autocomplete="new-password" required>
                            @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="yourPassword" class="form-label">Confirm Password</label>
                                <input type="password"  class="form-control fs-4" id="yourPassword"
                                         name="password_confirmation"  autocomplete="new-password">
                                  @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="yourPassword" class="form-label">Gender</label>
                                <select id="gender" name="gender" class="form-select form-control" aria-label="Default select example" value="{{ old('gender') }}">
                                    <option selected>Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <x-primary-button class="btn btn-primary w-100 form-control fs-4">
                       {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
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



