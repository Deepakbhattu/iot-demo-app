<?php
	include_once "db_connect.php";
	db_connect();
	session_start();
	$act_name = $_POST['actuator_name'];
	$sql = "SELECT value,sensor_name from `board` WHERE name='$act_name'";
	$result = mysql_query($sql);
	$res_data = mysql_fetch_array($result, MYSQL_NUM);
	$data = array("value" => $res_data[0], "sensor_name" => $res_data[1]);
	echo json_encode($data);
?>
