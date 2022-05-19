@extends('layouts.app')

@section('content')
    
    <h5>観光地の登録</h5>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="placeRegister" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">観光地名</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">住所</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="access">アクセス</label>
                    <input type="text" name="access" value="{{ old('access') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="homepage">ホームページ</label>
                    <input type="text" name="homepage" value="{{ old('homepage') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">詳細情報</label>
                    <input type="text" name="content" value="{{ old('content') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_path1">画像１枚目</label>
                    <input type="file" name="file_path1">
                </div>
                <div class="form-group">
                     <label for="file_path2">画像２枚目</label>
                    <input type="file" name="file_path2">
                </div>
                <div class="form-group">
                    <label for="file_path3">画像３枚目</label>
                    <input type="file" name="file_path3">
                </div>
                <div class="form-group">
                    <label for="information">概要</label>
                    <textarea name="information" class="form-control" rows="3">{{ old('information') }}</textarea>
                </div>
                
               <input type="submit" value="登録" class="btn btn-primary btn-block">
            </form>
            
        </div>
    </div>
    
@endsection