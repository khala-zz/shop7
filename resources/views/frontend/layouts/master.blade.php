<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
     <meta name="keywords" content="shop online" />
    <meta name="description" content="khala chuyen shop online">
    <meta name="author" content="khala">
    <!-- dung cho ajax token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('title')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.png" />

    <!-- Google Fonts -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all">  
    <link href="{{ asset('css/css-font/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/fonts.googleapis.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/icon-font.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/social-buttons.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/cs-1.styles.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/spr.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/slideshow-fade.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/cs.animate.css') }}" rel="stylesheet" type="text/css" media="all">

    
    <link href="{{ asset('css/khala.css') }}" rel="stylesheet">
    @yield('css')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cs.optionSelect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cs.script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.currencies.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/linkOptionSelectors.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/social-buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.touchSwipe.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.gmap.min.js') }}"></script>        
    <script src="{{ asset('js/khala.js') }}"></script>
</head>

<body class="index-template sarahmarket_1">


        
    <!-- Header Start -->
    @include('frontend.components.header')
    <!-- Header End -->
    <!-- content -->
    @yield('content')
    <!-- end content -->
    @include('frontend.components.footer')
   
       

        
    <!-- Modal quickview-->
    @include('frontend.components.modal')
    <!-- Modal end -->

    

    <!-- Float right icon -->
    <div class="float-right-icon">
        <ul>
            <li>
                <div id="scroll-to-top" data-toggle="" data-placement="left" title="Scroll to Top" class="off">
                    <i class="fa fa-angle-up"></i>
                </div>
            </li>
        </ul>
    </div>
    
    
    
    
    
    @yield('js')
<!--   Loading Icon add to cart -->
    <div class="ss-loading" style="display: none;"></div>
    </div> 
</body>
</html>