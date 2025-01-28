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
        <a href="{{ route('subsubcategorylist')}}" class="btn btn-primary">Back</a>
         </div>
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Add Sub Subcategory</h5>
                <form action="{{ route('subsubcategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="subsubcategory_name" class="form-label">SubSubCategory Name</label>
                        <input type="text" name="subsubcategory_name" id="subsubcategory_name" class="form-control" value="{{ old('subsubcategory_name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select a Category</option>
                                 @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="subcategory_id" class="form-label">SubCategory</label>
                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                <option value="">Select a Category</option>
                                @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }} selected>Active</option>
                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Save</button>
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
