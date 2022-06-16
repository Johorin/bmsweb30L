<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- このページ専用のCSSを読み込む -->
@section('applyCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/showCart.css') }}">
@endsection

<!-- ページタイトル -->
@section('title', 'カート内容画面')

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
@section('headline', 'カート内容')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br><br>
	<!-- テーブル部分 -->
	<table>
		<tr>
			<th style="width: 20vw; background-color: grey;">ISBN</th>
			<th style="width: 20vw; background-color: grey;">TITLE</th>
			<th style="width: 20vw; background-color: grey;">価格</th>
			<th style="width: 20vw; background-color: grey;">購入数</th>
			<th style="width: 20vw; background-color: grey;">削除</th>
		</tr>
		@foreach($cartContentsAndTotal['cartContents'] as $cartRecord)
    		<tr>
    			<td><a href="/detail?isbn={{ $cartRecord['isbn'] }}">{{ $cartRecord['isbn'] }}</a></td>
    			<td>{{ $cartRecord['title'] }}</td>
    			<td>{{ $cartRecord['price'] }}円</td>
    			<td>{{ $cartRecord['quantity'] }}冊</td>
    			<td><a href="/deleteCartRecord?isbn={{ $cartRecord['isbn'] }}">削除</a></td>
    		</tr>
		@endforeach
	</table>
	<br><br>
	<hr style="border: 2px solid grey;">
	<table>
		<tr>
			<th style="width: 10vw; background-color: lightblue;">合計</th>
			<td>{{ $cartContentsAndTotal['total'] }}円</td>
		</tr>
	</table>
	<br><br><br>
	<form action="/buyConfirm" method="post">
		<input type="submit" name="buyButton" value="購入">
	</form>
@endsection