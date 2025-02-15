

@include('member.layout.head')

<style>
    select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: url('https://cdn-icons-png.flaticon.com/16/271/271210.png') no-repeat right 10px center;
    background-size: 12px;
    padding-right: 25px;
}
</style>

  <!-- ======= Header ======= -->
  @include('member.layout.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('member.layout.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

  <div class="pagetitle">
    <h1>
        @if(!empty($companyProfile) && !empty($companyProfile->company_name))
            {{ $companyProfile->company_name }}
        @else
            Default Title
        @endif
    </h1>
</div>


<div class="container">
    <div class="text-end mb-3">
    <a href="#" class="btn btn-primary">Back</a>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Ads</h5>
            <form class="row g-3" method="POST" action="{{route('ads.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
              <label for="ads_name" class="col-md-4 col-lg-3 col-form-label">Name <span style="color:red;">*</span></label>
              <div class="col-md-8 col-lg-9">
              <input type="text" name="ads_name" id="ads_name" class="form-control"placeholder="Add Name">
                @error('ads_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

              </div>
        </form>
    </div>
</div>
</div>
</main>


  <!-- ======= Footer ======= -->
  @include('member.layout.footer')

