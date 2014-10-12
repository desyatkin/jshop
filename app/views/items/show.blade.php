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
            <img src="/upload/img/{{ $item->pictures->first()->picture->path }}">
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

            @endif
        </div>
    </div>
@stop

@section('scripts')
    <script src="/js/items.js"></script>
@stop