<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //ユーザが画像を登録する場合に必要
    protected $fillable = [
        'name', 'address', 'access', 'homepage', 'content', 'image1', 'image2', 'image3', 'information'
    ];
    
    //Reviewモデルとの関係(一対多)
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    
    //Userモデルとの関係(1対多)
    // public function user(){
    // いつか実装    
    // }
    
    //レビュー投稿におけるUserモデルとの関係（多対多）
    public function review_users() {
        return $this->belongsToMany(User::class, 'reviews', 'place_id', 'user_id')->withTimestamps();
        //place_idの観光地がuser_idのユーザにレビューを投稿される
    }
    
    //保存機能におけるUserモデルとの関係（多対多）
    public function save_users(){
        return $this->belongsToMany(User::class, 'place_save', 'place_id', 'user_id')->withTimestamps();
        //place_idの観光地がuser_idのユーザに保存される
    }
    
    //モデルのカウント
    public function loadRelationshipCounts()
    {
        $this->loadCount('save_users');
    }

}
