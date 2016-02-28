@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>
                @if(count($post -> reviews) === 0)
                    <h1>There are no reviews yet! :(</h1>
                @endif
            </h1>

            <ul class="list-group">
                @foreach($post -> reviews as $review)
                    <li class="list-group-item">
                        {{ $review -> body }}
                    </li>
                @endforeach
            </ul>

            <h3> Add a new Review!</h3>

            <form method="POST" action="/posts/{{ $post -> id }}/reviews">

                <div class="form-group">
                    <textarea name="post_body" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Review</button>
                </div>
            </form>

            <form method="POST" action="/posts/{{$post -> id}}/deleteReviews">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Obliterate this particular motherfucker</button>
                </div>
            </form>

        </div>
    </div>
@stop