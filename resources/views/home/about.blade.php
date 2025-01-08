@include('home.includes.head')
@include('home.includes.navbar')

<style>

.card-list .card-item {
  height: auto;
  color: #fff;
  user-select: none;
  padding: 7px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  backdrop-filter: blur(30px);
}
.card-list .card-item .user-image {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 40px;
  border: 3px solid #fff;
  padding: 4px;
}
.card-list .card-item .user-profession {
  font-size: 1.15rem;
  color: #e3e3e3;
  font-weight: 500;
  margin: 14px 0 40px;
}
.card-list .card-item .message-button {
  font-size: 1.25rem;
  padding: 10px 35px;
  color: #030728;
  border-radius: 6px;
  font-weight: 500;
  cursor: pointer;
  background: #fff;
  border: 1px solid transparent;
  transition: 0.2s ease;
}
.card-list .card-item .message-button:hover {
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid #fff;
  color: #fff;
}
.slider-wrapper .swiper-pagination-bullet {
  background: #fff;
  height: 13px;
  width: 13px;
  opacity: 0.5;
}
.slider-wrapper .swiper-pagination-bullet-active {
  opacity: 1;
}
.slider-wrapper .swiper-slide-button {
  color: #fff;
  margin-top: -55px;
  transition: 0.2s ease;
  margin-right: -14px;
  margin-left: -14px;
}
.slider-wrapper .swiper-slide-button:hover {
  color: #4658ff;
}
@media (max-width: 768px) {
  .slider-wrapper {
    margin: 0 10px 40px;
  }
  .slider-wrapper .swiper-slide-button {
    display: none;
  }
}

</style>
<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">About us</h1>
                        <p>
                           Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need
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
                        < class="col-lg-11 m-auto">
                            <!-- Single about text start -->
                            <div class="single-about-text">
                                <span class="year">1834</span>
                                <img src="{{asset('homecss/assets/images/about-page/about-img-1.jpg')}}" alt="About" class="img-fluid img-left">
                                <h2 class="h3">About us</h2>
                                <p>From the desk of chairman.In the present senerio it is  observed...</p>
                                <p>Muslims presence in industry  and  trade is very low than national average level, Sharia complient funding  is not available, Govt. Subsidies, scheme  for promoting bussiness is not reaching them, Muslims are not activly participatingin in bussiness Associations like  NIMA  AIMA  Chamber of commerce .                       Hence there is need for  National. economic development movement fueled by unity and vision by muslim community for their uplifting  benefits.                        Following persons  along with Jan Seva credit cooperative  scocity and Islamic chember of commerce India organised Muslim industrialist. and bussinessmen conference at Nasik  to discuss about these subject.The conference resolved to form an Association of  Muslim Industrialists ,Merchants and professional s  by Following persons.</p>
                            </div>
                            <!----------------Swiper---------------------->
                            <div class="container swiper mt-5">
                                <div class="slider-wrapper">
                                    <div class="card-list swiper-wrapper">


                                    <div class="card-item swiper-slide">
                                            <div class="single-committee-member" style="margin-top:1px;">
                                                <div class="commitee-thumb">
                                                    <img src="{{asset('homecss/assets/images/committee/Munir Khan.png')}}" class="img-fluid" alt="Committee" />
                                                </div>
                                                <h3>Munir Khan<span class="committee-deg"></span></h3>
                                            </div>
                                        </div>
                                        <div class="card-item swiper-slide">
                                            <div class="single-committee-member" style="margin-top:1px;">
                                                <div class="commitee-thumb">
                                                    <img src="{{asset('homecss/assets/images/committee/Minaz Mirza.png')}}" class="img-fluid" alt="Committee" />
                                                </div>
                                                <h3>Minaz Mirza<span class="committee-deg"></span></h3>
                                            </div>
                                        </div>
                                        <div class="card-item swiper-slide">
                                            <div class="single-committee-member" style="margin-top:1px;">
                                                <div class="commitee-thumb">

                                                    <img src="{{asset('homecss/assets/images/committee/No-Image.png')}}" class="img-fluid" alt="Committee" />
                                                </div>
                                                <h3>ABDULLAH khan<span class="committee-deg"></span></h3>
                                            </div>
                                        </div>
                                        <div class="card-item swiper-slide">
                                            <div class="single-committee-member" style="margin-top:1px;">
                                                <div class="commitee-thumb">

                                                    <img src="{{asset('homecss/assets/images/committee/No-Image.png')}}" class="img-fluid" alt="Committee" />
                                                </div>
                                                <h3>Tanveer rafik shaikh<span class="committee-deg"></span></h3>
                                            </div>
                                        </div>
                                        <div class="card-item swiper-slide">
                                            <div class="single-committee-member" style="margin-top:1px;">
                                                <div class="commitee-thumb">

                                                    <img src="{{asset('homecss/assets/images/committee/Arif-shaikh.png')}}" class="img-fluid" alt="Committee" />
                                                </div>
                                                <h3>Arif Shaikh<span class="committee-deg"></span></h3>
                                            </div>
                                        </div>

                                        <div class="card-item swiper-slide">
                                            <div class="single-committee-member" style="margin-top:1px;">
                                                <div class="commitee-thumb">

                                                    <img src="{{asset('homecss/assets/images/committee/No-Image.png')}}" class="img-fluid" alt="Committee" />
                                                </div>
                                                <h3>Dr. V.B.shaikh<span class="committee-deg"></span></h3>
                                            </div>
                                        </div>
                                        <div class="card-item swiper-slide">
                                            <div class="single-committee-member" style="margin-top:1px;">
                                                <div class="commitee-thumb">

                                                    <img src="{{asset('homecss/assets/images/committee/Ali Khan.png')}}" class="img-fluid" alt="Committee" />
                                                </div>
                                                <h3>Ali Munir  Ahmed Khan<span class="committee-deg"></span></h3>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-slide-button swiper-button-prev"></div>
                                    <div class="swiper-slide-button swiper-button-next"></div>
                                </div>
                            </div>

                            <!-- Single about text End -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=========================-->
        <!--=         Fun fact        =-->
        <!--==========================-->
        @include('home.includes.index_counter')

        <!--===========================-->
        <!--=         Committee       =-->
        <!--===========================-->
        @include('home.includes.commitee_member')


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper('.slider-wrapper', {
  loop: true,
  grabCursor: true,
  spaceBetween: 30,
  // Pagination bullets
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    dynamicBullets: true
  },
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  // Responsive breakpoints
  breakpoints: {
    0: {
      slidesPerView: 1
    },
    768: {
      slidesPerView: 2
    },
    1024: {
      slidesPerView: 4 // Change this to 4 to display 4 images
    }

  }
});
</script>
         @include('home.includes.footer')
