
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
    <div class="text-end mb-3">
        <a href="{{ route('joblist') }}" class="btn btn-primary">Back</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title text-center mb-3">{{ $job->job_title }}</h4>
            <div class="row mb-3">
                <div class="col-12">
                    <p><strong>Job Description:</strong>{{ strip_tags($job->job_desc) }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <p><strong>Skills:</strong> {{ strip_tags($job->skill) }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Category:</strong> {{ $job->category->category_name }}</p>
                </div>
                @if(!empty($job->subcategory->subcategory_name))
                <div class="col-md-6">
                    <p><strong>Subcategory:</strong> {{ $job->subcategory->subcategory_name }}</p>
                </div>
                @endif
            </div>

            <div class="row mb-3">
            <div class="col-md-6">
                    <p><strong>Vacancy:</strong> {{ $job->vacancy }}</p>
                </div>
                @if(!empty($job->salary))
                <div class="col-md-6">
                    <p><strong>Salary:</strong> {{ $job->salary }}</p>
                </div>
                @endif
            </div>

            <div class="row mb-3">
            <div class="col-md-6">
                    <p><strong>Job Type:</strong> {{ $job->job_type }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Job Mode:</strong> {{ $job->job_mode }}</p>
                </div>
            </div>

            <div class="row mb-3">
            @if(!empty($job->exp_req))
                <div class="col-md-4">
                    <p><strong>Experience:</strong> {{ $job->exp_req }} year</p>
                </div>
                @endif
                @if(!empty($job->upload_document))
                <div class="col-md-4">
                    <p><strong>Uploaded Document:</strong>
                        <a href="{{ asset('upload/company_documents/' . $job->upload_document) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary">
                            View Document
                        </a>
                    </p>
                </div>
                @endif
                @if(!empty($job->job_end_date))
                <div class="col-md-4">
                <p><strong>Job Apply End Date:</strong> {{ \Carbon\Carbon::parse($job->job_end_date)->format('d F Y') }}</p>

                </div>
                @endif
            </div>
            <h5 class="card-title text-center">Company Information</h5>
            <div class="row mb-3">
            <div class="col-md-4">
            <p><strong>Company Name:</strong> {{ $job->company }}</p>
            </div>
            <div class="col-md-4">
            <p><strong>Contact:</strong> {{ $job->contact }}</p>
            </div>
            <div class="col-md-4">
            <p><strong>Email:</strong> {{ $job->email }}</p>
            </div>
            </div>

            <div class="row mb-3">
            <div class="col-md-6">
            <p><strong>Address:</strong> {{ strip_tags($job->address) }}</p>
            </div>
            </div>

            <div class="row mb-3">
            <div class="col-md-4">
            <p><strong>Country:</strong>{{ $job->countries->name }}</p>
            </div>
            <div class="col-md-4">
            <p><strong>State:</strong> {{ $job->states->name }}</p>
            </div>
            <div class="col-md-4">
            <p><strong>City:</strong> {{ $job->cities->name }}</p>
            </div>
            </div>


        </div>
    </div>
</div>
</main>
  <!-- ======= Footer ======= -->
  @include('member.layout.footer')


