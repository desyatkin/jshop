@extends('layouts.default')

@section('content')

    <h1>Покупки</h1>

    <a href="/items/create" class="btn btn-primary">
        <span class="glyphicon glyphicon-plus"></span>
        Создать покупку
    </a>

    <br><br><br>

    <div class="row">
    @foreach($items as $item)
        <div class="col-md-4" >

                <div class="thumbnail" style="height: 400px;">
                    <div style="margin: 0 20px 40px 20px; height: 130px;">
                        <h3>
                            <a href="/items/{{ $item->id }}">{{ $item->name }}</a>
                            <a href="/items/{{ $item->id }}" class="btn btn-success pull-right" role="button">
                                <span class="glyphicon glyphicon-magnet"></span>
                                Присоединиться
                            </a>
                        </h3>
                        <br>
                        <p>{{ $item->description }}</p>
                    </div>
                    <a href="/items/{{ $item->id }}">
                        <img src="/upload/img/@if(isset($item->pictures->first()->picture->path)){{ $item->pictures->first()->picture->path }}@endif" alt="">
                    </a>

                </div>
        </div>
            @endforeach
    </div>

    <br><br>

    <center>
        {{ $items->links() }}
    </center>



@stop
