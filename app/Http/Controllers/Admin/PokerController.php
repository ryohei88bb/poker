<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Poker;

class PokerController extends Controller
{
    //
    public function add()
    {
        return view('admin.poker.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Poker::$rules);
        $poker = new Poker;
        $form = $request->all();
        
        unset($form['_token']);
        
        $poker->fill($form);
        $poker->save();
        
        return redirect('admin/poker/create');
    }
    
    
    public function index(Request $request)
  {
      /*
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Poker::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Poker::all();
      }
      */
      $posts = Poker::all();
      return view('admin.poker.index',['posts' => $posts]);
      
      /*
      , ['posts' => $posts, 'cond_title' => $cond_title]
      */
      
  }
  
   
  
   public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $poker = Poker::find($request->id);
      if (empty($poker)) {
        abort(404);    
      }
      return view('admin.poker.edit', ['poker_form' => $poker]);
  }


   public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Poker::$rules);
      // News Modelからデータを取得する
      $poker = Poker::find($request->id);
      // 送信されてきたフォームデータを格納する
      $poker_form = $request->all();
      unset($poker_form['_token']);

      // 該当するデータを上書きして保存する
      $poker->fill($poker_form)->save();

      return redirect('admin/poker/create');
  }
  
   public function detail(Request $request)
   {
    //   dd($request);
      $poker = Poker::find($request->id);
      if (empty($poker)) {
        abort(404);    
      }
      return view('admin.poker.detail', compact('poker'));
       
   }
}
