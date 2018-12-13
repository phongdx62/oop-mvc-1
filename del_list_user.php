<?php 
	$userid = addslashes(stripslashes($_GET["userid"]));
	require("../config/connect.php");
	$sql = "DELETE FROM user WHERE userid = $userid";
	$kq = mysqli_query($conn,$sql);
	mysqli_close($conn);
	ob_start(); 
	header('Location: list_user.php');
	ob_end_flush(); 
?>