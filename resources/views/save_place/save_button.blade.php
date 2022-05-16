@if(Auth::user()->is_saved($place->id)) 
    {{--保存削除ボタン--}}
    {{--{!! Form::open(['route' => ['save.destroy', $place->id], 'method' => 'post']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}--}}
    <form action="/places/{{ $place->id }}/deleteSave" method="post">
        @csrf
        <input type="submit" value="削除" class="btn btn-danger">
    </form>
@else 
    {{--保存ボタン--}}
    {{--{!! Form::open(['route' => ['save.store', $place->id]]) !!}
        {!! Form::submit('保存', ['class' => 'btn btn-warning']) !!}
    {!! Form::close() !!}--}}
    <form action="/places/{{ $place->id }}/save" method="post">
        @csrf
        <input type="submit" value="保存" class="btn btn-warning">
    </form>
@endif