@include('home.includes.head')
@include('home.includes.navbar')
<style>
   .card {
        height: 250px; /* Adjust the height of the card */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .card-text {
        flex-grow: 0;
    }

    .no-gutters {
        display: flex;
        flex-wrap: nowrap;
    }

</style>

<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Islamic Tijarat</h1>
                        <p><strong>The Prophet &#65018;
                        said:</strong></p>
                        <p style="font-size:20px;">
                        <strong>The truthful and honest merchant will be with the Prophets, the truthful, and the martyrs on the Day of Judgment.
                        (Tirmidhi, Hadith 1209)</strong>
                         <br><span>Explanation: Honesty in trade is highly rewarded in Islam, ensuring success in both this life and the Hereafter.</span>
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <section id="page-content-wrap mt-1">
    <div class="contact-page-wrap section-padding">
        <div class="container">
            <h6>The chapter "Tijarat" (Trade) from Mishkat al-Masabih discusses the guidelines and ethics of trade and commerce in Islam. It provides teachings from the Prophet Muhammad (peace be upon him) regarding honesty, fairness, and avoiding deception in business dealings. Below is a summary:</h6>
            <br>
            <!-- Row 1 -->
            <div class="row align-items-center mb-4">
                <!-- Card 1 -->
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 600px;">
                        <div class="row no-gutters">
                        <div class="col-md-4">
                                <img src="{{asset('homecss/assets/images/islamic/1.png')}}" class="card-img" alt="Card Image 1" style="height:250px;">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><strong>Permissibility of Trade:</strong> </h5>
                                    <p class="card-text">Islam encourages lawful (halal) trade and business as a means of livelihood. It is regarded as a noble profession when conducted ethically.</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Card 2 (Opposite) -->
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 600px;">
                        <div class="row no-gutters flex-row-reverse">

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><strong>Honesty in Transactions:</strong> </h5>
                                    <p class="card-text">Honesty and transparency are emphasized. Traders are warned against cheating, lying, or concealing defects in products. The Prophet (peace be upon him) said, "The honest and truthful trader will be among the Prophets, the truthful, and the martyrs on the Day of Judgment.</p>
                                    <!-- <p class="card-text"><small class="text-muted">Last updated 10 mins ago</small></p> -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('homecss/assets/images/islamic/2.png')}}" class="card-img" alt="Card Image 2" style="height:250px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Rows for More Cards -->
            <div class="row align-items-center mb-4">
                <!-- Card 3 -->
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 600px;">
                        <div class="row no-gutters">
                        <div class="col-md-4">
                                <img src="{{asset('homecss/assets/images/islamic/3.png')}}" class="card-img" alt="Card Image 3" style="height:250px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><strong>Prohibition of Deception:</strong> </h5>
                                    <p class="card-text">Practices like fraud, hoarding, price manipulation, and false oaths to sell products are strictly prohibited. Such actions are considered major sins.</p>
                                    <!-- <p class="card-text"><small class="text-muted">Last updated 15 mins ago</small></p> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Card 4 (Opposite) -->
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 600px;">
                        <div class="row no-gutters flex-row-reverse">

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><strong>Fair Measurements and Weights:</strong> </h5>
                                    <p class="card-text">Traders are commanded to use accurate measures and scales. The Quran explicitly warns against those who cheat in measurements (Surah Al-Mutaffifin).</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('homecss/assets/images/islamic/4.png')}}" class="card-img" alt="Card Image 4" style="height:250px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <!-- Card 5 -->
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 600px;">
                        <div class="row no-gutters">
                        <div class="col-md-4">
                                <img src="{{asset('homecss/assets/images/islamic/5.png')}}" class="card-img" alt="Card Image 1" style="height:250px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><strong>Avoidance of Haram Earnings:</strong> </h5>
                                    <p class="card-text">Muslims are instructed to avoid earnings from unlawful means, such as interest (riba), gambling, or trade in prohibited items like alcohol or pork.</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Card 6 (Opposite) -->
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 600px;">
                        <div class="row no-gutters flex-row-reverse">

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><strong> Moderation and Generosity:</strong></h5>
                                    <p class="card-text">The Prophet encouraged kindness in dealings, such as forgiving debts or offering leniency to those in financial difficulty.</p>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('homecss/assets/images/islamic/6.png')}}" class="card-img" alt="Card Image 2" style="height:250px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <!-- Card 7 -->
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 600px;">
                        <div class="row no-gutters">
                        <div class="col-md-4">
                                <img src="{{asset('homecss/assets/images/islamic/7.png')}}" class="card-img" alt="Card Image 1" style="height:250px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><strong>Avoiding Excessive Oaths:</strong> </h5>
                                    <p class="card-text">Traders are advised not to swear excessively to promote their goods, as it diminishes the barakah (blessings) in their earnings.</p>
                                    <!-- <p class="card-text"><small class="text-muted">Last updated 5 mins ago</small></p> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Card 8 (Opposite) -->
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 600px;">
                        <div class="row no-gutters flex-row-reverse">

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><strong>Seeking Barakah (Blessings):</strong> </h5>
                                    <p class="card-text">Ethical trade and reliance on Allah bring barakah in wealth. The Prophet (peace be upon him) highlighted that dishonesty leads to the loss of barakah.</p>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('homecss/assets/images/islamic/8.jpg')}}" class="card-img" alt="Card Image 2" style="height:250px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>




<div class="container">
    <div class="row">
        <div class="col-12">
        <strong>   Conclusion:</strong>

        The chapter provides comprehensive guidance on maintaining ethical practices in trade, emphasizing the spiritual and social responsibilities of a Muslim trader. By adhering to these principles, traders can ensure halal earnings and contribute to a just and harmonious society.

        </div>

    </div>

</div>
        </div>
    </div>
</section>





         @include('home.includes.footer')
