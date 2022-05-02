@extends('layouts.app')

@section('content')
    
        @if(Auth::check()) {{--ログイン中--}}
            {{ Auth::user()->name }}
        @else
            <div class="center jumbotron">    
                <div class="text-center">
                    <h1>J-Nature Reviewsへようこそ！</h1>
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                    {{--ログインページへのリンク--}}
                    {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
            </div>
        @endif
    
@endsection