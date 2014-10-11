@extends('layouts.default')

@section('content')
    <h1>Создать покупку</h1>

    {{ Form::open(['url' => '/items', 'method' => 'POST', 'class' => 'form-horizontal']) }}
    
        {{-- name --}}
        <div class="form-group">
            <label for="name" class="control-label col-md-3">name:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="">
            </div>
        </div>

        {{-- tracker --}}
        <div class="form-group">
            <label for="tracker" class="control-label col-md-3">tracker:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="tracker" id="tracker" placeholder="tracker" value="">
            </div>
        </div>



    {{ Form::close() }}
@stop