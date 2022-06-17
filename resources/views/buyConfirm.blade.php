<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- このページ専用のCSSを読み込む -->
@section('applyCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/buyConfirm.css') }}">
@endsection

<!-- ページタイトル -->
@section('title', '購入品確認画面')

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
@section('headline', '購入品確認')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
@section('main')
	@parent
	<h4>下記の商品を購入しました。</h4>
	<h4>ご利用ありがとうございました。</h4>
	<br>
	<table id="main">
		<tr>
			<th>ISBN</th>
			<th>TITLE</th>
			<th>価格</th>
			<th>購入数</th>
			<th>小計</th>
		</tr>
		@foreach($cartInfoAndTotal['cartInfo'] as $bookData)
    		<tr>
    			<td>{{ $bookData['isbn'] }}</td>
    			<td>{{ $bookData['title'] }}</td>
    			<td>{{ $bookData['price'] }}円</td>
    			<td>{{ $bookData['quantity'] }}冊</td>
    			<td>{{ $bookData['price'] * $bookData['quantity'] }}円</td>
    		</tr>
		@endforeach
	</table>
	<br><br>
	<hr>
	<br><br>
	<table id="total">
		<tr>
			<th>合計</th>
			<td>{{ $cartInfoAndTotal['total'] }}円</td>
		</tr>
	</table>
@endsection