@extends('layouts.layout')
@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- If there are no posts, display a message -->
            @if(count($posts) === 0)

                <h3 id="header-keskele">Ühtegi elamut pole veel lisatud :(</h3>
                <img class="img-responsive" alt="How could you do this" src="/img/sadpuppy.png">
                <!-- Otherwise display a table with all estates -->
            @else

                <div class="div-table">
                    <div class="div-table-row">
                        <div class="div-table-col">Image</div>
                        <div  class="div-table-col">Address</div>
                        <div  class="div-table-col">Description</div>
                        <div  class="div-table-col">Drop post</div>
                    </div>
                    <div class="posts endless-pagination" data-next-page="{{ $posts->nextPageUrl() }}">
                        <!-- Create a table row for each estate -->
                        @foreach($posts as $post)


                            <div class="div-table-row">
                                <div class="div-table-col">TODO</div>
                                <div class="div-table-col">
                                    <a href="/estates/{{ $post-> id }}">
                                        {{ $post -> subject }}
                                    </a>
                                </div>
                                <div class="div-table-col">{{ $post -> body }}</div>
                                <div class="div-table-col-remove-button">
                                    <form method="POST" action="/estates/{{ $post -> id }}/deleteEstate">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            @endif

        </div>
    </div>
@stop