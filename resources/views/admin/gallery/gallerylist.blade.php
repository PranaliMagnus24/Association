<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.head')
</head>
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
  <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="#">
        @csrf
        <input type="text" name="search" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
      <a href="{{ route('gallery.create')}}" class="btn btn-primary">+</a>
    </div><!-- End Search Bar -->

<div class="card">
        <div class="card-body">
            <h5 class="card-title">Gallery list</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Location</th>

                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($gallerys as $gallery)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $gallery->name }}</td>
                <td>{{ $gallery->date }}</td>
                <td> {{ $gallery->location }}</td>



                <td>
                    <a href="{{ route('gallery.show', $gallery->id) }}" class="btn btn-outline-primary">
                    <i class="bx bx-show" style="font-size: 20px;"></i>
                    </a>
                    <a href="{{ route('gallery.edit', $gallery->id) }}"  class="btn btn-outline-success">  <i class="bx bx-pencil" style="font-size: 20px;"></i>
                    </a>
                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                            <i class="bx bx-trash" style="font-size: 20px;"></i>
                            </button>
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
    </main>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
