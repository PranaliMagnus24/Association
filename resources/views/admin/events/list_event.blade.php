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
        <form method="GET" action="{{ route('list.event') }}">
            <div class="row g-2 align-items-center">
                <!-- Search Input -->
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="Search by title or description..." value="{{ request()->get('search') }}">
                </div>

                <!-- Filter Dropdown -->
                <div class="col-md-5">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="Active" {{ request()->get('status') == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ request()->get('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="col-md-2 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </form>
        <a href="{{ route('add.event')}}" class="btn btn-primary ms-3">+</a>
    </div><!-- End Search Bar -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Event List</h5>
            <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Sr no.</th>
            <th scope="col">Event Title</th>
            <th scope="col">Introduction</th>
            <th scope="col">Event Start Date & Time</th>
            <th scope="col">Registration Date & Time</th>
            <th scope="col">Mode</th>
            <th scope="col">Type</th>
            <th scope="col">Registrations</th>
            <th scope="col" class="text-center text-nowrap">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $event->title ?? 'N/A' }}</td>
                <td>{!! \Illuminate\Support\Str::limit($event->introduction ?? 'N/A', 50) !!}</td>
                <td>{{ $event->eventstartdatetime ? \Carbon\Carbon::parse($event->eventstartdatetime)->format('d F Y h:i A') : 'N/A' }}</td>
                <td>{{ $event->registerstartdatetime ? \Carbon\Carbon::parse($event->registerstartdatetime)->format('d F Y h:i A') : 'N/A' }}</td>
                <td>{{ $event->mode ?? 'N/A' }}</td>
                <td>{{ $event->type ?? 'N/A' }}</td>
                <td class="text-nowrap">
                <a href="{{ route('view.registrations', $event->id) }}">
                        {{ $event->eventform_count }} Registrations
                    </a>
                </td>
                <td class="text-center text-nowrap">
                    <a href="{{ route('view.event', $event->id) }}" class="btn btn-outline-primary">
                        <i class="bx bx-show" style="font-size: 20px;"></i>
                    </a>
                    <a href="{{ route('edit.event', $event->id)}}" class="btn btn-outline-success">
                        <i class="bx bx-pencil" style="font-size: 20px;"></i>
                    </a>
                    <a href="{{ route('delete.event', $event->id)}}" class="btn btn-outline-danger" onclick="conformation(event)">
                        <i class="bx bx-trash" style="font-size: 20px;"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

            <div class="text-end mb-3">
                {{ $events->links() }}
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
