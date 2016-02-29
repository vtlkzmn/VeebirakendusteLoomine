@extends('layout')

@section('content')
    <style>
        #map {
            width: 1200px;
            height: 315px;
        }
    </style>
    <div id="map"></div>
    <script>
        function initMap() {
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: {lat: 58.3750509, lng: 26.6625566},
                zoom: 8
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
            async defer></script>
    </body>
@stop