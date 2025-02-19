
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
        <h5 class="card-title">Profile</h5>

        <!-- Bordered Tabs Justified -->
         <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 {{ request('tab', 'member') == 'member' ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="{{ request('tab', 'member') == 'member' ? 'true' : 'false' }}">Member Profile</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 {{ request('tab') == 'company' ? 'active' : '' }}" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="{{ request('tab') == 'company' ? 'true' : 'false' }}">Company Profile</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 {{ request('tab') == 'password' ? 'active' : '' }}" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="{{ request('tab') == 'password' ? 'true' : 'false' }}">Change Password</button>
            </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabJustifiedContent">

            <!-- Company Info Form -->
            <div class="tab-pane fade{{ request('tab', 'member') == 'member' ? ' show active' : '' }}" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                <form action="{{route('update.profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                    <div class="col-6">
                        <label for="Name" class="form-label">Name <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        @error('email')
                       <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-6">
                        <label for="phone" class="form-label">Mobile No. <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="dob" class="form-label">D.O.B</label>
                        <input type="date" class="form-control" id="dob" name="date_birth" value="{{ $user->date_birth }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="gender" class="form-label">Gender <span style="color: red">*</span></label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="profile_pic" class="form-label">Profile Picture</label>
                            <div class="profile-picture-container">
                                <img src="{{ $user->profile_pic ? url('upload/user_profile/' . $user->profile_pic) : url('upload/No-Image.png') }}" alt="Profile Picture" class="img-fluid rounded"
                                style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                            <input type="file" class="form-control mt-2" id="profile_pic" name="profile_pic">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>

            <!-- Change Company Logo Form -->
            <div class="tab-pane fade {{ request('tab') == 'company' ? 'show active' : '' }}" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="{{ route('update.companyprofile', $companyProfile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">

                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Membership Type <span style="color: red">*</span></label>
                        <div class="col-md-8 col-lg-3">
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
                        @error('membership_type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <label class="col-md-4 col-lg-3 col-form-label">Company Type</label>
                        <div class="col-md-8 col-lg-3">
                            <select class="form-select" aria-label="Default select example" name="company_type" id="companycategory-dropdown">
                                <option selected>-- Company Type --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                @if(old('company_type', $companyProfile->company_type ?? '') == $category->id) selected @endif>
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                            <option value="other" @if(old('company_type', $companyProfile->company_type ?? '') == 'other') selected @endif>Other</option>
                        </select>
                        @error('company_type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="companysubcategory_id" class="col-md-4 col-lg-3 col-form-label">Subcategory</label>
                    <div class="col-md-8 col-lg-3">
                        <select name="subcategory_id" class="form-select" id="companysubcategory-dropdown">
                            <option value="">-- Subcategory --</option>
                            <option value="other">Other</option>
                        </select>
                        @error('subcategory_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Hidden input field for "Other" category -->
                    <label for="companycategory_id" class="col-md-4 col-lg-3 col-form-label"></label>
                    <div class="col-md-8 col-lg-3 mt-2" id="other-category-input" style="display: none;">
                        <input type="text" name="other_category" id="other-category" class="form-control" placeholder="Enter New Category" value="{{ old('other_category') }}">
                        @error('other_category')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                     <!-- Hidden input field for "Other" SubCategory -->
                    <label for="other-subcategory" class="col-md-4 col-lg-3 col-form-label"></label>
                    <div class="col-md-8 col-lg-3 mt-2" id="other-subcategory-input" style="display: none;">
                        <input type="text" name="other_subcategory" id="other-subcategory" class="form-control" placeholder="Enter New Subcategory" value="{{ old('other_subcategory') }}">
                        @error('other_subcategory')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="MembershipYear" class="col-md-4 col-lg-3 col-form-label">Membership Year <span style="color: red">*</span></label>
                    <div class="col-md-8 col-lg-3">
                        <select class="form-select membership_year" aria-label="Default select example" name="membership_year" id="membershipYearSelect" onchange="updateRenewalDate()">
                            <option selected>Membership</option>
                            @foreach($memberships as $membership)
                            <option
                            value="{{ $membership->membership_year }}"
                            data-default-year="{{ $membership->default_year }}"
                            {{ $membership->id == 8 ? 'selected' : 'disabled' }}>
                            {{ $membership->membership_year }} - {{ $membership->default_year }}
                           </option>
                           @endforeach
                        </select>
                        <input type="hidden" name="default_year" id="defaultYearInput">
                        @error('membership_year')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <label for="Company Name" class="col-md-4 col-lg-3 col-form-label">Company Name <span style="color: red">*</span></label>
                    <div class="col-md-8 col-lg-3">
                        <input name="company_name" type="text" class="form-control" placeholder="your company name" value="{{ old('company_name', $companyProfile->company_name ?? '') }}">
                        @error('company_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                    <div class="row mb-3">
                            <label for="AadharNumber" class="col-md-4 col-lg-3 col-form-label">Registration No/Udyog Aadhaar No. <span style="color: red">*</span></label>
                            <div class="col-md-8 col-lg-3">
                            <input name="aadharcard_number" type="text" class="form-control" id="aadhar" value="{{ old('aadharcard_number', $companyProfile->aadharcard_number ?? '') }}" placeholder="Registration or Aadhar number">
                            @error('aadharcard_number')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                            <label for="RegistrationDate" class="col-md-4 col-lg-3 col-form-label">Registration Date <span style="color: red">*</span></label>
                            <div class="col-md-8 col-lg-3">
                            <input name="registration_date" type="date" class="form-control" id="reg_date" value="{{ old('registration_date', $companyProfile->registration_date ?? now()->format('Y-m-d')) }}">
                            @error('registration_date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                    </div>

                   {{-- <div class="row mb-3">
                    <label for="RenewalDate" class="col-md-4 col-lg-3 col-form-label">Renewal Date <span style="color: red">*</span></label>
                        <div class="col-md-8 col-lg-3">
                        <input name="renewal_date" type="date" class="form-control renewal_date" id="ren_date" value="{{ old('renewal_date', $companyProfile->renewal_date ?? '') }}">
                        @error('renewal_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                    </div>--}}

                    <div class="row mb-3">

                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address <span style="color: red">*</span></label>
                        <div class="col-md-8 col-lg-9">
                        <input name="address_one" type="text" class="form-control" id="Job" placeholder="Address Line 1" value="{{ old('address_one', $companyProfile->address_one ?? '') }}">
                        @error('address_one')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                </div>
                <div class="row mb-3">
                <label for="Address" class="col-md-4 col-lg-3 col-form-label"></label>
                        <div class="col-md-8 col-lg-9">
                        <input name="address_two" type="text" class="form-control" id="Job" placeholder="Address Line 2" value="{{ old('address_two', $companyProfile->address_two ?? '') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country <span style="color: red">*</span></label>
                    <div class="col-md-8 col-lg-3">
                        <select name="country" id="country-dropdown" class="form-select" aria-label="Default select example" value="{{ old('country') }}">
                            <option value="">-- Select Country --</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ $country->id == 101 ? 'selected' : '' }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country')
                       <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <label for="State" class="col-md-2 col-lg-3 col-form-label">State <span style="color: red">*</span></label>
               <div class="col-md-8 col-lg-3">

                <select name="state" id="state-dropdown" class="form-select" aria-label="Default select example" value="{{ old('state')}}">
                <option value="">-- Select State --</option>
                            @foreach ($states as $state)

                            <option value="{{ $state->id }}" {{ ($state->id == $companyProfile->state) ? 'selected' : '' }}>{{ $state->name }}</option>
                            @endforeach
                </select>
                @error('state')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
                </div>
                <div class="row mb-3">
                <label for="City" class="col-md-4 col-lg-3 col-form-label">City <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select id="city-dropdown" name="city" class="form-select" aria-label="Default select example" value="{{ old('city')}}">
                    <option selected>Select city</option>
                    @foreach ($cities as $city)

                        <option value="{{ $city->id }}" {{ ($city->id == $companyProfile->city) ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <label for="ZipCode" class="col-md-4 col-lg-3 col-form-label">Zip code</label>
            <div class="col-md-8 col-lg-3">
                <input name="zipcode" type="text" class="form-control" id="Job" placeholder="Zip code" value="{{ old('zipcode', $companyProfile->zipcode ?? '') }}">
                @error('zipcode')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
                </div>


                <div class="row mb-3">
                <label for="Landline" class="col-md-4 col-lg-3 col-form-label">Landline</label>
            <div class="col-md-8 col-lg-3">
                <input name="landline" type="text" class="form-control" id="Country" value="{{ old('landline', $companyProfile->landline ?? '') }}" placeholder="Landline or Mobile number">
                @error('landline')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <label class="col-md-2 col-lg-3 col-form-label">Number Of Employees</label>
            <div class="col-md-8 col-lg-3">
                <select class="form-select" aria-label="Default select example" name="employee_number" value="{{ old('employee_number')}}">
                <option value="1-10" {{ old('employee_number') == '1-10' ? 'selected' : '' }}>1-10</option>
                <option value="11-50" {{ old('employee_number') == '11-50' ? 'selected' : '' }}>11-50</option>
                <option value="51-500" {{ old('employee_number') == '51-500' ? 'selected' : '' }}>51-500</option>
                <option value="500+" {{ old('employee_number') == '500+' ? 'selected' : '' }}>500+</option>
                </select>
            </div>
                </div>

                <div class="row mb-3">
                <label for="comapany_year" class="col-md-4 col-lg-3 col-form-label">Company Establishment Year <span style="color: red">*</span></label>
              <div class="col-md-8 col-lg-3">
                <input name="company_year" type="text" class="form-control" id="Phone" value="{{ old('company_year', $companyProfile->company_year ?? '') }}" placeholder="Company Establishment Year">
                @error('company_year')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
                </div>



                <div class="row mb-3">
            <label for="about_comp" class="col-md-4 col-lg-3 col-form-label">About Company <span style="color:red;">*</span></label>
            <div class="col-md-8 col-lg-9">
                <div id="quill-editor" class="mb-3" style="height: 150px;"></div>
                    <textarea rows="3" class="mb-3 d-none" name="about_company" id="quill-editor-area" placeholder="Add about_company here">
                       {{ old('about_company', $companyProfile->about_company ?? '') }}
                    </textarea>
                @error('about_company')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            </div>

                <div class="row mb-3">
            <label for="services" class="col-md-4 col-lg-3 col-form-label">Services/Skill's  <span style="color:red;">*</span></label>
            <div class="col-md-8 col-lg-9">
                <div id="quill-editor" class="mb-3" style="height: 150px;"></div>
                    <textarea rows="3" class="mb-3 d-none" name="services" id="quill-editor-area" placeholder="Add services here">
                       {{ old('services', $companyProfile->services ?? '') }}
                    </textarea>
                @error('services')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            </div>

                <div class="row mb-3">
                <label for="web_url" class="col-md-4 col-lg-3 col-form-label">Website URL</label>
            <div class="col-md-8 col-lg-9">
                <input name="website_url" type="text" class="form-control" id="web_url" value="{{ old('website_url', $companyProfile->website_url ?? '') }}" placeholder="Website URL">
            </div>
                </div>
                <div class="row mb-3">
                {{---<label for="technology" class="col-md-4 col-lg-3 col-form-label">Technologies</label>
            <div class="col-md-8 col-lg-3">
                <select name="technologies" id="technology" class="selectpicker" multiple aria-label="size 3 select example">
               @foreach($technologies as $technology)
                <option value="{{ $technology->title }}">{{ $technology->title }}</option>
               @endforeach
        </select>
            </div>---}}
            <label for="logo" class="col-md-4 col-lg-3 col-form-label" style="margin-bottom: 0;">Company Logo</label>
            <div class="col-md-8 col-lg-3">
                <input id="logo" name="company_logo" type="file" class="form-control" accept="image/*" value="{{ old('company_logo', $companyProfile->company_logo ?? '') }}">
                @if(!empty($companyProfile->company_logo))
      @if(file_exists('upload/company_documents/'.$companyProfile->company_logo))<img src="{{url('upload/company_documents/'.$companyProfile->company_logo)}}" style="height:100px; width:100px;">
      @endif
      @endif
            </div>
        </div>
        <div class="container">
  <h5 class="card-title text-center">Documents Upload</h5>
  <br>
  <div class="row mb-3">
  <label for="" class="col-md-4 col-lg-3 col-form-label">Proof of company identity</label>

    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="company_identity" value="{{ old('company_identity', $companyProfile->company_identity ?? '') }}">

      @if(isset($companyProfile) && $companyProfile->documents->where('file_type', 'company_identity')->first())
      @php
          $doc = $companyProfile->documents->where('file_type', 'company_identity')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/company_documents/' . $companyProfile->id . '/' . $doc->file_name) }}" target="_blank">View PDF</a>
      @else
          <img src="{{ url('upload/company_documents/' . $companyProfile->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
    <label for="" class="col-md-4 col-lg-3 col-form-label">Aadhar card/Pan card</label>
    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="aadharcard" value="{{ old('aadharcard', $companyProfile->aadharcard ?? '') }}">
      @if(isset($companyProfile) && $companyProfile->documents->where('file_type', 'aadharcard')->first())
      @php
          $doc = $companyProfile->documents->where('file_type', 'aadharcard')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/company_documents/' . $companyProfile->id . '/' . $doc->file_name) }}" target="_blank">View PDF</a>
      @else
          <img src="{{ url('upload/company_documents/' . $companyProfile->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
  </div>
  <div class="row mb-3">
  <label for="" class="col-md-4 col-lg-3 col-form-label">Proof of company address</label>
    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="company_address" value="{{ old('company_address', $companyProfile->company_address ?? '') }}">
      @if(isset($companyProfile) && $companyProfile->documents->where('file_type', 'company_address')->first())
      @php
          $doc = $companyProfile->documents->where('file_type', 'company_address')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/company_documents/' . $companyProfile->id . '/' . $doc->file_name) }}" target="_blank">View PDF</a>
      @else
          <img src="{{ url('upload/company_documents/' . $companyProfile->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
    <label for="" class="col-md-4 col-lg-3 col-form-label">Letter of authority</label>
    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="authority_letter" value="{{ old('authority_letter', $companyProfile->authority_letter ?? '') }}">
      @if(isset($companyProfile) && $companyProfile->documents->where('file_type', 'authority_letter')->first())
      @php
          $doc = $companyProfile->documents->where('file_type', 'authority_letter')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/company_documents/' . $companyProfile->id . '/' . $doc->file_name) }}" target="_blank">View PDF</a>
      @else
          <img src="{{ url('upload/company_documents/' . $companyProfile->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
  </div>
</div>
                    <button type="submit" class="btn btn-primary">Update Company Profile</button>
                </form>
            </div>
            </div>


            <!-- Change Password Form -->
            <div class="tab-pane fade {{ request('tab') == 'password' ? 'show active' : '' }}" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                <form action="{{ route('updatePassword')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                    <label for="CurrentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-3">
                    <input type="password" class="form-control" id="currentPassword" name="current_password">
                   </div>

                   <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                   <div class="col-md-8 col-lg-3">
                   <input type="password" class="form-control" id="newPassword" name="new_password">
                   </div>
                    </div>

                    <div class="row mb-3">
                    <label for="confirmPassword" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                   <div class="col-md-8 col-lg-3">
                   <input type="password" class="form-control" id="confirmPassword" name="confirm_password">
                   </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Password</button>


                </form>
            </div>
        </div><!-- End Bordered Tabs Justified -->

    </div>
</div>






</div>
</div>

  </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

$(document).ready(function () {

    $('#country-dropdown').on('change', function () {

        var idCountry = this.value;

        $("#state-dropdown").html('');

        $.ajax({

            url: "{{url('api/fetch-states')}}",

            type: "POST",

            data: {

                country_id: idCountry,

                _token: '{{csrf_token()}}'

            },

            dataType: 'json',

            success: function (result) {

                $('#state-dropdown').html('<option value="">-- Select State --</option>');

                $.each(result.states, function (key, value) {

                    $("#state-dropdown").append('<option value="' + value

                        .id + '">' + value.name + '</option>');

                });

                $('#city-dropdown').html('<option value="">-- Select City --</option>');

            }

        });

    });


    $('#state-dropdown').on('change', function () {

        var idState = this.value;

        $("#city-dropdown").html('');

        $.ajax({

            url: "{{url('api/fetch-cities')}}",

            type: "POST",

            data: {

                state_id: idState,

                _token: '{{csrf_token()}}'

            },

            dataType: 'json',

            success: function (res) {

                $('#city-dropdown').html('<option value="">-- Select City --</option>');

                $.each(res.cities, function (key, value) {

                    $("#city-dropdown").append('<option value="' + value

                        .id + '">' + value.name + '</option>');

                });

            }

        });

    });



///dependent category and subcategory
var selectedCategory = $('#companycategory-dropdown').val();
    var selectedSubcategory = "{{ old('subcategory_id', $companyProfile->subcategory_id ?? '') }}";
    if(selectedCategory === 'other'){
        $('#other-category-input').show();
    } else {
        $('#other-category-input').hide();
    }
    function loadSubcategories(category_id, selectedSub) {
        var subcategoryDropdown = $('#companysubcategory-dropdown');
        subcategoryDropdown.empty().append('<option value="">-- Subcategory --</option>');

        $.ajax({
            url: '/member-subcategory/' + category_id,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $.each(response, function (index, subcategory) {
                    var isSelected = (subcategory.id == selectedSub) ? ' selected' : '';
                    subcategoryDropdown.append('<option value="' + subcategory.id + '"' + isSelected + '>' + subcategory.subcategory_name + '</option>');
                });

                var otherSelected = (selectedSub == 'other') ? ' selected' : '';
                subcategoryDropdown.append('<option value="other"' + otherSelected + '>Other</option>');

                if(selectedSub === 'other'){
                    $('#other-subcategory-input').show();
                } else {
                    $('#other-subcategory-input').hide();
                }
            },
            error: function () {
                subcategoryDropdown.append('<option value="other">Other</option>');
            }
        });
    }

    if(selectedCategory && selectedCategory !== 'other'){
        loadSubcategories(selectedCategory, selectedSubcategory);
    } else {
        var subcategoryDropdown = $('#companysubcategory-dropdown');
        subcategoryDropdown.empty().append('<option value="">-- Subcategory --</option><option value="other">Other</option>');
        if(selectedSubcategory === 'other'){
            $('#other-subcategory-input').show();
        } else {
            $('#other-subcategory-input').hide();
        }
    }

    $('#companycategory-dropdown').change(function () {
        var category_id = $(this).val();
        var subcategoryDropdown = $('#companysubcategory-dropdown');
        subcategoryDropdown.empty().append('<option value="">-- Subcategory --</option>');

        if (category_id === 'other') {
            $('#other-category-input').show().focus();
            subcategoryDropdown.append('<option value="other">Other</option>');
        } else {
            $('#other-category-input').hide();
            loadSubcategories(category_id, '');
        }
    });

    $('#companysubcategory-dropdown').change(function () {
        if ($(this).val() === 'other') {
            $('#other-subcategory-input').show().focus();
        } else {
            $('#other-subcategory-input').hide();
        }
    });

});

document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab');

        if (tab) {
            const tabButton = document.querySelector(`#${tab}-tab`);
            const tabContent = document.querySelector(`#bordered-justified-${tab}`);
            if (tabButton && tabContent) {
                tabButton.classList.add('active');
                tabContent.classList.add('show', 'active');
            }
        }
    });

//Textarea
document.addEventListener('DOMContentLoaded', function () {
    const editors = document.querySelectorAll('[id^="quill-editor-area"]');

    editors.forEach((textarea, index) => {
        const quillEditorId = `quill-editor-${index}`;
        const quillContainer = textarea.previousElementSibling;
        quillContainer.id = quillEditorId;
        const editor = new Quill(`#${quillEditorId}`, {
            theme: 'snow',
        });
        editor.root.innerHTML = textarea.value;
        editor.on('text-change', function () {
            textarea.value = editor.root.innerHTML;
        });
        textarea.addEventListener('input', function () {
            editor.root.innerHTML = textarea.value;
        });
    });
});

//Renewal Date

function updateRenewalDate() {
    const membershipSelect = document.getElementById('membershipYearSelect');
    const selectedOption = membershipSelect.options[membershipSelect.selectedIndex];
    const renewalDateInput = document.getElementById('ren_date');

    const currentDate = new Date();
    const membershipValue = selectedOption.getAttribute('data-months') || 0;
    const defaultValue = selectedOption.getAttribute('data-years');

    if (defaultValue === "Month") {
        currentDate.setMonth(currentDate.getMonth() + parseInt(membershipValue));
    } else if (defaultValue === "Year") {
        currentDate.setFullYear(currentDate.getFullYear() + parseInt(membershipValue));
    } else if (defaultValue === "Lifetime") {
        currentDate.setFullYear(currentDate.getFullYear() + 10);
    }

    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');

    renewalDateInput.value = `${year}-${month}-${day}`;
}

// Add event listener for the membership dropdown
document.getElementById('membershipYearSelect').addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex];
    const defaultYear = selectedOption.getAttribute('data-default-year');
    document.getElementById('defaultYearInput').value = defaultYear || '';
});
// $(window).on("load", function() {
//         var idCountry = $('#country-dropdown').val();
//         //alert(idCountry);
//         $("#state-dropdown").html('');

//         $.ajax({

//             url: "{{url('api/fetch-states')}}",

//             type: "POST",

//             data: {

//                 country_id: idCountry,

//                 _token: '{{csrf_token()}}'

//             },

//             dataType: 'json',

//             success: function (result) {

//                 $('#state-dropdown').html('<option value="">-- Select State --</option>');

//                 $.each(result.states, function (key, value) {

//                     $("#state-dropdown").append('<option value="' + value

//                         .id + '">' + value.name + '</option>');

//                 });

//                 $('#city-dropdown').html('<option value="">-- Select City --</option>');

//             }

//         });
//     });

</script>

  <!-- ======= Footer ======= -->
  @include('member.layout.footer')

