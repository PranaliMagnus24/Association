
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

<div class="text-end mb-3">
    <a href="{{ route('export.registrations', $event->id) }}" class="btn btn-outline-primary">
    <i class="bi bi-save" style="font-size: 20px;"></i>
    </a>
</div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Registrations for Event: {{ $event->title }}</h5>
            <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Sr no.</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">City</th>
            <th scope="col">GST Number</th>
            <th scope="col">Registration Date & Time</th>
           {{-- <th scope="col" class="text-center text-nowrap">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach ($registrations as $registration)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $registration->name }}</td>
                <td>{{ $registration->phone }}</td>
                <td>{{ $registration->email }}</td>
                <td>{{ $registration->countries->name }}</td>
                <td>{{ $registration->states->name }}</td>

                <td>{{ $registration->cities->name }}</td>
                <td>{{ $registration->usergst_number ?? 'N/A' }}</td>
                <td>{{ $registration->created_at ? \Carbon\Carbon::parse($registration->created_at)->format('d F Y h:i A') : 'N/A' }}</td>

               {{-- <td class="text-center text-nowrap">
                    <a href="{{ route('view.event', $event->id) }}" class="btn btn-outline-primary">
                        <i class="bx bx-show" style="font-size: 20px;"></i>
                    </a>
                    <a href="{{ route('edit.event', $event->id)}}" class="btn btn-outline-success">
                        <i class="bx bx-pencil" style="font-size: 20px;"></i>
                    </a>
                    <a href="{{ route('delete.event', $event->id)}}" class="btn btn-outline-danger" onclick="conformation(event)">
                        <i class="bx bx-trash" style="font-size: 20px;"></i>
                    </a>
                </td>--}}
            </tr>
        @endforeach
    </tbody>
</table>

<div class="text-end mb-3">
    {{ $registrations->links() }}
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
