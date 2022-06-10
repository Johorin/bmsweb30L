<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', '書籍登録画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="float-left" style="position: absolute; top: 83px; left: 20px;">
		<a href="/" style="margin: 0 20px 0 0;">[メニュー]</a>
		<a href="/list?transition=menu">[書籍一覧]</a>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', '書籍登録')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr style="border: 1px solid black;">
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	<center>
    <!-- 初期画面 -->
	@if(!isset($insertData))
		<form action="/insert" method="post">
		@csrf
			<br><br>
			<table>
				<tr>
					<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">ISBN</td>
					<td><input type="text" name="isbn"></td>
				</tr>
				<tr>
					<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">TITLE</td>
					<td><input type="text" name="title"></td>
				</tr>
				<tr>
					<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">価格</td>
					<td><input type="text" name="price"></td>
				</tr>
			</table>
			<br><br>
			<input type="submit" name="insertButton" value="登録">
		</form>
	<!-- 書籍登録ボタンからの遷移 -->
	@else
    	<table>
    		<tr>
    			<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">ISBN</td>
    			<td>{{$insertData['isbn']}}</td>
    		</tr>
    		<tr>
    			<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">TITLE</td>
    			<td>{{$insertData['title']}}</td>
    		</tr>
    		<tr>
    			<td style="padding: 2px 20px 2px 5px; background-color: lightblue;">価格</td>
    			<td>{{$insertData['price']}}</td>
    		</tr>
    	</table>
    	<br>
    	<p>上記データを登録しました。</p>
    	<br><br>
    	<a href="/list">書籍一覧へ戻る</a>
    	<a href="/insert">続けて登録する</a>
    @endif
	</center>
@endsection