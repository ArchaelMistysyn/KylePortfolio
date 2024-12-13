<?php 
	session_start();
	header("Location: index.php");
	//Open the user database.
	$sn = "localhost";
	$dbu = "kylep072_I8N1d2";
	$dbp = 'b5r}C=HD3)XW';
	$dbn= "kylep072_CassavaDB";
	
	// Create connection
	$conn = new mysqli($sn, $dbu, $dbp, $dbn);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$row=$_GET['rowId'];
	
	$sql = "DELETE FROM CassavaContent WHERE id = " . $row;
	$result = $conn->query($sql);
?>