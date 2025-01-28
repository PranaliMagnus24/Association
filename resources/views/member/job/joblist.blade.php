<!DOCTYPE html>
<html lang="en">

<head>
  @include('member.layout.head')
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
  @include('member.layout.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('member.layout.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">
  <div class="pagetitle">
    <h1>
        @if(!empty($companyProfile) && !empty($companyProfile->company_name))
            {{ $companyProfile->company_name }} Job Post
        @else
            Default Title
        @endif
    </h1>
</div>

<div class="container">
<div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="#">
        @csrf
        <input type="text" name="search" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
      <a href="{{ route('job')}}" class="btn btn-primary">+</a>
    </div><!-- End Search Bar -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Job Posted list</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sr no.</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Job Vacancy</th>
                        <th scope="col">Experience</th>
                        <th scope="col">Skill's</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($jobs as $job)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $job->job_title }}</td>
                <td>{{ $job->vacancy }}</td>
                <td>{{ $job->exp_req }}</td>
                <td>{{ $job->skill }}</td>
                <td>{{ $job->status }}</td>

                <td>

                     <!-- Edit Button -->
                     <a href="{{ route('job.view', $job->id) }}" class="btn btn-outline-primary">
                        <i class="bx bx-show" style="font-size: 20px;"></i>
                    </a>
                     <a href="{{ route('job.edit', $job->id) }}" class="btn btn-outline-success"> <i class="bx bx-pencil" style="font-size: 20px;"></i></a>
                     </a>
                    <form action="{{ route('job.delete', $job->id) }}" method="POST" style="display:inline;">
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
{{$jobs->links()}}
        </div>
        </div>
    </div>
</div>
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
  @include('member.layout.footer')

</body>

</html>

