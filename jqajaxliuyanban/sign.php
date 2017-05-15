<?php 
	require_once("api/db.php");
	date_default_timezone_set("Asia/Shanghai");
	$post = $_POST;
	$name = $post['username'];
	$pass = $post['password'];
	$pwd = md5($pass);
	$age = $post['age'];
	$sex = $post['sex'];
	$email = $post['email'];
	$mobile = $post['mobile'];
	$created_time = time();	

	$insertsql = "insert into user (
		name,
		password,
		age,
		sex,
		email,
		mobile,
		created_time
	) values (
		'{$name}',
		'{$pwd}',
		'{$age}',
		'{$sex}',
		'{$email}',
		'{$mobile}',
		'{$created_time}'
	)";
	$result = $dbh->exec($insertsql);
	$sql = "select * from user";
	$select = $dbh->query($sql);
	foreach($select as $row){		
	}
	$userid = '1030'.$row['id'];
	$updsql = "update user set userid='{$userid}' where name='{$name}'";
	$dbh->exec($updsql);
	$_SESSION['userid'] = $userid;
	$_SESSION['name'] = $name;
	header("Location:login.html");