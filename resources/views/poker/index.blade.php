@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Poker投稿一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\PokerController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\PokerController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">検索キー</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">マイハンド</th>
                                <th width="20%">ボード</th>
                                <th width="40%">コメント</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $poker)
                                <tr>
                                    <th>{{ $poker->id }}</th>
                                    <td>{{ $poker->myhand1 }}{{ $poker->myhand2 }}</td>
                                    <td>{{ $poker->board1 }}{{ $poker->board2 }}{{ $poker->board3 }}{{ $poker->board4 }}{{ $poker->board5 }}</td>
                                    <td>{{ Str::limit($poker->body, 200) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\PokerController@edit',['id' => $poker->id]) }}">編集</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection