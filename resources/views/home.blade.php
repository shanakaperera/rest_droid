@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="span12">
                    <form class="form-horizontal" action='{{route('loginAuth')}}' method="POST">
                        <fieldset>
                            <div id="legend">
                                <legend class="">Login</legend>
                            </div>
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label"  for="username">Username</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="username" name="uname" placeholder="" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- Password-->
                                <label class="control-label" for="password">Password</label>
                                <div class="controls">
                                    <input type="password" class="form-control" id="password" name="upass" placeholder="" class="input-xlarge">
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="control-group">
                                <!-- Button -->
                                <div class="controls">
                                    <button class="btn btn-success" type="submit">Login</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
