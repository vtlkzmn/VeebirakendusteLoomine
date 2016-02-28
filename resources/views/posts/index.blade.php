@extends('layout')

@section('content')

    @foreach($posts as $post)
        <div class="panel panel-primary col-sm-6">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">
                    <a href="/posts/{{ $post-> id }}">
                        {{ $post -> subject }}
                    </a>
                </h3>
                <form method="POST" action="/posts/{{ $post -> id }}/deletePost">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default pull-right">Delete</button>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                {{ $post -> body }}
            </div>
        </div>
    @endforeach
@stop