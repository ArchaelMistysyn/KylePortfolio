<?php

session_start();

// Initialize.
$errMsg="";

$password = test_input($_POST["rpassword"]);	
$confirm = test_input($_POST["confirm"]);
$name = test_input($_POST["rusername"]);
$email = test_input($_POST["email"]);

if ($name==""){
	$errMsg="Username required.";
} else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
	$errMsg = "Only letters and white space allowed";
} else if($password!==$confirm) {
    $errMsg = "Passwords do not match.";
} else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $password)) {
    $errMsg = "Invalid Password.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errMsg = "Invalid email format";
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

	if ( !isset($_POST['rusername'], $_POST['rpassword']) ) {
		// Could not get the data that should have been sent.
		die ('Please fill both the username and password field!');
	}
	if ($stmt = mysqli_prepare($link, 'SELECT FROM accounts WHERE username = ?')) {
		mysqli_stmt_bind_param($stmt, 's', $name);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
	}

	if (mysqli_stmt_num_rows($stmt) == 0) {
		if ($stmt = mysqli_prepare($link, 'SELECT FROM accounts WHERE email = ?')) {
			mysqli_stmt_bind_param($stmt, 's', $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
		}

		if (mysqli_stmt_num_rows($stmt) == 0) {
			
			//Create level 1 account.
			if ($stmt=mysqli_prepare($link, "INSERT INTO accounts (id, username, password, email, 
			status) VALUES (NULL, ?, ?, ?, 1)")){
				mysqli_stmt_bind_param($stmt, 'sss', $name, password_hash($password, PASSWORD_DEFAULT), $email);
				mysqli_stmt_execute($stmt);
			}
			
			if ($stmt = mysqli_prepare($link, 'SELECT id FROM accounts WHERE email = ?')) {
				mysqli_stmt_bind_param($stmt, 's', $_POST['email']);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				mysqli_stmt_bind_result($stmt, $id);
				mysqli_stmt_fetch($stmt);
			}
			mysqli_stmt_close($stmt);
			session_regenerate_id();
			$_SESSION['loggedIn'] = true;
			$_SESSION['name'] = $name;
			$_SESSION['id'] = $id;
			$_SESSION['status'] = 1;
			$_SESSION['email'] = $email;
			header('Location: index.php');
		} else {
			$_SESSION['errMsg'] = 'Email in use.';
		}
	} else {
		$_SESSION['errMsg'] = 'Username taken.';
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