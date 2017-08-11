@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">email</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="email" >
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                            </div>
                        </div>



                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">confirme password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="retype" >
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
