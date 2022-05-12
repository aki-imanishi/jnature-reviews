<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //Reviewモデルとの関係(一対多)
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    
    //レビュー投稿におけるPlaceモデルとの関係(多対多)
    public function review_places(){
        return $this->belongsToMany(Place::class, 'reviews', 'user_id', 'place_id')->withTimestamps();
        //user_idのユーザがplace_idの観光地にレビューを投稿する
    }
    
    //保存機能におけるPlaceモデルとの関係(多対多)
    public function save_places(){
        return $this->belongsToMany(Place::class, 'place_save', 'user_id', 'place_id')->withTimestamps();
        //user_idのユーザがplace_idの観光地を保存する
    }
    
    //place_saveテーブルのモデルは作らないので、ここに中間テーブルの操作を記述
    //ユーザが$placeIdの観光地を保存する(place_saveテーブルにレコード保存)
    public function savePlace($placeId){
        
        //$thisのユーザが$placeIdの観光地を保存しているか
        $exist = $this->is_saved($placeId);
        
        if($exist == true){ 
            //保存している場合は何もしない
            return false;
        } else { 
            //保存していない場合は保存する
            $this->save_places()->attach($placeId);
            return true;
        }
    }
    
    //ユーザが$placeIdの観光地の保存を削除する(place_saveテーブルのレコード削除)
    public function deleteSavedPlace($placeId){
        //$thisのユーザが$placeIdの観光地を保存しているか
        $exist = $this->is_saved($placeId);
        
        if($exist == true){ 
            //保存している場合は保存を削除
            $this->save_places()->detach($placeId);
            return true;
        } else { 
            //保存していない場合は何もしない
            return false;
        }
    }
    
    //$placeIdの観光地を既に保存しているかどうか調べる
    public function is_saved($placeId){
        return $this->save_places()->where('place_id', $placeId)->exists();
        //中間テーブルのplace_idカラムに$placeIdが存在するのか判定
    }
    
    //レビュー、保存した観光地のモデルのカウント
    public function loadRelationshipCounts()
    {
        $this->loadCount('reviews', 'save_places');
    }


    // //中間テーブルのレコード操作
    // //ユーザが$placeIdで指定したplaceにレビューを投稿するとき（中間テーブルにレコード保存）
    // public function postReview($placeId, $content){
    //     $this->review_places()->attach($placeId, ['content' => $content]);
    // }
    
    // //ユーザが$placeIdで指定したplaceに投稿したレビューを削除するとき（中間テーブルのレコード削除）
    // public function deleteReview($placeId){
    //     $this->review_places()->detach($placeId);
    // }
}
