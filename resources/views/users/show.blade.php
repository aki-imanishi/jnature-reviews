@extends('layouts.app')

@section('content')
    <h3>{{ Auth::user()->name }}さんのマイページ</h3>
    <div class="col-sm-10">
        <ul class="nav nav-tabs">
            {{--レビュー一覧タブ--}}
            <li class="nav-item"><a href="#" class="nav-link active">レビュー一覧</a></li>
            {{--行きたい観光地一覧タブ--}}
            <li class="nav-item"><a href="#" class="nav-link active">行きたい観光地一覧</a></li>
        </ul>
    </div>
@endsection    