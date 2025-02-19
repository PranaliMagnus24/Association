@include('home.includes.head')
@include('home.includes.navbar')
<style>
  .custom-card {
      display: flex;
      flex-direction: row;
      align-items: stretch;
      overflow: hidden;
      transition: transform 0.3s ease-in-out;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }
    .custom-card:hover {
      transform: scale(1.05);
    }
    .card-body-main {
      flex: 1;
      padding: 20px;
    }
    .card-img {
      width: 250px;
      height: auto;
      object-fit: cover;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
    }
    /* Option Cards styling */
    .option-card {
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 15px;
      text-align: center;
      transition: transform 0.2s;
      background-color: #f8f9fa;
    }
    .option-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .option-title {
      font-size: 2.2rem;
      margin-bottom: 10px;
      font-weight: 500;
    }
    .option-price {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: #28a745;
    }
    .btn-group-custom button {
      width: 48%;
    }
    .custom-option-title {
    background-color: #5bc0de; /* A lighter blue */
    color: #fff;
}
.right-icon {
    background-color: #5bc0de;
    border-radius: 50%;
    color: #fff;
    font-size: 1.2rem;
    padding: 0.5rem; /* Adjust padding as needed */
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .badge-primary {
    background-color:rgb(35, 114, 218);
    color: white;
    border: 1px solid #ddd;
}

.badge {
    border-radius: 50px;
    margin-left: auto;
    line-height: 1;
    padding: 7px 11px;
    vertical-align: middle;
    font-weight: 400;
    font-size: 13px;
}
.total-gst{
    color: red;
}
  </style>
 <section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ __('messages.Membership') }}</h1>
                        <p>
                        {{ __('messages.The truthful and honest businessman will be in the company of the Prophets, the truthful ones (Siddeeqeen), and the martyrs (Shuhada) on the Day of Judgment.(Mishkat al-Masabih, Hadith 2828)') }}
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <div class="container mt-5 mb-5">
    @foreach ($membership as $plan)
    <div class="card custom-card bg-white mb-4"> <!-- mb-4 yahan add kiya hai -->
        <div class="card-body-main">
            <h4 class="card-title text-primary">{{ $plan->package_title }}</h4>
            <p class="card-text">{{ $plan->plan_description }}</p>

            <div class="row g-4 mt-4"> <!-- g-4 yahan add kiya hai -->
                <div class="col-md-4">
                    <div class="option-card">
                        <div class="option-title custom-option-title p-2 rounded">
                            One Year Membership
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-3 right-icon"></i>
                                <span class="fw-bold">Application Fee:</span>
                            </div>
                            <span> Rs.{{ $plan->application_fee }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-3 right-icon"></i>
                                <span class="fw-bold">Membership Fee:</span>
                            </div>
                            <span> Rs.{{ $plan->oneyear_fee}}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-3 right-icon"></i>
                                <span class="fw-bold">Total Fee:</span>
                            </div>
                            <span class="total-gst">Rs.{{ $plan->application_fee + $plan->oneyear_fee }}
                                @if(!empty($generalSetting->gst_number)) + GST
                                @endif
                            </span>
                        </div>
                        <div class="btn-group-custom d-flex gap-2 justify-content-center mt-3" style="max-width: 500px; margin: 0 auto;">
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm fs-4 px-4 flex-fill text-center">
                                {{ $plan->trial_days }} Day's Trial
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm fs-4 px-4 flex-fill text-center">
                                Register
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="option-card">
                        <div class="option-title custom-option-title p-2 rounded">
                            Five Year Membership
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-3 right-icon"></i>
                                <span class="fw-bold">Application Fee:</span>
                            </div>
                            <span> Rs.{{ $plan->application_fee }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-3 right-icon"></i>
                                <span class="fw-bold">Membership Fee:</span>
                            </div>
                            <span> Rs.{{ $plan->fiveyear_fee}}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-3 right-icon"></i>
                                <span class="fw-bold">Total Fee:</span>
                            </div>
                            <span class="total-gst">Rs.{{ $plan->application_fee + $plan->fiveyear_fee }}
                                @if(!empty($generalSetting->gst_number)) + GST
                                @endif
                            </span>
                        </div>
                        <div class="btn-group-custom d-flex gap-2 justify-content-center mt-3" style="max-width: 500px; margin: 0 auto;">
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm fs-4 px-4 flex-fill text-center">
                                {{ $plan->trial_days }} Day's Trial
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm fs-4 px-4 flex-fill text-center">
                                Register
                            </a>
                        </div>
                    </div>
                </div>

                @if(!empty($plan->yearly_fee))
                <div class="col-md-4">
                    <div class="option-card">
                        <div class="option-title custom-option-title p-2 rounded">
                            Lifetime Membership <span class="badge badge-primary ms-2">{{ ucfirst($plan->numberof_year) }} years</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-3 right-icon"></i>
                                <span class="fw-bold">Application Fee:</span>
                            </div>
                            <span> Rs.{{ $plan->application_fee }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-3 right-icon"></i>
                                <span class="fw-bold">Membership Fee:</span>
                            </div>
                            <span> Rs.{{ $plan->yearly_fee }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-3 right-icon"></i>
                                <span class="fw-bold">Total Fee:</span>
                            </div>
                            <span class="total-gst">Rs.{{ $plan->application_fee + $plan->yearly_fee }}
                                @if(!empty($generalSetting->gst_number)) + GST
                                @endif
                            </span>
                        </div>
                        <div class="btn-group-custom d-flex gap-2 justify-content-center mt-3" style="max-width: 500px; margin: 0 auto;">
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm fs-4 px-4 flex-fill text-center">
                                {{ $plan->trial_days }} Day's Trial
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm fs-4 px-4 flex-fill text-center">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    {{ $membership->links() }}
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 @include('home.includes.footer')

