@extends('layouts.default')

@section('content')
    <h1>Редактирование</h1>
    {{ Form::open(['url' => '/cabinet/update', 'method' => 'POST', 'class' => 'form-horizontal']) }}
        {{-- Название --}}
        <div class="form-group">
            <label for="name" class="control-label col-md-3">Название:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" id="name" placeholder="Название" value="{{ Input::old('name') }}">
            </div>
        </div>
    {{ Form::close() }}
@stop

@section('scripts')
    {{--<script src="/js/items.js"></script>--}}
@stop