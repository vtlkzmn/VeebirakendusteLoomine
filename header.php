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

                <a href="index.html" class="navbar-brand"><img
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
                </ul>
            </div>

        </div>
    </nav>
