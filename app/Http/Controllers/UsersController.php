<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($id){ //ユーザ詳細
        //ユーザが登録されているか検索、ユーザのデータを取得
        $user = User::findOrFail($id);
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
