@extends('layouts.default')

@section('content')
    <br>
    <h1>Пополнение счёта</h1>

    <div class="well">
        <b>Ваш счёт:</b> {{ number_format($user->money, 2, ',', ' ') }} руб.
    </div>

    @include('cabinet.partials.form')
@stop
