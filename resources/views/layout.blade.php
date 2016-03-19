<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
    <title>Veebirakenduste projekt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/ourAwesomeScripts.js"></script>

    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link rel="stylesheet" type="text/css" href="/css/googlemaps.css">
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
                    <li><a href="/">AVALEHT<span class="sr-only">(current)</span></a></li>
                    <li><a href="/estates">ELAMUD</a></li>
                    <li><a href="/addEstate">LISA ELAMU</a></li>
                    <li><a href="/contact">KONTAKT</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>LOGI SISSE</strong> <span
                                    class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="social-buttons">
                                            <a href="#" class="btn btn-fb"><em class="fa fa-facebook"></em> Facebook</a>
                                            <a href="#" class="btn btn-tw"><em class="fa fa-twitter"></em> Twitter</a>
                                        </div>
                                        <br>
                                        <form class="form" role="form" method="post" action="#"
                                              accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail2"
                                                       placeholder="Email address" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2"
                                                       placeholder="Password" required>
                                                <br>
                                                <div class="help-block text-right"><a href="">Unustasid parooli? Kehv
                                                        lugu..</a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Logi sisse
                                                </button>
                                                <button type="submit" class="btn btn-primary btn-block">Registreeru
                                                </button>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

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
