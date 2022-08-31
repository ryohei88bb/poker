<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poker extends Model
{
    /*protected $table = 'create_pokers_table';*/
    protected $guarded = array('id');
    
    public static $rules = array(
        'myhand1' => 'required',
        'myhand2' => 'required',
        'board1' => 'required',
        'board2' => 'required',
        'board3' => 'required',
        'board4' => 'required',
        'board5' => 'required',
        'body' => 'required',
        );
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    
}
