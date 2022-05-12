@extends('layouts.app')

@section('content')
    <h3>{{ $user->name }}さんのマイページ</h3>
    <div class="col-sm-10">
        @include('users.navtabs')
        
        {{--レビュー一覧--}}
        @include('reviews.reviews')
        
    </div>
    
@endsection    