@extends('layouts.default')


@section('css')
    <link rel="stylesheet" href="/css/signin.css" />
@stop

@section('content')

    @include('layouts.partials.errors')
    @include('flash::message')

    <br><br>

    {{ Form::open(['url' => '/signup', 'method' => 'POST', 'class' => 'form-signin']) }}
    
         <h2 class="form-signin-heading">Регистрация</h2>

                <input name="email" type="email" class="form-control" placeholder="Email address" value="{{ Input::old('email') }}" required autofocus>
                <input name="password" type="password" class="form-control" placeholder="Password" value="{{ Input::old('password') }}" required>

                <input type="submit" value="Зарегистрироваться" class="btn btn-lg btn-success btn-block">
    {{ Form::close() }}

@stop
