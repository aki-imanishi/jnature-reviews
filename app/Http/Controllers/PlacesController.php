<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlacesController extends Controller
{
    // public function store(array $data) //フォームから受け取ったデータを保存する
    // {
            //バリデーション
            
            //画像をpassで保存する処理を書く
        
    //     // もしも画像アップロードに成功したら、Placeにその画像フォルダの場所を保存する
    //     return Place::create([ //create()で一気にデータ保存
    //         'name' => $data['name'],
    //         'address' => $data['address'],
    //         'access' => $data['access'],
    //         'homepage' => $data['homepage'],
    //         'content' => $data['content'],
    //         'image1' => $data['image1'], // /resources/images/places/image01.jpg
    //         'image2' => $data['image2'],
    //         'image3' => $data['image3'],
    //     ]);
    // }
    
    public function index(){ //観光地の一覧を表示
        // 観光地一覧をidの降順で取得
        $places = Place::orderBy('id', 'desc')->get();
        
        // 観光地一覧ビューでそれを表示
        return view('places.index', [
            'places' => $places,
        ]);
    }
    
    public function show($id){ //観光地の詳細ページ
        $place = Place::findOrFail($id);
        return view('places.show', [
            'place' => $place,
        ]);
    }
    
}

