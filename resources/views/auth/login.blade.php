@extends('layouts.login')

@section('content')
    {!! Form::open(array('url' => '/login', 'method' => 'POST')) !!}

        <h1>Login Form</h1>
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {{ Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => 'E-Mail Address']) }}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <br>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{ Form::password("password", ['class' => 'form-control', 'placeholder' => 'Password']) }}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    {{ Form::checkbox('remember', '') }} Remember Me
                </label>
            </div>
        </div>

        <div class="form-group">
            {{ Form::submit('Login', ['class' => "btn btn-default submit"]) }}

            <a class="reset_pass" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
        </div>

        <div class="clearfix"></div>
        <div class="separator">
            <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Connfa!</h1>
                <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
            </div>
        </div>

    {!! Form::close() !!}

@endsection