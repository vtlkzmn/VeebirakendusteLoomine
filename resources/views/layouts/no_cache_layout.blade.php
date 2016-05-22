<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
    <title>Veebirakenduste projekt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/all.css">
    <!-- Scripts -->
    <script src="/js/all.js"></script>
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
                            <img alt="flag-logo" src="/img/flags/{{ \App::getLocale() }}_logo.png">
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (\Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a href="/lang/{{ $lang }}">
                                            <img alt="flag-logo" src="/img/flags/{{ $lang }}_logo.png"> {{$language}}</a>
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
    <div id="main-container" class="container">
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
