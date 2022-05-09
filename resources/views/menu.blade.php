<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', 'メニュー画面')

<!-- ページの見出し -->
@section('headline', 'MENU')

<!-- メイン -->
@section('main')
	@parent
	<br>
	<p align="center"><a href="/list?transition=menu">【書籍一覧】</a></p>
	<p align="center"><a href="/insert?transition=menu">【書籍登録】</a></p>
@endsection