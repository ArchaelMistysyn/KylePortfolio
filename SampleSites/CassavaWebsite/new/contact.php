<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<?php
	$pageId=10;

?>

<head>

<!-- meta -->
<meta charset="UTF-8" />
<meta name="description" content="LATIN BAND" />
<title>Cassava Latin Band</title>
<!-- style -->
<link rel='stylesheet' id='style-css'  href='Style.css' type='text/css' media='all' />
<!-- favicon -->
<link rel="icon" type="img/ico" href="./images/favicon.ico">

</head>
<?php
// define variables and set to empty values
$name = $email = $subject = $message = "";
$myemail='rodcassava@gmail.com';
$error=null;

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
	
	if($error == null){
		$to = $myemail;
		$email_subject = $subject;
		$email_body = "You have received a new message. " .
		" Here are the details:\n Name: " . $name . "\n " .
		"Email: " . $email . "\n Message: \n " . $message;
		$headers = "From: " . $email . "\n";
		mail($to,$email_subject,$email_body,$headers);
		$error = "Thank you. Your message has been sent.";
		$name = $email = $subject = $message = "";
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!-- body -->
<body>
	<!-- navigation -->
	<div id="navi">
		<div class="float-left">
			<img class="menu-icon" src="images/Logo.png"/>
		</div>
		<div class="buttons">
			<a href="index.php">Home</a>
			<a href="about.php">About</a>
			<div class="dropdown-w">
				<a>Workshops</a>
				<div class="dropdown-content-w">
					<a href="school.php">School</a>
					<a href="corporate.php">Corporate</a>
					<a href="drumming.php">Community Drumming</a>
				</div>
			</div>
			<a href="music.php">Music</a>
			<a href="gallery.php">Gallery</a>
			<a href="events.php">Events</a>
			<a href="merchandise.php">Merchandise</a>
			<?php
			if(!isset($_SESSION['login_user'])){
			?>
				<a href="contact.php" id="current">Contact</a>
			<?php
			} else{
			?>
				<a href="Logout.php">Logout</a>
			<?php
			}
			?>
		</div>
		<div class="dropdown">
			<div id="hover-menu">
				<img class="menu-icon" src="./images/dropdown.png"/>
			</div>
			<img id="arrow" src="./images/arrowDown.png"/>
			<div class="dropdown-content">
				<a href="https://www.facebook.com/cassavalatin/" target="_blank">Facebook</a>
				<a href="https://www.youtube.com/watch?v=kji9i4XpewU" target="_blank">Youtube</a>
			</div>
		</div>
	</div>
	
	<!--central content-->
	<div id="central">
		<div class="contact-info">
			<span class="header-Y">Rodrigo Chavez</span>
			<p>
				Email: rodcassava&commat;gmail.com
			</p>
			<p>
				Phone: &lpar;647&rpar;-896-5516
			</p>
			<p>
				Address: 198 Langley Ave. 
				Toronto ON M4K 1B7
			</p>
		</div>
		<form method="POST" id="contact" action="contact.php">

			<p><label> Your Name &lpar;required&rpar;<br />
				<input id="name" type="text" name="name" value="" size="40" required="true" value="<?php echo $name;?>" /></label></p>
			<p><label> Your Email &lpar;required&rpar;<br />
				<input id="email"type="email" name="email" value="" size="40"required="true" value="<?php echo $email;?>" /> </label></p>
			<p><label> Subject<br />
				<input id="subject" type="text" name="subject" value="" size="40" value="<?php echo $subject;?>" /></label></p>
			<p><label> Your Message<br />
				<textarea id="message" name="message" cols="40" rows="10" value="<?php echo $message;?>" ></textarea> </label></p>
			<p><input type="submit" value="Send" /></p>
			<p class="red"><?php
				if($error!=null){
					echo $error;
				}
			?></p>
		</form>	
		<p class="footer">
			&copy; Cassava Latin Band &VerticalSeparator; All rights reserved 2017
		</p>
		
	</div>	
</body>

</html>