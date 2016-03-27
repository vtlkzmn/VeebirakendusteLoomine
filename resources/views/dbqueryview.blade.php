@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <h2>Pangalink</h2>
            <form action="{{ $requestUrl  }}" method="post">
                @foreach($requestData as $fieldName => $value)
                    <input type="hidden" name="{{ $fieldName }}" value="{{ $value }}"/>
                @endforeach
                <input type="submit" value="Make payment"/>
            </form>
        </div>
    </div>
@stop