<!DOCTYPE html>
<html lang="en-US">

<!-- head -->
<head>

<!-- meta -->
<meta charset="UTF-8" />
<meta name="description" content="LATIN BAND" />
<title>Cassava Latin Band</title>
<!-- style -->
<link rel='stylesheet' id='style-css'  href='style.css' type='text/css' media='all' />
<!-- favicon -->
<link rel="icon" type="img/ico" href="Images/favicon.ico">
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
	$comment = test_input($_POST["message"]);
  
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$error = "Only letters and white space allowed"; 
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = "Invalid email format"; 
	}
	
	if($error == null){
		$to = $myemail;
		$email_subject = "$subject";
		$email_body = "You have received a new message. ".
		" Here are the details:\n Name: $name \n ".
		"Email: $email\n Message \n $message";
		$headers = "From: $email\n";
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
	
	<div class="header">
		<img class="logo" src="Images/minilogo.png"/>
		<a href="Contact.php">
			<div class="navi-button" id="current">
			Contact
			</div>
		</a>
		<div class="dropdown">
		  <button class="dropbtn">Workshops</button>
			<div class="dropdown-content">
				<a href="Educational.html">Educational Workshop</a>
				<a href="Corporate.html">Corporate/Team Building Workshop</a>
				<a href="Drumming.html">Community Latin Drumming</a>
			</div>
		</div>
		<a href="About.html">
			<div class="navi-button">
			About Us
			</div>
		</a>
		<a href="index.html">
			<div class="navi-button">
			Home
			</div>
		</a>
	</div>
	<hr/>
	<div class="image-holder">
		<img class="bg-image" src="Images/drums1.jpg"/>
	</div>

	<div class="form-panel">
		<form method="POST" id="contact" action="Contact.php">

			<p><label> Your Name &lpar;required&rpar;<br />
				<input type="text" name="name" value="" size="40" required="true" value="<?php echo $name;?>" /></label></p>
			<p><label> Your Email &lpar;required&rpar;<br />
				<input type="email" name="email" value="" size="40"required="true" value="<?php echo $email;?>" /> </label></p>
			<p><label> Subject<br />
				<input type="text" name="subject" value="" size="40" value="<?php echo $subject;?>" /></label></p>
			<p><label> Your Message<br />
				<textarea name="message" cols="40" rows="10" value="<?php echo $message;?>" ></textarea> </label></p>
			<p><input type="submit" value="Send" /></p>
			<p class="red"><?php
				if($error!=null){
					echo $error;
				}
			?></p>
		</form>	
	</div>
	<!-- footer -->
	<div class="bg-footer">
		<div class="footer-menu-a">
			<h1>Workshops</h1>
			<ul class="highlight">
				<a href="Educational.html"><li>Educational Workshop</li></a>
				<a href="Corporate.html"><li>Corporate/Team Building Workshop</li></a>
				<a href="Drumming.html"><li>Community Latin Drumming</li></a>
			</ul>
		</div>
		<div class="footer-menu-b">
			<h1>Cassava</h1>
			<ul class="highlight">
				<a href="About.html"><li>About Us</li></a>
				<a href="Contact.php"><li>Contact</li></a>
			</ul>
		</div>
		<div class="footer-menu-c">
			<h1>Social Media</h1>
			<ul class="highlight">
				<li><a href="https://www.facebook.com/cassavalatin/" target="_blank">Facebook</a></li>
				<li><a href="https://www.youtube.com/watch?v=kji9i4XpewU" target="_blank">Youtube</a></li>
			</ul>
		</div>
		<hr/>
		<p class="footer">
		&copy; Cassava Latin Band &VerticalSeparator; All rights reserved 2017
		</p>
	</div>
	
</body>
</html>