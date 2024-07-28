
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Minu's pet shop</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
</head>


<link rel="stylesheet" href="{{url('frontend/css/swiper.css')}}" />
<link rel="stylesheet" href="{{url('frontend/css/bootstrap.css')}}" />

<link rel="stylesheet" type="text/css" href="{{url('frontend/css/vendor.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('frontend/css/style.css')}}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Montserrat:wght@300;400;500&display=swap"
  rel="stylesheet">

</head>

<body>
   


@include('frontend.partials.header')

 @yield('content')



 @include('frontend.partials.footer')

  <script src="{{url('frontend/js/jquery-1.11.0.min.js')}}"></script>
  <script src="{{url('frontend/js/swiper.js')}}"></script>
  <script src="{{url('frontend/js/bootstrap.bundle.js')}}"></script>
  <script src="{{url('frontend/js/plugins.js')}}"></script>
  <script src="{{url('frontend/js/script.js')}}"></script>
  <script src="{{url('frontend/js/iconify.js')}}"></script>
</body>

</html>

