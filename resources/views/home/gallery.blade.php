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

                            @if(is_array($gallery) && count($gallery)>0)
                                @foreach($gallery as $galkey=>$gal)
                                <button class="btn btn-default filter-button" data-filter="{{str_replace(" ","_",strtolower($gal['name']))}}">{{$gal['name']}}</button>
                                @endforeach
                            @endif





                        </div>
                        <hr>
<div class="section1">

@if(is_array($gallery) && count($gallery)>0)
    @foreach($gallery as $galkey=>$galval)
        @foreach($galval['imagegallery'] as $imgkey=>$imgval)
            <img src="{{asset('upload/gallery/thumbnails/'. $imgval['thumbnail'])}}"   data-mdb-img="{{asset('upload/gallery/'.$imgval['name'])}}" class="filter {{str_replace(" ","_",strtolower($galval['name']))}}" />
        @endforeach
    @endforeach
@endif


  </div>

</div>
</div>
</div>
</section>
<div class="lightbox" style="display: none;">
  <span class="close1">&times;</span>
  <div class="arrowl1">&#10094;</div>
  <div class="arrowr1">&#10095;</div>
</div>


         @include('home.includes.footer')
