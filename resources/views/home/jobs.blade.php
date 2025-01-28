
@include('home.includes.head')
@include('home.includes.navbar')
   <!--======================-->
   <style>
    .single-job-opportunity {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        height: 400px; /* Set a fixed height for the cards */
        width: 100%; /* Full width of the column */
        max-width: 350px; /* Set a maximum width to ensure consistent size */
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        transition: transform 0.3s ease;
        margin: 0 auto; /* Center the cards */
        position: relative; /* To position the button at the bottom */
    }

    /* Add hover effect for card */
    .single-job-opportunity:hover {
        transform: translateY(-5px);
    }

    .companypro-opportunity-text {
        flex-grow: 1; /* Allow content to stretch */
        margin-bottom: 15px;
        height: 150px; /* Limit height of the description */
        overflow: hidden; /* Hide the overflowed text */
        text-overflow: ellipsis;
    }

    .companypro-oppor-logo img {
        max-width: 100px; /* Set consistent image size */
        height: auto;
        margin-bottom: 15px;
    }

    .btn-job {
        margin-top: 10px;
        text-transform: uppercase;
        font-weight: bold;
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        text-align: center;
        width: auto; /* Set the button width to auto */
        display: inline-block; /* Make it a block-level element */
        position: absolute; /* Fix the button at the bottom */
        bottom: 20px;
    }

    .btn-job:hover {
        background-color: #0056b3;
    }

    .col-lg-4, .col-sm-6 {
        display: flex;
        justify-content: center;
        align-items: stretch;
        margin-bottom: 30px;
    }

    /* Button group style */
    .button-group {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-top: 10px;
    }

    .btn-companypro {
        padding: 8px 12px; /* Smaller padding for a smaller button */
        font-size: 14px;
        line-height: 1.5;
        background-color: #28a745;
        color: #fff;
        border-radius: 3px;
        text-decoration: none;
        position: absolute;
        bottom: 20px;
    }

    .btn-companypro:hover {
        background-color: #218838;
    }
    .companypro-opportunity-text p {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Show up to 3 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .single-job-opportunity {
        height: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

    .companypro-opportunity-text {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .btn-companypro {
        font-size: 12px;
        padding: 8px 12px;
        margin-top: auto;
    }

    .form-control {
        height: 50px;
        font-size: 16px;
    }

    .pagination{
        --bs-pagination-font-size: 2rem;
    }

    .job-info p {
    display: flex;
    align-items: baseline; /* Align text properly */
    margin-bottom: 5px; /* Add spacing between lines */
}

.job-info strong {
    display: inline-block;
    width: 100px; /* Set a fixed width for labels */
    text-align: right; /* Align the labels to the right */
    margin-right: 10px; /* Add spacing between label and value */
}

.job-info span {
    flex: 1; /* Allow the value to take the remaining space */
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
    @php
        $job = App\Models\CompanyPro::first();
    @endphp
    <div class="container">
        <!-- Job Opportunities Section -->
        <div class="job-opportunity-wrapper">
            <div class="row">
                @forelse($jobs as $job)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-job-opportunity">
                            <div class="companypro-opportunity-text">
                                <div class="companypro-oppor-logo">
                                    <div class="display-table">
                                        <div class="display-table-cell">

                                        @if($job->companyProfile && $job->companyProfile->company_logo)
                                        <a href="{{ url('upload/company_documents/'.$job->companyProfile->company_logo) }}">
                                            <img src="{{ url('upload/company_documents/'.$job->companyProfile->company_logo) }}" alt="Company Logo">
                                        </a>
                                        @else
                                        <img src="{{ url('upload/download.png') }}" alt="Default Company Logo">
                                        @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="job-details">
    <h5 class="card-title fs-3 text-info">{{ $job->job_title }}</h5>
    <br>
    <div class="job-info">
        <p><strong>Location:</strong> <span>{{ $job->address }}</span></p>
        <p><strong>Experience:</strong> <span>{{ $job->exp_req }}</span></p>
        <p><strong>Company:</strong> <span>{{ $job->company }}</span></p>
    </div>
</div>


                            </div>
                            <div class="button-group">
                                <a href="{{ route('jobsdetails', $job->id)}}" class="btn btn-success fs-4 animated-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No companies found.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            {{--<div class="pagination-wrapper">
                {{ $companyprofiles->links() }}
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
