@extends('layouts.layout')

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


    <!-- XML-põhiste keelte kooskasutus-->

    <h2>XML-põhiste keelte kooskasutus</h2>

    <div id="XML_stuff_here">

    </div>

    <!-- Leheosade hilisem laadimine -->

    <h2>Leheosade hilisem laadimine: </h2>

    <div>
        <div>
            <img data-addsrc="img/add_loaded_small.jpg" id="leheosade_hilisem" class="img-responsive"/>
        </div>
    </div>

    <h2>Data push: </h2>
    <div class="panel panel-default">
        <div id="getLatestEstate" class="panel-body"></div>
    </div>




    <h2>Ajaxi päring:</h2>

    {{--AJAX--}}
    <div>
        <button type="button" class="btn-warning" id="getRequest">AJAX</button>
    </div>

    <h2>Andmebaasi Select-Join päring ja välja kommenteeritud insert</h2>

    <div>
        <?php
        //Viimase elamu postituse ID
        $maxId = DB::table('posts')->max('id');

        //Lisab viimasele elamule review, aga välja kommenteeritud muidu tuleks liiga palju.. testisin, töötab..
        /*
        DB::table('reviews')->insert(
                array('post_id' => $maxId,
                        'body' => 'insert review')
        );
        */
        $query = "SELECT * FROM posts INNER JOIN reviews on posts.id = " . $maxId . " AND reviews.post_id = " . $maxId;
        $exec = DB::select(DB::raw($query));
        ?>
        @foreach($exec as $stat)
            <ul>
                <li> {{ $stat -> id }} </li>
                <li> {{ $stat -> subject }} </li>
                <li> {{ $stat -> body }} </li>
            </ul>
        @endforeach
    </div>
@stop