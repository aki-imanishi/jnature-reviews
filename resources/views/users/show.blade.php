@extends('layouts.app')

@section('content')
    <h3>{{ $user->name }}さんのマイページ</h3>
    <div class="col-sm-10">
        <ul class="nav nav-tabs">
            {{--レビュー一覧タブ--}}
            <li class="nav-item"><a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">レビュー一覧</a></li>
            {{--行きたい観光地一覧タブ--}}
            <li class="nav-item"><a href="#" class="nav-link active">行きたい観光地一覧</a></li>
        </ul>
        
        {{--レビュー一覧--}}
        @include('reviews.reviews')
    </div>
    
@endsection    