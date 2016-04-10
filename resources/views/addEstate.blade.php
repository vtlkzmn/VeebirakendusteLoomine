@extends('layouts.no_cache_layout')

@section('content')

    <!-- If the user has not logged in, display the login page -->
    @if (Auth::guest())
        @include('layouts.login')
    @else
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <!-- Button for adding new posts -->
                <form method="POST" action="/estates/addEstate" class="col-sm-12">
                    <h3> Put your place up for reviews!</h3>

                    <div class="form-group">
                        <textarea placeholder="Address" name="subject" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <textarea placeholder="Description" maxlength="140" name="body" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"
                                title="You will not be able to change it (maybe in the future)!">Add Post
                        </button>
                    </div>
                </form>

            </div>
        </div>
    @endif
@stop