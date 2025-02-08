
  @include('member.layout.head')


<style>
    select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: url('https://cdn-icons-png.flaticon.com/16/271/271210.png') no-repeat right 10px center;
    background-size: 12px;
    padding-right: 25px;
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
            <h4 class="card-title text-center mb-3">---- Applicant Information ----</h4>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Applicant Name:</strong> {{ $apply->name }}</p>
                </div>
                <div class="col-md-6">
                <p><strong>Applicant Email:</strong> {{ $apply->to }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <p><strong>Applicant Contact Number:</strong> {{ $apply->phone }}</p>
                </div>
                <div class="col-md-6">
                <p><strong>Subject:</strong> {{ $apply->subject }}</p>
                </div>
            </div>


            <div class="row mb-3">
            <div class="col-md-12">
                    <p><strong>Message:</strong> {{ strip_tags($apply->message) }}</p>
                </div>
            </div>

            <div class="row mb-3">
                @if(!empty($apply->upload_resume))
                <div class="col-md-6">
                    <p><strong>Uploaded Resume:</strong>
                        <a href="{{ asset('upload/resume/' . $apply->upload_resume) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary">
                            View Resume
                        </a>
                    </p>
                </div>
                @endif
            </div>
            <!-------------------Interview schedule------------------>
            <h4 class="card-title text-center mb-3">---- Fix Interview Schedule or Not ----</h4>
            <form action="{{ route('interviewstore')}}" method="POST">
                @csrf
                <input type="hidden" name="applicant_id" value="{{ $apply->id }}">
    <div class="row mb-3">
        <label for="action" class="col-md-4 col-lg-3 col-form-label">Action</label>
        <div class="col-md-8 col-lg-6">
            <select name="action" id="action" class="form-control">
                <option value="">--Select Action--</option>
                <option value="shortlisted">Shortlisted</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
    </div>

    <!-- Interview Schedule Fields (Initially Hidden) -->
    <div id="interviewFields" style="display: none;">
        <div class="row mb-3">
            <label for="interview_date" class="col-md-4 col-lg-3 col-form-label">Interview Date</label>
            <div class="col-md-8 col-lg-3">
                <input type="date" name="interview_date" id="interview_date" class="form-control">
            </div>

            <label for="interview_time" class="col-md-4 col-lg-3 col-form-label">Interview Time</label>
            <div class="col-md-8 col-lg-3">
                <input type="time" name="interview_time" id="interview_time" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="interview_address" class="col-md-4 col-lg-3 col-form-label">Interview Address</label>
            <div class="col-md-8 col-lg-9">
                <input type="text" name="interview_address" id="interview_address" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="interview_instructions" class="col-md-4 col-lg-3 col-form-label">Interview Instructions</label>
            <div class="col-md-8 col-lg-9">
                <textarea name="interview_instructions" id="interview_instructions" class="form-control" rows="3"></textarea>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!----------------------Interview schedule End------------------>
        </div>
    </div>
</div>
</main>

<script>
document.getElementById('action').addEventListener('change', function () {
    var interviewFields = document.getElementById('interviewFields');

    if (this.value === 'shortlisted') {
        interviewFields.style.display = 'block';
    } else {
        interviewFields.style.display = 'none';
    }
});
</script>

  <!-- ======= Footer ======= -->
  @include('member.layout.footer')

