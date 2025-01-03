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
        <a href="{{ url('admin/cms')}}" class="btn btn-primary">Back</a>
         </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add new page</h5>
              <form class="row g-3" method="POST" action="{{ route('cms.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="col-md-12">
                <label for="inputName5" class="form-label">Page Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Your Title" value="{{old('title')}}">
                  @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
                <div class="col-12">
                <label for="inputName5" class="form-label">Small Introduction</label>
                <textarea class="form-control" placeholder="Small introduction" id="floatingTextarea" style="height: 100px;" name="introduction" value="{{old('introduction')}}"></textarea>
                @error('introduction')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>

                <div class="col-12">
                <label for="inputName5" class="form-label">Description</label>
                <div id="quill-editor" class="mb-3" style="height: 150px;">
                    </div>
                    <textarea rows="3" class="mb-3 d-none" name="description" id="quill-editor-area" placeholder="Write here">{{ old('description', $data->description ?? '') }}</textarea>
                    @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                </div>
                <div class="col-md-12">
                <label for="inputName5" class="form-label">Meta Title</label>
                  <input type="text" class="form-control" name="metatitle" placeholder="Your Title" value="{{old('metatitle')}}">
                  @error('metatitle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
                <div class="col-12">
                <label for="inputName5" class="form-label">Meta Description</label>
                <textarea class="form-control" placeholder="Description" id="floatingTextarea" style="height: 100px;" name="metadescription" value="{{old('metadescription')}}"></textarea>
                @error('metadescription')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
                <div class="row mb-3">
                <div class="col-md-6">
                <label for="inputName5" class="form-label">Upload Image</label>
                  <input type="file" class="form-control" name="upload" placeholder="upload image" accept="image/*" value="{{ old('upload') }}">
                  @error('upload')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
                @if(!empty($data->upload))
      @if(file_exists('upload/'.$data->upload))<img src="{{url('upload/'.$data->upload)}}" style="height:100px; width:100px;">
      @endif
      @endif
                </div>
                <div class="col-md-6">
                <label for="inputName5" class="form-label">Upload Documents</label>
                  <input type="file" class="form-control" name="upload_document" placeholder="upload documents" accept="image/*" value="{{ old('profile_pic') }}">
                  @error('upload_document')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
                @if(!empty($data->upload_document))
      @if(file_exists('upload/'.$data->upload_document))<img src="{{url('upload/'.$data->upload_document)}}" style="height:100px; width:100px;">
      @endif
      @endif
                </div>
           </div>
                <div class="col-md-4">
                <label for="inputState" class="form-label">Status</label>
                  <select id="inputState" class="form-select" name="status">
                    <option selected>Select status</option>
                    <option value="active">Active</option>
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('quill-editor-area')) {
            var editor = new Quill('#quill-editor', {
                theme: 'snow'
            });
            var quillEditor = document.getElementById('quill-editor-area');
            editor.on('text-change', function() {
                quillEditor.value = editor.root.innerHTML;
            });

            quillEditor.addEventListener('input', function() {
                editor.root.innerHTML = quillEditor.value;
            });
        }
    });
  </script>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
