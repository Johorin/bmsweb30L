<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- このページ専用のCSSを読み込む -->
@section('applyCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/orderStatus.css') }}">
@endsection

<!-- ページタイトル -->
@section('title', '購入状況画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="navMenu">
    	<nav>
    		<ul>
    			<li><a href="/home">[メニュー]</a></li>
    		</ul>
    	</nav>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', '購入状況')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	<table>
		<tr>
			<th>ユーザー</th>
			<th>TITLE</th>
			<th>数量</th>
			<th>注文日</th>
		</tr>
		@foreach($boughtBooks as $record)
    		<tr>
    			<td>{{ $record['userName'] }}</td>
    			<td>{{ $record['title'] }}</td>
    			<td>{{ $record['quantity'] }}冊</td>
    			<td>{{ $record['date'] }}</td>
    		</tr>
		@endforeach
	</table>
@endsection