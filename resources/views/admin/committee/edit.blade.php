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
        <a href="{{ route('committee.index')}}" class="btn btn-primary">Back</a>
         </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Committee</h5>
              <form class="row g-3" method="POST" action="{{ route('committee.update', $data->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Member Name</label>
                  <input type="text" class="form-control" name="member_name" placeholder="Your Name" value="{{ old('member_name', $data->member_name) }}">
                </div>

                <div class="col-md-6">
                <label for="inputName5" class="form-label">Member Position</label>
               <select name="position" id="position" class="form-control">
                <option selected> --Select Position-- </option>
                        @foreach($positions as $position)
                        <option value="{{$position->name}}">{{$position->name}}</option>
                        @endforeach
               </select>
                </div>
              </div>


                <div class="col-12">
                <label for="inputName5" class="form-label">Summary</label>
                <textarea class="form-control" placeholder="Description" id="floatingTextarea" style="height: 100px;" name="summary">{{$data->summary}}</textarea>
                </div>

              <div class="row">
              <div class="col-6">
                <label for="inputName5" class="form-label">Upload Image</label>
                  <input type="file" class="form-control" name="profile" placeholder="upload image" accept="image/*">
                  @error('profile')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
                @if(!empty($data->profile))
                @if(file_exists('upload/'.$data->profile))<img src="{{url('upload/'.$data->profile)}}" style="height:100px; width:100px;">
                 @endif
                 @endif
              </div>

                <div class="col-6">
                <label for="inputState" class="form-label">Status</label>
                  <select id="inputState" class="form-select" name="status">
                    <option selected>Select status</option>
                    <option value="Active" {{ $data->status === 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $data->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>

                  </select>
                </div>
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
