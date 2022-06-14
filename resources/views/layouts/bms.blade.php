<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
		@yield('applyCss')
		<title>@yield('title')</title>
	</head>
    <body>
    	<header>
    		<div class="titleWrapper">
        		<h2 id="title">書籍管理システムLaravel版 Ver3.0</h2>
    		</div>
        	<div id="navSpace">
        		@section('header')
            	@show
            	<h3 id="title">@yield('headline')</h3>
            	<div class="loginInfo">
            		<p>名前：{{ Auth::user()->name }}</p>
            		<p>権限：{{ (Auth::user()->authority === 1) ? '一般ユーザー' : '管理者' }}</p>
            	</div>
        	</div>
            @yield('header_bottomLine')
        </header>
        @section('main')
        <main>
        	@show
        </main>
        <br><br><br>
        <footer>
        	<hr id="line2">
        	<p>Copyright (C) 2022 All Rights Reserved.</p>
        </footer>
    </body>
</html>