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


        <!--=========================-->
        <!--=         About         =-->
        <!--=========================-->
        @include('home.includes.index_about')

         <!--=================================-->
        <!--=        Committee member slider       =-->
        <!--=================================-->


        @include('home.includes.commitee_member')
        <!--=================================-->
        <!--=         Responsibility        =-->
        <!--=================================-->
        @include('home.includes.index_ourresponsibility')

        <!--================================-->
        <!--=         Fun Fact        =-->
        <!--================================-->

        @include('home.includes.index_counter')




        <!--=================================-->
        <!--=         Call To Action        =-->
        <!--=================================-->
        @include('home.includes.index_calltoaction')

        <!--== Scholership Promo Area End ==-->


<!----footer------>
@include('home.includes.footer')
        </div>

        </body>

</html>
