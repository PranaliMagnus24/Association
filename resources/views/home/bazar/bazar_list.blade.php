@include('home.includes.head')
@include('home.includes.navbar')
<style>
 .category-scroll {
            white-space: nowrap;
            overflow-x: auto;
            padding: 10px;
            background: white;
        }
        .category-item {
            display: inline-block;
            text-align: center;
            margin-right: 15px;
        }
        .category-item img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid #1dd983;
            padding: 5px;
        }
        .category-item p {
            font-size: 14px;
            font-weight: bold;
            margin-top: 5px;
        }
        .product-card img {
    max-width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
}
        .filter-section {
    background: white;
    padding: 15px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

        .discount-badge {
            font-size: 12px;
            font-weight: bold;
            color: white;
            background-color: red;
            padding: 2px 5px;
            border-radius: 3px;
        }
        .slider-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: white;
            padding: 10px;
        }
        .category-scroll {
            white-space: nowrap;
            overflow-x: hidden;
            scroll-behavior: smooth;
            display: flex;
            flex-wrap: nowrap;
            width: 59%;
        }
        .category-item {
            flex: 0 0 auto;
            text-align: center;
            margin-right: 15px;
        }
        .category-item img {
            width: 87px;
            height: 87px;
            border-radius: 50%;
            border: 2px solid #1dd983;
            padding: 5px;
        }
        .category-item p {
            font-size: 14px;
            font-weight: bold;
            margin-top: 5px;
        }
        .slider-btn {
            background-color: #1dd983;
            border: none;
            padding: 5px 10px;
            font-size: 20px;
            border-radius: 50%;
            cursor: pointer;
        }
        .product-card .card-footer {
    text-align: center;
    padding: 10px;
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



     <!-- Categories Scroll Section -->
     <div class="slider-container">
    <button class="slider-btn text-white" id="left-btn">&#10094;</button>

    <div class="category-scroll" id="category-scroll">
        @foreach ($categories as $category)
            <div class="category-item">
                <img src="{{ asset('upload/catalog/' . $category->image) }}" alt="{{ $category->catalog_category_name }}">
                <p>{{ $category->catalog_category_name }}</p>
            </div>
        @endforeach
    </div>

    <button class="slider-btn text-white" id="right-btn">&#10095;</button>
</div>
<!-- 🔹 Uploaded Videos Section -->

<!-- <div class="container mt-4">
    <h4 class="text-center mb-3">Featured Videos</h4>

    <div class="row justify-content-center">
        @foreach ($catalogs as $catalog)
            @if (!empty($catalog->video))
                <div class="col-md-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <video controls class="w-100" style="max-height: 350px; object-fit: cover;">
                            <source src="{{ asset('upload/catalog/' . $catalog->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        {{--<div class="card-body text-center">
                            <h5 class="card-title">{{ $catalog->title }}</h5>
                        </div>--}}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div> -->


<div class="container mt-3">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-md-3">
            <div class="filter-section shadow-sm p-3 rounded">
                <h5>Filtered by</h5>
                <a href="{{ route('homebazar') }}" class="text-danger">Clear Filters</a>

                <h6 class="mt-3">Department</h6>
                <form method="GET" action="{{ route('homebazar') }}">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="department" value="all"
                            {{ request('department') == 'all' ? 'checked' : '' }}
                            onchange="this.form.submit();">
                        <label class="form-check-label">All</label>
                    </div>
                    @foreach($categories as $category)
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="department" value="{{ $category->catalog_category_name }}"
                            {{ request('department') == $category->catalog_category_name ? 'checked' : '' }}
                            onchange="this.form.submit();">
                        <label class="form-check-label">{{ $category->catalog_category_name }}</label>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>

        <div class="col-md-9">
    <div class="row">
        @foreach ($catalogs as $catalog)
        @php
        $images = json_decode($catalog->image, true);
        @endphp
        @if (!empty($images) && is_array($images))
        <div class="col-md-4 mb-4">
            <div class="card product-card border-0 shadow-sm">
                <!-- Shop Name -->
                @if($catalog->shop)
                <div class="shop-name text-center mt-2 mb-2">
                <a href="{{ route('shop.profile', ['id' => $catalog->shop->id, 'name' => Str::slug($catalog->shop->shop_name)]) }}" class="text-dark">
    <strong>{{ $catalog->shop->shop_name }}</strong>
</a>


                </div>
                @endif
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
                <div class="card-footer bg-white border-0">
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
    </div>
</div>


    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
 document.addEventListener("DOMContentLoaded", function() {
    let scrollContainer = document.getElementById("category-scroll");
    let leftBtn = document.getElementById("left-btn");
    let rightBtn = document.getElementById("right-btn");

    leftBtn.addEventListener("click", function(event) {
        event.stopPropagation();
        scrollContainer.scrollBy({ left: -150, behavior: "smooth" });
    });

    rightBtn.addEventListener("click", function(event) {
        event.stopPropagation();
        scrollContainer.scrollBy({ left: 150, behavior: "smooth" });
    });
});

</script>
@include('home.includes.footer')
