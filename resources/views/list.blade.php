<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- このページ専用のCSSを読み込む -->
@section('applyCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/list.css') }}">
@endsection

<!-- ページタイトル -->
@section('title', '書籍一覧画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="navMenu">
    	<nav>
    		<ul>
    			<li><a href="/home">[メニュー]</a></li>
    			<li><a href="/insert">[書籍登録]</a></li>
    		</ul>
    	</nav>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', '書籍一覧')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
<!-- ログイン中の権限によって画面表示を変更 -->
<!-- 一般ユーザーの表示 -->
@if(Auth::user()->authority === 1)
    @section('main')
    	@parent
    	<br><br>
    	<!-- フォーム部分 -->
    	<div class="forms">
        	<form action="/search" method="post">
        		@csrf
        		　ISBN<input type="text" name="isbn">
        		　TITLE<input type="text" name="title">
        		　価格<input type="text" name="price">
        		　<input type="submit" value="検索">
        	</form>
        	<form action="/list" method="get">
        		@csrf
        		　<input type="submit" value="全件表示">
        	</form>
    	</div>
    	<br><br>
    	<!-- テーブル部分 -->
    	<table>
    		<tr>
    			<th>ISBN</th>
    			<th>TITLE</th>
    			<th>価格</th>
    			<th>購入数</th>
    			<th>　</th>
    		</tr>
    		@foreach($result as $val)
        		<tr>
        			<td><a href="/detail?isbn={{$val['isbn']}}">{{$val['isbn']}}</a></td>
        			<td>{{$val['title']}}</td>
        			<td>{{$val['price']}}円</td>
        			<form action="/insertIntoCart" method="post">
        				@csrf
            			<td><input type="number" name="quantity" value="{{ old('quantity') }}" required /></td>
            			<td>
            				<input type="hidden" name="insertIsbn" value="{{$val['isbn']}}">
            				<input type="submit" value="カートに入れる" />
            			</td>
        			</form>
        		</tr>
    		@endforeach
    	</table>
    @endsection
<!-- 管理者の表示 -->
@elseif(Auth::user()->authority === 2)
    @section('main')
    	@parent
    	<br><br>
    	<!-- フォーム部分 -->
    	<div class="forms">
        	<form action="/search" method="post">
        		@csrf
        		　ISBN<input type="text" name="isbn">
        		　TITLE<input type="text" name="title">
        		　価格<input type="text" name="price">
        		　<input type="submit" value="検索">
        	</form>
        	<form action="/list" method="get">
        		@csrf
        		　<input type="submit" value="全件表示">
        	</form>
    	</div>
    	<br><br>
    	<!-- テーブル部分 -->
    	<table>
    		<tr>
    			<th>ISBN</th>
    			<th>TITLE</th>
    			<th>価格</th>
    			<th>変更/削除</th>
    		</tr>
    		@foreach($result as $val)
        		<tr>
        			<td><a href="/detail?isbn={{$val['isbn']}}">{{$val['isbn']}}</a></td>
        			<td>{{$val['title']}}</td>
        			<td>{{$val['price']}}</td>
        			<td>
        				<a href="/update?isbn={{$val['isbn']}}">変更</a>　
        				<a href="/delete?isbn={{$val['isbn']}}">削除</a>
        			</td>
        		</tr>
    		@endforeach
    	</table>
    @endsection
@endif