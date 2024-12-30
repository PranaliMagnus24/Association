<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.head')
</head>
<style>
    .membership-form {
        margin-bottom: 20px;
        padding: 15px;
    }
</style>
<body>

  <!-- ======= Header ======= -->
  @include('admin.layouts.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Edit Membershi year</li>
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
        <a href="{{ url('admin/membershipyear')}}" class="btn btn-primary">Back</a>
         </div>
          <div class="card">
            <div class="card-body">
                <br>
            <div id="membership-forms">
            <form class="row g-3" method="POST" action="{{ route('membershipyear.update', $data->id) }}">
                @csrf
                    <div class="row membership-form">
                        <div class="col">
                            <label for="inputName5" class="form-label">Add Membership Year</label>
                            <input type="text" class="form-control membership_year" name="membership_year" placeholder="Add year" value="{{$data->membership_year}}">
                            @error('membership_year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputState" class="form-label">Default Membership Year</label>
                            <select class="form-select default_year" name="default_year" value="{{$data->default_year}}">
                                <option value="Month">Month</option>
                                <option value="Year">Year</option>
                                <option value="Lifetime">Lifetime</option>
                            </select>
                            @error('default_year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputName5" class="form-label">Membership Fee</label>
                            <input type="text" class="form-control" name="membership_fee" placeholder="Your Fee" value="{{$data->membership_fee}}">
                            @error('membership_fee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputState" class="form-label">Status</label>
                            <select id="inputState" class="form-select" name="status" value="{{$data->status}}">
                                <option value="active"selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary" value="Update Membership Year">Update</button>
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
