<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', 'メニュー画面')

<!-- ページの見出し -->
@section('headline', 'MENU')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr style="border: 1px solid black;">
@endsection

<!-- メイン -->
@section('main')
	@parent
	<br>
	<p align="center"><a href="/list?transition=menu">【書籍一覧】</a></p>
	<p align="center"><a href="/insert?transition=menu">【書籍登録】</a></p>
@endsection