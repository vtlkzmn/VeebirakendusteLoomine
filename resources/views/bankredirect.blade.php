@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            {{ $message }}
            <button type="button" onclick="window.location='{{ url("/") }}'">Tagasi pealehele</button>
        </div>
    </div>
@stop