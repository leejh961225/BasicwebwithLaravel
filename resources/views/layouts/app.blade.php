<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Acme</title>
  
  <link rel="stylesheet"  href="/css/app.css" />
  <!--script src="main.js"></script-->
</head>
<body>  
@include('inc.navbar')


  <div class="container">
  @include('inc.showcase')
  <div class="row">
    <div class="col-md-8 col-lg-8">
    @yield('content')
    </div>
    <div class="col-md-8 col-lg-4">
    @include('inc.sidebar')
      </div>
  </div>
  
</div>
  
 
</body>
</html>