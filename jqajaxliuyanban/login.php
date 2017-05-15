<?php
	require_once("api/db.php");

	$post = $_POST;
	$name = $post['name'];
	$password = $post['password'];

	$sql = "select * from user where name='{$name}'";
	$select = $dbh->query($sql);

	$user = array();
	foreach($select as $row){
		$user = $row;
	}
	echo "<pre>";

		//判断用户是否注册过
	if(empty($user)){
		header("Location:zhuce.php");
		return false;
	}

	$dbpassword = $user['password'];
	if(md5($password) == $dbpassword){
		$_SESSION['userid'] = $user['userid'];
		$_SESSION['name'] = $user['name'];
		header("Location:index.php");
		return false;
	}else{
		echo "密码错误";
		echo "<a href= 'login.html'>返回登录</a>";
	}
