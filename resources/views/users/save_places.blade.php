@extends('layouts.app')

@section('content')
    <h3>{{ $user->name }}さんのマイページ</h3>
    <div class="col-sm-10">
        @include('users.navtabs')
        
        {{--行きたい観光地一覧--}}
        @include('places.index')
        
    </div>
    
@endsection    