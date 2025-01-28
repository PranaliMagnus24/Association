
  @include('admin.layouts.head')

<style>
      .search-bar {
        margin: 20px 0;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .search-form {
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        margin-right: 10px;
        height: 35px;
    }

    .search-form input[type="text"] {
        border: none;
        padding: 10px;
        font-size: 16px;
        outline: none;
        width: 250px;
    }

    .search-form button {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .search-form button:hover {
        background-color: #0056b3;
    }
</style>


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
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="#">
        @csrf
        <input type="text" name="search" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
      <a href="{{ route('imageUpload') }}" class="btn btn-primary">+</a>
    </div><!-- End Search Bar -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Image list</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
            <th scope="col">ID</th>
            <th scope="col">Page</th>
            <th scope="col">Content Type</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($images as $image)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $image->page }}</td>
                <td>{{ $image->ctype }}</td>
                <td>{{ $image->start_datetime }}</td>
                <td>{{ $image->end_datetime }}</td>
                <td>
                @if(file_exists(public_path('upload/gallery/thumbnails/'.$image->thumbnail)) && !empty($image->thumbnail))
                <img src="{{ asset('upload/gallery/thumbnails/'.$image->thumbnail) }}" style="height:100px; width:100px;">
            @else
                <p>No image available</p>
            @endif
                </td>
                <td>
                    <a href="{{ route('imageedit', $image->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('destroy', $image->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE') <!-- Use DELETE here -->
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            <div class="text-end mb-3">

        </div>
        </div>
    </div>

</div>
</main>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

