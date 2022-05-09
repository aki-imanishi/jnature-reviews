<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //Userモデルを宣言する必要がある

class UsersController extends Controller
{
    public function show($id){ //ユーザ詳細
        //ユーザが登録されているか検索、ユーザのデータを取得
        $user = User::findOrFail($id); //Userモデルでidを検索する
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
