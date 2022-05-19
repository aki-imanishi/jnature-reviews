@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <h5>会員登録内容の変更</h5>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="/usersInfoUpdate" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="mail" name="email" value="{{ $user->email }}" class="form-control">
                </div>
                <input type="hidden" name="userId" value="{{ $user->id }}">
                <input type="submit" value="変更" class="btn btn-success btn-block">
            </form>
            <a href="/usersEdit/{{ $user->id }}" class="btn btn-primary">戻る</a>
        </div>
    </div>
@endsection    