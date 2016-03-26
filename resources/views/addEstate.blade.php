@extends('layouts.layout')

@section('content')

    @if (Auth::guest())
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-sign-in"></i>Login
                                        </button>

                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                        <a href="/register" class="btn btn-primary">No account yet? Register</a>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                title="You will not be able to change it (maybe in the future)!"
                                id="addEstate">Add Post
                        </button>
                    </div>
                </form>

            </div>

            <!-- AJAX -->
            <div>
                <button type="button" class="btn-warning" id="getRequest">getRequest</button>
            </div>

            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(document).ready(function () {
                    $('#getRequest').click(function () {
                        $.get('addEstate/getRequest', function (data) {
                            console.log(data);
                        });
                    });
                    //siin on vaja veel mõtelda natuke, mingi pärast post ei toimu AJAXiga
                    $('#addEstate').submit(function () {
                        var subject = $('subject').val();
                        var name = $('name').val();
                        $.ajax({
                            type: "POST",
                            url: "addEstate/addEstate",
                            data: {subject: subject, name: name},
                            success: function (data) {
                                console.log(data);
                            }
                        });
                    });
                });
            </script>
        </div>
    @endif
@stop