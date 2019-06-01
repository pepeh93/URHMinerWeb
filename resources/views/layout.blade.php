<!doctype html>
<html lang="es-AR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>URH Miner</title>
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/magnific-popup.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.png" />
    <meta name="theme-color" content="#FFC107">
    {!! NoCaptcha::renderJs() !!}
    @yield('styles')
</head>
<body id="page-top">
@include('partials.navbar')
@yield('content')
@include('partials.footer')
</body>
<script src="/js/jquery.js"></script>
<script src="/js/magnific-popup.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/custom.js"></script>
@yield('scripts')
</html>
