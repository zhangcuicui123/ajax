<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
	<form action="sign.php" method="post">
		<p>用户名</p><input type="text" name="username" />
		<p>密码</p><input type="password" name="password" />
		<p>年龄</p><input type="text" name="age" />
		<p>性别</p>男<input type="radio" name="sex" value="1" />
		女<input type="radio" name="sex" value="2" />
		<p>邮箱</p><input type="text" name="email" />
		<p>联系方式</p><input type="text" name="mobile" />
		<p><input type="submit" id="submit" /></p>
	</form>
    </body>
    <script src="js/jquery.js" charset="utf-8"></script>
</html>