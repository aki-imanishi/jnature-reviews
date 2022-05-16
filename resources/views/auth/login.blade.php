@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {{--{!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}--}}
            
            <form action="login" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <input type="submit" value="ログイン" class="btn btn-primary btn-block">
            </form>

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2">
                会員登録がまだの方は {{--{!! link_to_route('signup.get', 'こちら') !!}--}}
                <a href="signup">こちら</a>
            </p>
        </div>
    </div>
@endsection
