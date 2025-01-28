  @include('admin.layouts.head')
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
        <a href="{{ route('imagelisting') }}" class="btn btn-primary">Back</a>
         </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Committee</h5>
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form id="imageForm" method="POST" enctype="multipart/form-data" action="{{ route('image.store') }}">
                @csrf
                <div class="row">
                    <!-- Page Dropdown -->
                    <div class="col-md-6 mb-3">
                        <label for="page" class="form-label">Page</label>
                        <select name="page" class="form-control mb-3">
                            @foreach($pages as $page)
                                <option value="{{ $page->name }}">{{ $page->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Content Type Dropdown -->
                    <div class="col-md-6 mb-3">
                        <label for="ctype" class="form-label">Content Type</label>
                        <select name="ctype" class="form-control mb-3" id="ctype" onchange="toggleGalleryDropdown()">
                            <option value="Banner">Banner</option>
                            <option value="Greeting">Greeting</option>
                            <option value="Gallery">Gallery</option>
                        </select>
                    </div>
                </div>


               <!-- Gallery Dropdown (visible when 'Gallery' is selected) -->
<div class="row" id="galleryDropdown" style="display: none;">
    <div class="col-md-12 mb-3">
        <label for="gallery" class="form-label">Select Gallery</label>
        <select name="gallery_id" class="form-control" id="gallery" >
            <option value="">Select an Image</option>
            @foreach($gallerys as $gallery)
                <option value="{{ $gallery->id }}">{{ $gallery->name }}</option>
            @endforeach
        </select>
    </div>
</div>


                <div class="row">

                <!-- Selected Image Preview -->
                <div class="col-md-6 mb-3" id="selectedImageContainer" style="display: none;">
                    <label for="selectedImage" class="form-label">Selected Image</label>
                    <img id="selectedImage" src="" alt="Selected Image" style="max-width: 100%; height: auto; border: 1px solid #ddd; padding: 5px;">
                </div>

                <!-- Date Fields -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="start_datetime" class="form-label">Start Date</label>
                        <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_datetime" class="form-label">End Date</label>
                        <input type="datetime-local" class="form-control" id="end_datetime" name="end_datetime">
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="inputImage" class="form-label">Select Image</label>
                        <input type="file" id="inputImage" class="form-control" name="name[]" multiple>
                    </div>
                </div>

                <!-- Crop Image Section -->
                <div class="w-10">
                    <button type="button" id="cropButton" class="btn btn-primary w-10" style="display: none;">Crop Image</button>
                    <button type="submit" class="btn btn-success w-10"><i class="fa fa-save"></i> Upload</button>

                </div>

                <!-- <div class="col-md-6 mb-3">
            <label for="inputThumbnail" class="form-label">Select Thumbnail (Optional)</label>
            <input type="file" id="inputThumbnail" class="form-control" name="thumbnail">
        </div> -->

        <!-- Thumbnail Preview -->
        <div class="col-md-6 mb-3" id="thumbnailPreviewContainer" style="display: none;">
            <label class="form-label">Thumbnail Preview</label>
            <img id="thumbnailPreview" src="" alt="Thumbnail Preview" style="max-width: 100%; height: auto; border: 1px solid #ddd; padding: 5px;">
        </div>

                <div id="imageContainer" class="mb-3" style="display: none;">
                    <img id="croppingImage" alt="Image to crop" class="img-fluid">
                </div>
            </form>
        </div>
    </div>
</div>
</main>


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

    function toggleGalleryDropdown() {
        if (ctypeSelect.value === 'Gallery') {
            galleryDropdown.style.display = 'block';
        } else {
            galleryDropdown.style.display = 'none';
            selectedImageContainer.style.display = 'none';
            selectedImage.src = '';
        }
    }

    function showSelectedImage() {
        const galleryId = document.getElementById('gallery').value;
        const selectedImageContainer = document.getElementById('selectedImageContainer');
        const selectedImage = document.getElementById('selectedImage');

        if (galleryId) {
            const imageUrl = '/upload/' + galleryId + '.jpg'; // Update this URL based on your logic
            selectedImage.src = imageUrl;
            selectedImageContainer.style.display = 'block';
        } else {
            selectedImageContainer.style.display = 'none';
            selectedImage.src = '';
        }
    }

    inputImage.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const selectedType = ctypeSelect.value;

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                croppingImage.src = e.target.result;

                if (selectedType === 'Banner') {
                    const tempImg = new Image();
                    tempImg.onload = function () {
                        if (tempImg.width < 1920 || tempImg.height < 1280) {
                            alert("The selected image is too small. Minimum dimensions are 1920x1280 pixels.");
                            inputImage.value = ""; // Reset file input
                            return;
                        }
                        initializeCropper(1920 / 1280); // Fixed aspect ratio for Banner
                    };
                    tempImg.src = e.target.result;
                } else {
                    initializeCropper(NaN); // Free aspect ratio for Greeting or Gallery
                }
            };
            reader.readAsDataURL(file);
        }
    });

    function initializeCropper(aspectRatio) {
        imageContainer.style.display = 'block';
        cropButton.style.display = 'inline-block';

        if (cropper) cropper.destroy();
        cropper = new Cropper(croppingImage, {
            aspectRatio: aspectRatio,
            viewMode: 2,
            autoCropArea: 1,
        });
    }

    cropButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission
        const selectedType = ctypeSelect.value;

        const canvas = cropper.getCroppedCanvas(
            selectedType === 'Banner'
                ? { width: 1920, height: 1280 }
                : {}
        );

        canvas.toBlob(function (blob) {
            const formData = new FormData();
            formData.append('croppedImage', blob);
            formData.append('page', document.querySelector('[name="page"]').value);
            formData.append('ctype', selectedType);
            formData.append('start_datetime', document.getElementById('start_datetime').value);
            formData.append('end_datetime', document.getElementById('end_datetime').value);

            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.content : '';

            fetch('{{ route("image.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Image uploaded successfully!');
                    location.reload();
                } else {
                    alert('Failed to upload image');
                }
            })
            .catch(error => {
                alert('Error: ' + error);
            });
        });
    });
</script>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')


