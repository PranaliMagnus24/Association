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
    <div class="text-end mb-3">
        <a href="{{ route('subcategorylist')}}" class="btn btn-primary">Back</a>
         </div>
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Edit Subcategory</h5>
                <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="subcategory_name" class="form-label">subcategory Name</label>
                        <input type="text" name="subcategory_name" id="subcategory_name" class="form-control"
                               value="{{ old('subcategory_name', $subcategory->subcategory_name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control"
                               value="{{ old('description', $subcategory->description) }}" rows="4">{{ old('description', $subcategory->description) }}</textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="category_id" class="form-label">Category ID</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select a Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                    </div>


                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    </main>
    <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
