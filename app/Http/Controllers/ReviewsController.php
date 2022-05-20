<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    //レビューの保存
    public function store(Request $request){
        // バリデーション
        $request->validate([
            'rate' => 'required',
            'content' => 'required|max:255',
        ], [
            'rate.required' => '星5段階評価を入力してください',
            'content.required' => 'レビューを入力してください',
        ]);
        
        //投稿したユーザのレビューとしてcreate()で作成、保存
        $request->user()->reviews()->create([
            'rate' => intval($request->rate),
            'content' => $request->content,
            'place_id' => $request->place_id, //place_idの保存（中間テーブルのattachの役割）
        ]);
        
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    //レビューの削除（マイページ、観光地の詳細ページ）
    public function destroy($reviewId){
        
        //idを使ってreviewsテーブル内で該当するレビューを検索、データを取得
        $review = \App\Review::findOrFail($reviewId);
        
        //レビューを投稿したユーザのみ削除可能
        if(\Auth::id() === $review->user_id){
            $review->delete();
           
        }
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    
}
