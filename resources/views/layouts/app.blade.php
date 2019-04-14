<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>مدیریت اخبار</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


     <!-- Bootstrap core CSS     -->
    <link href="{!! URL::asset('css/bootstrap.min.css') !!}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{!! URL::asset('css/animate.min.css') !!}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{!! URL::asset('css/light-bootstrap-dashboard.css') !!}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{!! URL::asset('css/demo.css') !!}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="{!! URL::asset('css/font-awesome.min.css') !!}" rel="stylesheet">
     
    <link href="{!! URL::asset('css/pe-icon-7-stroke.css') !!}" rel="stylesheet" />
 
	   @yield('css')
	 <!--   Core JS Files   -->

</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest()) 
	<div class="wrapper">

		<!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="pull-right navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">منو</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{!!  url('/home') !!}">خانه</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                
								<p class="hidden-lg hidden-md">خانه</p>
								<i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        
                        
                    </ul>

                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										دسترسی سریع
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="{!! url('news/create') !!}">ثبت خبر جدید</a></li>
                                <li><a href="{!! url('news') !!}">مدیریت اخبار</a></li> 
                                 
                              </ul>
                        </li>
                        
						<li>
							<!-- search form (Optional) -->
							<form action="#" method="get" class="sidebar-form">
								<div  >
									<input type="text" name="q"   placeholder="جستجو ..."/>
								  <span  >
									<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
									</button>
								  </span>
								</div>
							</form>
                        </li>
						<li>
						<a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            خروج
                                        </a>
							<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
                            
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
		 <div class="content">
            <div class="container-fluid">
				 @yield('content')
			</div>	 
		</div>	 

	<footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                خانه 
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                تماس با ما
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                درباره ما 
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               وبلاگ
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> ایجاد و پشتیبانی<a href="https://mag.nilsoo.com"> نشریه نیلسو</a>,تمام حقوق محفوظ است.
                </p>
            </div>
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    مدیریت نشریه نیلسو
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">خانه</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">ورود</a></li>
                    <li><a href="{!! url('/register') !!}">ثبت نام</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</body>   
	
	<script src="{!!  asset('js/jquery.min.js') !!}"></script>

	<script src="{!! asset('js/bootstrap.min.js') !!}" type="text/javascript"></script>
 
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{!! URL::asset('js/bootstrap-checkbox-radio-switch.js') !!}"></script>

 
    <!--  Notifications Plugin    -->
    <script src="{!! URL::asset('js/bootstrap-notify.js') !!}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

   
	<!--  Charts Plugin -->
	<script src="{!! URL::asset('js/chartist.min.js') !!}"></script>

	<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{!! URL::asset('js/light-bootstrap-dashboard.js') !!}"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{!! URL::asset('js/demo.js') !!}"></script>
	
	
	
    @yield('scripts')
	
	<script type="text/javascript">
    	$(document).ready(function(){

        	//demo.initChartist();
/*
        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });
*/
    	});
	</script>

</html>