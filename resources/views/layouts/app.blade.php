<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ponpes Wahid Hasyim</title>
    <!-- core CSS -->
   
    <link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/owl.transitions.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('public/images/logo/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('public/images/logo/ms-icon-70x70.png')}}" alt="logo"> </a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll"><a href="{{route('home')}}">Home</a></li>
                        <li class="scroll"><a href="{{route('profil')}}">Profil</a></li>
                        <li class="scroll"><a href="{{route('geografis')}}">Letak Geografis</a></li>
                        <li class="scroll"><a href="{{route('visimisi')}}">Visi dan Misi </a></li>
                        @if (Auth::check())
                        <li class="scroll"><a href="#"> Hay, {{Auth::user()->name}}</a></li> 
                        <li class="scroll"><a href="{{route('keluar')}}">  Logout</a></li> 
                        @else
                        <li class="scroll"><a href="{{route('login')}}">Login</a></li>
                        @endif
                        
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->

    <!--/#main-slider-->
@yield('content')
    <!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2019 Aplikasi Perijinan Pondok Pesantren <a target="_blank">Zukrof Karimah Hamida</a>
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script src="{{asset('public/js/jquery.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/js/mousescroll.js')}}"></script>
    <script src="{{asset('public/js/smoothscroll.js')}}"></script>
    <script src="{{asset('public/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.inview.min.js')}}"></script>
    <script src="{{asset('public/js/wow.min.js')}}"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
  
</body>

</html>