<style>
    .dashboard .card-icon{
        font-size:62px;
        width:96px;
        height:96px;
    }
    .icon-custom {
  font-size: 1.5rem;
  color: #007bff;
  margin-right: 5px;
}

.icon-custom:hover {
  color: #ff5733;
  transition: color 0.3s ease;
}
.company-logo {
        max-width: 61px; /* Set the max width of the logo */
        max-height: 61px; /* Set the max height of the logo */
        object-fit: cover; /* Ensure the logo does not distort, keeps aspect ratio */
    }
    .custom-row {
    margin-bottom: -20px; /* Rows ke beech ka gap adjust karein */
}
.custom-col {
    padding: 5px; /* Columns ke andar ka gap adjust karein */
}

</style>
<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
    <div class="col-lg-12">
  <div class="row d-flex">
    <div class="col-xxl-6 col-md-6 d-flex">
      <div class="card info-card sales-card flex-fill">
        <div class="card-body text-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 mt-3">
          <img
    src="{{ !empty($companyProfile) && !empty($companyProfile->company_logo) ? url('upload/'.$companyProfile->company_logo) : url('upload/download.png') }}"
    alt="{{ !empty($companyProfile) && !empty($companyProfile->company_name) ? $companyProfile->company_name : 'Default Logo' }}"
    class="company-logo">
          </div>
          <h6> @if(!empty($companyProfile) && !empty($companyProfile->company_name))
        {{ $companyProfile->company_name }}
    @else
        Default Title
    @endif</h6>
          <a href="{{route('profile.index')}}" class="small pt-2 ps-1 btn btn-primary">Update Profile</a>
        </div>
      </div>
    </div>

    <div class="col-xxl-6 col-md-6 d-flex">
      <div class="card info-card revenue-card flex-fill">
        <div class="card-body text-center mt-5">
          <h6 class="fs-5">Company Address</h6>
          <span class="text-muted pt-2 ps-1 fs-5">{{$companyProfile->address_one ?? 'N/A'}}</span><br>
          <span><i class="bi bi-globe icon-custom"></i> {{$companyProfile->website_url ?? 'N/A'}}</span><br>
          <span><i class="bi bi-envelope-fill icon-custom"></i> {{$user->email ?? 'N/A'}}</span>
        </div>
      </div>
    </div>
  </div>
</div>
         <!-- Reports -->
          <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Company Profile</h5>
               <hr>
               <div class="row custom-row">
<div class="col-6 custom-col">
<p class="card-title">Director Name: <span class="fs-6 text-black">{{$user->name ?? 'N/A'}}</span></p>
</div>
<div class="col-6 custom-col">
<p class="card-title">Email: <span class="fs-6 text-black">{{$user->email ?? 'N/A'}}</span></p>
</div>
</div>
<div class="row custom-row">
<div class="col-6 custom-col">
<p class="card-title">Mobile No.: <span class="fs-6 text-black">{{$user->phone ?? 'N/A'}}</span></p>
</div>
<div class="col-6 custom-col">
<p class="card-title">Company Name: <span class="fs-6 text-black">{{$companyProfile->company_name ?? 'N/A'}}</span></p>
</div>
</div>
<div class="row custom-row">
<div class="col-6 custom-col">
<p class="card-title">Company Type: <span class="fs-6 text-black">{{$companyProfile->company_type ?? 'N/A'}}</span></p>
</div>
<div class="col-6 custom-col">
<p class="card-title"></p>
</div>
</div>
<div class="row custom-row">
<div class="col-6 custom-col">
<p class="card-title">About Company:
<br>
    <span class="fs-6 text-black">{!! $companyProfile->about_company ?? 'N/A' !!}</span></p>
</div>
<div class="col-6 custom-col">
<p class="card-title"></p>
</div>
</div>
<div class="row custom-row">
<div class="col-6 custom-col">
<p class="card-title">Company Establishment Year: <span class="fs-6 text-black">{{$companyProfile->company_year ?? 'N/A'}}</span></p>
</div>
<div class="col-6 custom-col">
<p class="card-title">Landline Number: <span class="fs-6 text-black">{{$companyProfile->landline ?? 'N/A'}}</span></p>
</div>
</div>
<div class="row custom-row">
<div class="col-6 custom-col">
<p class="card-title">Website Url: <span class="fs-6 text-black">{{$companyProfile->website_url ?? 'N/A'}}</span></p>
</div>
<div class="col-6 custom-col">
<p class="card-title">Number of Employees: <span class="fs-6 text-black">{{$companyProfile->employee_number ?? 'N/A'}}</span></p>
</div>
</div>
<div class="row custom-row">
<div class="col-6 custom-col">
<p class="card-title">Technologies: <span class="fs-6 text-black">{{$companyProfile->technologies ?? 'N/A'}}</span></p>
</div>
<div class="col-6 custom-col">
<p class="card-title">Address: <span class="fs-6 text-black">{{$companyProfile->address_one ?? 'N/A'}}</span></p>
</div>
</div>
<div class="row custom-row">
<div class="col-6 custom-col">
<p class="card-title">Membership Type: <span class="fs-6 text-black">{{$companyProfile->membership_type ?? 'N/A'}}</span></p>
</div>
</div>
               </div>
            </div>
          </div>          </div><!-- End Reports -->

          <!-- Recent Sales -->


        </div>
      </div><!-- End Left side columns -->



    </div>
  </section>
