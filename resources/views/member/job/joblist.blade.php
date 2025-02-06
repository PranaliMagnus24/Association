
  @include('member.layout.head')


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
    <!---add filter and search bar---->
<!--- Filter and Search Bar --->
<div class="row mb-4 mt-5">
<form class="search-form d-flex align-items-center gap-3" method="get" action="{{ route('joblist') }}">
    @csrf
    <div class="input-group">
        <!-- Search by Job Title -->
        <input type="text" name="search" class="form-control me-2" style="width: 200px;" placeholder="Search" value="{{ request('search') }}">

        <!-- Category Filter -->
        <select name="category" class="form-select me-2" style="width: 180px;">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>

        <!-- Filter/Search Button -->
        <button type="submit" class="btn btn-primary me-3" style="width: 100px;">Filter</button>

        <!-- Add Job Button -->
        <a href="{{ route('job') }}" class="btn btn-primary me-4">+</a>

        <!-- Sort Order (Trigger Form on Change) -->
        <select name="sort" class="form-select" style="width: 120px;" onchange="this.form.submit()">
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
        </select>
    </div>
</form>

</div>
<!--- End Filter and Search Bar --->

<!---end filter and search bar---->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Job Posted list</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sr no.</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Job Vacancy</th>
                        <th scope="col">Experience (in year)</th>
                        <th scope="col">Category</th>
                        <th scope="col">Applications</th>

                       {{-- <th scope="col">Skill's</th>--}}
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($jobs as $job)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ \Illuminate\Support\Str::limit($job->job_title, 20) }}</td>

                <td>{{ $job->vacancy }}</td>
                <td>
                    @if($job->exp_req)
                    {{ $job->exp_req }} year
                    @endif
                </td>

                <td>{{ \Illuminate\Support\Str::limit($job->category->category_name, 20) }}</td>
                <td>
                    <a href="{{ route('jobapplylist', ['job_id' => $job->id]) }}">
                        {{ $job->job_applications_count }}
                    </a>
                </td>

                {{--<td>{!! Str::limit($job->skill, 50) !!}</td>--}}
                <td>{{ $job->status }}</td>

                <td class="text-center text-nowrap">

                     <!-- Edit Button -->
                     <a href="{{ route('job.view', $job->id) }}" class="btn btn-outline-primary">
                        <i class="bx bx-show" style="font-size: 20px;"></i>
                    </a>
                     <a href="{{ route('job.edit', $job->id) }}" class="btn btn-outline-success"> <i class="bx bx-pencil" style="font-size: 20px;"></i></a>
                     </a>

                     <a href="{{ route('job.delete', $job->id) }}" class="btn btn-outline-danger" onclick="confirmation(event)">
                        <i class="bx bx-trash" style="font-size: 20px;"></i>
                    </a>
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
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
   function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');

        Swal.fire({
            title: "Are You Sure to Delete This?",
            text: "This delete will be permanent",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>



  <!-- ======= Footer ======= -->
  @include('member.layout.footer')



