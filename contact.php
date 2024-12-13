<?php 
	session_start();
	
	header("Location: ./");
	require 'email_config.php';
	// define variables and set to empty values
	$name = $email = $subject = $message = "";
	$error=null;

	$blacklist = ["Price", "Reseller", "Aloha"];
	$blacklistPattern = "/\b(" . implode("|", array_map("preg_quote", $blacklist)) . ")\b/i";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		$subject = test_input($_POST["subject"]);
		$message = test_input($_POST["message"]);
	  
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$error = "Only letters and white space allowed"; 
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid email format"; 
		}
		
		if (preg_match($blacklistPattern, $subject)) {
			// Blacklisted word found, stop the email without notifying the user
			$error = null;
			$_SESSION['error'] = $error;
			$_SESSION['pageLoc'] = 4;
			exit;
		}

		if($error == null){
			$to = $myemail;
			$email_subject = $subject;
			$email_body = "You have received a new message from your portfolio website. " .
			" Here are the details:\n Name: " . $name . "\n " .
			"Email: " . $email . "\n Message: \n " . $message;
			$headers = "From: " . $accEmail . "\n";
			mail($to,$email_subject,$email_body,$headers);
			$error = "Thank you. Your message has been sent.";
			$name = $email = $subject = $message = "";
		}
	}

	$_SESSION['error']=$error;
	$_SESSION['pageLoc']=4;
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>
