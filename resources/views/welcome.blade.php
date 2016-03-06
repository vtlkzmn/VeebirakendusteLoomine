@extends('layout')

@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="img/cool_apartment1_edit.jpg" alt="">
            </div>

            <div class="item">
                <img src="img/cool_apartment2_edit.jpg" alt="">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <h1>Mingi jama et punkte saada </h1>

    <!-- JavaScripti punktide saamiseks -->
    <div>
        <button type="button" class="btn btn-primary" onclick="bonusButton()">Javascripti punktid</button>
        <p id="points"></p>
    </div>

    <!-- Agregeeritud andmete esitamine -->
    <div>
        Viimase postituse ID on
        {{ \DB::table('posts')->max('id') }}
    </div>
@stop