@include('home.includes.head')
@include('home.includes.navbar')


<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">

                     <div class="page-title-content">

                        <h1 class="h2">{{ __('messages.Management Committee') }}</h1>
                            <h4> {{ __('messages.(Nashik District)') }}</h4>

                        <p>
                            <strong>
                            {{ __('messages.Charity and Generosity') }}:
                            </strong>
                            {{ __('messages.Giving charity and helping those in need is an important aspect of business, with a reminder that wealth is a trust from God and should be used for good purposes.') }}
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         @include('home.includes.commitee_member')

         @include('home.includes.footer')
