<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', 'Error!')

@section('main')
	@parent
	<br><br>
	<h2>●●エラー●●</h2>
	<!-- コントローラーで記述したバリデータによるバリデーションエラーメッセージを表示 -->
	@foreach($errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach
	<!-- AccessBlockミドルウェアで発行されたエラーメッセージの表示 -->
	@if(isset($errMsg))
		<p>{{$errMsg}}</p>
	@endif
	<br><br>
	<a href="/list?transition=menu">[一覧表示に戻る]</a>
@endsection