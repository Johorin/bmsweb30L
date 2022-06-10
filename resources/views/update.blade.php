<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', '書籍更新画面')

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
@section('headline', '書籍変更')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr style="border: 1px solid black;">
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	@if(!isset($_POST['updateButton']))
	<form action="/update" method="post">
		@csrf
    	<table>
    		<tr>
    			<th style="background-color: lightblue;"></th>
    			<th style="background-color: lightblue;">&lt;&lt;変更前情報&gt;&gt;</th>
    			<th style="background-color: lightblue;">&lt;&lt;変更後情報&gt;&gt;</th>
    		</tr>
    		<tr>
    			<th style="background-color: lightblue;">ISBN</th>
    			<td style="background-color: aqua;">{{$updateBook[0]['isbn']}}</td>
    			<td>{{$updateBook[0]['isbn']}}</td>
    		</tr>
    		<tr>
    			<th style="background-color: lightblue;">TITLE</th>
    			<td style="background-color: aqua;">{{$updateBook[0]['title']}}</td>
    			<td><input type="text" name="newTitle"></td>
    		</tr>
    		<tr>
    			<th style="background-color: lightblue;">価格</th>
    			<td style="background-color: aqua;">{{$updateBook[0]['price']}}円</td>
    			<td><input type="text" name="newPrice">円</td>
    		</tr>
    	</table>
    	<br><br><br><br>
    	<input type="hidden" name="isbn" value="{{$updateBook[0]['isbn']}}">
            	<input type="hidden" name="oldTitle" value="{{$updateBook[0]['title']}}">
            	<input type="hidden" name="oldPrice" value="{{$updateBook[0]['price']}}">
    	<input type="submit" name="updateButton" value="変更完了">
	</form>
	@else
	<table>
		<tr>
			<th style="background-color: lightblue;"></th>
			<th style="background-color: lightblue;">&lt;&lt;変更前情報&gt;&gt;</th>
			<th style="background-color: lightblue;">&lt;&lt;変更後情報&gt;&gt;</th>
		</tr>
		<tr>
			<th style="background-color: lightblue;">ISBN</th>
			<td style="background-color: aqua;">{{$oldBook['isbn']}}</td>
			<td>{{$newBook['isbn']}}</td>
		</tr>
		<tr>
			<th style="background-color: lightblue;">TITLE</th>
			<td style="background-color: aqua;">{{$oldBook['title']}}</td>
			<td>{{$newBook['title']}}</td>
		</tr>
		<tr>
			<th style="background-color: lightblue;">価格</th>
			<td style="background-color: aqua;">{{$oldBook['price']}}円</td>
			<td>{{$newBook['price']}}円</td>
		</tr>
	</table>
	<br><br>
	<p>上記内容でデータを更新しました。</p>
	<br><br>
	<a href="/list?transition=updated">書籍一覧へ戻る</a>
	@endif
@endsection