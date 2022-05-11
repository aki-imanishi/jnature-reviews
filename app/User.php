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
    
    //Placeモデルとの関係(多対多)
    public function review_places(){
        return $this->belongsToMany(Place::class, 'reviews', 'user_id', 'place_id')->withTimestamps(); //user_idのユーザがplace_idの観光地にレビューを投稿する
    }
    
    // //中間テーブルのレコード操作
    // //ユーザが$placeIdで指定したplaceにレビューを投稿するとき（中間テーブルにレコード保存）
    // public function postReview($placeId){
    //     $this->review_places()->attach($placeId);
    // }
    
    // //ユーザが$placeIdで指定したplaceに投稿したレビューを削除するとき（中間テーブルのレコード削除）
    // public function deleteReview($placeId){
    //     $this->review_places()->detach($placeId);
    // }
}
