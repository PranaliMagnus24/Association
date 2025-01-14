@include('home.includes.head')
@include('home.includes.navbar')

<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Verify Email</h1>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>



         <section id="page-content-wrap">
            <div class="contact-page-wrap section-padding">
                <div class="container">


                <div class="card" style="width: 70rem;">
  <div class="card-body">
    <h6 class="mb-0 text-sm text-gray-600">  {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">  @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif
</h6>
<div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="btn btn-brand">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 btn btn-brand">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>

  </div>
</div>





                </div>
            </div>
        </section>

@include('home.includes.footer')
