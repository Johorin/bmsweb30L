<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', '書籍更新画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="float-left" style="position: absolute; top: 83px; left: 20px;">
		<a href="/" style="margin: 0 20px 0 0;">[メニュー]</a>
		<a href="/insert">[書籍登録]</a>
		<a href="/list">[書籍一覧]</a>
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
	@if(!isset($updateData))
	<form action="/update" method="post">
    	<table>
    		<tr>
    			<th style="background-color: lightblue;"></th>
    			<th style="background-color: lightblue;">&lt;&lt;変更前情報&gt;&gt;</th>
    			<th style="background-color: lightblue;">&lt;&lt;変更後情報&gt;&gt;</th>
    		</tr>
    		<tr>
    			<th style="background-color: lightblue;">ISBN</th>
    			<td style="background-color: aqua;"><?=$record['isbn']?></td>
    			<td><?=$record['isbn']?></td>
    		</tr>
    		<tr>
    			<th style="background-color: lightblue;">TITLE</th>
    			<td style="background-color: aqua;"><?=$record['title']?></td>
    			<td><input type="text" name="updatedTitle"></td>
    		</tr>
    		<tr>
    			<th style="background-color: lightblue;">価格</th>
    			<td style="background-color: aqua;"><?=$record['price']?>円</td>
    			<td><input type="text" name="updatedPrice">円</td>
    		</tr>
    	</table>
    	<br><br><br><br>
    	<input type="hidden" name="isbn" value="<?=$record['isbn']?>">
    	<input type="submit" name="updateButton" value="変更完了">
	</form>
	@endif
@endsection