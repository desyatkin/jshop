@extends('layouts.default')

@section('content')

    <h1>Регистрация</h1>

    @include('layouts.partials.errors')

    <br><br>

    {{ Form::open(['url' => '/signup', 'method' => 'POST', 'class' => 'form-horizontal']) }}
    
        {{-- email --}}
        <div class="form-group">
            <label for="email" class="control-label col-md-3">Почта:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="email" id="email" placeholder="email@example.com" value="{{ Input::old('email') }}">
            </div>
        </div>
        
        {{-- password --}}
        <div class="form-group">
            <label for="password" class="control-label col-md-3">Пароль:</label>
            <div class="col-md-9">
                <input type="password" class="form-control" placeholder="Пароль" name="password" id="password" value="{{ Input::old('password') }}">
            </div>
        </div>

        {{-- submit --}}
        <div class="form-group">
            <label for="" class="control-label col-md-3"></label>
            <div class="col-md-9">
                <input type="submit" value="Зарегистрироваться" class="btn btn-primary">
            </div>
        </div>
    {{ Form::close() }}

@stop
