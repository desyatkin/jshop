@extends('layouts.default')

@section('content')

    <h1>Личный кабинет  / Пополнение счёта - {{$user->id}}</h1>

    <div class="well">
        <b>Ваш счёт:</b> {{ number_format($user->money, 2, ',', ' ') }} р.s
    </div>

    @include('cabinet.partials.form')
@stop
