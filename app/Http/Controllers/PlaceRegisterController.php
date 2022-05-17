<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Illuminate\Support\Str;

class PlaceRegisterController extends Controller
{
    public function show(){
        return view('places.register');
    }
    
    //ユーザが画像を登録する場合に必要
    public function store(Request $request) //フォームから受け取った観光地データを保存する
    {
        //バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'access' => 'required|max:255',
            'homepage' => 'required|max:255',
            'content' => 'required|max:255',
            'file_path1' => 'required',
            'file_path2' => 'required',
            'file_path3' => 'required',
            'information' => 'required|max:255',
        ], [
            'name.required' => '観光地名を入力してください',
            'address.required' => '住所を入力してください',
            'access.required' => 'アクセスを入力してください',
            'homepage.required' => 'ホームページを入力してください',
            'content.required' => '観光地詳細を入力してください',
            'information.required' => '概要を入力してください',
        ]);
        
        //画像をpassで保存する処理を書く
        //storage/public/place_imageに保存
        $placeImage1 = $request->file_path1->store('public/place_image'); //public/place_image/ファイル名
        $placeImage2 = $request->file_path2->store('public/place_image');
        $placeImage3 = $request->file_path3->store('public/place_image');
        
        //'/'のあとの画像ファイル名だけをとってくる
        $file_name1 = Str::afterLast($placeImage1, '/'); 
        $file_name2 = Str::afterLast($placeImage2, '/');
        $file_name3 = Str::afterLast($placeImage3, '/');
        
        // 画像アップロードに成功したら、Placeにその画像フォルダの場所を保存する
        Place::create([ 
            'name' => $request->name,
            'address' => $request->address,
            'access' => $request->access,
            'homepage' => $request->homepage,
            'content' => $request->content,
            'image1' => $file_name1, 
            'image2' => $file_name2,
            'image3' => $file_name3,
            'information' => $request->information,
        ]);
        
        // 観光地一覧ビューで表示
        return redirect('/');
    }
    
    
    // $placeImage1 = $request->file_path1->store('public/place_image1');
    
    // $fime_name = Str::afterLast($file_name, '/'); //'/'のあとのファイル名をとってくる
    
    // Place::create([
    //     'name' => ''
    //     'image1' => $fime_name,
    // ]);
    
    // return view('');
    
    
   
}

