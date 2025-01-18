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
        <a href="{{ route('gallerylist')}}" class="btn btn-primary">Back</a>
         </div>
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Add Gallery</h5>

            <form class="row g-3" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                <div class="col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="col-6">
    <label for="date" class="form-label">Date</label>
    <input
        type="datetime-local"
        name="date"
        id="date"
        class="form-control"
        value="{{ isset($gallery) && $gallery->date ? $gallery->date->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i') }}"
    >
</div>

                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" id="location" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="gallery" class="form-label">Gallery (Optional)</label>
                        <input type="file" name="gallery" id="gallery" class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Save Gallery</button>
                </div>
            </form>
        </div>
    </div>
</div>


</main>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
