@if(Auth::user()->is_saved($place->id)) 
    {{--保存削除ボタン--}}
    {!! Form::open(['route' => ['save.destroy', $place->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@else 
    {{--保存ボタン--}}
    {!! Form::open(['route' => ['save.store', $place->id]]) !!}
        {!! Form::submit('保存', ['class' => 'btn btn-warning']) !!}
    {!! Form::close() !!}
@endif