
@include('home.includes.head')
@include('home.includes.navbar')
   <!--======================-->


<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Payment</h1>
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



<section id="razorpay_payment" class="section-padding">
<div class="container">

<div class="card mt-5">
    <h3 class="card-header p-3">Event Payment</h3>
    <div class="card-body">
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

        <form action="{{ route('razorpay.payment.store') }}" method="POST" class="text-center">
            @csrf
            <script src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="{{ config('services.razorpay.key') }}"
                    data-amount="{{ $event->amount * 100 }}" {{-- Convert amount to paise --}}
                    data-currency="INR"
                    data-buttontext="Pay {{ $event->amount }} INR"
                    data-name="Event Payment"
                    data-description="Payment for event registration"
                    data-image="{{ asset('your-logo.png') }}"
                    data-prefill.name="{{ auth()->user()->name ?? '' }}"
                    data-prefill.email="{{ auth()->user()->email ?? '' }}"
                    data-theme.color="#ff7529">
            </script>
        </form>
    </div>
</div>


</div>
</section>




         @include('home.includes.footer')
