@extends('layouts.admin')
@section('title', '投稿の詳細')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Poker投稿詳細</h2>
                    <div class="row">
                        <label class="col-md-2">マイハンド</label>
                        <div class="col-md-10" name="myhand">
                            {{ $poker->myhand1 }}{{ $poker->myhand2 }}
                        </div>
                        <label class="col-md-2">ボード</label>
                        <div class="col-md-10" name="board">
                           {{ $poker->board1 }}{{ $poker->board2 }}{{ $poker->board3 }}{{ $poker->board4 }}{{ $poker->board5 }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            {{ $poker->body }}
                        </div>
                    </div>
                    @csrf
                    {{-- コメント機能　--}}
                    <div class="card-body line-height">
                        <div id="comment-poker-{{ $poker->id }}">
                           @include('layouts.comment_list')
                        </div>
                        <a class="light-color post-time no-text-decoration" href="/pokers/{{ $poker->id }}">{{ $poker->created_at }}</a>
                        <hr>
                        <div class="row actions" id="comment-form-article-{{ $poker->id }}">
                            <form class="w-100" id="new_comment" action="/poker/{{ $poker->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                            {{csrf_field()}}
                                <input value="{{ $poker->id }}" type="hidden" name="poker_id" />
                                <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                                <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
                            </form>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection