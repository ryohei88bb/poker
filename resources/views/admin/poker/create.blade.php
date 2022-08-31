@extends('layouts.admin')
@section('title', '投稿の新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Poker投稿</h2>
                <form action="{{ action('Admin\PokerController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">マイハンド</label>
                        <div class="col-md-10" name="myhand">
                            @include('layouts.select', ["name" => "myhand1"])
                            @include('layouts.select', ["name" => "myhand2"])
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ボード</label>
                        <div class="col-md-10" name="board">
                            @include('layouts.select', ["name" => "board1"])
                            @include('layouts.select', ["name" => "board2"])
                            @include('layouts.select', ["name" => "board3"])
                            @include('layouts.select', ["name" => "board4"])
                            @include('layouts.select', ["name" => "board5"])
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection