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
	
	$target=$_GET['location'];
	$current=$_GET['rowId'];
	
	//Swap the data.
	$sql = 'SELECT * FROM CassavaContent WHERE id = ' . $current;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$currentPageNum=$row['pageNum'];
	$currentContent=$row['content'];
	$currentHeader=$row['header'];
	$currentLocation=$row['location'];

	$sql = 'SELECT * FROM CassavaContent WHERE id = ' . $target;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$targetPageNum=$row['pageNum'];
	$targetContent=$row['content'];
	$targetHeader=$row['header'];
	$targetLocation=$row['location'];

	$sql = 'UPDATE CassavaContent SET pageNum =' . $targetPageNum . ', content = "' . $targetContent . '", header = "' . $targetHeader 
	. '", location = "' . $targetLocation . '" WHERE id = ' . $current;
	$result = $conn->query($sql);

	$sql = 'UPDATE CassavaContent SET pageNum =' . $currentPageNum . ', content = "' . $currentContent . '", header = "' . $currentHeader 
	. '", location = "' . $currentLocation . '" WHERE id = ' . $target;
	$result = $conn->query($sql);

?>