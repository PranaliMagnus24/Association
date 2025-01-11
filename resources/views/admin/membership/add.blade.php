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

    <div class="container">
         <div class="text-end mb-3">
        <a href="{{ url('admin/membershipform')}}" class="btn btn-primary">Back</a>
         </div>
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Member Registration</h5>
              <form action="{{ route('member.register')}}" method="POST" enctype="multipart/form-data">
              @csrf
        <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
          <label for="firstName" class="col-form-label">First Name</label>
         <input id="firstName" name="first_name" type="text"
           class="form-control @error('first_name') is-invalid @enderror"
           placeholder="First Name" value="{{ old('first_name') }}">
          @error('first_name')
        <span class="text-danger">{{ $message }}</span>
         @enderror
         </div>

            <div class="col-md-4 col-lg-4">
                <label for="middleName" class="col-form-label">Middle Name</label>
                <input id="middleName" name="middle_name" type="text" class="form-control" placeholder="Middle Name" value="{{ old('middle_name') }}">
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="lastName" class="col-form-label">Last Name</label>
                <input id="lastName" name="last_name" type="text" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
                @error('last_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 col-lg-4">
                <label for="email" class="col-form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="mobileNo" class="col-form-label">Mobile No.</label>
                <input id="mobileNo" name="phone" type="tel" class="form-control" placeholder="Mobile No." value="{{ old('phone') }}">
                @error('phone')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
            <div class="col-md-4 col-lg-4">
                        @php
                         $maxDate = now()->subYears(18)->format('Y-m-d');
                       @endphp
                <label for="birth" class="col-form-label">Date of Birth</label>
                <input id="birth" name="date_birth" type="date" class="form-control" placeholder="Date of Birth" max="{{ $maxDate }}">

            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 col-lg-4">
                <label for="gender" class="col-form-label">Gender</label>
                <select id="gender" name="gender" class="form-select" aria-label="Default select example" value="{{ old('gender') }}">
                    <option selected>Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="col-md-4 col-lg-4">
                <label for="profilePicture" class="col-form-label">Profile Picture</label>
                <input id="profilePicture" name="profile_pic" type="file" class="form-control" accept="image/*" value="{{ old('profile_pic') }}">
                @error('profile_pic')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
                @if(!empty($data->profile_pic))
      @if(file_exists('upload/'.$data->profile_pic))<img src="{{url('upload/'.$data->profile_pic)}}" style="height:100px; width:100px;">
      @endif
      @endif
            </div>
        </div>

        <div class="text-center">
    <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>
    <button type="submit" name="action" value="save_and_company" class="btn btn-primary">Save & Company</button>
</div>

       </form>
    </div>
    </div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  @include('admin.layouts.footer')
</body>

</html>
