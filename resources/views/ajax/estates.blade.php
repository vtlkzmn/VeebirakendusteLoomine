<table class="table table-responsive table-striped">

    <!-- Table head -->
    <thead>
        <th style="width:25%;"></th>
        <th style="width:25%;"></th>
        <th style="width:40%;"></th>
        <th style="width:10%;"></th>
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
    </section>
</table>