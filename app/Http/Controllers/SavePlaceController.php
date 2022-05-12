<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavePlaceController extends Controller
{
    //観光地を保存する
    public function store($placeId){
        //ユーザが$placeIdの観光地を保存する
        \Auth::user()->savePlace($placeId);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    //観光地の保存を削除する
    public function destroy($placeId){
        //ユーザが$placeIdの観光地の保存を削除する
        \Auth::user()->deleteSavedPlace($placeId);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
}
