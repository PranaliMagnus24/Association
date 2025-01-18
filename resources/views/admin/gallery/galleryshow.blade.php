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

<div class="container mt-5">
    <h1 class="text-center mb-4">Gallery Details</h1>
    <div class="card">
        <div class="card-body">
            <h3>{{ $gallery->name }}</h3>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($gallery->date)->format('d M Y H:i') }}</p>
            <p><strong>Location:</strong> {{ $gallery->location }}</p>



            <h3>Images:</h3>
<div class="row" id="imageGallery">
    @foreach($images as $image)
        <div class="col-4 mb-3 text-center">
            <img
                src="{{ asset('upload/' . $image->name) }}"
                alt="{{ $image->name }}"
                class="img-thumbnail"
                style="width: 150px; height: 150px; object-fit: cover; cursor: pointer;">
            <p>{{ $image->name }}</p>
        </div>
    @endforeach
</div>



<script>

    function selectImage(imageUrl) {
        const previewDiv = document.getElementById('selectedImagePreview');

        // Clear existing preview
        previewDiv.innerHTML = '';

        // Create an <img> element for the selected image
        const imgElement = document.createElement('img');
        imgElement.src = imageUrl;
        imgElement.alt = 'Selected Image';
        imgElement.style.width = '300px';
        imgElement.style.height = '300px';
        imgElement.style.objectFit = 'cover';
        imgElement.style.border = '1px solid #ddd';
        imgElement.style.borderRadius = '4px';
        imgElement.style.padding = '5px';

        // Append the image to the preview div
        previewDiv.appendChild(imgElement);
    }
</script>



            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('gallerylist') }}" class="btn btn-secondary">Back to Gallery List</a>
            </div>
        </div>
    </div>
</div>
    </main>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
