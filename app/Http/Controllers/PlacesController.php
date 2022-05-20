<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Illuminate\Support\Str;

class PlacesController extends Controller
{
    public function index(){ //観光地の一覧を表示
        
        // 観光地一覧をidの降順で取得
        $places = Place::orderBy('id', 'desc')->paginate(7);
        
        //現在のURLをセッションに保存する
        session(['currentUrl' => request()->fullUrl()]);
        
        // 観光地一覧ビューでそれを表示
        return view('welcome', [
            'places' => $places,
        ]);
    }
    
    public function show($id){ //観光地の詳細ページ
        
        $place = Place::findOrFail($id);
        
        //関係するモデルの件数をロード
        $place->loadRelationshipCounts();
        
        //$idの観光地のレビュー一覧を表示
        $reviews = $place->reviews()->orderBy('created_at', 'desc')->paginate(5);
        
        //セッションに保存されたURLを取得
        $previousUrl = session('currentUrl');
        
        return view('places.show', [
            'place' => $place,
            'reviews' => $reviews,
            'previousUrl' => $previousUrl,
        ]);
    }
    
    
}

