{!! Form::open(['route' => 'reviews.store']) !!}
    <div class="form-group">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}
        <input type="hidden" name="place_id" value="{{ $place->id }}">
        {!! Form::submit('投稿', ['class' => 'btn btn-success btn-block']) !!}
    </div>
{!! Form::close() !!}