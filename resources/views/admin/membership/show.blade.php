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
              <div class="text-end mb-3">
              <a href="{{ route('member.index')}}" class="btn btn-primary">Back</a>
         </div>

              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Member Profile</button>
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
     @php
    $datas = App\Models\User::paginate(5);
    @endphp
    <h5 class="card-title">Profile Details</h5>
    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>First Name</strong></label>
            <p>{{ $data->first_name }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Middle Name</strong></label>
            <p>{{ $data->middle_name }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Last Name</strong></label>
            <p>{{ $data->last_name }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Email</strong></label>
            <p>{{ $data->email }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Mobile No.</strong></label>
            <p>{{ $data->phone }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Date of Birth</strong></label>
            <p>{{ $data->date_birth }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Gender</strong></label>
            <p>{{ ucfirst($data->gender) }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Profile Picture</strong></label>
            @if(!empty($data->profile_pic) && file_exists('upload/'.$data->profile_pic))
                <img src="{{ url('upload/'.$data->profile_pic) }}" style="height:100px; width:100px;">
            @else
                <p>No profile picture available</p>
            @endif
        </div>

        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Company List</strong></label>
            <select name="" id="">
                <option value="">Select Company</option>
            </select>
        </div>
    </div>
</div>

<!------------------------Company Details------------------------------------->

<!---------------------------Company Profile----------------------------->
<div class="tab-pane fade pt-3" id="profile-edit">
     @php
    $datas = App\Models\CompanyPro::paginate(5);
    @endphp

    @if($companyExists)
    <a href="{{ route('company.edit',$company->id ?? '') }}" class="btn btn-primary"> Edit</a>

    <div class="row mb-3">
    <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Membership Id</strong></label>
            <p>{{ $company->membership_id}}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Company Type</strong></label>
            <p>{{ $company->company_type}}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Membership</strong></label>
            <p>{{ $company->membership_year}}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Company Name</strong></label>
            <p>{{ $company->company_name}}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Registration No./Udyog Aadhaar No.</strong></label>
            <p>{{ $company->aadharcard_number}}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Registration Date</strong></label>
            <p>{{ $company->registration_date}}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Renewal Date</strong></label>
            <p>{{ $company->renewal_date}}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Address</strong></label>
            <p>{{ $company->address_one}}</p>
            <p>{{ $company->address_two}}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Country</strong></label>
            <p>{{ $company->countries->name}}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>State</strong></label>
            <p>{{ $company->states->name}}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>City</strong></label>
            <p>{{ $company->cities->name}}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Zip Code</strong></label>
            <p>{{ $company->zipcode}}</p>
        </div>
    </div>

    @else
    <span class="text-danger">
        <strong>No company registered for this member.</strong>
    </span>
    <a href="{{ route('company.register') }}" class="btn btn-primary">Add Company</a>
@endif

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

</body>

</html>
