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



<!--List Body-->
<div class="container">
<div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="#">
        @csrf
        <input type="text" name="search" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
      <a href="{{ route('cms.add')}}" class="btn btn-primary">+</a>
    </div><!-- End Search Bar -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pages list</h5>
            @php
    $datas = App\Models\Cmspage::paginate(5);
      @endphp
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sr no.</th>
                        <th scope="col">Page Title</th>
                        <th scope="col">Small Introduction</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image Upload</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->title}}</td>
                <td>{{$data->introduction}}</td>
                <td>{!! $data->description !!}</td>
                <td> @if(!empty($data->upload) && file_exists('upload/'.$data->upload))
                <img src="{{ url('upload/'.$data->upload) }}" style="height:100px; width:100px;">
            @else
                <p>No profile picture available</p>
            @endif</td>

                <td>
                <div class="action" style="display: flex; gap: 10px; align-items: center;">
    <a href="{{ route('cms.show', $data->id)}}" class="btn btn-outline-primary">
        <i class="bx bx-show" style="font-size: 20px;"></i>
    </a>
    <a href="{{ route('cms.edit', $data->id)}}" class="btn btn-outline-success">
        <i class="bx bx-pencil" style="font-size: 20px;"></i>
    </a>
    <a href="{{ route('cms.delete', $data->id)}}" class="btn btn-outline-danger" onclick="conformation(event)">
        <i class="bx bx-trash" style="font-size: 20px;"></i>
    </a>
</div>

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
<!--List Body end-->

     </main><!-- End #main -->
     <script>
    function conformation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({
            title: "Are You Sure to Delete This",
            text: "This delete will be permanent",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })

        .then((willCancel)=>{

            if(willCancel)
        {
            window.location.href=urlToRedirect;
        }
        })
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
