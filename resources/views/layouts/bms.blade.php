<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>@yield('title')</title>
	</head>
    <body>
	<header>
		@section('header')
    	<h2 align="center">書籍販売システムWeb版 Ver.1.0</h2>
    	<hr style="border: 2px solid blue;">
    	@show
    	<h3 align="center">@yield('headline')</h3>
    	<hr style="border: 1px solid black;">
    </header>
    @section('main')
    <main>
    	@show
    </main>
    <footer>
    <br><br><br>
    	<hr style="border: 1px solid blue;">
    	<p>Copyright (C) 20YY All Rights Reserved.</p>
    </footer>
    </body>
</html>