@extends('layout')

@section('content')
    <h1>
        @if(count($posts) === 0)
            <h1>There are no posts yet! :(</h1>
        @endif
    </h1>

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


    <form method="POST" action="/posts/addPost" class="col-sm-12">
        <h3> Add a new Post!</h3>

        <div class="form-group">
            <textarea name="subject" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <textarea name="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Post</button>
        </div>
    </form>

@stop