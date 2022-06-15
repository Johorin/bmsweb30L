<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- このページ専用のCSSを読み込む -->
@section('applyCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/deleteUser.css') }}">
@endsection

<!-- ページタイトル -->
@section('title', 'ユーザー削除画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
	<div class="navMenu">
    	<nav>
    		<ul>
    			<li><a href="/home">[メニュー]</a></li>
    			<li><a href="/listUser">[ユーザー一覧]</a></li>
    		</ul>
    	</nav>
	</div>
@endsection

<!-- ページの見出し -->
@section('headline', 'ユーザー削除')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
@section('main')
	@parent
		<br><br>
		<table>
			<tr>
    			<th>ユーザー</th>
    			<td>{{ $deletedUserInfo['name'] }}</td>
			</tr>
			<tr>
    			<th>パスワード</th>
    			<td>{{ $deletedUserInfo['password'] }}</td>
			</tr>
			<tr>
    			<th>Eメール</th>
    			<td>{{ $deletedUserInfo['email'] }}</td>
			</tr>
			<tr>
    			<th>権限</th>
    			<td>{{ ($deletedUserInfo['authority'] === 1) ? '一般ユーザー' : '管理者' }}</td>
			</tr>
		</table>
		<br>
		<p>上記データを削除しました。</p>
		<br>
		<a href="/listUser">ユーザー一覧へ戻る</a>
@endsection