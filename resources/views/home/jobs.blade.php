
@include('home.includes.head')
@include('home.includes.navbar')
   <!--======================-->
<style>
.job-opportunity-wrapper {
  margin-top: 30px;
}

.job-card {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 15px rgba(88, 99, 148, 0.2);
  transition: all 0.3s ease;
  overflow: hidden;
  transform: scale(1);
}

.job-card:hover {
  box-shadow: 0 10px 30px rgba(88, 99, 148, 0.25);
  transform: scale(1.05);
}

.job-card-body {
  padding: 20px;
  display: flex;
  flex-direction: column;
  height: 100%;
}

.company-logo {
  max-height: 50px;
  object-fit: contain;
  margin-bottom: 15px;
}

.job-card-title {
  font-size: 18px;
  font-weight: 600;
  color: #333;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}

.job-location {
  font-size: 14px;
  color: #777;
  margin-top: 10px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}

.job-details {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 15px;
}

.job-details .badge {
  background-color: #e1ebfb;
  color: #000;
  font-size: 11px;
  font-weight: 500;
  padding: 6px 8px;
  border-radius: 4px; /* Border radius */
}




/* Apply Now Button */
.apply-now-button {
  color: #fff;
  padding: 6px 12px;  /* Reduced padding */
  border-radius: 4px;  /* Reduced border radius */
  font-size: 14px;
  font-weight: 600;
  transition: background-color 0.3s ease, transform 0.2s ease;
  display: inline-block;
  text-align: center;
  margin-left: 0;  /* Align to left */
  margin-top: 10px;  /* Optional margin if needed */
  width: auto;  /* Width adjustment */
  height: auto;  /* Height adjustment */
}

.apply-now-button:hover {
  transform: scale(1.05);  /* Slight scale-up effect on hover */
}

.job-card-body {
  display: flex;
  flex-direction: column;
  height: 100%;
  justify-content: space-between;  /* Pushes the Apply button to the bottom */
}

.job-card-body .mt-auto {
  margin-top: auto;
}

/* Responsive Design */
@media (max-width: 767px) {
  .job-card-title {
    font-size: 16px;
  }

  .job-location {
    font-size: 12px;
  }

  .job-details .badge {
    font-size: 11px;
    padding: 5px 8px;
  }

  .apply-now-button {
    font-size: 13px;
  }
}



</style>

<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Jobs</h1>
                        <p>
                        The truthful and honest businessman will be in the company of the Prophets, the truthful ones (Siddeeqeen), and the martyrs (Shuhada) on the Day of Judgment.
                        (Mishkat al-Masabih, Hadith 2828)
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>



         <section id="job-opportunity" class="section-padding">
    <div class="container">
        <!-- Job Opportunities Section -->
        <div class="job-opportunity-wrapper">
            <div class="row row-cols-1 row-cols-md-3 g-4"> <!-- Three cards per row for medium and above screens -->
                @forelse($jobs as $job)
                <div class="col">
                    <div class="job-card h-100">
                        <div class="job-card-body d-flex flex-column">
                            <!-- Company Logo -->
                            <img src="{{ url('upload/company_documents/'.$job->companyProfile->company_logo) }}" alt="Company Logo" class="company-logo mb-3" style="max-height: 50px;">

                            <!-- Job Title (with character limit) -->
                            <h5 class="job-card-title fw-bold">{{ Str::limit($job->job_title, 50) }}</h5> <!-- Limit to 50 chars -->

                            <!-- Address instead of Description -->
                            <p class="text-muted mt-2 job-location">{{ Str::limit($job->cities->name . ', ' . $job->states->name, 50) }}</p> <!-- Limit the address length -->

                            <!-- Job Details -->
                            <div class="job-details d-flex flex-wrap gap-2 mt-3">
                                @if($job->job_type)
                                    <span class="badge">{{ $job->job_type }}</span>
                                @endif
                                @if($job->exp_req)
                                    <span class="badge">{{ 'Min. ' . $job->exp_req . ' Year' }}</span>
                                @endif
                                @if($job->job_mode)
                                    <span class="badge">{{ $job->job_mode }}</span>
                                @endif
                            </div>

                            <!-- Apply Now Button -->
                            <div class="mt-auto text-left">
                                <a href="{{ route('jobsdetails', $job->id)}}" class="btn btn-primary w-20 apply-now-button">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <p>No job opportunities available.</p>
                @endforelse
            </div>

            <!-- Pagination Links -->
            {{--<div class="pagination-wrapper">
                {{ $jobs->links() }}
            </div>--}}
        </div>
    </div>
</section>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function () {

$('#country-dropdown').on('change', function () {

    var idCountry = this.value;

    $("#state-dropdown").html('');

    $.ajax({

        url: "{{url('api/fetch-states')}}",

        type: "POST",

        data: {

            country_id: idCountry,

            _token: '{{csrf_token()}}'

        },

        dataType: 'json',

        success: function (result) {

            $('#state-dropdown').html('<option value="">-- Select State --</option>');

            $.each(result.states, function (key, value) {

                $("#state-dropdown").append('<option value="' + value

                    .id + '">' + value.name + '</option>');

            });

            $('#city-dropdown').html('<option value="">-- Select City --</option>');

        }

    });

});


$('#state-dropdown').on('change', function () {

    var idState = this.value;

    $("#city-dropdown").html('');

    $.ajax({

        url: "{{url('api/fetch-cities')}}",

        type: "POST",

        data: {

            state_id: idState,

            _token: '{{csrf_token()}}'

        },

        dataType: 'json',

        success: function (res) {

            $('#city-dropdown').html('<option value="">-- Select City --</option>');

            $.each(res.cities, function (key, value) {

                $("#city-dropdown").append('<option value="' + value

                    .id + '">' + value.name + '</option>');

            });

        }

    });

});



});


</script>



         @include('home.includes.footer')
