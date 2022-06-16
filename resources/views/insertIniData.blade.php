<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- このページ専用のCSSを読み込む -->
@section('applyCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/insertIniData.css') }}">
@endsection

<!-- ページタイトル -->
@section('title', '初期データ登録画面')

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
@section('headline', '初期データ登録')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	<h3>初期データとして以下のデータを登録しました。</h3>
	<br>
	<table>
		<tr>
			<th>ISBN</th>
			<th>TITLE</th>
			<th>価格</th>
		</tr>
		@foreach($iniBookList as $record)
    		<tr>
    			<td>{{ $record['isbn'] }}</td>
    			<td>{{ $record['title'] }}</td>
    			<td>{{ $record['price'] }}円</td>
    		</tr>
		@endforeach
	</table>
@endsection