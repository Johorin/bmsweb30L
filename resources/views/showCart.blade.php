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
	@if(isset($cartContentsAndTotal['cartContents']))
    	<!-- テーブル部分 -->
    	<table id="main">
    		<tr>
    			<th>ISBN</th>
    			<th>TITLE</th>
    			<th>価格</th>
    			<th>購入数</th>
    			<th>削除</th>
    		</tr>
    		@foreach($cartContentsAndTotal['cartContents'] as $cartRecord)
        		<tr>c
        			<td><a href="/detail?isbn={{ $cartRecord['isbn'] }}">{{ $cartRecord['isbn'] }}</a></td>
        			<td>{{ $cartRecord['title'] }}</td>
        			<td>{{ $cartRecord['price'] }}円</td>
        			<td>{{ $cartRecord['quantity'] }}冊</td>
        			<td><a href="/deleteCartRecord?isbn={{ $cartRecord['isbn'] }}">削除</a></td>
        		</tr>
    		@endforeach
    	</table>
	<br><br>
	<hr>
	<br><br>
	<table id="total">
		<tr>
			<th>合計</th>
			<td>{{ $cartContentsAndTotal['total'] }}円</td>
		</tr>
	</table>
    @else
    	<p>カートは空です。購入する書籍を追加してください。</p>
    @endif
	<br><br><br>
	<form action="/buyConfirm" method="post">
		<input type="submit" name="buyButton" value="購入">
	</form>
@endsection