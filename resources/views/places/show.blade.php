@extends('layouts.app')

@section('content')

    <section>{{--観光地詳細--}}
        
        <h3>観光地名</h3>
        
        <a href="#" class="btn btn-primary">保存</a>
        
        <div class="row">
            <img class="col-sm-3" src="{{ asset($place->image1) }}">
            <img class="offset-sm-1 col-sm-3" src="{{ asset($place->image2) }}">
            <img class="offset-sm-1 col-sm-3" src="{{ asset($place->image3) }}">
        </div>
        
        <div>
            <p>概要</p>
            <p>{{ $place->information }}</p>
        </div>
        
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th class="text-center col-sm-3">観光地名</th>
                    <td>{{ $place->name }}</td>
                </tr>
                <tr>
                    <th class="text-center col-sm-3">住所</th>
                    <td>{{ $place->address }}</td>
                </tr>
                <tr>
                    <th class="text-center col-sm-3">アクセス</th>
                    <td>{{ $place->access }}</td>
                </tr>
                <tr>
                    <th class="text-center col-sm-3">ホームページ</th>
                    <td><a href="{{ $place->homepage }}">{{ $place->homepage }}</a></td>
                </tr>
                <tr>
                    <th class="text-center col-sm-3">詳細情報</th>
                    <td>{{ $place->content }}</td>
                </tr>
            </tbody>
        </table>
        
    </section>
    
    <section>{{--レビュー一覧--}}
        
    </section>
    
    
    
@endsection