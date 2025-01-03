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
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">Details</h5>
    @php
    $datas = App\Models\FAQ::paginate(5);
    @endphp
    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Question</strong></label>
            <p>{{ $data->question }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Answer</strong></label>
            <p>{{ $data->answer }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Status</strong></label>
            <p>{{ $data->status }}</p>
        </div>
    </div>
    </div>


    <div class="mb-3">
        <a href="{{ route('faq.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
</div>
</div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
