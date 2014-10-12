@extends('layouts.default')

@section('content')
    <h1>{{ $item->name }}</h1>

    <ol class="breadcrumb">
      <li><a href="/items/">Покупки</a></li>
      <li class="active">{{ $item->name }}</li>
    </ol>

    <br>

    <div class="row">
        <div class="col-md-3">
            <img src="/upload/img/@if(isset($item->pictures->first()->picture->path)){{ $item->pictures->first()->picture->path }}@endif">
        </div>
        <div class="col-md-9">
            <p>
                {{ $item->description }}
            </p>

            {{-- Количественная покупка --}}
            @if($item->type_id === 1)

                <div class="form-inline">
                        <input type="text" class="form-control" name="number" style="width: 40px;" value="1" onkeyup="changeCost(this.value, {{ $params['cost_unit'] }})">
                        {{ $item->unit }}
                        <a href="" class="btn btn-success" id="button_cost">
                            Купить за {{ $params['cost_unit'] }} руб.
                        </a>
                </div>

            {{-- Состовная покупка --}}
            @elseif($item->type_id === 2)
                <div class="form-horizontal">
                    @foreach($params as $param)
                        @if($param->param->id !== 1)
                            <div class="form-group">
                                <label for="{{ $param->param->index }}" class="control-label col-md-3">{{ $param->param->name }}:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="{{ $param->param->index }}" id="{{ $param->param->index }}" placeholder="{{ $param->param->name }}" value="">
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- cost --}}
                    <div class="form-group">
                        <label for="cost" class="control-label col-md-3">Стоиомость:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="cost" id="cost" placeholder="Стоимость" value="" onkeyup="changeCostButton(this.value)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="button_cost" class="control-label col-md-3"></label>
                        <div class="col-md-9">
                            <a href="" class="btn btn-success" id="button_cost_2" disabled="disabled">
                                Купить
                            </a>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
@stop

@section('scripts')
    <script src="/js/items.js"></script>
@stop