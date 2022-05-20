<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UpdateInfoController extends Controller
{
    //登録内容の変更選択画面を表示
    public function edit($id){
        $user = User::findOrFail($id);
        
        //本人のみ変更可能にする
        if(\Auth::id() === $user->id){
            return view('users.edit', [
                'user' => $user,
            ]);    
        } else {
            return redirect('/');
        }
    }
    
    //名前、メールアドレスの更新画面
    public function editInfo($id){
        $user = User::findOrFail($id);
        
        //本人のみ変更可能にする
        if(\Auth::id() === $user->id){
            return view('users.edit_info', [
                'user' => $user,
            ]);
        } else {
            return redirect('/');
        }
    }
    
    //パスワードの更新画面
    public function editPassword($id){
        $user = User::findOrFail($id);
        
        //本人のみ変更可能にする
        if(\Auth::id() === $user->id){
            return view('users.edit_password', [
                'user' => $user,
            ]);
        } else {
            return redirect('/');
        }
    }
    
    //名前、メールアドレスの更新
    public function updateInfo(Request $request){
        //バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required'
        ], [
            'name.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
        ]);
        
        //更新
        $user = User::findOrFail($request->userId);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        //更新画面に戻る
        return back()->with([
            'success' => '登録情報が更新されました',
            'user' => $user,
        ]);
    }
    
    //パスワードの更新
    public function updatePassword(Request $request){
        //バリデーション
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required|same:new_password',
        ], [
            'current_password.required' => '現在のパスワードを入力してください',
            'new_password.required' => '新しいパスワードを入力してください',
            'new_password_confirmation.required' => 'パスワード確認を入力してください',
            'new_password_confirmation.same' => '新しいパスワードとパスワード確認が一致しません'
        ]);
        
        // フラッシュメッセージ
        $msg = "ふらっしゅ";
        session()->flash("warningとかerrorとかのバリデーションが予約している以外の言葉", $msg);
        
        //更新
        $user = User::findOrFail($request->userId);
        
        if(!password_verify($request->current_password, $user->password)){
            return back()->with('warning', '現在のパスワードが間違っています');
        } else {
            $user->password = Hash::make($request->new_password);
            $user->save();
            
            //更新画面に戻る
            return back()->with('status', 'パスワードが更新されました');
        }
        
    }
    
}
