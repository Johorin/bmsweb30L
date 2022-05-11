<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', '書籍一覧画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="float-left" style="position: absolute; top: 83px; left: 20px;">
		<a href="/" style="margin: 0 20px 0 0;">[メニュー]</a>
		<a href="/insert">[書籍登録]</a>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', '書籍一覧')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr style="border: 1px solid black;">
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	<!-- フォーム部分 -->
	<div class="forms" style="display: inline-flex;">
    	<form action="/search" method="post">
    		@csrf
    		　ISBN<input type="text" name="isbn">
    		　TITLE<input type="text" name="title">
    		　価格<input type="text" name="price">
    		　<input type="submit" name="listButton" value="検索">
    	</form>
    	<form action="/list" method="get">
    		@csrf
    		<!-- hiddenで遷移情報transitionも送る -->
    		<input type="hidden" name="transition" value="searchAll">
    		　<input type="submit" value="全件表示">
    	</form>
	</div>
	<br><br>
	<!-- テーブル部分 -->
	<table>
		<tr>
			<th style="width: 25vw; background-color: lightblue;">ISBN</th>
			<th style="width: 25vw; background-color: lightblue;">TITLE</th>
			<th style="width: 25vw; background-color: lightblue;">価格</th>
			<th style="width: 25vw; background-color: lightblue;">変更/削除</th>
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