<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- このページ専用のCSSを読み込む -->
@section('applyCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/insertIntoCart.css') }}">
@endsection

<!-- ページタイトル -->
@section('title', 'カート追加画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="navMenu">
    	<nav>
    		<ul>
    			<li><a href="/home">[メニュー]</a></li>
    			<li><a href="/list">[書籍一覧]</a></li>
    		</ul>
    	</nav>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', 'カート追加')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	<h4>下記の書籍をカートに追加しました。</h4>
	<br>
	<table>
		<tr>
			<th>ISBN</th>
			<td>{{ $addBookInfo['isbn'] }}</td>
		</tr>
		<tr>
			<th>TITLE</th>
			<td>{{ $addBookInfo['title'] }}</td>
		</tr>
		<tr>
			<th>価格</th>
			<td>{{ $addBookInfo['price'] }}円</td>
		</tr>
		<tr>
			<th>購入数</th>
			<td>{{ $addBookInfo['quantity'] }}冊</td>
		</tr>
	</table>
	<br>
	<form action="/showCart" method="get">
		<input type="submit" value="カート確認">
	</form>
@endsection