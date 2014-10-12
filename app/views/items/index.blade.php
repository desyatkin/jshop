@extends('layouts.default')

@section('content')
<br>

    <div class="row">
    @foreach($items as $item)
        <div class="col-md-4" >

                <div class="thumbnail" style="height: 400px;">
                    <div style="margin: 0 20px 40px 20px; height: 130px;">
                        <h3>
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                            <a href="/items/{{ $item->id }}">{{ $item->name }}</a>
                        </h3>
                        <br>
                        <p>{{ $item->description }}</p>
                    </div>
                    <a href="/items/{{ $item->id }}">
                        <img style="max-height: 200px; max-width: 200px;" src="/upload/img/@if(isset($item->pictures->first()->picture->path)){{ $item->pictures->first()->picture->path }}@endif" alt="">
                    </a>
                    {{--<center>--}}
                    {{--<a href="/items/{{ $item->id }}" class="btn btn-lg btn-success btn-block" role="button">--}}
                        {{--<span class="glyphicon glyphicon-magnet"></span>--}}
                        {{--Присоединиться--}}
                    {{--</a>--}}
                    {{--</center>--}}
                </div>
        </div>
            @endforeach
    </div>

    <br><br>

    <center>
        {{ $items->links() }}
    </center>



@stop
