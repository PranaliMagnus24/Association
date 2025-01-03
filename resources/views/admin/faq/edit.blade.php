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
         <div class="container">
         <div class="text-end mb-3">
        <a href="{{ url('admin/faq')}}" class="btn btn-primary">Back</a>
         </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit F.A.Q</h5>
              <form class="row g-3" method="POST" action="{{ route('faq.update', $data->id) }}">
              @csrf
                <div class="col-md-12">
                <label for="inputName5" class="form-label">Question</label>
                            <input type="text" class="form-control question" name="question" placeholder="Your Question" value="{{$data->question}}">
                            @error('question')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
                <div class="col-12">
                <label for="answer" class="form-label">Answer</label>
                            <textarea class="form-control" placeholder="Your answer" id="floatingTextarea" style="height: 100px;" name="answer">{{ $data->answer }}</textarea>
                            @error('answer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
                <div class="col-md-4">
                <label for="inputState" class="form-label">Status</label>
                  <select id="inputState" class="form-select" name="status">
                    <option selected>Select status</option>
                    <option value="active" {{ $data->status == 'active' ? 'selected' : '' }}>Active</option>
                  <option value="inactive" {{ $data->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
                </div>

                <div class="text-center">
                <button type="submit" class="btn btn-primary" value="Update Questions and Answer">Update</button>
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
