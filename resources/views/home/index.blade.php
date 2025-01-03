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


    @include('home.layouts.upcomingevent')
        <!--=========================-->
        <!--=         About         =-->
        <!--=========================-->
        <section id="about-area" class="section-padding">
            <div class="about-area-wrapper">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <div class="about-content-wrap">
                                <div class="section-title text-lg-left">
                                    <h2>Our Misssion</h2>
                                </div>

                                <div class="about-thumb">
                                    <img src="{{asset('homecss/assets/images/misc/about-bg.jpg')}}" alt class="img-fluid">
                                </div>

                                <p>There are many company Lorem ipsm dolor sitg amet, csetur adipicing elit, sed do eiusmod
                                    tempor dncint ut labore et dolore magna alis enim ad minim veniam, quis csetur adipicing
                                    elit, sed do eiusmod tempor dncint ut labore et dolore magna alis enim ad minim veniam, quis
                                    nostrud exercitation ullamco.</p>
                                <p>There are many company Lorem ipsm dolor sitg amet, csetur adipicing elit, sed do eiusmod
                                    tempor dncint ut labore et dolore magna alis enim ad minim veniam, quis nostrud exercitation
                                    ullamco.</p>
                                <a href="about.html" class="btn btn-brand about-btn">know more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        <!--================================-->
        <!--=         Fun Fact        =-->
        <!--================================-->
        <section id="funfact-area">
            <div class="container-fluid">
                <div class="row text-center">
                    <!--== Single FunFact Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-funfact-wrap">
                            <div class="funfact-icon">
                                <img src="{{asset('homecss/assets/images/fun-fact/user.svg')}}" alt="Funfact">
                            </div>
                            <div class="funfact-info">
                                <h5 class="funfact-count">4025</h5>
                                <p>Members</p>
                            </div>
                        </div>
                    </div>
                    <!--== Single FunFact End ==-->

                    <!--== Single FunFact Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-funfact-wrap">
                            <div class="funfact-icon">
                                <img src="{{asset('homecss/assets/images/fun-fact/picture.svg')}}" alt="Funfact">
                            </div>
                            <div class="funfact-info">
                                <h5 class="funfact-count">8725</h5>
                                <p>Photos</p>
                            </div>
                        </div>
                    </div>
                    <!--== Single FunFact End ==-->

                    <!--== Single FunFact Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-funfact-wrap">
                            <div class="funfact-icon">
                                <img src="{{asset('homecss/assets/images/fun-fact/event.svg')}}" alt="Funfact">
                            </div>
                            <div class="funfact-info">
                                <h5><span class="funfact-count">231</span>+</h5>
                                <p>Events</p>
                            </div>
                        </div>
                    </div>
                    <!--== Single FunFact End ==-->

                    <!--== Single FunFact Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-funfact-wrap">
                            <div class="funfact-icon">
                                <img src="{{asset('homecss/assets/images/fun-fact/medal.svg')}}" alt="Funfact">
                            </div>
                            <div class="funfact-info">
                                <h5><span class="funfact-count">32</span>+</h5>
                                <p>Awards</p>
                            </div>
                        </div>
                    </div>
                    <!--== Single FunFact End ==-->
                </div>
            </div>
        </section>

        <!--======================-->
        <!--=         Job        =-->
        <!--======================-->
        <section id="job-opportunity" class="section-padding">
            <div class="container">
                <!--== Section Title Start ==-->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Recent Jobs</h2>
                        </div>
                    </div>
                </div>
                <!--== Section Title End ==-->

                <!--== Job opportunity Wrapper ==-->
                <div class="job-opportunity-wrapper">
                    <div class="row">
                        <!--== Single Job opportunity Start ==-->
                        <div class="col-lg-4 col-sm-6 text-center">
                            <div class="single-job-opportunity">
                                <div class="job-opportunity-text">
                                    <div class="job-oppor-logo">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <img src="{{asset('homecss/assets/images/job/01.png')}}" alt="Job">
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="#">Urgently Need Five Data Center Specialist</a></h3>
                                    <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                        est etiam procsus dymicus.<a href="#">[...]</a></p>
                                </div>
                                <a href="#" class="btn btn-job">Apply now</a>
                            </div>
                        </div>
                        <!--== Single Job opportunity End ==-->

                        <!--== Single Job opportunity Start ==-->
                        <div class="col-lg-4 col-sm-6 text-center">
                            <div class="single-job-opportunity">
                                <div class="job-opportunity-text">
                                    <div class="job-oppor-logo">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <img src="{{asset('homecss/assets/images/job/02.png')}}" alt="Job">
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="#">Product Owner (m/f) for our Charter Business</a></h3>
                                    <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                        est etiam procsus dymicus.<a href="#">[...]</a></p>
                                </div>
                                <a href="#" class="btn btn-job">Apply now</a>
                            </div>
                        </div>
                        <!--== Single Job opportunity End ==-->

                        <!--== Single Job opportunity Start ==-->
                        <div class="col-lg-4 col-sm-6 text-center">
                            <div class="single-job-opportunity">
                                <div class="job-opportunity-text">
                                    <div class="job-oppor-logo">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <img src="{{asset('homecss/assets/images/job/03.png')}}" alt="Job">
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="#">Backend Developer (Java) (m/f) wanted for leading</a></h3>
                                    <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                        est etiam procsus dymicus.<a href="#">[...]</a></p>
                                </div>
                                <a href="#" class="btn btn-job btn-expired disabled">Expired</a>
                            </div>
                        </div>
                        <!--== Single Job opportunity End ==-->

                        <!--== Single Job opportunity Start ==-->
                        <div class="col-lg-4 col-sm-6 text-center">
                            <div class="single-job-opportunity">
                                <div class="job-opportunity-text">
                                    <div class="job-oppor-logo">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <img src="{{asset('homecss/assets/images/job/04.png')}}" alt="Job">
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="#">API Architect and Lead - Python, SQLAlchemy, GraphQL</a></h3>
                                    <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                        est etiam procsus dymicus.<a href="#">[...]</a></p>
                                </div>
                                <a href="#" class="btn btn-job">Apply now</a>
                            </div>
                        </div>
                        <!--== Single Job opportunity End ==-->

                        <!--== Single Job opportunity Start ==-->
                        <div class="col-lg-4 col-sm-6 text-center">
                            <div class="single-job-opportunity">
                                <div class="job-opportunity-text">
                                    <div class="job-oppor-logo">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <img src="{{asset('homecss/assets/images/job/compnay-logo-1.png')}}" alt="Job">
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="#">Remotely - Javascript Developer Node.js</a></h3>
                                    <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                        est etiam procsus dymicus.<a href="#">[...]</a></p>
                                </div>
                                <a href="#" class="btn btn-job btn-expired disabled">Expired</a>
                            </div>
                        </div>
                        <!--== Single Job opportunity End ==-->

                        <!--== Single Job opportunity Start ==-->
                        <div class="col-lg-4 col-sm-6 text-center">
                            <div class="single-job-opportunity">
                                <div class="job-opportunity-text">
                                    <div class="job-oppor-logo">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <img src="{{asset('homecss/assets/images/job/compnay-logo-2.png')}}" alt="Job">
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="#">Five Years Experience Data Center Specialist Needed</a></h3>
                                    <p>Claritas est etiam procsus dymicus, qui sequitur mutationem Claritas est etiam procsus
                                        est etiam procsus dymicus.<a href="#">[...]</a></p>
                                </div>
                                <a href="#" class="btn btn-job">Apply now</a>
                            </div>
                        </div>
                        <!--== Single Job opportunity End ==-->
                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="career.html" class="btn btn-brand btn-loadmore">All job list</a>
                        </div>
                    </div>
                </div>
                <!--== Job opportunity Wrapper ==-->
            </div>
        </section>

        <!--==========================-->
        <!--=         Gallery        =-->
        <!--==========================-->
        <section id="gallery-area" class="section-padding">
            <div class="container">
                <!--== Section Title Start ==-->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Our gallery</h2>
                        </div>
                    </div>
                </div>
                <!--== Section Title End ==-->

                <!--== Gallery Container Warpper ==-->
                <div class="gallery-content-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Gallery Menu Start -->
                            <div class="gallery-menu text-center">
                                <span class="active" data-filter="*">All</span>
                                <span data-filter=".old">Old Memories</span>
                                <span data-filter=".event">Event</span>
                                <span data-filter=".pic">Our Picnic</span>
                                <span class="d-none d-sm-inline-block" data-filter=".recent">Recent</span>
                            </div>
                            <!-- Gallery Menu End -->

                            <!-- Gallery Item content Start -->
                            <div class="row gallery-gird">
                                <!-- Single Gallery Start -->
                                <div class="col-lg-3  col-sm-6 recent event">
                                    <div class="single-gallery-item gallery-bg-1">
                                        <div class="gallery-hvr-wrap">
                                            <div class="gallery-hvr-text">
                                                <h4>University Cumpus</h4>
                                                <p class="gallery-event-date">28 Oct, 2018</p>
                                            </div>
                                            <a href="{{asset('homecss/assets/images/gallery/gellary-img-1.jpg')}}" class="btn-zoom image-popup">
                                                <img src="{{asset('homecss/assets/images/zoom-icon.png')}}" alt="a">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Gallery End -->

                                <!-- Single Gallery Start -->
                                <div class="col-lg-3  col-sm-6 old event pic">
                                    <div class="single-gallery-item video gallery-bg-2">
                                        <a href="https://player.vimeo.com/video/140182080?title=0&amp;portrait=0&amp;byline=0&amp;autoplay=1&amp;loop=1" class="btn btn-video-play video-popup"><i class="fa fa-play"></i></a>
                                    </div>
                                </div>
                                <!-- Single Gallery End -->

                                <!-- Single Gallery Start -->
                                <div class="col-lg-3  col-sm-6 recent pic">
                                    <div class="single-gallery-item gallery-bg-3">
                                        <div class="gallery-hvr-wrap">
                                            <div class="gallery-hvr-text">
                                                <h4>University Cumpus</h4>
                                                <p class="gallery-event-date">28 Oct, 2018</p>
                                            </div>
                                            <a href="{{asset('homecss/assets/images/gallery/gellary-img-1.jpg')}}" class="btn-zoom image-popup">
                                                <img src="{{asset('homecss/assets/images/zoom-icon.png')}}" alt="a">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Gallery End -->

                                <!-- Single Gallery Start -->
                                <div class="col-lg-3  col-sm-6 old">
                                    <div class="single-gallery-item gallery-bg-4">
                                        <div class="gallery-hvr-wrap">
                                            <div class="gallery-hvr-text">
                                                <h4>University Cumpus</h4>
                                                <p class="gallery-event-date">28 Oct, 2018</p>
                                            </div>
                                            <a href="{{asset('homecss/assets/images/gallery/gellary-img-1.jpg')}}" class="btn-zoom image-popup">
                                                <img src="{{asset('homecss/assets/images/zoom-icon.png')}}" alt="a">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Gallery End -->

                                <!-- Single Gallery Start -->
                                <div class="col-lg-3  col-sm-6 pic event">
                                    <div class="single-gallery-item gallery-bg-5">
                                        <div class="gallery-hvr-wrap">
                                            <div class="gallery-hvr-text">
                                                <h4>University Cumpus</h4>
                                                <p class="gallery-event-date">28 Oct, 2018</p>
                                            </div>
                                            <a href="{{asset('homecss/assets/images/gallery/gellary-img-1.jpg')}}" class="btn-zoom image-popup">
                                                <img src="{{asset('homecss/assets/images/zoom-icon.png')}}" alt="a">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Gallery End -->

                                <!-- Single Gallery Start -->
                                <div class="col-lg-3  col-sm-6 old recent">
                                    <div class="single-gallery-item gallery-bg-6">
                                        <div class="gallery-hvr-wrap">
                                            <div class="gallery-hvr-text">
                                                <h4>University Cumpus</h4>
                                                <p class="gallery-event-date">28 Oct, 2018</p>
                                            </div>
                                            <a href="{{asset('homecss/assets/images/gallery/gellary-img-1.jpg')}}" class="btn-zoom image-popup">
                                                <img src="{{asset('homecss/assets/images/zoom-icon.png')}}" alt="a">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Gallery End -->

                                <!-- Single Gallery Start -->
                                <div class="col-lg-3  col-sm-6 pic">
                                    <div class="single-gallery-item video gallery-bg-7">
                                        <a href="https://player.vimeo.com/video/181545195?title=0&amp;portrait=0&amp;byline=0&amp;autoplay=1&amp;loop=1" class="btn btn-video-play video-popup"><i class="fa fa-play"></i></a>
                                    </div>
                                </div>
                                <!-- Single Gallery End -->

                                <!-- Single Gallery Start -->
                                <div class="col-lg-3  col-sm-6 pic recent old">
                                    <div class="single-gallery-item gallery-bg-8">
                                        <div class="gallery-hvr-wrap">
                                            <div class="gallery-hvr-text">
                                                <h4>University Cumpus</h4>
                                                <p class="gallery-event-date">28 Oct, 2018</p>
                                            </div>
                                            <a href="{{asset('homecss/assets/images/gallery/gellary-img-1.jpg')}}" class="btn-zoom image-popup">
                                                <img src="{{asset('homecss/assets/images/zoom-icon.png')}}" alt="a">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Gallery End -->
                            </div>
                            <!-- Gallery Item content End -->
                        </div>
                    </div>
                </div>
                <!--== Gallery Container Warpper==-->
            </div>
        </section>

        <!--=================================-->
        <!--=         Call To Action        =-->
        <!--=================================-->
        <section id="scholership-promo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="scholership-promo-text">
                            <h2>Demo University Provide <span>Scholarship</span> For Talented Student!</h2>
                            <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need
                                academic, relocation, career, projects, mentorship, etc you can ask the community and get </p>
                            <a href="#" class="btn btn-brand">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== Scholership Promo Area End ==-->

        <!--=======================-->
        <!--=         Blog        =-->
        <!--=======================-->
        <section id="blog-area" class="section-padding">
            <div class="container">
                <!--== Section Title Start ==-->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Recent News</h2>
                        </div>
                    </div>
                </div>
                <!--== Section Title End ==-->

                <!--== Blog Content Wrapper ==-->
                <div class="row">
                    <!--== Single Blog Post start ==-->
                    <div class="col-lg-4 col-md-6">
                        <article class="single-blog-post">
                            <figure class="blog-thumb">
                                <div class="blog-thumbnail">
                                    <img src="{{asset('homecss/assets/images/blog/blog-1.jpg')}}" alt="Blog" class="img-fluid">
                                </div>
                                <figcaption class="blog-meta clearfix">
                                    <a href="single-blog.html" class="author">
                                        <div class="author-pic">
                                            <img src="{{asset('homecss/assets/images/blog/author.jpg')}}" alt="Author">
                                        </div>
                                        <div class="author-info">
                                            <h5>Daney williams</h5>
                                            <p>2 hours Ago</p>
                                        </div>
                                    </a>
                                    <div class="like-comm pull-right">
                                        <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                        <a href="#"><i class="fa fa-heart-o"></i>12</a>
                                    </div>
                                </figcaption>
                            </figure>

                            <div class="blog-content">
                                <h3><a href="single-blog.html">Recently we create a maassive project that</a></h3>
                                <p>This is a big project of our company, we are happy to completed this type projec which are
                                    get world famous award</p>
                                <a href="single-blog.html" class="btn btn-brand">More</a>
                            </div>
                        </article>
                    </div>
                    <!--== Single Blog Post End ==-->

                    <!--== Single Blog Post start ==-->
                    <div class="col-lg-4 col-md-6">
                        <article class="single-blog-post">
                            <figure class="blog-thumb">
                                <div class="blog-thumbnail">
                                    <img src="{{asset('homecss/assets/images/blog/blog-2.jpg')}}" alt="Blog" class="img-fluid">
                                </div>
                                <figcaption class="blog-meta clearfix">
                                    <a href="single-blog.html" class="author">
                                        <div class="author-pic">
                                            <img src="{{asset('homecss/assets/images/blog/author.jpg')}}" alt="Author">
                                        </div>
                                        <div class="author-info">
                                            <h5>Myra Hindley</h5>
                                            <p>1 Day Ago</p>
                                        </div>
                                    </a>
                                    <div class="like-comm pull-right">
                                        <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                        <a href="#"><i class="fa fa-heart-o"></i>12</a>
                                    </div>
                                </figcaption>
                            </figure>

                            <div class="blog-content">
                                <h3><a href="single-blog.html">Myra Hindley and her lover, Ian Brady, plotted and</a></h3>
                                <p>This is a big project of our company, we are happy to completed this type projec which are
                                    get world famous award</p>
                                <a href="single-blog.html" class="btn btn-brand">More</a>
                            </div>
                        </article>
                    </div>
                    <!--== Single Blog Post End ==-->

                    <!--== Single Blog Post start ==-->
                    <div class="col-lg-4 col-md-6">
                        <article class="single-blog-post">
                            <figure class="blog-thumb">
                                <div class="blog-thumbnail">
                                    <img src="{{asset('homecss/assets/images/blog/blog-3.jpg')}}" alt="Blog" class="img-fluid">
                                </div>
                                <figcaption class="blog-meta clearfix">
                                    <a href="single-blog.html" class="author">
                                        <div class="author-pic">
                                            <img src="{{asset('homecss/assets/images/blog/author.jpg')}}" alt="Author">
                                        </div>
                                        <div class="author-info">
                                            <h5>Aileen Wuornos</h5>
                                            <p>3 mins Ago</p>
                                        </div>
                                    </a>
                                    <div class="like-comm pull-right">
                                        <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                        <a href="#"><i class="fa fa-heart-o"></i>12</a>
                                    </div>
                                </figcaption>
                            </figure>

                            <div class="blog-content">
                                <h3><a href="single-blog.html">Nurse with a private practice, racked up dozens of victims</a>
                                </h3>
                                <p>This is a big project of our company, we are happy to completed this type projec which are
                                    get world famous award</p>
                                <a href="single-blog.html" class="btn btn-brand">More</a>
                            </div>
                        </article>
                    </div>
                    <!--== Single Blog Post End ==-->
                </div>
                <!--== Blog Content Wrapper ==-->
            </div>
        </section>

<!----footer------>
@include('home.layouts.footer')
        </div>

        </body>

</html>
