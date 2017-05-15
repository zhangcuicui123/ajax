<?php 
	require_once("db.php");

	$id = $_GET['id'];
	echo $id;
	$updsql = "update message set status = 20 where id = '{$id}'";
	$dbh->exec($updsql);
