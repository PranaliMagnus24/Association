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
        <h3 class="card-header">Edit Image</h3>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form id="imageForm" method="POST" enctype="multipart/form-data" action="{{ route('update', $image->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="page" class="form-label">Page</label>
                        <select name="page" class="form-control mb-3">
                            @foreach($pages as $page)
                                <option value="{{ $page->name }}" {{ $image->page == $page->name ? 'selected' : '' }}>{{ $page->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="ctype" class="form-label">Content Type</label>
                        <select name="ctype" class="form-control mb-3" id="ctype" onchange="toggleGalleryDropdown()">
                            <option value="Banner" {{ $image->ctype == 'Banner' ? 'selected' : '' }}>Banner</option>
                            <option value="Greeting" {{ $image->ctype == 'Greeting' ? 'selected' : '' }}>Greeting</option>
                            <option value="Gallery" {{ $image->ctype == 'Gallery' ? 'selected' : '' }}>Gallery</option>
                        </select>
                    </div>
                </div>

                <!-- Gallery Dropdown (Visible when 'Gallery' is selected) -->
                <div class="row" id="galleryDropdown" style="display: {{ $image->ctype == 'Gallery' ? 'block' : 'none' }}">
                    <div class="col-md-12 mb-3">
                        <label for="gallery" class="form-label">Select Gallery</label>
                        <select name="gallery_id" class="form-control" id="gallery" onchange="showSelectedImage()">
                            <option value="">Select an Image</option>
                            @foreach($gallerys as $gallery)
                                <option value="{{ $gallery->id }}" {{ $image->gallery_id == $gallery->id ? 'selected' : '' }}>{{ $gallery->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Image Preview -->
                <div class="row">
                    <div class="col-md-6 mb-3" id="selectedImageContainer" style="display: {{ $image->ctype == 'Gallery' ? 'block' : 'none' }}">
                        <label for="selectedImage" class="form-label">Selected Image</label>
                        <img id="selectedImage" src="{{ $image->ctype == 'Gallery' ? asset('upload/gallery' . $image->name) : '' }}" alt="Selected Image" style="max-width: 100%; height: auto; border: 1px solid #ddd; padding: 5px;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="start_datetime" class="form-label">Start Date</label>
                        <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime" value="{{ $image->start_datetime }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_datetime" class="form-label">End Date</label>
                        <input type="datetime-local" class="form-control" id="end_datetime" name="end_datetime" value="{{ $image->end_datetime }}" required>
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="inputImage" class="form-label">Select Image:</label>
                        <input type="file" id="inputImage" class="form-control" name="name">
                    </div>
                </div>

                <!-- Crop Image Section -->
                <div class="w-10">
                    <button type="button" id="cropButton" class="btn btn-primary w-10" style="display: none;">Crop Image</button>
                    <button type="submit" class="btn btn-primary">Update Image</button>

                    <a href="{{ route('imagelisting') }}" class="btn btn-primary w-10">Back to List</a>
                </div>

                <div id="imageContainer" class="mb-3" style="display: none;">
                    <img id="croppingImage" alt="Image to crop" class="img-fluid">
                </div>

                <!-- Hidden input for the cropped image -->
                <input type="hidden" name="croppedImage" id="croppedImage">
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.js"></script>
<script>
    const ctypeSelect = document.getElementById('ctype');
    const galleryDropdown = document.getElementById('galleryDropdown');
    const selectedImageContainer = document.getElementById('selectedImageContainer');
    const selectedImage = document.getElementById('selectedImage');
    const inputImage = document.getElementById('inputImage');
    const croppingImage = document.getElementById('croppingImage');
    const cropButton = document.getElementById('cropButton');
    const imageContainer = document.getElementById('imageContainer');
    let cropper;

    // Toggle Gallery Dropdown visibility
    function toggleGalleryDropdown() {
        if (ctypeSelect.value === 'Gallery') {
            galleryDropdown.style.display = 'block';
            selectedImageContainer.style.display = 'block';
        } else {
            galleryDropdown.style.display = 'none';
            selectedImageContainer.style.display = 'none';
            selectedImage.src = '';
        }
    }
    cropButton.addEventListener('click', function () {
    const canvas = cropper.getCroppedCanvas({
        width: 1920, height: 1280  // Fixed dimensions for Banner, adjust as needed
    });

    canvas.toBlob(function (blob) {
        const formData = new FormData();
        formData.append('croppedImage', blob); // The image file
        formData.append('page', document.querySelector('[name="page"]').value);
        formData.append('ctype', ctypeSelect.value);
        formData.append('start_datetime', document.getElementById('start_datetime').value);
        formData.append('end_datetime', document.getElementById('end_datetime').value);

        fetch('{{ route("update", $image->id) }}', {
            method: 'PUT',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href ;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });
});


    // Show Selected Image from Gallery
    function showSelectedImage() {
        const galleryId = document.getElementById('gallery').value;
        if (galleryId) {
            selectedImage.src = '/upload/gallery' + galleryId + '.jpg';  // Update this logic based on gallery selection
            selectedImageContainer.style.display = 'block';
        } else {
            selectedImageContainer.style.display = 'none';
        }
    }

    // Handle Image Upload and Crop
    inputImage.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const selectedType = ctypeSelect.value;

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                croppingImage.src = e.target.result;

                // Set cropper settings based on content type
                const aspectRatio = selectedType === 'Banner' ? 1920 / 1280 : NaN;
                initializeCropper(aspectRatio);
            };
            reader.readAsDataURL(file);
        }
    });

    // Initialize Cropper
    function initializeCropper(aspectRatio) {
        imageContainer.style.display = 'block';
        cropButton.style.display = 'inline-block';

        if (cropper) cropper.destroy();  // Destroy any existing cropper instance
        cropper = new Cropper(croppingImage, {
            aspectRatio: aspectRatio,
            viewMode: 2,
            autoCropArea: 1
        });
    }

    // Handle Crop Button click
    cropButton.addEventListener('click', function () {
        const canvas = cropper.getCroppedCanvas({
            width: 1920, height: 1280  // Fixed dimensions for Banner, free for other types
        });

        canvas.toBlob(function (blob) {
            const formData = new FormData();
            formData.append('croppedImage', blob);
            formData.append('page', document.querySelector('[name="page"]').value);
            formData.append('ctype', ctypeSelect.value);
            formData.append('start_datetime', document.getElementById('start_datetime').value);
            formData.append('end_datetime', document.getElementById('end_datetime').value);

            fetch('{{ route("update", $image->id) }}', {
                method: 'PUT',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    });

    // Initialize gallery dropdown visibility on page load
    window.onload = function () {
        toggleGalleryDropdown();
    };
</script>
</main>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
