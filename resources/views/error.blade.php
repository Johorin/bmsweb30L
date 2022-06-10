<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', 'Error!')

@section('main')
	@parent
	<br><br>
	<h2>●●エラー●●</h2>
	@foreach($errors->all() as $error)
	<p>{{$error}}</p>
	@endforeach
	<br><br>
	<a href="/list?transition=menu">[一覧表示に戻る]</a>
@endsection