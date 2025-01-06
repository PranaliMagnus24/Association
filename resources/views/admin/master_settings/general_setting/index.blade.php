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
    <a href="{{ route('setting.index')}}" class="btn btn-primary">Back</a>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">General Settings</h5>
        <form class="row g-3" method="POST" action="{{route('setting.store')}}" enctype="multipart/form-data">
              @csrf
                <div class="col-md-12">
                <label for="inputName5" class="form-label">Association Name</label>
                  <input type="text" class="form-control" name="association_name" placeholder="Your association name" value="{{ $getRecord->association_name }}">
                  @error('association_name')
               <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="col-12">
                <label for="inputName5" class="form-label">Association Description</label>
                <textarea class="form-control" placeholder="Description" id="floatingTextarea" style="height: 100px;" name="description">{{ $getRecord->description }}</textarea>
                @error('description')
               <div class="text-danger">{{ $message }}</div>
              @enderror
                </div>

                <div class="col-4">
                <label for="inputName5" class="form-label">Association Logo</label>
                <input type="file" class="form-control" name="association_logo" id="staticLogo">
                @if(!empty($getRecord->association_logo))
                @if(file_exists('upload/'.$getRecord->association_logo))<img src="{{url('upload/'.$getRecord->association_logo)}}" style="height:100px; width:100px;">
                @endif
                @endif
                </div>



                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
    </div>
</div>
</div>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
