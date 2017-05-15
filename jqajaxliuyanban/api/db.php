<?php 
	header("Content-type: text/html; charset=utf-8");
	// 开起session
	session_start(); //产生一个唯一的uid
	// 就是一个会话

	$user = "root"; //数据库的用户名
	$pass = ""; //数据库的密码
	$host = 'localhost'; //主机地址
	$dbname = 'liuyanku'; //数据库名字
	$utf8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8');
	// 编码
	$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass,$utf8);
