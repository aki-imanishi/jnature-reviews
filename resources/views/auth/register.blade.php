@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>会員登録</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {{--{!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('会員登録', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}--}}
            
            <form action="signup" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">パスワード確認</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                
                <input type="submit" value="会員登録" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
@endsection
