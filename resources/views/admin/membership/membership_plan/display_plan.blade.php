
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
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">Plan Details</h5>
    <div class="mb-3">
        <strong>Package title:</strong> {{ $plan->package_title }}
    </div>
    <div class="row mb-3">
      <div class="col-md-4">
     <p>  <strong>Application Fee:</strong> Rs.{{ $plan->application_fee }}</p>
      </div>
      <div class="col-md-4">
     <p>  <strong>One Year Membership Fee:</strong> Rs.{{ $plan->oneyear_fee }}</p>
      </div>
      @if(!empty($plan->fiveyear_fee))
      <div class="col-md-4">
     <p>  <strong>Five Year Membership Fee:</strong> Rs.{{ $plan->fiveyear_fee }}</p>
      </div>
      @endif
    </div>

    <div class="row mb-3">
    <div class="col-md-4">
   <p><strong>Trial:</strong> {{ ucfirst($plan->trial) }}</p></p>
    </div>
    @if(!empty($plan->trial_days))
    <div class="col-md-4">
   <p><strong>Trial Days:</strong> {{ $plan->trial_days }}</p></p>
    </div>
    @endif
</div>



    <div class="mb-3">
        <strong>Package term:</strong> {{ $plan->package_term }}
    </div>
    <div class="mb-3">
        <strong>Status:</strong> {{ $plan->status }}
    </div>
    <div class="mb-3">
        <a href="{{ route('membershipplan.list')}}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
</div>
</div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')


