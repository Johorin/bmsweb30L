<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>書籍一覧画面</title>
	</head>
    <body>
	<header>
    	<h2 align="center">書籍販売システムWeb版 Ver.1.0</h2>
    	<hr style="border: 2px solid blue;">
    	<div class="float-left" style="position: absolute; top: 83px; left: 20px;">
    		<a href="./menu.php" style="margin: 0 20px 0 0;">[メニュー]</a>
    		<a href="./insert.php">[書籍登録]</a>
    	</div>
    	<h3 align="center">書籍一覧</h3>
    	<hr style="border: 1px solid black;">
    </header>
    <main>
    	<br><br>
    	<!-- フォーム部分 -->
    	<div class="forms" style="display: inline-flex;">
        	<form action="/search" method="post">
        		　ISBN<input type="text" name="isbn">
        		　TITLE<input type="text" name="title">
        		　価格<input type="text" name="price">
        		　<input type="submit" name="listButton" value="検索">
        	</form>
        	<form action="/list" method="get">
        		<!-- hiddenで遷移情報transitionも送る -->
        		<input type="hidden" name="transition" value="searchAll">
        		　<input type="submit" value="全件表示">
        	</form>
    	</div>
    	<br><br>
    	<!-- テーブル部分 -->
    	<table>
    		<tr>
    			<th style="width: 25vw; background-color: lightblue;">ISBN</th>
    			<th style="width: 25vw; background-color: lightblue;">TITLE</th>
    			<th style="width: 25vw; background-color: lightblue;">価格</th>
    			<th style="width: 25vw; background-color: lightblue;">変更/削除</th>
    		</tr>
    		@foreach($result as $val)
    		<tr>
    			<td><a href="/detail?isbn={{$val['isbn']}}">{{$val['isbn']}}</a></td>
    			<td>{{$val['title']}}</td>
    			<td>{{$val['price']}}</td>
    			<td>
    				<a href="/update?isbn={{$val['isbn']}}">変更</a>　
    				<a href="/delete?isbn={{$val['isbn']}}">削除</a>
    			</td>
    		</tr>
    		@endforeach
    	</table>
    </main>
    </body>
</html>