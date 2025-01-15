
  @include('member.layout.head')
  @include('member.layout.header')
  @include('member.layout.sidebar')


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>{{$companyProfile->company_name}} Profile</h1>
    </div>


    <style>
    .dashboard .card-icon{
        font-size:62px;
        width:96px;
        height:96px;
    }
    .icon-custom {
  font-size: 1.5rem;
  color: #007bff;
  margin-right: 5px;
}

.icon-custom:hover {
  color: #ff5733;
  transition: color 0.3s ease;
}
.company-logo {
        max-width: 61px; /* Set the max width of the logo */
        max-height: 61px; /* Set the max height of the logo */
        object-fit: cover; /* Ensure the logo does not distort, keeps aspect ratio */
    }

</style>
<section class="section dashboard">

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Update Profile</h5>

        <!-- Bordered Tabs Justified -->
        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Update Member Profile</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Update Company Profile</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Change Password</button>
            </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabJustifiedContent">

            <!-- Company Info Form -->
            <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                <form action="{{route('update.profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                    <div class="col-6">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-6">
                        <label for="phone" class="form-label">Mobile No.</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                    </div>
                    <div class="col-6">
                        <label for="dob" class="form-label">D.O.B</label>
                        <input type="date" class="form-control" id="dob" name="date_birth" value="{{ $user->date_birth }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="profile_pic" class="form-label">Profile Picture</label>
                            <div class="profile-picture-container">
                                <img src="{{ $user->profile_pic ? url('upload/' . $user->profile_pic) : url('upload/No-Image.png') }}" alt="Profile Picture" class="img-fluid rounded"
                                style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                            <input type="file" class="form-control mt-2" id="profile_pic" name="profile_pic">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>

            <!-- Change Company Logo Form -->
            <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                <form action="{{route('update.companyprofile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                    <div class="col-6">
                        <label for="phone" class="form-label">Membership Type</label>
                        <select class="form-select membership_type" aria-label="Default select example" name="membership_type" id="membership_type">
                            <option selected>Membership Type</option>
                            @foreach($membershipstype as $membershiptype)
                            <option value="{{ $membershiptype->title }}"
                            @if(isset($companyProfile->membership_type) && $membershiptype->title == $companyProfile->membership_type)selected="selected"
                        @endif>
                        {{ $membershiptype->title }}
                            </option>
                         @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="companyType" class="form-label">Company Type</label>
                        <select class="form-select" aria-label="Default select example" name="company_type">
                            <option selected>Company Type</option>
                            <option value="Product" @if((isset($companyProfile->company_type) && $companyProfile->company_type == 'Product') || old('company_type') == 'Product') selected @endif>Product</option>
                            <option value="Service" @if((isset($companyProfile->company_type) && $companyProfile->company_type == 'Service') || old('company_type') == 'Service') selected @endif>Service</option>
                            <option value="College/Institutional Organization" @if((isset($companyProfile->company_type) && $companyProfile->company_type == 'College/Institutional Organization') || old('company_type') == 'College/Institutional Organization') selected @endif>College/Institutional Organization</option>
                        </select>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-6">
                        <label for="MembershipYear" class="form-label">Membership Year</label>
                        <select class="form-select membership_year" aria-label="Default select example" name="membership_year" id="membershipYearSelect" onchange="updateRenewalDate()">
                            <option selected>Membership</option>
                            @foreach($memberships as $membership)
                            <option value="{{ $membership->membership_year }}"
                            data-months="{{ $membership->membership_year }}"
                            data-years="{{ $membership->default_year }}">
                            {{ $membership->membership_year }} {{ $membership->default_year }}
                        </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="Company Name" class="form-label">Company Name</label>
                        <input name="company_name" type="text" class="form-control" placeholder="your company name" value="{{ old('company_name', $companyProfile->company_name ?? '') }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="AadharNumber" class="form-label">Registration No/Udyog Aadhaar No.</label>
                            <input name="aadharcard_number" type="text" class="form-control" id="aadhar" value="{{ old('aadharcard_number', $companyProfile->aadharcard_number ?? '') }}" placeholder="Registration or Aadhar number">
                        </div>
                        <div class="col-6">
                            <label for="RegistrationDate" class="form-label">Registration Date</label>
                            <input name="registration_date" type="date" class="form-control" id="reg_date" value="{{ old('registration_date', $companyProfile->registration_date ?? now()->format('Y-m-d')) }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                        <label for="RenewalDate" class="form-label">Renewal Date</label>
                        <input name="renewal_date" type="date" class="form-control renewal_date" id="ren_date" value="{{ old('renewal_date', $companyProfile->renewal_date ?? '') }}" readonly>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                        <label for="Address" class="form-label">Address</label>
                        <input name="address_one" type="text" class="form-control" id="Job" placeholder="Address Line 1" value="{{ old('address_one', $companyProfile->address_one ?? '') }}">

                        </div>
                        <div class="col-6">
                        <label for="Address" class="form-label"></label>
                        <input name="address_two" type="text" class="form-control" id="Job" placeholder="Address Line 2" value="{{ old('address_two', $companyProfile->address_two ?? '') }}">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                    <label for="Country" class="form-label">Country</label>
                        <select name="country" id="country-dropdown" class="form-select" aria-label="Default select example" value="{{ old('country') }}">
                            <option value="">-- Select Country --</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ $country->id == 101 ? 'selected' : '' }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                    <button type="submit" class="btn btn-primary">Update Company Profile</button>
                </form>
            </div>

            <!-- Change Password Form -->
            <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                <form action="/update-password" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div><!-- End Bordered Tabs Justified -->

    </div>
</div>






</div>
</div>

  </section>
  </main>

  <!-- ======= Footer ======= -->
  @include('member.layout.footer')

