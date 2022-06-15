<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- このページ専用のCSSを読み込む -->
@section('applyCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/detail.css') }}">
@endsection

<!-- ページタイトル -->
@section('title', '書籍詳細画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="navMenu">
    	<nav>
    		<ul>
    			<li><a href="/home">[メニュー]</a></li>
    			<li><a href="/list">[書籍一覧]</a></li>
    			<li><a href="/insert">[書籍登録]</a></li>
    		</ul>
    	</nav>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', '書籍詳細情報')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	<div class="forms">
		<form action="/update" method="get">
			<input type="hidden" name="isbn" value="{{$detailBook[0]['isbn']}}">
			<input type="submit" value="変更" id="updateButton">
		</form>
		<form action="/delete" method="post">
			<input type="hidden" name="isbn" value="{{$detailBook[0]['isbn']}}">
			<input type="submit" name="detailButton" value="削除">
		</form>
	</div>
	<br><br><br>
	<table>
		<tr>
			<th>ISBN</th>
			<td>{{$detailBook[0]['isbn']}}</td>
		</tr>
		<tr>
			<th>TITLE</th>
			<td>{{$detailBook[0]['title']}}</td>
		</tr>
		<tr>
			<th>価格</th>
			<td>{{$detailBook[0]['price']}}円</td>
		</tr>
	</table>
@endsection