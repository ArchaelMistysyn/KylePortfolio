<?php 
	session_start();
	
	header("Location: ./");
	
	// define variables and set to empty values
	$name = $email = $subject = $message = "";
	$myEmail='jeremymolko@gmail.com';
	$accEmail='kylemistysyn@kyleportfolio.ca';
	$error=null;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		$subject = test_input("Message from your portfolio website");
		$message = test_input($_POST["message"]);
	  
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$error = "Only letters and white space allowed"; 
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid email format"; 
		}
		
		if($error == null){
			$to = $myEmail;
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
