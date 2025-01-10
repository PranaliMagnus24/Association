@include('home.includes.head')
@include('home.includes.navbar')

<style>
     .gal {


-webkit-column-count: 3; /* Chrome, Safari, Opera */
-moz-column-count: 3; /* Firefox */
column-count: 3;


}
.gal img{ width: 100%; padding: 7px 0;}
@media (max-width: 500px) {

    .gal {


-webkit-column-count: 1; /* Chrome, Safari, Opera */
-moz-column-count: 1; /* Firefox */
column-count: 1;


}

}


.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #0080FF;
    border-radius: 5px;
    text-align: center;
    color: #0080FF;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #0080FF;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #0080FF;

}
.btn-default:active .filter-button:active
{
    background-color: #0080FF;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}


.section1 {
  column-width: 300px;
  column-gap: 5px;
  padding: 5px;
}
.section1 img {
  width: 100%;
  cursor: pointer;
}

.lightbox {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  display: none;
  background: #7f8c8d;
  perspective: 1000;
}

.filter1 {
  position: absolute;
  width: 100%;
  height: 100%;
  filter: blur(20px);
  opacity: 0.5;
  background-position: center;
  background-size: cover;
}

.lightbox img {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotateY(0deg);
  max-height: 95vh;
  max-width: calc(95vw - 100px);
  transition: 0.8s cubic-bezier(0.7, 0, 0.4, 1);
  transform-style: preserve-3d;
}


/*.lightbox:hover img{
  transform: translate(-50%, -50%) rotateY(180deg);
}*/

[class^="arrow1"] {
  height: 200px;
  width: 50px;
  background: rgba(0, 0, 0, 0.4);
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
}

[class^="arrow1"]:after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(-45deg);
  width: 15px;
  height: 15px;
}

.arrowr1 {
  right: 0;
}

.arrowr1:after {
  border-right: 1px solid white;
  border-bottom: 1px solid white;
}

.arrowl1 {
  left: 0;
}

.arrowl1:after {
  border-left: 1px solid white;
  border-top: 1px solid white;
}

.close1 {
  position: absolute;
  right: 0;
  width: 50px;
  height: 50px;
  background: rgba(0, 0, 0, 0.4);
  margin: 20px;
  cursor: pointer;
}

.close1:after,
.close1:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 1px;
  height: 100%;
  background: #e74c3c;
}

.close1:after {
  transform: translate(-50%, -50%) rotate(-45deg);
}

.close1:before {
  transform: translate(-50%, -50%) rotate(45deg);
}

.title1 {
  font-size: 20px;
  color: #000;
  z-index: 1000;
  position: absolute;
  top: 0;
  left: 0;
}
</style>
<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Our Gallery</h1>
                        <p>
                           Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need
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
                            <button class="btn btn-default filter-button" data-filter="sprinkle">Office Inauguration</button>
                            <button class="btn btn-default filter-button" data-filter="hdpe">Business Meet</button>
                            <button class="btn btn-default filter-button" data-filter="spray">Spray Nozzle</button>
                            <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button>
                        </div>
                        <hr>
<div class="section1">
  <img src="{{asset('homecss/assets/images/gallery/office-opening2.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet1.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening3.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet2.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening4.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet3.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening5.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet4.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening6.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet5.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening2.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet6.jpeg')}}" class="filter hdpe" />
  <img src="{{asset('homecss/assets/images/gallery/office-opening4.jpeg')}}" class="filter sprinkle" />
  <img src="{{asset('homecss/assets/images/gallery/business-meet1.jpeg')}}" class="filter hdpe" />
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


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(){

$(".filter-button").click(function(){
    var value = $(this).attr('data-filter');

    if(value == "all")
    {
        //$('.filter').removeClass('hidden');
        $('.filter').show('1000');
    }
    else
    {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
        $(".filter").not('.'+value).hide('3000');
        $('.filter').filter('.'+value).show('3000');

    }
});

if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});


$(window).load(function() {

$("section img").click(function() {
  $(".lightbox").fadeIn(300);
  $(".lightbox").append("<img src='" + $(this).attr("src") + "' alt='" + $(this).attr("alt") + "' />");
  $(".filter1").css("background-image", "url(" + $(this).attr("src") + ")");
  /*$(".title").append("<h1>" + $(this).attr("alt") + "</h1>");*/
  $("html").css("overflow", "hidden");
  if ($(this).is(":last-child")) {
    $(".arrowr1").css("display", "none");
    $(".arrowl1").css("display", "block");
  } else if ($(this).is(":first-child")) {
    $(".arrowr1").css("display", "block");
    $(".arrowl1").css("display", "none");
  } else {
    $(".arrowr1").css("display", "block");
    $(".arrowl1").css("display", "block");
  }
});

$(".close1").click(function() {
  $(".lightbox").fadeOut(300);
  $("h1").remove();
  $(".lightbox img").remove();
  $("html").css("overflow", "auto");
});

$(document).keyup(function(e) {
  if (e.keyCode == 27) {
    $(".lightbox").fadeOut(300);
    $(".lightbox img").remove();
    $("html").css("overflow", "auto");
  }
});

$(".arrowr1").click(function() {
  var imgSrc = $(".lightbox img").attr("src");
  var search = $("section").find("img[src$='" + imgSrc + "']");
  var newImage = search.next().attr("src");
  /*$(".lightbox img").attr("src", search.next());*/
  $(".lightbox img").attr("src", newImage);
  $(".filter1").css("background-image", "url(" + newImage + ")");

  if (!search.next().is(":last-child")) {
    $(".arrowl1").css("display", "block");
  } else {
    $(".arrowr1").css("display", "none");
  }
});

$(".arrowl1").click(function() {
  var imgSrc = $(".lightbox img").attr("src");
  var search = $("section").find("img[src$='" + imgSrc + "']");
  var newImage = search.prev().attr("src");
  /*$(".lightbox img").attr("src", search.next());*/
  $(".lightbox img").attr("src", newImage);
  $(".filter1").css("background-image", "url(" + newImage + ")");

  if (!search.prev().is(":first-child")) {
    $(".arrowr1").css("display", "block");
  } else {
    $(".arrowl1").css("display", "none");
  }
});

});

</script>


         @include('home.includes.footer')
