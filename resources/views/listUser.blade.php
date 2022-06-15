<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- このページ専用のCSSを読み込む -->
@section('applyCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/listUser.css') }}">
@endsection

<!-- ページタイトル -->
@section('title', 'ユーザー一覧画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="navMenu">
    	<nav>
    		<ul>
    			<li><a href="/home">[メニュー]</a></li>
    			<li><a href="/insertUser">[ユーザー登録]</a></li>
    		</ul>
    	</nav>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', 'ユーザー一覧')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br><br>
	<!-- フォーム部分 -->
	<div class="forms" style="display: inline-flex;">
    	<form action="/searchUser" method="post">
    		　ユーザー<input type="text" name="searchUserName">
    		　　　<input type="submit" name="searchUserButton" value="検索">
    	</form>
    	<form action="/listUser" method="post">
    		　<input type="submit" name="showAll" value="全件表示">
    	</form>
	</div>
	<br><br>
	<!-- テーブル部分 -->
	<table>
		<tr>
			<th>ユーザー</th>
			<th>Eメール</th>
			<th>権限</th>
			<th>　</th>
		</tr>
		@foreach($listUser as $record)
    		<tr>
    			<td><a href="/detailUser?detailUserName={{ $record['user'] }}">{{ $record['name'] }}</a></td>
    			<td>{{ $record['email'] }}</td>
    			<td>{{ ($record['authority'] === 1) ? '一般ユーザー' : '管理者' }}</td>
    			<td>
    				<a href="/updateUser?updateUserName={{ $record['user'] }}">変更</a>
    				<a href="/deleteUser?deleteUserName={{ $record['user'] }}">削除</a>
    			</td>
    		</tr>
    	@endforeach
	</table>
@endsection