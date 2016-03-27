<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
    <title>Veebirakenduste projekt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <meta charset="UTF-8">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link rel="stylesheet" type="text/css" href="/css/googlemaps.css">
    <link rel="stylesheet" type="text/css" href="/css/media.css">

    <!-- JavaScripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/ourAwesomeScripts.js"></script>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
</head>

<body>

<div id="wrap">

    <nav class="navbar navbar-default">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navHeaderCollapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="/" class="navbar-brand"><img alt="Kodu" src="/img/logo.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navHeaderCollapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">{{ strtoupper(trans('header.homepage')) }}</a></li>
                    <li><a href="/estates">{{ strtoupper(trans('header.estates')) }}</a></li>
                    <li><a href="/addEstate">{{ strtoupper(trans('header.addEstate')) }}</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/contact">{{ strtoupper(trans('header.contact')) }}</a></li>
                    @if (!Auth::guest())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        @endif

                                <!-- Flags -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/img/flags/{{ \App::getLocale() }}_logo.png">
                            </a>
                            <ul class="dropdown-menu">
                                @foreach (\Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <li>
                                            <a href="/lang/{{ $lang }}"><img
                                                        src="/img/flags/{{ $lang }}_logo.png"> {{$language}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                </ul>
            </div>


        </div>
    </nav>

    <!-- Main container -->
    <div class="container" style="margin-top: 15px;">
        @yield('content')
    </div>

    <!-- Footer -->
    <nav class="navbar navbar-default" id="footer">
        <div class="container">
            <div class="col-sm-12 text-center navbar-text">
                MTÜ WBG | J. Liivi 2 | +372 59035823 | mart.magi@outlook.com
            </div>
        </div>
    </nav>

</div>


</body>

</html>
