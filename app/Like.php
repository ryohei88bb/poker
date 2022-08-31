<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  // 配列内の要素を書き込み可能にする
  protected $fillable = ['comment_id','user_id'];

  public function comment()
  {
    return $this->belongsTo('App\Commennt');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
