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
.product-card img {
    height: 200px; /* Set a fixed height */
    object-fit: cover; /* Ensure the image covers the area without distortion */
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
         <!--/Details Description Section -->
        <section class="details-description">
            <div class="container">
                <div class="about-details d-flex align-items-center justify-content-between">
                    <div class="d-flex">
                        <div class="author-img">
                        @if($shop->shop_logo)
                        <img src="{{ asset('upload/catalog/shop-logo/' . $shop->shop_logo) }}" alt="Shop Logo" class="img-fluid mb-4">
                        @endif
                        </div>
                        <div class="authordetails ms-3">
                            <h5>{{ $shop->shop_name }}</h5>
                            <p>{!! $shop->shop_desc !!}</p>
                            <p>{{ $shop->shop_location }}</p>
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
                                <li><a href="#"><i class="fas fa-share"></i>
                                Share</a></li>
                                <li><a href="#"><i class="far fa-comment-dots"></i> Write a review</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/Details Description Section -->
         <!--/Product Cards -->
         <div class="details-main-wrapper listing-section">
    <div class="container mt-3">
        <div class="row">
            @foreach ($catalogs as $catalog)
                @php
                    $images = json_decode($catalog->image, true);
                @endphp
                @if (!empty($images) && is_array($images))
                    <div class="col-md-4 mb-4">
                        <div class="card product-card border-0 shadow-sm">
                            <!-- Bootstrap Carousel -->
                            <div id="carousel{{ $catalog->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('upload/catalog/' . $image) }}" class="d-block w-100 rounded-0" alt="Product Image">
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Carousel Controls -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $catalog->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $catalog->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $catalog->title }}</h5>
                                <h5 class="text-danger">₹{{ $catalog->price }}</h5>
                            </div>
                            <div class="card-footer bg-white border-0 text-center mb-3">
                                <a href="{{ route('homebazar.details', $catalog->id)}}" class="btn btn-dark w-50 text-white fs-4">View Details</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @if($catalogs->isEmpty())
                <p class="text-center">No products available in this category.</p>
            @endif
        </div>
    </div>
</div>
        <!--End Product Card -->
    </div>
</div>
</section>


@include('home.includes.footer')
