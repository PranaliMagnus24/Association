@include('home.includes.head')
@include('home.includes.navbar')
<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ __('messages.Our Associate') }}</h1>
                        <p><strong>The Prophet &#65018;
                            said:</strong></p>
                        <p style="font-size:20px;">
                        <strong>{{ __('messages.The truthful and honest merchant will be with the Prophets, the truthful, and the martyrs on the Day of Judgment. (Tirmidhi, Hadith 1209)') }}</strong>
                         <br><span>{{ __('messages.Explanation') }}: {{ __('messages.Honesty in trade is highly rewarded in Islam, ensuring success in both this life and the Hereafter') }}.</span>
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <section id="page-content-wrap">
            <div class="contact-page-wrap section-padding">
                <div class="container">
                    <div class="row">
                     <h1 class="text-center">{{ __('messages.Comming Soon') }}</h1>
                    </div>
                </div>
            </div>
        </section>

         @include('home.includes.footer')
