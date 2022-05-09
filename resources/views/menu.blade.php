<?php

?>
<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', 'メニュー画面')

<!-- ヘッダーとナビゲーションメニュー -->
@section('header')
	@parent
    <h3 align="center">MENU</h3>
@endsection

<!-- ページの見出し -->
@section('headline', 'MENU')

<!-- メイン -->
@section('main')
	@parent
	<br>
	<p align="center"><a href="/list?transition=menu">【書籍一覧】</a></p>
	<p align="center"><a href="/insert?transition=menu">【書籍登録】</a></p>
@endsection