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

 <!---Add Member--->
         <div class="container">
         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

         <div class="text-end mb-3">
        <a href="{{ url('admin/fees')}}" class="btn btn-primary">Back</a>
         </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Fees</h5>
              <form class="row g-3" method="POST" action="{{ route('fee.store') }}">
              @csrf
              <div class="col-md-4">
              <label for="inputName5" class="form-label">Membership Type</label>
              <select name="membership_id" id="inputState" class="form-select">
                <option value="#">Select Membership Type</option>
                @foreach ($memberships as $membership)
                <option value="{{ $membership->id }}">{{ $membership->title }}</option>
                @endforeach
              </select>

              </div>
                <div class="col-md-12">
                <label for="inputName5" class="form-label">Application Fee</label>
                  <input type="text" class="form-control" name="application_fee" placeholder="Application fee"  value="{{ old('application_fee') }}">
                  @error('application_fee')
               <div class="text-danger">{{ $message }}</div>
              @enderror
                </div>
                <div class="col-md-12">
                <label for="inputName5" class="form-label">Subscription Fee</label>
                  <input type="text" class="form-control" name="subscription_fee" placeholder="Subscription fee" value="{{ old('subscription_fee')}}">
                  @error('subscription_fee')
               <div class="text-danger">{{ $message }}</div>
              @enderror
                </div>
                <div class="col-12">
                <label for="inputName5" class="form-label">Fees Description</label>
                <textarea class="form-control" placeholder="Description" id="floatingTextarea" style="height: 100px;" name="desc"></textarea>
                </div>
                <div class="col-md-4">
                <label for="inputState" class="form-label">Status</label>
                  <select id="inputState" class="form-select" name="status">
                    <option value="active" selected>Active</option>
                    <option value="inactive">Inactive</option>

                  </select>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
         </div>


    <!---End--->
  </main>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
