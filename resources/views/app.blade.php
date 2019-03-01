<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
=======
<html lang="en" >
>>>>>>> newGorilla
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name ="viewport" content ="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
<<<<<<< HEAD

        <title>Gorilla App</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>-->

        <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>
=======
        <link rel="icon" sizes="192x192" href="{{ asset('images/logo_sm.png')}}">

        <title>GORILLA APP</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  


        <!--
        <script src="https://code.highcharts.com/maps/highmaps.js"></script>
        <script src="http://code.highcharts.com/maps/modules/map.js"></script>
        <script src="http://code.highcharts.com/maps/modules/data.js"></script>

        <script src="http://code.highcharts.com/mapdata/custom/world.js"></script>
        <script src="http://code.highcharts.com/mapdata/countries/gr/gr-all.js"></script>
        <script src="http://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highstock/4.2.4/highstock.js"></script>
        <script src="{{ asset('js/libs/highcharts.js')}}" type="text/javascript"></script>
        -->

        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/maps/modules/map.js"></script>
        <script src="http://code.highcharts.com/maps/modules/data.js"></script>
        <script src="http://code.highcharts.com/mapdata/custom/world.js"></script>
        <script src="http://code.highcharts.com/mapdata/countries/gr/gr-all.js"></script>
>>>>>>> newGorilla

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
<<<<<<< HEAD
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/tooltip.css">
        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/media.css') }}">
        <script type="text/javascript" src="{{ asset('/js/script.js') }}"></script>
        @yield('javascript')
    </head>
    <body class="dashboard">
        <div class="container">
            @include('partials.topNav')
            <div class="row" >
                @if (!Auth::guest())
                    @include('partials.leftNav')
                @endif
                @yield('content')
            </div>
        </div>
=======
        <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">-->
        <link rel="stylesheet" href="{{ asset('/css/tooltip.css') }}">
        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




        <script type="text/javascript" src="{{ asset('/js/script.js') }}"></script>


        <meta name="theme-color" content="#e69512">
        <link rel="icon" sizes="192x192" href="img/logo_sm.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('/css/libs/select2.min.css') }}" type="text/css" />

        <link rel="stylesheet" href="{{ asset('/css/icons.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/pantelis.css') }}" type="text/css" />

        <!-- SCRIPTS -->
        <!--        <script src="js/libs/jquery-1.12.1.min.js" type="text/javascript"></script>-->
        <!--        <script src="js/libs/bootstrap.min.js" type="text/javascript"></script>-->
        <script src="{{ asset('/js/libs/select2.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/custom.js')}}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ asset('/js/angular.min.js') }}"></script>
        <script type="text/javascript" src="http://code.angularjs.org/1.2.5/i18n/angular-locale_el-gr.js"></script>
        <script type="text/javascript" src="{{ asset('/js/angController.js')}}"></script> 


        @yield('javascript')
    </head>
    <body class="dashboard" ng-app="gorillaApp" >

        @if (!Auth::guest())
        @include('partials.topNav')
        @endif


        <div class="container-fluid" >
            <div class="row">
                @if (!Auth::guest())
                @include('partials.leftNav')
                @endif

                @if (!Auth::guest())
                <div class="menu-override"></div>   
                <div id="main-content" class="col-lg-10 col-lg-offset-2 col-md-9 col-md-offset-3 col-sm-12 col-xs-12 bg-white">
                    @include('partials.accountNav')
                    @include('partials.breadcrumb')
                    @endif

                    @yield('content')
                </div>

            </div>

        </div>

        <input type="hidden" id="searchYear" value="<?php echo (!empty($_REQUEST['year']))?$_REQUEST['year']:'2014';?>">
        
>>>>>>> newGorilla
    </body>
</html>

