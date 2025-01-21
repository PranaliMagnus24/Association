<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.head')
</head>

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
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">Company Details</h5>
    @php
    $datas = App\Models\CompanyPro::paginate(5);
    @endphp
    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Membership Id</strong></label>
            <p>{{ $data->membership_id }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Company Type</strong></label>
            <p>{{ $data->company_type }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Company Name</strong></label>
            <p>{{ $data->company_name }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Membership Type</strong></label>
            <p>{{ $data->membership_type }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Membership Year</strong></label>
            <p>{{ $data->membership_year }} {{ $data->default_year }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Registration No/Udyog Aadhaar No.</strong></label>
            <p>{{ $data->aadharcard_number }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Registration Date</strong></label>
            <p>{{ $data->registration_date }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Renewal Date</strong></label>
            <p>{{ $data->renewal_date }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Address 1</strong></label>
            <p>{{ $data->address_one }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Address 2</strong></label>
            <p>{{ $data->address_two }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Country</strong></label>
            <p>{{ $data->countries->name }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>State</strong></label>
            <p>{{ $data->states->name }}</p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>City</strong></label>
            <p>{{ $data->cities->name }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Zip Code</strong></label>
            <p>{{ $data->zipcode }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Landline</strong></label>
            <p>{{ $data->landline }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Number of Employees</strong></label>
            <p>{{ $data->employee_number }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Company Establishment Year</strong></label>
            <p>{{ $data->company_year }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>About Company</strong></label><br>
            {!! $data->about_company !!}
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Website URL</strong></label>
            <p>{{ $data->website_url }}</p>
        </div>
        <div class="col-md-4 col-lg-4">
    <label class="col-form-label"><strong>Technologies</strong></label>
    @if(!empty($data->technologies) && is_array(json_decode($data->technologies, true)))
        <p>{{ implode(', ', json_decode($data->technologies, true)) }}</p>
    @else
        <p>No technologies selected</p>
    @endif
</div>

        <div class="col-md-4 col-lg-4">
            <label class="col-form-label"><strong>Company Logo</strong></label>
            @if(!empty($data->company_logo) && file_exists('upload/'.$data->company_logo))
                <img src="{{ url('upload/'.$data->company_logo) }}" style="height:100px; width:100px;">
            @else
                <p>No profile picture available</p>
            @endif
        </div>
    </div>

    <div class="container">
    <h5 class="card-title text-center">Documents Uploaded</h5>
    <div class="row mb-3">
        @foreach ($data->documents as $document)
            <div class="col-md-4 col-lg-4">
                <label class="col-form-label"><strong>{{ ucwords(str_replace('_', ' ', $document->file_type)) }}</strong></label>
                @php
                    $filePath = 'upload/' . $data->id . '/' . $document->file_name;
                    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                @endphp
                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ url($filePath) }}" style="height:100px; width:100px;" alt="{{ $document->file_type }}">
                @elseif (in_array($fileExtension, ['pdf', 'doc', 'docx']))
                    <a href="{{ url($filePath) }}" target="_blank" class="btn btn-primary">View {{ strtoupper($fileExtension) }}</a>
                @else
                    <p>Unsupported file format</p>
                @endif
            </div>
        @endforeach
    </div>
</div>


    <div class="mb-3">
        <a href="{{ route('company.list') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
</div>
</div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
