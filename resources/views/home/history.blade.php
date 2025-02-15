@include('home.includes.head')
@include('home.includes.navbar')

<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ __('messages.History') }}</h1>
                        <p><strong>The Prophet &#65018;
                            said:</strong></p>
                        <p style="font-size:20px;">
                        <strong>{{ __('messages.The truthful and honest merchant will be with the Prophets, the truthful, and the martyrs on the Day of Judgment. (Tirmidhi, Hadith 1209)') }}</strong>
                         <br><span>{{ __('messages.Explanation') }}: {{ __('messages.Honesty in trade is highly rewarded in Islam, ensuring success in both this life and the Hereafter.') }}</span>
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
<!--=================================-->
        <!--=         Upcoming Event        =-->
        <!--=================================-->
        <section id="page-content-wrap">
            <div class="about-page-content-wrap section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11 m-auto">
                            <!-- Single about text start -->
                            <div class="single-about-text">
                                <span class="year">2023</span>
                                <img src="{{asset('homecss/assets/images/about-page/about-img-1.jpg')}}" alt="About" class="img-fluid img-left" style="width: 426px;">
                                <h2 class="h3">{{ __('messages.About us') }}</h2>
                                <p style="font-size:20px;" >
                                <strong>{{ __('messages.From the desk of the chairman') }}.</strong></p>
                                <p>
                                {{ __('messages.In the present scenario it is observed') }}
                                </p>

                <p> <i class="fas fa-check-circle check-icons"></i> {{ __('messages.Muslims presence in industry and trade is much lower than the national average level.') }}</p>
                <p> <i class="fas fa-check-circle check-icons"></i>
                {{ __('messages.Sharia-compliant funding is not available') }}.</p>
                <p> <i class="fas fa-check-circle check-icons"></i>
                {{ __('messages.Govt. subsidies and schemes for promoting business are not reaching them.') }}</p>
                <p> <i class="fas fa-check-circle check-icons"></i>
                {{ __('messages.Muslims are not actively participating. in business associations like NIMA, AIMA, and the Chamber of Commerce.') }}</p>
                <p> <i class="fas fa-check-circle check-icons"></i><strong>{{ __('messages.Hence there is a need for a national economic development movement fueled by unity and vision by the Muslim community for their uplifting benefits.') }}</strong></p>
                <p>{{ __('messages.Following persons, along with') }} <strong>{{ __('messages.Jan Seva credit cooperative society') }}</strong>{{ __('messages.and') }}  <strong>{{ __('messages.Islamic chember of commerce India') }} </strong> {{ __('messages.organized a Muslim industrialist and businessman conference at Nashik to discuss these subjects. The conference resolved to form an Association of Muslim Industrialists, Merchants, and Professionals by the following persons.') }}</p>

                <p> <i class="fas fa-check-circle check-icons"></i><strong>{{ __('messages.Munir Ahmed Khan') }}</strong> - {{ __('messages.Chairman') }}  &nbsp; <i class="fas fa-check-circle check-icons"></i> <strong>{{ __('messages.Minajbeg Mirza') }}</strong> - {{ __('messages.President') }} &nbsp; <i class="fas fa-check-circle check-icons"></i> <strong>{{ __('messages.Dr. V. B. Shaikh') }}</strong> - {{ __('messages.Joint President (In charge of Professionals)') }}

</p>
<p> <i class="fas fa-check-circle check-icons"></i> <strong>{{ __('messages.Abdullah Hafizullah Khan') }}</strong> - {{ __('messages.Joint President (In charge of Merchants)') }} &nbsp;  <i class="fas fa-check-circle check-icons"></i> <strong>{{ __('messages.Tanveer Rafik Shaikh') }}</strong> - {{ __('messages.Treasurer') }}
</p>
<p><i class="fas fa-check-circle check-icons"></i> <strong>{{ __('messages.Arif H. Shaikh') }}</strong> - {{ __('messages.Secretary') }} &nbsp; <i class="fas fa-check-circle check-icons"></i> <strong>{{ __('messages.Ali Munir Ahmed Khan') }}</strong> - {{ __('messages.Joint President (In charge of Builder and Construction Industries)') }} &nbsp;</p>
<p>
<strong>{{ __('messages.They are founders of this association. They invite all Muslim businessmen and businesswomen to join this noble cause.') }}</strong></p>
<p>
{{ __('messages.The Founders Committee requested Adv. M.T.Q. Sayyed to be the Honorary Legal Adviser of M.I.M.A and Mr. Nadeem Shaikh to head the M.I.M.A Madina Market website project, both of them have kindly accepted.') }}</p>





                            </div>
                            <!----------------Swiper---------------------->
                                <div class="row mt-1">
                               <!-- <div class="col-lg-3 col-sm-6">
                                <div class="single-committee-member">
                                <img src="{{asset('homecss/assets/images/committee/Munir-khan.png')}}" class="img-fluid" alt="Committee" />
                                <h3 style="font-size:16px;">Munir Ahmed Khan<span class="committee-deg" style="font-size:14px;"> B.E.Mechanical <br><br>Chairman </span></h3>
                                </div>
                            </div> -->

                            <div class="col-lg-3 col-sm-6">
                                <div class="single-committee-member">
                                <img src="{{asset('homecss/assets/images/committee/Minaz Mirza.png')}}" class="img-fluid" alt="Committee" />
                                <h3 style="font-size:16px;">{{ __('messages.Minajbeg Mirza') }}<span class="committee-deg" style="font-size:14px;">{{ __('messages.B.Sc. Paint technology') }} <br><br>{{ __('messages.President') }}</span></h3>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single-committee-member">
                                <img src="{{asset('homecss/assets/images/committee/Dr-V-b-shaikh.png')}}" class="img-fluid" alt="Committee" />
                                <h3 style="font-size:16px;">{{ __('messages.Dr. V.B.shaikh') }}<span class="committee-deg" style="font-size:14px;">{{ __('messages.M.B.B.S., M.S. GYNECOLOGY') }}<br><br>{{ __('messages.Joint President - Professionals') }}</span></h3>

                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="single-committee-member">
                                <img src="{{asset('homecss/assets/images/committee/Abdullah-Khan.png')}}" class="img-fluid" alt="Committee" />
                                <h3 style="font-size:16px;">{{ __('messages.Abdullah H. khan') }}<span class="committee-deg" style="font-size:14px;">  {{ __('messages.M.B.A.') }} <br><br>{{ __('messages.Joint President Merchants') }}</span></h3>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="single-committee-member">
                                <img src="{{asset('homecss/assets/images/committee/Tanvir-shaikh.png')}}" class="img-fluid" alt="Committee" />
                                <h3 style="font-size:16px;">{{ __('messages.Tanveer rafik shaikh') }}<span class="committee-deg" style="font-size:14px;">{{ __('messages.MA BED (Phy)') }}<br><br>{{ __('messages.Treasurer') }}</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-3 col-sm-6">
                                <div class="single-committee-member">
                                <img src="{{asset('homecss/assets/images/committee/Arif-shaikh.png')}}" class="img-fluid" alt="Committee" />
                                <h3 style="font-size:16px;">{{ __('messages.Arif H. Shaikh') }}<span class="committee-deg" style="font-size:14px;">{{ __('messages.M.B.S. (HR)') }}<br><br>{{ __('messages.Secretary') }}</span></h3>

                                </div>
                            </div>



                            <div class="col-lg-3 col-sm-6">
                                <div class="single-committee-member">
                                <img src="{{asset('homecss/assets/images/committee/Ali-khan.png')}}" class="img-fluid" alt="Committee" />
                                <h3 style="font-size:16px;">{{ __('messages.Ali Munir Ahmed Khan') }}<span class="committee-deg" style="font-size:14px;">{{ __('messages.B.ARCH') }}<br><br> {{ __('messages.Joint President - Builder and Construction Industry.') }}</span></h3>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="single-committee-member">
                                <img src="{{asset('homecss/assets/images/committee/adv-mtq.png')}}" class="img-fluid" alt="Committee" />
                                <h3 style="font-size:16px;">{{ __('messages.M.T.Q.Sayyed') }}<span class="committee-deg" style="font-size:14px;">{{ __('messages.B.Com. LL.B.') }}<br><br> {{ __('messages.Our Legal Advisor') }}</span></h3>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                            <div class="single-committee-member">
                                    <img src="{{asset('homecss/assets/images/committee/Nadeem-Shaikh.png')}}" class="img-fluid" alt="Committee" />
                                    <h3>{{ __('messages.Nadeem Shaikh') }}<span class="committee-deg">{{ __('messages.Vice President Social Media & our') }}<br> {{ __('messages.IT Consultant MIMA Madina Market') }}</span></h3>
                                </div>
                                </div>
                        </div>
                            </div>

                            <!-- Single about text End -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('home.includes.index_calltoaction')
        <!--=========================-->
        <!--=         Fun fact        =-->
        <!--==========================-->
        @include('home.includes.index_counter')

        <!--===========================-->
        <!--=         Committee       =-->
        <!--===========================-->
        @include('home.includes.commitee_member')


         @include('home.includes.footer')
