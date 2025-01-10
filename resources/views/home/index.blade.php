<!DOCTYPE html>
<html lang="en">
    <head>
    @include('home.includes.head')
    </head>

    <body id="home-v1" class="home-page-one" data-style="default">
    <a href="#" class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </a>
    @include('home.includes.navbar')
    <div id="main_content" class="main-content">

    @include('home.includes.slider')

    @include('home.includes.about_section')
        <!--=========================-->
        <!--=         About         =-->
        <!--=========================-->
        @include('home.includes.index_vision-mission')

        <!--=================================-->
        <!--=        Aims    =-->
        <!--=================================-->
        @include('home.includes.index_ourresponsibility')

         <!--=================================-->
        <!--=        Committee member slider       =-->
        <!--=================================-->

<!--================================-->
        <!--=         Fun Fact        =-->
        <!--================================-->






        <!--=================================-->
        <!--=         Call To Action        =-->
        <!--=================================-->
        @include('home.includes.index_calltoaction')

        @include('home.includes.index_counter')

        @include('home.includes.commitee_member')



        <!--== Scholership Promo Area End ==-->


<!----footer------>
@include('home.includes.footer')
        </div>

        </body>

</html>
