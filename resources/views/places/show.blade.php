@extends('layouts.app')

@section('content')

    {{--観光地詳細--}}
    <section>
        
        <h3>{{ $place->name }}</h3>
        
        {{--保存ボタン--}}
        @include('save_place.save_button')
        <span class="badge badge-secondary">{{ $place->save_users_count }}人が保存しています</span>
        <br><br>
        
        <div class="row">
            <img class="col-sm-4" src="{{ asset(\Storage::url('place_image/' . $place->image1)) }}" width="200" height="350">
            <img class="col-sm-4" src="{{ asset(\Storage::url('place_image/' . $place->image2)) }}" width="200" height="350">
            <img class="col-sm-4" src="{{ asset(\Storage::url('place_image/' . $place->image3)) }}" width="200" height="350">
        </div>
        
        <div>
            <p></p>
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
                    <td><a href="{{ $place->homepage }}" target="_blank" rel="noopener noreferrer">{{ $place->homepage }}</a></td>
                </tr>
                <tr>
                    <th class="text-center col-sm-3">詳細情報</th>
                    <td>{{ $place->content }}</td>
                </tr>
            </tbody>
        </table>
        
        <div>
            <!--観光地一覧の1ページ目に戻る-->
            {{--{!! link_to_route('toppage', '一覧に戻る', [], ['class' => 'btn btn-primary']) !!}--}}
            <a href="{{ $previousUrl }}" class="btn btn-primary">一覧に戻る</a>
            
            <!--観光地の登録ページ-->
            <a href="/placeRegister" class="btn btn-warning">観光地の登録</a>
            <br><br>
        </div>
        
    </section>
    
    {{--レビューの表示--}}
    <section>
        <div>
            <h5>みんなのレビュー</h5>
            {{--レビュー一覧--}}
            @include('reviews.reviews')
        </div>
        <div class="col-sm-8">
            <h5>レビューを投稿する</h5>
            
            {{--レビュー投稿フォーム--}}
            <form action="/reviews" method="post">
                @csrf
                <div class="rate-form">
                    <input id="star5" type="radio" name="rate" value="5">
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rate" value="4">
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rate" value="3">
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rate" value="2">
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rate" value="1">
                    <label for="star1">★</label> 
                </div>
                
                <div class="form-group">
                    <label for="content">レビュー</label>
                    <textarea name="content" class="form-control" rows="2">{{ old('content') }}</textarea>
                    <input type="hidden" name="place_id" value="{{ $place->id }}">
                    <input type="submit" value="投稿" class="btn btn-success btn-block">
                </div>
            </form>
            {{--{!! Form::open(['route' => 'reviews.store']) !!}--}}
                <!--<div class="form-group">-->
                    {{--{!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}--}}
                    {{--{!! Form::submit('投稿', ['class' => 'btn btn-success btn-block']) !!}--}}
                <!--</div>-->
            {{--{!! Form::close() !!}--}}
        </div>
        
    </section>
    
    
    
@endsection