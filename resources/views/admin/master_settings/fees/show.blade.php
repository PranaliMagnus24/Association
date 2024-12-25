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
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">Fees Details</h5>
    <div class="mb-3">
        <strong>Application Fee:</strong> {{ $data->application_fee }}
    </div>
    <div class="mb-3">
        <strong>Subscription Fee:</strong> {{ $data->subscription_fee }}
    </div>
    <div class="mb-3">
        <strong>Description:</strong> {{ $data->desc }}
    </div>
    <div class="mb-3">
        <strong>Status:</strong> {{ $data->status }}
    </div>
    <div class="mb-3">
        <a href="{{ route('fee.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
</div>
</div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
