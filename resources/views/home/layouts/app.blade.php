<html dir="rtl" lang="fa-IR">

<head>

    <title>وبلاگ</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1">
    <link href="{{asset('blog-assets/Css/Main.css')}}" rel="stylesheet" />
    <link href="{{asset('blog-assets/Css/Menu-demo1.css')}}" rel="stylesheet" />
    <link href="{{asset('blog-assets/Css/Style.css')}}" rel="stylesheet" />
</head>

<body class="rtl blog"> 
    <div class="main_wrap">
@include('home.layouts.repancive')
@include('home.layouts.header')
@yield('content')
@include('home.layouts.footer')
@include('home.layouts.script')

     </div>

     </body>
</html>