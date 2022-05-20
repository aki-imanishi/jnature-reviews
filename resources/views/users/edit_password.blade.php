@extends('layouts.app')

@section('content')

    @if(session('warning'))
        <div class="alert alert-danger">
            {{ session('warning') }}
        </div>
    @elseif(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    <h5>パスワードの変更</h5>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="/usersPassUpdate" method="post">
                @csrf
                <div class="form-group">
                    <label for="current_password">現在のパスワード</label>
                    <input type="password" name="current_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password">新しいパスワード</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">パスワード確認</label>
                    <input type="password" name="new_password_confirmation" class="form-control">
                </div>
                <input type="hidden" name="userId" value="{{ $user->id }}">
                <input type="submit" value="変更" class="btn btn-success">
            </form>
            
            <a href="/usersEdit/{{ $user->id }}" class="btn btn-primary">戻る</a>
        </div>
    </div>
@endsection    