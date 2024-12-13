<?php
	session_start();
	
	header("Location: ./");
	
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'kylep072_6OuKGT';
	$DATABASE_PASS = 'n4wt!~@vmq.r';
	$DATABASE_NAME = 'kylep072_JeremyMolko';
	// Create connection
	$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	// Set the current working directory 
	$directory = "./images/gallery/design/";	
	$str="INSERT INTO JeremyTable(location, type) VALUES";
	$count=0;
	$files = glob($directory . '*.{jpg,png}', GLOB_BRACE);
	
	foreach($files as $file) {
		if(stristr($file, 'design')) {
		  //Check database content.
			$sql="SELECT * FROM JeremyTable WHERE location = '" . $file . "'";
			$result = $conn->query($sql);
			$total = $result->num_rows;
			if ($result->num_rows == 0) {
				$count++;
				if($count!=1){
					$str.=", ";
				}
				$str.="('" . $file . "', 'design')";
			}
		}
	}

	$sql=$str;
	$result = $conn->query($sql);
	
	$directory = "./images/gallery/illus/";	
	$str="INSERT INTO JeremyTable(location, type) VALUES";
	$count=0;
	$files = glob($directory . '*.{jpg,png}', GLOB_BRACE);
	
	foreach($files as $file) {
		if(stristr($file, 'illus')) {
		  //Check database content.
			$sql="SELECT * FROM JeremyTable WHERE location = '" . $file . "'";
			$result = $conn->query($sql);
			$total = $result->num_rows;
			if ($result->num_rows == 0) {
				$count++;
				if($count!=1){
					$str.=", ";
				}
				$str.="('" . $file . "', 'illus')";
			}
		}
	}
	$sql=$str;
	$result = $conn->query($sql);
	
	
?>