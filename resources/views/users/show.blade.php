@extends('layouts.app')

@section('content')
    <div>
        <h3>{{ $user->name }}さんのマイページ</h3>
        <a href="/usersEdit/{{ $user->id }}" class="btn btn-info">会員登録内容の変更</a>
        <br><br>
    </div>
    
    <div class="col-sm-10">
        @include('users.navtabs')
        
        {{--レビュー一覧--}}
        @include('reviews.reviews')
        
    </div>
    
@endsection    