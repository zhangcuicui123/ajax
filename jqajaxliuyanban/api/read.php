<?php
    require_once("db.php");
    date_default_timezone_set("Asia/Shanghai");

    $sql = "select * from message order by id desc";
    $select = $dbh->query($sql);
    $msg = array();
    foreach ($select as $key => $value) {
    	$time = date("Y-m-d h:i:s", (int)$value['created_time']);
           $msg['message'][$key] = $value;
           $msg['message'][$key]['created_time'] = $time;
    };
    echo json_encode($msg);