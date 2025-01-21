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
         <div class="text-end mb-3">
        <a href="{{ url('admin/membership')}}" class="btn btn-primary">Back</a>
         </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Membership</h5>
              <form class="row g-3" method="POST" action="{{ route('memberships.store') }}">
              @csrf
                <div class="col-md-12">
                <label for="inputName5" class="form-label">Membership Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Your Title">
                </div>
                <div class="col-12">
                <label for="inputName5" class="form-label">Membership Description</label>
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
