<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['content', 'place_id'];
    
    //レビューを投稿するユーザ(Userモデルとの関係、一対多)
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    //レビューを投稿される観光地(Placeモデルとの関係、一対多)
    public function place(){
        return $this->belongsTo(Place::class);
    }
}
