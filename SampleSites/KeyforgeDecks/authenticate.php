<?php

session_start();

// Initialize.
$errMsg="";

$password = test_input($_POST["password"]);	
$name = test_input($_POST["username"]);

if ($name==""){
	$errMsg="Username required.";
} else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
  $errMsg = "Only letters and white space allowed";
} else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $password)) {
    $errMsg = "Invalid Password.";
}

if($errMsg == ""){
	
	// Login.
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'kylep072_DMFci3';
	$DATABASE_PASS = '$LraV_3T^28q';
	$DATABASE_NAME = 'kylep072_phplogin';
	// Try and connect using the info above.
	$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
	if ( mysqli_connect_errno() ) {
		// If there is an error with the connection, stop the script and display the error.
		die ('Failed to connect to MySQL: ' . mysqli_connect_error());
	}

	if ( !isset($_POST['username'], $_POST['password']) ) {
		// Could not get the data that should have been sent.
		die ('Please fill both the username and password field!');
	}
	if ($stmt = mysqli_prepare($link, 'SELECT id, email, password, status FROM accounts WHERE username = ?')) {
		mysqli_stmt_bind_param($stmt, 's', $_POST['username']);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
	}

	if (mysqli_stmt_num_rows($stmt) > 0) {
		mysqli_stmt_bind_result($stmt, $id, $email, $password, $status);
		mysqli_stmt_fetch($stmt);
		if (password_verify($_POST['password'], $password)) {
			if($status){
				session_regenerate_id();
				$_SESSION['loggedIn'] = true;
				$_SESSION['name'] = $name;
				$_SESSION['id'] = $id;
				$_SESSION['status'] = $status;
				$_SESSION['email'] = $email;
			} else {
				$_SESSION['errMsg'] = 'Account pending approval.';
			}
		} else {
			$_SESSION['errMsg'] = 'Incorrect password!';
		}
	} else {
		$_SESSION['errMsg'] = 'Incorrect Username';
	}
} else {
	$_SESSION['errMsg']=$errMsg;
}

/* close connection and return*/
mysqli_stmt_close($stmt);
mysqli_close();
header('Location: index.php');

function test_input($data) {
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>