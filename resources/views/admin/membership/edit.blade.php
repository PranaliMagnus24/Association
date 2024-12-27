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

        <form action="{{ route('member.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h5 class="card-title">Edit Profile</h5>
        <div class="row mb-3">
            <div class="col-md-4 col-lg-4">
                <label for="firstName" class="col-form-label">First Name</label>
                <input id="firstName" name="first_name" type="text" class="form-control" placeholder="First Name" value="{{$data->first_name}}">
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="middleName" class="col-form-label">Middle Name</label>
                <input id="middleName" name="middle_name" type="text" class="form-control" placeholder="Middle Name" value="{{$data->middle_name}}">
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="lastName" class="col-form-label">Last Name</label>
                <input id="lastName" name="last_name" type="text" class="form-control" placeholder="Last Name" value="{{$data->last_name}}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 col-lg-4">
                <label for="email" class="col-form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{$data->email}}">
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="mobileNo" class="col-form-label">Mobile No.</label>
                <input id="mobileNo" name="phone" type="tel" class="form-control" placeholder="Mobile No." value="{{$data->phone}}">
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="birth" class="col-form-label">Date of Birth</label>
                <input id="birth" name="date_birth" type="date" class="form-control" placeholder="Date of Birth" value="{{$data->date_birth}}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 col-lg-4">
                <label for="gender" class="col-form-label">Gender</label>
                <select id="gender" name="gender" class="form-select" aria-label="Default select example" value="{{$data->gender}}">
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
            <button type="submit" class="btn btn-primary"  value="Update Profile">Save</button>
        </div>
    </form>
</div>
<!------------------------Company Details------------------------------------->
                <div class="tab-pane fade pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <form>
                  <div class="row mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Select Company Type</label>
                  <div class="col-md-8 col-lg-4">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Select Company Type</option>
                      <option value="">Product</option>
                      <option value="">Service</option>
                      <option value="">College/Institutional Organiational</option>
                    </select>
                  </div>
                </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Company Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company_name" type="text" class="form-control" placeholder="your comapny name">
                      </div>
                    </div>



                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Registration No/Udyog Aadhaar No.</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Registration Date</label>
                      <div class="col-md-8 col-lg-2">
                        <input name="country" type="text" class="form-control" id="Country">
                      </div>
                      <label class="col-md-2 col-lg-3 col-form-label">Renewal Date</label>
                     <div class="col-md-8 col-lg-2">
                        <input name="country" type="text" class="form-control" id="Country">
                      </div>
                    </div>


                    <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Address</label>

                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" placeholder="Address Line 1">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" placeholder="Address Line 2">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" placeholder="City">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" placeholder="State">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" placeholder="Zip">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" placeholder="Country">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Landline</label>
                      <div class="col-md-8 col-lg-4">
                        <input name="country" type="text" class="form-control" id="Country">
                      </div>
                      <label class="col-md-2 col-lg-3 col-form-label">Number Of Employees</label>
                     <div class="col-md-8 col-lg-2">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Select number of employees</option>
                      <option value="">1-10</option>
                      <option value="">11-50</option>
                      <option value="">51-500</option>
                      <option value="">500+</option>
                    </select>
                    </div>
                    </div>



                    <div class="row mb-3">
                      <label for="comapany_year" class="col-md-4 col-lg-3 col-form-label">Company Establishment Year</label>
                      <div class="col-md-8 col-lg-2">
                        <input name="phone" type="text" class="form-control" id="Phone">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">About Company</label>
                      <div class="col-md-8 col-lg-9">
                      <div class="quill-editor-default">

                      </div>
                      </div>
                    </div><br><br>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Website URL</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="Twitter">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Technologies</label>
                      <div class="col-md-8 col-lg-3">
                      <select class="selectpicker" multiple aria-label="size 3 select example">
                      <option selected>Select technologies</option>
                      <option value="">1-10</option>
                    </select>
                      </div>
                      <label for="logo" class="col-md-4 col-lg-3 col-form-label">Company Logo</label>
                      <div class="col-md-8 col-lg-3">
                     <input id="profilePicture" name="profile_picture" type="file" class="form-control" accept="image/*">
                   </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

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

</body>

</html>
