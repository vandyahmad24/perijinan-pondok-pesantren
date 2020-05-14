<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="skcats">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>@yield('title')</title>


        <link href="{{asset('template/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="{{asset('template/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('template/assets/plugins/icomoon/style.css')}}" rel="stylesheet">
        <link href="{{asset('template/assets/plugins/uniform/css/default.css')}}" rel="stylesheet"/>
        <link href="{{asset('template/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('template/assets/plugins/nvd3/nv.d3.min.css')}}" rel="stylesheet">  
      
        <!-- Theme Styles -->
        <link href="{{asset('template/assets/css/ecaps.min.css')}}" rel="stylesheet">
        <link href="{{asset('template/assets/css/custom.css')}}" rel="stylesheet">
         <script src="{{asset('template/assets/js/jquery.js')}}"></script>
     
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="index.html">
                    <span style="font-size: 14px;">Ponpes Wahid Hasyim</span>
                   
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            @if(Auth::user()->level=='admin')
                            <li>
                                <a href="{{route('admin')}}">
                                    <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('daftar-santri')}}">
                                    <i class="menu-icon icon-format_list_bulleted"></i><span>Daftar Santri</span>
                                </a>
                            </li>
                            @elseif(Auth::user()->level=='pengurus')
                            <li>
                                <a href="{{route('pengurus')}}">
                                    <i class="menu-icon icon-inbox"></i><span>Profil Pengurus</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('menu-perijinan')}}">
                                    <i class="menu-icon icon-format_list_bulleted"></i><span>Daftar Perijinan </span>
                                </a>
                            </li>
                            @else
                            <li>
                                <a href="{{route('santri')}}">
                                    <i class="menu-icon icon-inbox"></i><span>Profil Santri</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('perijinan')}}">
                                    <i class="menu-icon icon-format_list_bulleted"></i><span>Menu Perijinan </span>
                                </a>
                            </li>
                            @endif
                         
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
            
          @yield('content')
          
       <!-- /Page Container -->
        
        
        <!-- Javascripts -->
        
        <script src="{{asset('template/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/uniform/js/jquery.uniform.standalone.js')}}"></script>
        <script src="{{asset('template/assets/plugins/switchery/switchery.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/d3/d3.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/nvd3/nv.d3.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/flot/jquery.flot.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/flot/jquery.flot.time.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/flot/jquery.flot.symbol.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/flot/jquery.flot.resize.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/flot/jquery.flot.pie.min.js')}}"></script>
      
        <script src="{{asset('template/assets/js/ecaps.min.js')}}"></script>
    </body>
</html>