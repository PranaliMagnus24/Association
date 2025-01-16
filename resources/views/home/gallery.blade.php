@include('home.includes.head')
@include('home.includes.navbar')

<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Our Gallery</h1>
                        <p>
                        The believer is like the bee, which produces honey; it is beneficial and productive.
                        <br> Hadith
                        (A metaphor for a productive, beneficial business.)
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <br>
<!--=         Gallery       =-->
        <!--=========================-->
        <section id="page-content-wrap" >
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div align="center">
                            <button class="btn btn-default filter-button" data-filter="all">All</button>
                            <button class="btn btn-default filter-button" data-filter="irrigation">Rotary Club Meetup</button>
                            <button class="btn btn-default filter-button" data-filter="sprinkle">Office Inauguration</button>
                            <button class="btn btn-default filter-button" data-filter="hdpe">Business Meet</button>
                            <!-- <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button> -->
                        </div>
                        <hr>
<div class="section1">
  <img src="{{asset('homecss/assets/images/gallery/office-opening2.jpeg')}}"   data-mdb-img="{{asset('homecss/assets/images/gallery/office-opening2.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet1.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/business-meet1.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening3.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/office-opening3.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet2.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/business-meet2.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening4.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/office-opening4.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet3.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/business-meet3.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening5.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/office-opening5.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet4.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/business-meet4.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening6.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/office-opening6.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet5.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/business-meet5.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet6.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/business-meet6.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/rotary_club1.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/rotary_club1.jpeg')}}" class="filter irrigation" />
  <img src="{{asset('homecss/assets/images/gallery/rotary_club2.jpeg')}}"  data-mdb-img="{{asset('homecss/assets/images/gallery/rotary_club2.jpeg')}}" class="filter irrigation" />
  </div>

</div>
</div>
</div>
</section>
<div class="lightbox">
  <div class="title1"></div>
  <div class="filter1"></div>
  <div class="arrowr1"></div>
  <div class="arrowl1"></div>
  <div class="close1"></div>
</div>

         @include('home.includes.footer')
