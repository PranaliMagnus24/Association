@include('home.includes.head')
@include('home.includes.navbar')

<style>
    /* Section Wrapper */
.details-description {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Author Details */
.author-img img {
    width: 100%;
    height: 84%;
    border-radius: 50%;
    border: 3px solid #007bff;
}

.authordetails h5 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 5px;
}

.rating i.filled {
    color: #ffcc00;
}

.rating-color {
    color: #ddd;
}

/* Rate Details */
.rate-details {
    text-align: right;
}

.rate-details h2 {
    font-size: 28px;
    font-weight: 700;
    color: #28a745;
}

/* Description Links */
.descriptionlinks ul {
    padding: 0;
    margin: 0;
    list-style: none;
}

.descriptionlinks ul li {
    display: inline-block;
    margin-right: 15px;
}

.descriptionlinks ul li a {
    color: #007bff;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
}

/* Listing Features */
.listing-section .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    background: #fff;
    margin-bottom: 20px;
}

.card-header {
    background: transparent;
    border-bottom: none;
    font-size: 18px;
    font-weight: 600;
    padding: 15px;
}

.card-body {
    padding: 20px;
}

/* Feature Icons */
.listing-section img {
    width: 50px;
    margin-bottom: 10px;
}

/* Gallery Section */
.gallery-section img {
    width: 100%;
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
}

.gallery-section img:hover {
    transform: scale(1.05);
}

.card-wrapper{
    max-width: 1100px;
    margin: 0 auto;
    display: flex; /* Use flexbox to align items side by side */
    justify-content: space-between;
}
.card {
    border: 1px solid #ddd; /* Add border */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Enhanced shadow */
    background: #fff;
    margin-bottom: 20px;
}

.video-container {
    width: 320px; /* Set a fixed width for the video container */
    /* You can adjust the width as needed */
}

.video-container video {
    width: 100%; /* Make video responsive */
    height: 240px
}
img{
    width: 100%;
    display: block;
}
.img-display{
    overflow: hidden;
    height: 300px;
}
.img-showcase{
    display: flex;
    width: 100%;
    height: 67%;
    transition: all 0.5s ease;
}
.img-showcase img{
    min-width: 100%;
    height: 146%;
    object-fit: cover;
    width: 100%;
    max-height: 350px; /* Adjust main image height */
    cursor: pointer;
}
.img-select{
    display: flex;
    margin-to: -127px;
}
.img-item{
    margin: 0.3rem;
}
.img-item:nth-child(1),
.img-item:nth-child(2),
.img-item:nth-child(3){
    margin-right: 0;
}
.img-item:hover{
    opacity: 0.8;
}
.product-content{
    padding: 2rem 1rem;
}
.product-title{
    font-size: 3rem;
    text-transform: capitalize;
    font-weight: 700;
    position: relative;
    color: #12263a;
    margin: 1rem 0;
}
.product-title::after{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 4px;
    width: 80px;
    background: #12263a;
}
.product-link{
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 400;
    font-size: 0.9rem;
    display: inline-block;
    margin-bottom: 0.5rem;
    background: #256eff;
    color: #fff;
    padding: 0 0.3rem;
    transition: all 0.5s ease;
}
.product-link:hover{
    opacity: 0.9;
}
.product-rating{
    color: #ffc107;
}
.product-rating span{
    font-weight: 600;
    color: #252525;
}
.product-price{
    margin: 1rem 0;
    font-size: 1rem;
    font-weight: 700;
}
.product-price span{
    font-weight: 400;
}

.new-price span{
    color: #256eff;
}
.product-detail h2{
    text-transform: capitalize;
    color: #12263a;
    padding-bottom: 0.6rem;
}
.product-detail p{
    font-size: 1.2rem;
    padding: 0.3rem;
    opacity: 0.8;
}

.purchase-info {
    margin: 1.5rem 0;
}

.purchase-info .btn {
    border: 1.5px solid #ddd;
    border-radius: 25px;
    text-align: center;
    padding: 0.6rem 1.2rem;
    outline: 0;
    margin-right: 0.5rem;
    margin-bottom: 1rem;
    font-size: 1.3rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s ease-in-out;
}

/* Specific styles for WhatsApp button */
.whatsapp-btn {
    background: #25D366;
    color: white;
    border-color: #25D366;
}

.whatsapp-btn:hover {
    background: #1da851;
    color: white;
}

/* Icon styling */
.whatsapp-btn i {
    font-size: 1.6rem;
    margin-right: 8px;
}



@media screen and (min-width: 992px){
    .product_details{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }
    .card-wrapper{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .product-imgs{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .product-content{
        padding-top: 0;
    }
}

.thumbnail-img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border 0.3s;
    }

    .thumbnail-img:hover, .thumbnail-img.active {
        border: 2px solid #007bff;
    }
    .custom-input {
    width: 100%;
    max-width: 350px;
}

/* Medium Screens (Tablets) */
@media (max-width: 768px) {
    .custom-input {
        max-width: 300px;
    }
}

/* Small Screens (Mobile) */
@media (max-width: 576px) {
    .custom-input {
        max-width: 100%; /* Full width for small screens */
    }
}



    .gallery-section .card-header {
    display: flex;
    align-items: center;
}

.gallery-section img {
    width: 100%;
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
}

.gallery-section img:hover {
    transform: scale(1.05);
}

.gallery-widget {
    overflow: hidden; /* Ensure images don't overflow their container */
}

.gallery-content {
    margin-top: 15px; /* Add some space between the header and the images */
}




.carousel-item img {
        height: 250px;
        object-fit: cover;
    }

    .gallery-widget {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>

<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">{{ __('messages.Ramzan Bazar') }}</h1>
                    <p>
                        {{ __('messages.The truthful and honest businessman will be in the company of the Prophets, the truthful ones (Siddeeqeen), and the martyrs (Shuhada) on the Day of Judgment.(Mishkat al-Masabih, Hadith 2828)') }}
                    </p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="page-content-wrap">
    <div class="directory-list py-5 bg-light">
        <!-- Details Description Section -->
        <section class="details-description">
            <div class="container">
                <div class="about-details d-flex align-items-center justify-content-between">
                    <div class="d-flex">
                        <div class="author-img">
                            @if($shop->shop_logo)
                            <a href="{{ route('shop.profile', ['id' => $catalog->shop->id, 'name' => Str::slug($catalog->shop->shop_name)]) }}">
                                <img src="{{ asset('upload/catalog/shop-logo/' . $shop->shop_logo) }}" alt="Shop Logo" class="img-fluid mb-4">
                            </a>
                            @endif
                        </div>
                        <div class="authordetails ms-3">
                            <a href="{{ route('shop.profile', ['id' => $catalog->shop->id, 'name' => Str::slug($catalog->shop->shop_name)]) }}">
                                <h5>{{ $shop->shop_name }}</h5>
                            </a>
                            <p>{!! ($shop->shop_desc) !!}</p>

                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="far fa-star rating-color"></i>
                                <span class="d-inline-block average-rating"> 4.5 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="descriptionlinks mt-3">
                    <div class="row">
                        <div class="col-lg-9">
                            <ul class="list-unstyled d-flex flex-wrap gap-3">
                                <li><a href="#"><i class="fas fa-share"></i> Share</a></li>
                                <li><a href="#"><i class="far fa-comment-dots"></i> Write a review</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!---------------product details---------------->
        <div class="container mt-5">
            <div class="row">
                <!-- Card Section -->
                 <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="card product_details">
                        <!-- Product Card -->
                         <div class="product-imgs">
                            <div class="img-display">
                                <div class="img-showcase">
                                    @php
                                    $images = json_decode($catalog->image, true);
                                    $firstImage = !empty($images) ? asset('upload/catalog/' . $images[0]) : '';
                                    @endphp
                                    @if (!empty($firstImage))
                                    <a href="{{ $firstImage }}" data-fancybox="gallery">
                                    <img id="mainImage" src="{{ $firstImage }}" alt="Product Image">
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="img-select d-flex justify-content-start mt-2">
                            @if (!empty($images) && is_array($images))
                            @foreach ($images as $key => $image)
                            <div class="img-item mx-1">
                                <a href="#" data-id="{{ $key + 1 }}">
                                    <img class="thumbnail-img" src="{{ asset('upload/catalog/' . $image) }}" alt="Product Image">
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="product-content">
                        @if(!empty($catalog->brands))
                        <h2 class="product-title">{{ $catalog->brands }}</h2>
                        @endif
                        <div class="product-price">
                            <p class="new-price fs-4">Price: <span>₹{{ $catalog->price }}</span></p>
                        </div>
                        <div class="product-detail">
                            <h5>About this item:</h5>
                            <p>{!! $catalog->description !!}</p>
                        </div>
                        <div class="purchase-info">
                        <button type="button" class="btn whatsapp-btn"
        data-bs-toggle="modal"
        data-bs-target="#whatsappModal"
        data-image="{{ $firstImage }}"
        data-url="{{ url()->current() }}"> <!-- Product Page URL -->
    <i class="fab fa-whatsapp"></i> WhatsApp
</button>


                        </div>
                    </div>
                </div>
                <!--Gallery Section-->
                <div class="card gallery-section">
                    <div class="card-body">
                        <div class="gallery-content">
                            <div class="row">
                                @foreach ($relatedProducts as $index => $catalog)
                                @php
                                $images = json_decode($catalog->image, true);
                                @endphp
                                @if (!empty($images) && is_array($images))
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                    <div class="gallery-widget">
                                        <!-- Bootstrap Carousel -->
                                         <div id="carousel{{ $index }}" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($images as $imgIndex => $image)
                                                <div class="carousel-item {{ $imgIndex == 0 ? 'active' : '' }}">
                                                    <a href="{{ asset('upload/catalog/' . $image) }}" data-fancybox="gallery1">
                                                        <img class="d-block w-100 img-fluid fixed-image" alt="Image" src="{{ asset('upload/catalog/' . $image) }}">
                                                    </a>
                                                </div>
                                                @endforeach
                                    </div>
                                    <!-- Left and Right Controls -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $index }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $index }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </button>
                                </div>

                                <h6 class="text-dark text-center mt-2">{{ $catalog->title }}</h6>
                                <h5 class="text-danger text-center">₹{{ $catalog->price }}</h5>
                                <a href="{{ route('homebazar.details', $catalog->id) }}" class="btn btn-dark w-100 text-white fs-4">View Details</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>


						<!--/Gallery Section-->



        </div>



        <!-- Right Sidebar Section -->
        <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
            <!-- Video Card -->
            @if(!empty($catalog->video))
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="video-container" style="width: 343px;">
                            <video class="w-100" controls title="Product Video">
                                <source src="{{ asset('upload/catalog/' . $catalog->video) }}" type="video/mp4">
                                Your browser does not support the video tag. Please use a modern browser.
                            </video>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Contact Form Card -->
            <div class="card">
                <div class="card-body">
                    <div class="contact-container">
                                 <!----loader----------->
                                 <div id="formLoader" class="d-none position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white" style="opacity: 0.7;">
                                            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                                <span class="visually-hidden">{{ __('messages.Loading') }} ...</span>
                                            </div>
                                        </div>
                                            <!----end loader---->
                                            <form action="{{ route('shop-form')}}" method="POST" id="shopForm">
    @csrf
    <input type="hidden" name="catalog_id" value="{{ $catalog->id }}">
    <input type="hidden" name="shop_id" value="{{ $shop->id }}" id="shop_id">

    <div class="mb-3">
        <label for="name" class="form-label">{{ __('messages.Name') }}<span style="color:red;">*</span></label>
        <input type="text" class="form-control custom-input" id="cbxname" name="name" value="{{ old('name')}}">
        <span class="text-danger error-name"></span>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">{{ __('messages.Phone') }}<span style="color:red;">*</span></label>
        <input type="text" class="form-control custom-input" id="cbxphone" name="phone" value="{{ old('phone')}}">
        <span class="text-danger error-phone"></span>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">{{ __('messages.Email') }}<span style="color:red;">*</span></label>
        <input type="email" class="form-control custom-input" id="cbxemail" name="email" value="{{ old('email')}}">
        <span class="text-danger error-email"></span>
    </div>

    <div class="mb-3">
        <label for="message" class="form-label">{{ __('messages.Message') }}</label>
        <textarea class="form-control custom-input" id="message" name="message" rows="5">{{ old('message')}}</textarea>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary fs-4">{{ __('messages.Send Message') }}</button>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>




    </div>
</section>


<div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="whatsappModalLabel">WhatsApp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal Form -->
                <form action="{{ route('productinquiry')}}" method="POST">
                    @csrf
                    <input type="hidden" id="shop_id" name="shop_id" value="{{ $shop->id }}">
                    <input type="hidden" id="catalog_id" name="catalog_id" value="{{ $catalog->id }}">
                    <input type="hidden" id="whatsapp_image" name="whatsapp_image">
                    <input type="hidden" id="whatsapp_url" name="whatsapp_url">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="wp_name" value="{{ old('wp_name')}}">
                        @error('wp_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="phone" name="wp_phone" value="{{ old('wp_phone')}}">
                        @error('wp_phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="wp_message" rows="5">{{ old('wp_message')}}</textarea>
                        @error('wp_message')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3 text-center">
                        <img id="whatsappModalImage" class="img-fluid rounded shadow mx-auto d-block"
                            style="max-width: 200px; height: 200px; object-fit: cover;"
                            alt="Product Image">
                    </div>

                    <div class="mb-3 text-center">
                        <p><strong>Product Link:</strong>
                            <a id="whatsappModalUrl" href="#" target="_blank" class="text-primary"></a>
                        </p>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary fs-4">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
 document.addEventListener("DOMContentLoaded", function () {

        // Image Selection Logic
        const mainImage = document.getElementById("mainImage");
        const thumbnails = document.querySelectorAll(".thumbnail-img");

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener("click", function (event) {
                event.preventDefault();
                const newImageSrc = this.src;
                mainImage.src = newImageSrc;
                mainImage.parentElement.href = newImageSrc;
            });
        });
    });

    document.getElementById('shopForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);
    const csrfToken = document.querySelector('input[name="_token"]').value;
    const errorElements = document.querySelectorAll('.text-danger');

    // Clear previous errors
    errorElements.forEach(error => error.innerText = '');

    let isValid = true;

    // Validate Name
    const name = document.getElementById('cbxname');
    if (!name.value.trim()) {
        isValid = false;
        document.querySelector('.error-name').innerText = 'Name is required.';
    }

    // Validate Phone
    const phone = document.getElementById('cbxphone');
    if (!phone.value.trim() || !/^\d{10}$/.test(phone.value)) {
        isValid = false;
        document.querySelector('.error-phone').innerText = 'A valid 10-digit phone number is required.';
    }

    // Validate Email
    const email = document.getElementById('cbxemail');
    if (!email.value.trim() || !/\S+@\S+\.\S+/.test(email.value)) {
        isValid = false;
        document.querySelector('.error-email').innerText = 'A valid email is required.';
    }

    // If validation fails, stop submission
    if (!isValid) return;

    // Submit via AJAX
    fetch("/event-store", {
            method: "POST",

 headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: formData,
        })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            swal({
                title: "Success!",
                text: data.message,
                icon: "success",
                button: "OK",
            }).then(() => {
                form.reset();
            });
        } else {
            swal({
                title: "Error!",
                text: data.message,
                icon: "error",
                button: "OK",
            });
        }
    })
    .catch(error => {
        swal({
            title: "Error!",
            text: "Something went wrong. Please try again.",
            icon: "error",
            button: "OK",
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    var whatsappButtons = document.querySelectorAll(".whatsapp-btn");

    whatsappButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var productImage = this.getAttribute("data-image");
            var productUrl = this.getAttribute("data-url");

            var modalImage = document.getElementById("whatsappModalImage");
            var modalUrl = document.getElementById("whatsappModalUrl");

            var imageField = document.getElementById("whatsapp_image");
            var urlField = document.getElementById("whatsapp_url");

            if (modalImage) {
                modalImage.src = productImage;
            }
            if (modalUrl) {
                modalUrl.href = productUrl;
                modalUrl.textContent = productUrl;
            }
            if (imageField) {
                imageField.value = productImage;
            }
            if (urlField) {
                urlField.value = productUrl;
            }
        });
    });
});

</script>



@include('home.includes.footer')
