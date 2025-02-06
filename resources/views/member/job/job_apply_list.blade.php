
  @include('member.layout.head')

<style>
/* Align the row to the right side */
.row.justify-content-end {
    display: flex;
    justify-content: flex-end;
}

/* Add spacing between the select dropdown and its label */
select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: url('https://cdn-icons-png.flaticon.com/16/271/271210.png') no-repeat right 10px center;
    background-size: 12px;
    padding-right: 25px;
    margin-right: 15px; /* Adds spacing between the select and input fields */
}

/* Optional: Add some space between the inputs */
.form-control {
    margin-right: 10px;
}

/* Adjust the button for spacing */
button[type="submit"] {
    margin-right: 15px;
}

</style>


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
            {{ $companyProfile->company_name }} Application's
        @else
            Default Title
        @endif
    </h1>
</div>

<div class="container">
    <div class="row mb-3 justify-content-end">
        <!-- Back Button -->
        <div class="col-auto">
            <a href="{{ route('joblist') }}" class="btn btn-primary">Back</a>
        </div>

        <!-- Filter Inputs -->
        <div class="col-auto">
            <form method="GET" action="{{ route('jobapplylist', $job_id) }}">
                <!-- Dropdown to select filter type -->
                <select name="filter_by" class="form-control" onchange="this.form.submit()">
                    <option value="" disabled selected>Select Filter-- </option>
                    <option value="name" {{ request()->filter_by == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="email" {{ request()->filter_by == 'email' ? 'selected' : '' }}>Email</option>
                    <option value="phone" {{ request()->filter_by == 'phone' ? 'selected' : '' }}>Phone</option>
                </select>
        </div>

        <div class="col-auto">
            <!-- Show the relevant input based on the filter selection -->
            @if(request()->filter_by == 'name')
                <input type="text" name="name" value="{{ request()->name }}" class="form-control" placeholder="Search by Name">
            @elseif(request()->filter_by == 'email')
                <input type="email" name="email" value="{{ request()->email }}" class="form-control" placeholder="Search by Email">
            @elseif(request()->filter_by == 'phone')
                <input type="text" name="phone" value="{{ request()->phone }}" class="form-control" placeholder="Search by Phone">
            @endif
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>

        <!-- Sorting Dropdown -->
        <div class="col-auto">
            <select name="sort_direction" class="form-control" onchange="this.form.submit()">
                <option value="asc" {{ request()->sort_direction == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request()->sort_direction == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
    </form>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Application's list</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sr no.</th>
                        <th scope="col">Applicant Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Resume</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($applications as $index => $application)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->to }}</td>
                        <td>{{ $application->phone }}</td>
                        <td>
                            @if ($application->upload_resume)
                                <a href="{{ asset('upload/resume/' . $application->upload_resume) }}" target="_blank">View Resume</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if ($application->interview)
                                @if($application->interview->action == 'shortlisted')
                                    <span class="text-success"><strong>Interview Schedule</strong></span>
                                @elseif($application->interview->action == 'rejected')
                                    <span class="text-danger"><strong>Rejected</strong></span>
                                @else
                                    <span class="text-dark"><strong>Pending</strong></span>
                                @endif
                            @else
                                <span class="text-dark"><strong>Pending</strong></span>
                            @endif
                        </td>
                        <td>
                            <!-- Display Date -->
                            <span>{{ $application->created_at->format('d F Y') }}</span>
                        </td>
                        <td>
                            <!-- Display Time -->
                            <span>{{ $application->created_at->format('h:i A') }}</span> <!-- AM/PM Format -->
                        </td>
                        <td>
                            <a href="{{ route('jobapplydetails' , $application->id)}}" class="btn btn-outline-primary">
                                <i class="bx bx-show" style="font-size: 20px;"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-end mb-3">
                {{ $applications->links() }}
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



