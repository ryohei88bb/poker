<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'poker_id',
        'user_id',
    ];
    
    public function poker()
    {
        return $this->belongsTo('App\Poker');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function is_liked_by_auth_user()
  {
    $id = Auth::id();

    $likers = array();
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  }
  
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
}
