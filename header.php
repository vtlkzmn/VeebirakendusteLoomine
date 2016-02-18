<!DOCTYPE html>
<html>

<head>
    <title>Veebirakenduste projekt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="js/login.js"></script>
</head>

<body>

<div id="wrap">
    <nav class="navbar navbar-inverse" role="navigation">
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

                <a href="index.php" class="navbar-brand"><img
                        src="http://www.wbg.ee/WWW_files/files/user_files/graphics/logo_footer@2x.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navHeaderCollapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><strong>Avaleht</strong><span class="sr-only">(current)</span></a></li>
                    <li class="dropdown" id="dropdown-products">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><strong>Maakonnad</strong><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="maakond.php">Tallinn</a></li>
                            <li><a href="maakond.php">Tartu</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="maakond.php">Pärnu</a></li>
                            <li><a href="maakond.php">Narva</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="maakond.php">Muud</a></li>
                        </ul>
                    </li>
                    <li><a href="KKK.php"><strong>KKK</strong></a></li>
                    <li><a href="kasutajatugi.php"><strong>Kasutajatugi</strong></a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span
                                class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="social-buttons">
                                            <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                            <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                        </div>
                                        <br>
                                        <form class="form" role="form" method="post" action="login"
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
                                                <div class="help-block text-right"><a href="">Forgot the password?</a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        New here ? <a href="#"><b>Join Us</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
