<?php 
	require("../config/connect.php");
	
	$id = addslashes(stripslashes($_GET["id"]));

	$sql = "DELETE FROM music WHERE id = $id";
	$kq = mysqli_query($conn,$sql);
	mysqli_close($conn);
	ob_start(); 
	header('Location: list_music.php');
	ob_end_flush(); 	
?>