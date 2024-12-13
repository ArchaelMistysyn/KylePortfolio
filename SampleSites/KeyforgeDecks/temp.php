<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'kylep072_DMFci3';
$DATABASE_PASS = '$LraV_3T^28q';
$DATABASE_NAME = 'kylep072_phplogin';

$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
	if ( mysqli_connect_errno() ) {
		// If there is an error with the connection, stop the script and display the error.
		die ('Failed to connect to MySQL: ' . mysqli_connect_error());
	}
	$stmt=$link->prepare("INSERT INTO accounts (id, username, password, email, 
		approved) VALUES (DEFAULT, ?, ?, ?, true)");
		
	$stmt->bind_param('sss', $username, $password, $email);
	$username='Kyle Mistysyn';
	$password=password_hash('!Arc7147', PASSWORD_DEFAULT);
	$email='Archael@hotmail.ca';
	$stmt->execute();
	$stmt->close();
?>