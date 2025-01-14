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
</style>

<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Directory</h1>
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
        <!--== Section Title Start ==-->
        <!--== Section Title End ==-->

        <div class="job-opportunity-wrapper">
            <div class="row">
                @foreach($companyprofiles as $companypro)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-job-opportunity">
                            <div class="companypro-opportunity-text">
                                <div class="companypro-oppor-logo">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <!-- Check if the company logo exists -->
                                            <a href="{{ $companypro->company_logo }}">
                                                <img src="{{ $companypro->company_logo ? url('upload/'.$companypro->company_logo) : url('upload/download.png') }}" alt="Company Logo">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <h6>{{ $companypro->company_name }}</h6>
                                <p>{!! $companypro->about_company !!}</p>
                            </div>
                            <div class="button-group">
                                <a href="#" class="btn btn-companypro">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


         @include('home.includes.footer')
