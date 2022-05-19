@extends('layouts.app')

@section('content')
    <h5>会員登録内容の変更</h5>
    
    <div>
        <a href="/usersInfoEdit/{{ $user->id }}">名前、メールアドレス変更</a>
    </div>
    <div>
        <a href="/usersPassEdit/{{ $user->id }}">パスワード変更</a>
    </div>
    <div>
        <a href="/users/{{ $user->id }}" class="btn btn-primary">戻る</a>
    </div>
   
@endsection    