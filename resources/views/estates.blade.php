@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <!-- If there are no posts, display a message -->

            @if(count($posts) === 0)
                <h3 style="text-align: center">Ühtegi elamut pole veel lisatud :(</h3>
                <img class="img-responsive" alt="How could you do this" src="/img/sadpuppy.png">

                <!-- Otherwise display a table with all estates -->
            @else
                <table class="table table-responsive table-striped">

                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th style="width:25%;">Image</th>
                        <th style="width:25%;">Address</th>
                        <th style="width:40%;">Description</th>
                        <th style="width:10%;"></th>
                    </tr>
                    </thead>

                    <section class="posts endless-pagination" data-next-page="{{ $posts->nextPageUrl() }}">
                    <!-- Create a table row for each estate -->
                    @foreach($posts as $post)
                        <tbody>
                        <td>
                            TODO
                        </td>
                        <td>
                            <a href="/estates/{{ $post-> id }}">
                                {{ $post -> subject }}
                            </a>
                        </td>
                        <td>
                            {{ $post -> body }}
                        </td>
                        <td>
                            <form method="POST" action="/estates/{{ $post -> id }}/deleteEstate">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
                        </td>
                        </tbody>
                    @endforeach
                        {!! $posts->render() !!}
                    </section>
                </table>
            @endif
        </div>
    </div>

@stop