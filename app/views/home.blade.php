@extends('layouts.cover')

@section('css')
    <!-- Custom styles for this template -->
    <link href="/css/cover.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
@stop

@section('content')
         <div class="site-wrapper">

           <div class="site-wrapper-inner">

             <div class="cover-container">

               <div class="masthead clearfix">
                 <div class="inner">
                   <h3 class="masthead-brand" style="font-family: 'Lobster', cursive; font-size: 40pt;">JShop</h3>
                   <ul class="nav masthead-nav">
                     <li class="active" id="home"><a href="#" onclick="go('home'); return false;">Home</a></li>
                     <li id="features"><a href="#" onclick="go('features'); return false;">Features</a></li>
                     <li id="contacts"><a href="#" onclick="go('contacts'); return false;">Contact</a></li>
                   </ul>
                 </div>
               </div>

               <div class="inner cover">
               <div class="well" id="myWell">
                 <h1>Сервис совместных покупок.</h1>
                 <br>
                 <div class="lead" id="home_text">
                 С гордостью представляем Вам  сайт Совместных покупок!
                    Наверняка многие из вас уже знакомы с таким видом шоппинга. Совместные покупки, они же оптовые закупки, появились не так давно, но уже стали очень популярны по всей России.
                 </div>
                 <div class="lead" id="features_text" style="display: none; text-align: left;">

                    <big>#1</big> Совместные покупки <br>
                    <big>#2</big> Оптовые закупки <br>
                    <big>#3</big> Экономия в путешествиях <br>
                    <big>#4</big> Благотворительность <br>
                    <big>#5</big> Экономия на доставке <br>
                    <big>#6</big> Поддержка Open Source <br>

                 </div>
               <div class="lead" id="contacts_text" style="display: none;">
                 <div class="row" style="text-align: left;">
                    <div class="col-md-6">
                        Десяткин Кирилл<br><br>
                        <a href="mailto: k.desyatkin@404-group.com">k.desyatkin@404-group.com</a>
                        <a href="http://github.com/desyatkin">http://github.com/desyatkin</a>
                    </div>
                    <div class="col-md-6">
                        Андрей Попов<br><br>
                        <a href="mailto: nord001@gmail.com">nord001@gmail.com</a>
                        <a href="http://github.com/nord001">http://github.com/nord001</a>
                    </div>
                 </div>
               </div>
               </div>
               <br>
                 <p class="lead">
                   <a href="/signup" class="btn btn-lg btn-default">Регистрация</a>
                   <a href="/signin" class="btn btn-lg btn-default">Войти</a>
                 </p>
               </div>

               <div class="mastfoot">
                 <div class="inner">
                   <p style="font-size: 20px;">Yandex Money Hackathon</p>
                 </div>
               </div>

             </div>

           </div>

         </div>
@stop

@section('scripts')
    <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
@stop

@section('javascript')
function go(id)
{
    $('#home_text').hide()
    $('#features_text').hide()
    $('#contacts_text').hide()
    $('#home').removeClass('active');
    $('#features').removeClass('active');
    $('#contacts').removeClass('active');

    $('#' + id + '_text').show();
    $('#' + id).addClass('active');
}
@stop