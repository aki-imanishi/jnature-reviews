<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //Userモデルを宣言する必要がある

class UsersController extends Controller
{
    //ユーザ詳細(マイページの表示)
    public function show($id){ 
        //ユーザが登録されているか検索、ユーザのデータを取得
        $user = User::findOrFail($id); //Userモデルでidを検索する
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザのレビューの一覧を作成日時の降順で取得
        $reviews = $user->reviews()->orderBy('created_at', 'desc')->get();
    
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'reviews' => $reviews,
        ]);
    }
    
    
    //行きたい観光地の一覧
    public function savedPlaces($id){
        
        //$idでユーザを検索、情報を取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザが保存した観光地の一覧を取得
        $save_places = $user->save_places()->paginate(10);
        
        //行きたい観光地の一覧のviewで表示
        return view('users.save_places', [
            'user' => $user,
            'places' => $save_places,
        ]);
    }
}
