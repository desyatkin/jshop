@extends('layouts.default')

@section('content')
<br>
    <h1><span class="glyphicon glyphicon-thumbs-up"></span> {{ $item->name }}</h1>

    <ol class="breadcrumb">
      <li><a href="/items/">Покупки</a></li>
      <li class="active">{{ $item->name }}</li>
    </ol>
    <br>
    @include('flash::message')
    <div class="row">
        <div class="col-md-3">
            @if(isset($item->pictures->first()->picture->path))<img  width=200 src="/upload/img/{{ $item->pictures->first()->picture->path }}">@endif
        </div>
        <div class="col-md-9">
            <p>
                {{ $item->description }}
            </p>
            {{ Form::open(['url' => '/item/request', 'method' => 'POST']) }}
                {{ Form::hidden('item_id', $item->id) }}
            {{-- Количественная покупка --}}
            @if($item->type_id == 1)
            <div class="well">
                <h3>Ограничения:</h3><br/>
                <b>Всего предметов:</b> {{ $item->countParam()->value }}<br/>
                <b>Предмет:</b> {{ $item->unit }}<br/>
                <b>Цена 1шт:</b> {{ $params['cost_unit'] }} р.<br/>
            </div>
                <hr/>
                 <h3>Ваш заказ</h3>
                @include('layouts.partials.errors')
                <div class="form-inline">
                    <textarea style="width: 100%; margin-bottom: 10px;" class="form-control" name="description" placeholder="Комментарий" id="description">{{ Input::old('description') }}</textarea>
                </div>
                <div class="form-group form-inline">
                    <input type="text" class="form-control" name="number" style="width: 100px;" value="1" onkeyup="changeCost(this.value, {{ $params['cost_unit'] }})">
                    {{ $item->unit }}
                    <button href="" class="btn btn-success" id="button_cost">
                        Купить за {{ $params['cost_unit'] }} руб.
                    </button>
                </div>
            {{-- Составная покупка --}}
            @elseif($item->type_id == 2)
            <hr/>
            <h3>Ваш заказ</h3>
            @include('layouts.partials.errors')
                <div class="form-horizontal">
                    @foreach($params as $param)
                        <div class="form-group">
                            <label for="id_{{ $param->param->index }}" class="control-label col-md-3">{{ $param->param->name }}:</label>
                            <div class="col-md-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="params[{{ $param->param->id }}]"
                                    id="id_{{ $param->param->index }}"
                                    placeholder="{{ $param->param->name }}"
                                    value="{{Input::old("params.{$param->param->id}")}}">
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label for="description" class="control-label col-md-3">Комментарий:</label>

                        <div class="col-md-9">
                            <textarea class="form-control" name="description" placeholder="Комментарий" id="description">{{ Input::old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="button_cost" class="control-label col-md-3"></label>
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </div>
                </div>
            @endif
            {{ Form::close() }}
            <hr/>
            @if(!$item->requests->isEmpty())
                @include('items.requests')
            @endif
        </div>
    </div>
@stop

@section('scripts')
    <script src="/js/items.js"></script>
@stop