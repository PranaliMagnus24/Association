<!DOCTYPE html>
<html lang="en">
    <head>
    @include('home.layouts.head')
    </head>

    <body id="home-v1" class="home-page-one" data-style="default">
    <a href="#" class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </a>
    @include('home.layouts.navbar')

    <div id="main_content" class="main-content">

    @include('home.layouts.slider')


        <!--=================================-->
        <!--=         Responsibility        =-->
        <!--=================================-->
        <section id="responsibility-area" class="section-padding">
            <div class="container">
                <!--== Section Title Start ==-->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Our Responsibility</h2>
                        </div>
                    </div>
                </div>
                <!--== Section Title End ==-->

                <!--== Responsibility Content Wrapper ==-->
                <div class="row text-center text-sm-left">
                    <!--== Single Responsibility Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-responsibility">
                            <img src="{{asset('homecss/assets/images/responsibility/01.png')}}" alt="Responsibility">
                            <h4>Scholarship</h4>
                            <p>De create building thinking about your requirment and latest treand on our marketplace area</p>
                        </div>
                    </div>
                    <!--== Single Responsibility End ==-->

                    <!--== Single Responsibility Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-responsibility">
                            <img src="{{asset('homecss/assets/images/responsibility/02.png')}}" alt="Responsibility">
                            <h4>Help Current Students</h4>
                            <p>De create building thinking about your requirment and latest treand on our marketplace area</p>
                        </div>
                    </div>
                    <!--== Single Responsibility End ==-->

                    <!--== Single Responsibility Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-responsibility">
                            <img src="{{asset('homecss/assets/images/responsibility/03.png')}}" alt="Responsibility">
                            <h4>Help Our University</h4>
                            <p>De create building thinking about your requirment and latest treand on our marketplace area</p>
                        </div>
                    </div>
                    <!--== Single Responsibility End ==-->

                    <!--== Single Responsibility Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-responsibility">
                            <img src="{{asset('homecss/assets/images/responsibility/04.png')}}" alt="Responsibility">
                            <h4>Build Our Community</h4>
                            <p>De create building thinking about your requirment and latest treand on our marketplace area</p>
                        </div>
                    </div>
                    <!--== Single Responsibility End ==-->
                </div>
                <!--== Responsibility Content Wrapper ==-->
            </div>
        </section>








        <!--== Scholership Promo Area End ==-->



<!----footer------>
@include('home.layouts.footer')
        </div>

        </body>

</html>
