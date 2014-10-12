@foreach($item->requests as $request)
    <b>Участник:</b>  {{ $request->user->email }}<br/>
    <b>Комментарий:</b>  {{ $request->description }}<br/>

    @if($item->type_id == 1)
        <b>Кол-во:</b>  {{ $request->countParams()->value }}<br/>
        <b>Общая стоимость:</b>  {{ $request->money }}<br/>
    @elseif($item->type_id == 2)

    @endif
    <hr/>
@endforeach