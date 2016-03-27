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