@include('home.includes.head')
@include('home.includes.navbar')
<style>

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
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h5 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Shop Registration Form</h5>
                            <form action="{{ route('bazarregistration.store') }}" method="POST" enctype="multipart/form-data">
    @csrf  <!-- CSRF Token is required -->
    <div class="row mb-3">
        <label for="shopName">Shop Name</label>
        <div class="col-12">
            <input type="text" class="form-control" id="shop-name" name="shop_name" value="{{ old('shop_name') }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="shop_location">Shop Location</label>
            <input type="text" name="shop_location" id="shop_location" class="form-control" value="{{ old('shop_location') }}">
        </div>
        <div class="col-6">
            <label for="shop_logo">Shop Logo</label>
            <input type="file" name="shop_logo" id="shop_logo" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="shop_desc">Shop Description</label>
        <textarea name="shop_desc" id="shop_desc" class="form-control" style="height: 150px;">{{ old('shop_desc') }}</textarea>
    </div>

    <div class="mt-4 pt-2 text-center">
        <button type="submit" class="btn btn-primary fs-4">Submit</button>
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

@include('home.includes.footer')
