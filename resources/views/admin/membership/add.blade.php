<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.head')

</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.layouts.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">
      <div class="row">

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Member Registration</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Company Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

<!---------------------------------Member Registration--------------------------------->
    <div class="tab-pane fade show active profile-overview" id="profile-overview">
    @if($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
        <form action="{{ route('member.register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h5 class="card-title">Profile Details</h5>
        <div class="row mb-3">
            <div class="col-md-4 col-lg-4">
                <label for="firstName" class="col-form-label">First Name</label>
                <input id="firstName" name="first_name" type="text" class="form-control" placeholder="First Name">
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="middleName" class="col-form-label">Middle Name</label>
                <input id="middleName" name="middle_name" type="text" class="form-control" placeholder="Middle Name">
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="lastName" class="col-form-label">Last Name</label>
                <input id="lastName" name="last_name" type="text" class="form-control" placeholder="Last Name">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 col-lg-4">
                <label for="email" class="col-form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Email">
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="mobileNo" class="col-form-label">Mobile No.</label>
                <input id="mobileNo" name="phone" type="tel" class="form-control" placeholder="Mobile No.">
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="birth" class="col-form-label">Date of Birth</label>
                <input id="birth" name="date_birth" type="date" class="form-control" placeholder="Date of Birth">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 col-lg-4">
                <label for="gender" class="col-form-label">Gender</label>
                <select id="gender" name="gender" class="form-select" aria-label="Default select example">
                    <option selected>Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="profilePicture" class="col-form-label">Profile Picture</label>
                <input id="profilePicture" name="profile_pic" type="file" class="form-control" accept="image/*">
                @if(!empty($data->profile_pic))
      @if(file_exists('upload/'.$data->profile_pic))<img src="{{url('upload/'.$data->profile_pic)}}" style="height:100px; width:100px;">
      @endif
      @endif
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<!------------------------Company Details------------------------------------->

<!---------------------------Company Profile----------------------------->
<div class="tab-pane fade pt-3" id="profile-edit">
    <form action="{{ route('company.register')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">Select Company Type</label>
            <div class="col-md-8 col-lg-4">
                <select class="form-select" aria-label="Default select example" name="company_type">
                    <option selected>Select Company Type</option>
                    <option value="Product">Product</option>
                    <option value="Service">Service</option>
                    <option value="College/Institutional Organization">College/Institutional Organization</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Company Name</label>
            <div class="col-md-8 col-lg-9">
                <input name="company_name" type="text" class="form-control" placeholder="your company name">
            </div>
        </div>

        <div class="row mb-3">
            <label for="company" class="col-md-4 col-lg-3 col-form-label">Registration No/Udyog Aadhaar No.</label>
            <div class="col-md-8 col-lg-9">
                <input name="aadharcard_number" type="text" class="form-control" id="aadhar">
            </div>
        </div>

        <div class="row mb-3">
            <label for="reg_date" class="col-md-4 col-lg-3 col-form-label">Registration Date</label>
            <div class="col-md-8 col-lg-3">
                <input name="registration_date" type="date" class="form-control" id="reg_date">
            </div>
            <label class="col-md-2 col-lg-3 col-form-label" style="margin-bottom: 0;">Renewal Date</label>
            <div class="col-md-8 col-lg-3">
                <input name="renewal_date" type="date" class="form-control" id="ren_date">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Address</label>
            <div class="col-md-8 col-lg-9">
                <input name="address_one" type="text" class="form-control" id="Job" placeholder="Address Line 1">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
            <div class="col-md-8 col-lg-9">
                <input name="address_two" type="text" class="form-control" id="Job" placeholder="Address Line 2">
            </div>
        </div>

        <div class="row mb-3">
        <label for="Job" class="col-md-2 col-lg-3 col-form-label">Country</label>
            <div class="col-md-8 col-lg-3">
                <select name="country" id="country-dropdown" class="form-select" aria-label="Default select example">
                <option value="">-- Select Country --</option>
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>@endforeach
                </select>
            </div>
            <label for="Job" class="col-md-2 col-lg-3 col-form-label">State</label>
            <div class="col-md-8 col-lg-3">
                <select name="state" id="state-dropdown" class="form-select" aria-label="Default select example">
                    <option selected>Select State</option>
                    <option value=""></option>
                </select>
            </div>


        </div>

        <div class="row mb-3">
        <label for="Job" class="col-md-4 col-lg-3 col-form-label">City</label>
            <div class="col-md-8 col-lg-3">
                <select id="city-dropdown" name="city" class="form-select" aria-label="Default select example">
                    <option selected>Select city</option>
                    <option value=""></option>
                </select>
            </div>
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Zip code</label>
            <div class="col-md-8 col-lg-3">
                <input name="zipcode" type="text" class="form-control" id="Job" placeholder="Zip">
            </div>

        </div>

        <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Landline</label>
            <div class="col-md-8 col-lg-3">
                <input name="landline" type="text" class="form-control" id="Country">
            </div>
            <label class="col-md-2 col-lg-3 col-form-label">Number Of Employees</label>
            <div class="col-md-8 col-lg-3">
                <select class="form-select" aria-label="Default select example" name="no_emp">
                    <option selected>Select number of employees</option>
                    <option value="1-10">1-10</option>
                    <option value="11-50">11-50</option>
                    <option value="51-500">51-500</option>
                    <option value="500+">500+</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="comapany_year" class="col-md-4 col-lg-3 col-form-label">Company Establishment Year</label>
            <div class="col-md-8 col-lg-3">
                <input name="company_year" type="text" class="form-control" id="Phone">
            </div>
        </div>

        <div class="row mb-3">
            <label for="about_comp" class="col-md-4 col-lg-3 col-form-label">About Company</label>
            <div class="col-md-8 col-lg-9">
                <div class="quill-editor-default"></div>
                <input type="hidden" name="about_comp" id="about_comp">
            </div>
        </div><br><br>

        <div class="row mb-3">
            <label for="web_url" class="col-md-4 col-lg-3 col-form-label">Website URL</label>
            <div class="col-md-8 col-lg-9">
                <input name="website_url" type="text" class="form-control" id="web_url">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Technologies</label>
            <div class="col-md-8 col-lg-3">
                <select name="technologies" id="technology" class="selectpicker" multiple aria-label="size 3 select example">
               @foreach($technologies as $technology)
                <option value="{{ $technology->id }}">{{ $technology->title }}</option>
               @endforeach
        </select>
            </div>
            <label for="logo" class="col-md-4 col-lg-3 col-form-label" style="margin-bottom: 0;">Company Logo</label>
            <div class="col-md-8 col-lg-3">
                <input id="logo" name="company_logo" type="file" class="form-control" accept="image/*">
                @if(!empty($data->company_logo))
                    @if(file_exists('upload/'.$data->company_logo))
                        <img src="{{url('upload/'.$data->company_logo)}}" style="height:100px; width:100px;">
                    @endif
                @endif
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<!-------------------------End Company Profile------------------->


                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')
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



});

</script>
</body>

</html>
