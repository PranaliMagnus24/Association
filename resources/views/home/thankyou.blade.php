@include('home.includes.head')
@include('home.includes.navbar')
<style>
    .wrapper-1{
  width:100%;
  height:100vh;
  display: flex;
flex-direction: column;
}
.wrapper-2{
  padding :30px;
  text-align:center;
}
h1{
    font-family: 'Kaushan Script', cursive;
  font-size:4em;
  letter-spacing:3px;
  color:#5892FF ;
  color: rgb(29, 217, 131);
  margin:0;
  margin-bottom:20px;
}
.wrapper-2 h4 {
    margin: 0;
    font-size: 1.3em;
    margin-bottom: 14px;
    color: #3e3e3e;
    font-family: 'Source Sans Pro', sans-serif;
    letter-spacing: 1px;
}
.wrapper-2 p {
    margin: 0;
    color: #5f5f5f;
    font-family: 'Source Sans Pro', sans-serif;
    letter-spacing: 1px;
    font-size: 18px;
}
.go-home{
  color:#fff;
  background:#5892FF;
  background: rgb(29, 217, 131);
  border:none;
  padding:10px 50px;
  margin:30px 0;
  border-radius:30px;
  text-transform:capitalize;
  box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
}
.footer-like{
  margin-top: auto;
  background:#D7E6FE;
    background: #dadada;
  padding:6px;
  text-align:center;
}
.footer-like p{
  margin:0;
  padding:4px;
  color:#5892FF;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.footer-like p a{
  text-decoration:none;
  color:#5892FF;
  font-weight:600;
}

@media (min-width:360px){
  h1{
    font-size:4.5em;
  }
  .go-home{
    margin-bottom:20px;
  }
}

@media (min-width:600px){
  .content{
  max-width:1000px;
  margin:0 auto;
}
  .wrapper-1{
  height: initial;
  max-width:620px;
  margin:0 auto;
  margin-top:100px;
  box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
}

}
</style>
<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ GoogleTranslate::trans('Thank You', app()->getLocale()) }}</h1>
                        {{ GoogleTranslate::trans('The believer is like the bee, which produces honey; it is beneficial and productive.', app()->getLocale()) }}
                        <br>{{ GoogleTranslate::trans(' Hadith
                            (A metaphor for a productive, beneficial business.)', app()->getLocale()) }}
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">{{ GoogleTranslate::trans('Let&apos;s See', app()->getLocale()) }}</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <br>
    <!--=Gallery=-->
        <!--=========================-->
        <section id="page-content-wrap" >
        <div class="content mb-5">
  <div class="wrapper-1">
    <div class="wrapper-2">
      <h1>{{ __('messages.Thank you') }}! }}</h1>
      <h4>{{ __('messages.Thank you for registering with the Muslim Industrialist and Merchant Association') }}.</h4>
      <p>{{ __('messages.We are excited to have you as a valued member and look forward to working together to foster growth, collaboration, and ethical business practices. Welcome to the community') }}!</p>

      <button class="go-home">
      <a href="{{route('home.index')}}">{{ __('messages.Back to home') }}</a>
      </button>
    </div>
</div>
</div>
        </section>



         @include('home.includes.footer')
