@extends('layouts.default')

@section('content')
    <h1>Создать покупку</h1>

    {{ Form::open(['url' => '/items', 'method' => 'POST', 'class' => 'form-horizontal']) }}

        {{-- Название --}}
        <div class="form-group">
            <label for="name" class="control-label col-md-3">Название:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" id="name" placeholder="Название" value="{{ Input::old('name') }}">
            </div>
        </div>

        {{-- Тип покупки --}}
        <div class="form-group">
            <label for="item_type" class="control-label col-md-3">Тип покупки:</label>

            <div class="col-md-9">
                <select name="item_type" id="item_type" class="form-control" onchange="changeItemType(this.value);">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Все что относится к количественному типу --}}
        <span id="item_type_id_1">
            {{-- Единица измерения --}}
            <div class="form-group">
                <label for="unit" class="control-label col-md-3">Единица измерения:</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="unit" id="unit" placeholder="Единица измерения" value="{{ Input::old('unit') }}">
                </div>
            </div>

            {{-- Максимальное количество --}}
            <div class="form-group">
                <label for="max_unit" class="control-label col-md-3">Максимальное количество:</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="max_unit" id="max_unit" placeholder="Максимальное количество" value="{{ Input::old('max_unit') }}">
                </div>
            </div>

            {{-- Стоимость --}}
            <div class="form-group">
                <label for="cost_unit" class="control-label col-md-3">Стоимость:</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="cost_unit" id="cost_unit" placeholder="Стоимость" value="{{ Input::old('cost_unit') }}">
                </div>
            </div>
        </span>


        {{-- Все что относится к составному типу --}}
        <span id="item_type_id_2" {{-- style="display: none;" --}}>
            {{-- params --}}
            <div class="form-group" id="params">
                <label for="params" class="control-label col-md-3">
                    <a href="#" class="btn btn-info" onclick="addParamRow(); return false;">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                    Параметры:
                </label>
            
                <div class="col-md-9 param_row">
                    <div class="form-inline">
                        <select name="param_name[]" id="params" class="form-control">
                            @foreach($params as $param)
                                <option value="{{ $param->id }}">{{ $param->name }}</option>
                            @endforeach
                        </select>
                        <select name="compare[]" id="params" class="form-control">
                            @foreach($compares as $compare)
                                <option value="{{ $compare->id }}">{{ $compare->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="value[]" class="form-control">
                    </div>
                </div>
            </div>
        </span>

        {{-- Описание --}}
        <div class="form-group">
            <label for="description" class="control-label col-md-3">Описание:</label>

            <div class="col-md-9">
                <textarea class="form-control" name="description" placeholder="Описание" id="description">{{ Input::old('description') }}</textarea>
            </div>
        </div>


    {{ Form::close() }}
@stop

@section('scripts')
    <script src="/js/items.js"></script>
@stop