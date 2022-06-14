<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>ログイン画面</title>
	</head>
    <body>
        <header>
        	<h2>書籍販売システムWeb版 Ver.2.0</h2>
        	<hr>
        	<h3>　</h3>
        	<hr>
        </header>
        <main>
    		<form action="./login.php" method="post">
            	<br><br>
            	<table>
            		<tr>
            			<td>ユーザー</td>
            			<td><input type="text" name="user" value="<?=$user?>"></td>
            		</tr>
            		<tr>
            			<td>パスワード</td>
            			<td><input type="password" name="pass" value="<?=$pass?>"></td>
            		</tr>
            	</table>
        		<br><br>
        		<input type="submit" name="loginButton" value="ログイン">
    		</form>
        </main>
        <footer>
        	<br><br><br>
        	<hr>
        	<p>Copyright (C) 20YY All Rights Reserved.</p>
        </footer>
    </body>
</html>