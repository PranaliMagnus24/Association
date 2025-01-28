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
            @if(!empty($data->profile_pic) && file_exists('upload/user_profile/'.$data->profile_pic))
                <img src="{{ url('upload/user_profile/'.$data->profile_pic) }}" style="height:100px; width:100px;">
            @else
                <p>No profile picture available</p>
            @endif
        </div>


    </div>
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
