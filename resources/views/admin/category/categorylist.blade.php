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
    <div class="d-flex justify-content-between mb-3">
    <a href="{{ route('category.create') }}" class="btn btn-primary">+</a>
        <form action="{{ route('categorylist') }}" method="GET" class="d-flex align-items-center gap-2">
            <input type="text" name="search" class="form-control w-50" placeholder="Search by member name..." value="{{ request()->get('search') }}">
    <button type="submit" class="btn btn-primary ms-1">
    <i class="bi bi-search"></i>
    </button>

            <!-- Filter by Position -->
            <select name="position" class="form-select w-auto">
                <option value="">All Positions</option>
                <option value="Chairperson" {{ request()->get('position') == 'Chairperson' ? 'selected' : '' }}>Chairperson</option>
                <option value="Member" {{ request()->get('position') == 'Member' ? 'selected' : '' }}>Member</option>
                <option value="Secretary" {{ request()->get('position') == 'Secretary' ? 'selected' : '' }}>Secretary</option>
            </select>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Filter</button>

        </form>

    </div>



    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category list</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->description }}</td>

                <td>{{ $category->status }}</td>

                <td>
                <div class="action" style="display: flex; gap: 10px; align-items: center;">
    <a href="{{ route('category.edit', $category->id)}}" class="btn btn-outline-success">
        <i class="bx bx-pencil" style="font-size: 20px;"></i>
    </a>
    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                        <i class="bx bx-trash" style="font-size: 20px;"></i>
                        </button>
                    </form>
</div>

                </td>
              </tr>
            @endforeach
                </tbody>
            </table>
            <div class="text-end mb-3">
            {{$categories->links()}}
        </div>
        </div>
    </div>
</div>

    </main>
    <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
