<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', '書籍削除画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="nav" style="position: absolute; top: 83px; left: 20px;">
		<a href="/" style="margin: 0 20px 0 0;">[メニュー]</a>
		<a href="/insert" style="margin: 0 20px 0 0;">[書籍登録]</a>
		<a href="/list?transition=menu">[書籍一覧]</a>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', '書籍削除')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr style="border: 1px solid black;">
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	<table>
		<tr>
			<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">ISBN</td>
			<td>{{$deleteBook[0]['isbn']}}</td>
		</tr>
		<tr>
			<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">TITLE</td>
			<td>{{$deleteBook[0]['title']}}</td>
		</tr>
		<tr>
			<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">価格</td>
			<td>{{$deleteBook[0]['price']}}円</td>
			</tr>
		</table>
    	<br><br>
    	<p>上記データを削除しました。</p>
    	<br><br>
    	<a href="/list?transition=menu">書籍一覧へ戻る</a>
@endsection