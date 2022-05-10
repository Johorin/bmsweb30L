<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', '書籍詳細画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="float-left" style="position: absolute; top: 83px; left: 20px;">
		<a href="/" style="margin: 0 20px 0 0;">[メニュー]</a>
		<a href="/list?transition=menu" style="margin: 0 20px 0 0;">[書籍一覧]</a>
		<a href="/insert">[書籍登録]</a>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', '書籍詳細')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr style="border: 1px solid black;">
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	<div class="forms" style="display: inline-flex;">
		<form action="/update" method="get">
			<input type="hidden" name="isbn" value="{{$detailBook[0]['isbn']}}">
			<input type="submit" value="変更" style="margin-right: 60px">
		</form>
		<form action="/delete" method="post">
			<input type="hidden" name="isbn" value="{{$detailBook[0]['isbn']}}">
			<input type="submit" name="detailButton" value="削除">
		</form>
	</div>
	<br><br>
	<table>
		<tr>
			<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">ISBN</td>
			<td>{{$detailBook[0]['isbn']}}</td>
		</tr>
		<tr>
			<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">TITLE</td>
			<td>{{$detailBook[0]['title']}}</td>
		</tr>
		<tr>
			<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">価格</td>
			<td>{{$detailBook[0]['price']}}円</td>
		</tr>
	</table>
@endsection