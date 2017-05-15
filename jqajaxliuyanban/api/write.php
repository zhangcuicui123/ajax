<?php 
	require_once("db.php");
	date_default_timezone_set("Asia/Shanghai");

	$post = $_POST;
	$title = $post['title'];
	$content = $post['content'];
	$userid = $_SESSION['userid'];
	$username = $_SESSION['name'];
	$status = 10;
	$createdtime = time();
	$insertsql = "insert into message (
		userid,
		username,
		title,
		message,
		status,
		created_time
	) values (
		'{$userid}',
		'{$username}',
		'{$title}',
		'{$content}',
        		'{$status}',
        		'{$createdtime}'
	)";

	$res = $dbh->exec($insertsql);
    $rsql = "select * from message order by id desc limit 1";
    $msg = array();
    foreach($dbh->query($rsql) as $key => $value){
    	$time = date("Y-m-d h:i:s", (int)$value['created_time']);
        	$msg = $value;
        	$msg['created_time'] = $time;
    }
    echo json_encode($msg);
