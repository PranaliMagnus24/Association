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
    <h1 class="text-center mb-4">Edit Gallery</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $gallery->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="datetime-local" name="date" id="date" class="form-control"
                           value="{{ \Carbon\Carbon::parse($gallery->date)->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ $gallery->location }}" required>
                </div>
                <div class="mb-3">
                    <label for="gallery" class="form-label">Existing Images</label>
                    <div>
                        @if($gallery->gallery)
                            @foreach($gallery->gallery as $image)
                                <div class="d-inline-block position-relative me-2">
                                    <img src="{{ asset('upload/' . $image) }}" alt="Image" style="width: 100px; height: 100px;">
                                    <a href="{{ route('gallery.delete', [$gallery->id, $image]) }}"
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0">x</a>
                                </div>
                            @endforeach
                        @else
                            <p>No images uploaded yet.</p>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gallery" class="form-label">Upload New Images</label>
                    <input type="file" name="gallery[]" id="gallery" class="form-control" multiple>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Update Gallery</button>
                    <a href="{{ route('gallerylist') }}" class="btn btn-secondary ms-2">Back</a>
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

