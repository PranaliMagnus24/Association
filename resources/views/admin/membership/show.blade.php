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
    @php
    $datas = App\Models\User::paginate(5);
    @endphp
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">Member Profile</h5>
    <div class="mb-3">
        <strong>Full Name:</strong> {{ $data->first_name}}&nbsp;{{ $data->middle_name }}&nbsp;{{ $data->last_name }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $data->email }}
    </div>
    <div class="mb-3">
        <strong>Mobile No.:</strong> {{ $data->phone }}
    </div>
    <div class="mb-3">
        <strong>Profile Picture:</strong> @if($data->profile_pic)
        <img height="100" width="100" src="{{ url('upload/' . $data->profile_pic) }}" alt="Profile Picture">
        @else
        <img height="100" width="100" src="{{ url('upload/default-profile.jpg') }}" alt="Default Profile Picture">
        @endif
    </div>
    <div class="mb-3">
        <a href="{{ route('member.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
</div>
</div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
