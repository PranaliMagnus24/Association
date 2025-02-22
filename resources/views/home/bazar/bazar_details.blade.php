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
    width: 80px;
    height: 80px;
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
                            <img src="{{ asset('homecss/assets/images/blog/author.jpg')}}" alt="Author Image">
                        </div>
                        <div class="authordetails ms-3">
                            <h5>shop_name</h5>
                            <p>shop_desc</p>


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
                    <div class="rate-details">
                        <h2>$350</h2>
                        <p>Fixed</p>
                    </div>
                </div>
                <div class="descriptionlinks mt-3">
                    <div class="row">
                        <div class="col-lg-9">
                            <ul class="list-unstyled d-flex flex-wrap gap-3">
                                <li><a href="#"><i class="fas fa-map"></i>
                                Get Directions</a></li>
                                <li><a href="#"><i class="fas fa-globe"></i>
                                Website</a></li>
                                <li><a href="#"><i class="fas fa-share"></i>
                                Share</a></li>
                                <li><a href="#"><i class="far fa-comment-dots"></i> Write a review</a></li>
                                <li><a href="#"><i class="fas fa-flag"></i>
                                </i> Report</a></li>
                                <li><a href="#"><i class="fas fa-bookmark"></i>
                                Save</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 text-lg-end">
                            <a href="contact.html" class="btn btn-primary fs-4"><i class="feather-phone-call"></i> Call Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/Details Description Section -->

        <div class="details-main-wrapper listing-section">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- Description Section -->
                        <div class="card">
                            <div class="card-header">
                                <h4><i class="fas fa-file-alt"></i>
                                 Description</h4>
                            </div>
                            <div class="card-body">
                                <p>{!! $catalog->description !!}</p>
                            </div>
                        </div>

                        <!-- Listing Features Section -->
                       {{-- <div class="card mt-4">
                            <div class="card-header d-flex align-items-center">
                                <i class="feather-list me-2"></i>
                                <h4>Listing Features</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3 text-center">
                                        <img src="assets/img/featured/Feature-1.svg" alt="Room Amenities">
                                        <h6>Room Amenities</h6>
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <img src="assets/img/featured/Feature-2.svg" alt="Bathroom Amenities">
                                        <h6>Bathroom Amenities</h6>
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <img src="assets/img/featured/Feature-3.svg" alt="Media Technology">
                                        <h6>Media & Technology</h6>
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <img src="assets/img/featured/Feature-4.svg" alt="Food Security">
                                        <h6>Food & Security</h6>
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <img src="assets/img/featured/Feature-5.svg" alt="Services & Extra">
                                        <h6>Services & Extras</h6>
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <img src="assets/img/featured/Feature-6.svg" alt="Outdoor View">
                                        <h6>Outdoor & View</h6>
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <img src="assets/img/featured/Feature-7.svg" alt="Accessibility">
                                        <h6>Accessibility</h6>
                                    </div>
                                    <div class="col-md-4 mb-3 text-center">
                                        <img src="assets/img/featured/Feature-8.svg" alt="Safety Security">
                                        <h6>Safety & Security</h6>
                                    </div>
                                </div>
                            </div>
                        </div>--}}

                        <!-- Gallery Section -->
                        <div class="card gallery-section mt-4">
    <div class="card-header d-flex align-items-center">
        <h4><i class="fas fa-images"></i> Gallery</h4>
    </div>
    <div class="card-body">
        <div class="row">
            @if (!empty($images))
                @foreach ($images as $image)
                    <div class="col-md-3 mb-3">
                        <a href="{{ asset('upload/catalog/' . $image) }}" data-fancybox="gallery">
                            <img class="img-fluid" src="{{ asset('upload/catalog/' . $image) }}" alt="Gallery Image">
                        </a>
                    </div>
                @endforeach
            @else
                <p>No images available.</p>
            @endif
        </div>
    </div>
</div>



                        <!-- /Gallery Section -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        Fancybox.bind("[data-fancybox='gallery']", {
            Toolbar: {
                display: ["zoom", "prev", "next", "close"], // Enable zoom, navigation & close buttons
            },
            Image: {
                zoom: true, // Enable zooming
            },
            Thumbs: {
                autoStart: true, // Show thumbnails
            },
            Carousel: {
                transition: "slide", // Smooth sliding effect
            },
        });
    });
</script>



@include('home.includes.footer')
