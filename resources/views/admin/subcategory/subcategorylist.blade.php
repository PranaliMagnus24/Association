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


    <!-- Filters and Search Form -->
    <div class="d-flex justify-content-between mb-3">
        <!-- Create Button -->
        <a href="{{ route('subcategory.create') }}" class="btn btn-primary">+</a>

       <!-- Filter and Search -->
        <form action="{{ route('subcategorylist') }}" method="GET" class="d-flex align-items-center gap-2">


    <!-- Search Button -->
    <input type="text" name="search" class="form-control w-50" placeholder="Search by name..." value="{{ request()->get('search') }}">

    <!-- Search Button -->
    <button type="submit" class="btn btn-primary ms-1">
    <i class="bi bi-search"></i>
    </button>

    <!-- Filter by Status -->
    <select name="status" class="form-select w-auto">
        <option value="">Status</option>
        <option value="active" {{ request()->get('status') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ request()->get('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
    </select>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>



    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Sub Category list</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Sub Category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parent Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
    @foreach ($subcategories as $subcategory)
        <tr>
        <td>{{ $subcategory->id }}</td>
            <td>{{ $subcategory->subcategory_name }}</td>
            <td>{{ $subcategory->description }}</td>
            <td>{{ $subcategory->category->category_name?? 'N/A' }}</td>
            <td>{{ $subcategory->status }}</td>
            <td>
                <!-- Edit Button with Icon -->
                <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-outline-success">
                <i class="bx bx-pencil" style="font-size: 20px;"></i>
                </a>

                <!-- Delete Button with Icon -->
                <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                    <i class="bx bx-trash" style="font-size: 20px;"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
            </table>
            <div class="text-end mb-3">
            {{$subcategories->links()}}
        </div>
        </div>
    </div>
</div>

    </main>
    <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
