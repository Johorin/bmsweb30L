<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', '書籍検索画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="nav" style="position: absolute; top: 83px; left: 20px;">
		<a href="/" style="margin: 0 20px 0 0;">[メニュー]</a>
		<a href="/insert">[書籍登録]</a>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', '書籍検索')

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
    		　ISBN<input type="text" name="isbn" value="{{$oldSearch['isbn']}}">
    		　TITLE<input type="text" name="title" value="{{$oldSearch['title']}}">
    		　価格<input type="text" name="price" value="{{$oldSearch['price']}}">
    		　<input type="submit" name="searchButton" value="検索">
    	</form>
    	<form action="/list?transition=menu" method="get">
    		@csrf
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
		@if($searchBook[0]->isbn != '')
    		@foreach($searchBook as $key => $val)
    		<tr>
    			<td><a href="/detail?isbn={{$searchBook[0]->isbn}}">{{$searchBook[0]->isbn}}</a></td>
    			<td>{{$searchBook[0]->title}}</td>
    			<td>{{$searchBook[0]->price}}円</td>
    			<td>
    				<a href="/update?isbn={{$searchBook[0]->isbn}}" style="margin-right: 20px">変更</a>
    				<a href="/delete?isbn={{$searchBook[0]->isbn}}">削除</a>
    			</td>
    		</tr>
    		@endforeach
	</table>
	@else
	<p>検索に一致する書籍はありませんでした。</p>
	@endif
@endsection