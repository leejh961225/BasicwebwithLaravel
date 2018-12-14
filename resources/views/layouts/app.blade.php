<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AW-beta') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.transposer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/commentbox.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

</head>
<body>
    @include('inc.navbar')
    <div id="app">
        <div class="container">
            @if(Request::is('/'))
            @include('inc.1showcase')
            @endif
            
            <div class="row">
              <!-- 메세지탭 -->
              <div class="col-md-8 col-lg-8">
              @include('inc.messages')
              @yield('content')
              </div>

              <!-- 사이드바 -->
              <div class="col-md-4 col-lg-4">
              @include('inc.sidebar')
              </div>
            </div><!-- end of "row" -->
            
            
          </div>
            
          <footer id="footer" class="text-center"> 
              <p>Copyright 2018 &copy; Jaehun Lee</p>
            </footer>
    </div>



  <script src="//code.jquery.com/jquery-1.12.3.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/js/jquery.transposer.js"></script>
  <script src="/js/main.js"></script>

  
    </body>
</html>
