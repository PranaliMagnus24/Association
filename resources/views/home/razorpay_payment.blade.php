
@include('home.includes.head')
@include('home.includes.navbar')
   <!--======================-->
   <style>
     .razorpay-payment-button {
    background-color: #007bff; /* Bootstrap primary color */
    color: #fff;
    font-size: 16px; /* Increased font size for better readability */
    padding: 10px 20px; /* Added padding */
    border: none;
    border-radius: 5px; /* Rounded corners */
    cursor: pointer;
}

</style>

<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ __('messages.Payment') }}</h1>
                        <p>
                        {{ __('messages.The truthful and honest businessman will be in the company of the Prophets, the truthful ones (Siddeeqeen), and the martyrs (Shuhada) on the Day of Judgment.(Mishkat al-Masabih, Hadith 2828)') }}
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>



         <section id="razorpay_payment" class="section-padding d-flex justify-content-center align-items-center vh-100 mt-1">
    <div class="container d-flex justify-content-center">
        <div class="card mt-5 w-50 text-center">
            <h4 class="card-header p-3">{{ __('messages.Event Payment') }}</h4>
            <div class="card-body">

                {{-- Display Success or Error Messages --}}
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif


                {{-- GST Calculation --}}




{{-- GST Calculation --}}
@php
    $gstRate = 18; // GST percentage
    $eventAmount = $event->event_amount; // Assuming this is fetched from the event
    $cgst_amount = 0;
    $sgst_amount = 0;
    $igst_amount = 0;

    if ($stateId == 4008) { // Maharashtra
        $cgst_amount = ($eventAmount * $gstRate / 100) / 2; // Half of GST for CGST_amount
        $sgst_amount = $cgst_amount; // Same for SGST_amount
    } else {
        $igst_amount = ($eventAmount * $gstRate / 100); // Full GST for IGST_amount
    }

    $totalAmount = $eventAmount + $cgst_amount + $sgst_amount + $igst_amount;
@endphp

{{-- Payment Summary Table --}}
<table class="table">
    <tr>
        <td><strong>{{ __('messages.Base Amount') }}:</strong></td>
        <td>₹{{ number_format($eventAmount, 2) }}</td>
    </tr>
    @if ($cgst_amount > 0)
        <tr>
            <td><strong>{{ __('messages.CGST') }} ({{ $gstRate / 2 }}%):</strong></td>
            <td>₹{{ number_format($cgst_amount, 2) }}</td>
        </tr>
        <tr>
            <td><strong>{{ __('messages.SGST') }} ({{ $gstRate / 2 }}%):</strong></td>
            <td>₹{{ number_format($sgst_amount, 2) }}</td>
        </tr>
    @else
        <tr>
            <td><strong>{{ __('messages.IGST') }} ({{ $gstRate }}%):</strong></td>
            <td>₹{{ number_format($igst_amount, 2) }}</td>
        </tr>
    @endif
    <tr>
        <td><strong>{{ __('messages.Total Amount') }}:</strong></td>
        <td><strong>₹{{ number_format($totalAmount, 2) }}</strong></td>
    </tr>
</table>


<form id="payment-form" action="{{ route('razorpay.payment.store') }}" method="POST">
    @csrf
    <input type="hidden" name="event_id" value="{{ $event->id }}">
    <input type="hidden" name="event_amount" value="{{ $event->event_amount }}">

    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="{{ config('services.razorpay.key') }}"
        data-amount="{{ $totalAmount * 100 }}"
        data-currency="INR"
        data-buttontext="Pay ₹{{ number_format($totalAmount, 2) }} INR"
        data-name="Event Payment"
        data-description="Payment for event registration"
        data-image="{{ asset('your-logo.png') }}"
        data-prefill.name="{{ auth()->user()->name ?? '' }}"
        data-prefill.email="{{ auth()->user()->email ?? '' }}"
        data-theme.color="#ff7529">
    </script>
</form>


                {{-- Loader (Appears while processing payment) --}}
                <div id="formLoader" class="d-none position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white" style="opacity: 0.8; z-index: 999;">
                    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                        <span class="visually-hidden">{{ __('messages.Processing') }}...</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Show loader when form is submitted
        $("#payment-form").on("submit", function() {
            $("#formLoader").removeClass("d-none");
        });
    });
</script>



         @include('home.includes.footer')
