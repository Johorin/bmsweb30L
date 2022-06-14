<!-- レイアウトの継承 -->
@extends('layouts.bms')

<!-- ページタイトル -->
@section('title', 'メニュー画面')

<!-- ページの見出し -->
@section('headline', 'MENU')

<!-- ヘッダーの下線（黒）を描く -->
@section('header_bottomLine')
<hr>
@endsection

<!-- メイン -->
<!-- ログイン中の権限によって画面表示を変更 -->
@if(Auth::user()->authority === 1)
    @section('main')
    	@parent
		<br><br>
		<p><a href="/list">【書籍一覧】</a></p>
		<p><a href="/showCart">【カート状況確認】</a></p>
		<p><a href="/orderHistory">【購入履歴】</a></p>
		<br>
		<p><a href="/changePassword">【パスワード変更】</a></p>
		<p><a href="/logout">【ログアウト】</a></p>
    @endsection
@elseif(Auth::user()->authority === 2)
    @section('main')
    	@parent
		<br><br>
		<p><a href="/list">【書籍一覧】</a></p>
		<p><a href="/insert">【書籍登録】</a></p>
		<p><a href="/insertIniData">【初期データ登録（データがない場合のみ）】</a></p>
		<p><a href="/orderStatus">【購入状況確認】</a></p>
		<p><a href="/showSalesByMonth">【売上げ状況】</a></p>
		<p><a href="/insertUser">【ユーザー登録】</a></p>
		<p><a href="/listUser">【ユーザー一覧】</a></p>
		<p><a href="/changePassword">【パスワード変更】</a></p>
		<p><a href="/logout">【ログアウト】</a></p>
    @endsection
@endif