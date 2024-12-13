<?php 
	session_start();
?>
<!-- Main Page -->
<meta charset="utf-8">
<html>
	<head>
		<?php
			if(!isset($_SESSION['id'])){
				$error="";
				$match=false;
				$open=0;
				$mode=0;
				if(isset($_POST['action'])){
					$mode=$_POST['action'];
				} elseif(isset($_SESSION['login_user'])){
					$mode=2;
				} else{
					$mode=0;
				}
				
				if(isset($_POST['log'])){
					$email=$_POST['email'];
					$password=$_POST['password'];
					//Validate email format.
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					  $error = "Invalid email format"; 
					}
					//Validate password
					elseif(!preg_match('/^.*(\d+).*$/', $password)) {
						$error= "The password must contain a number.";
					}elseif(!preg_match('/^.*[A-Za-z+].*$/', $password)){
						$error= "The password must contain a letter.";
					}elseif(!preg_match('/^.{8,50}$/', $password)){
						$error= "The password must be between 8 and 50 characters long.";
					}
					
					if($error==""){
						$open=1;
					}else{
						$open=0;
					}
				} elseif(isset($_POST['create'])){
					$username=$_POST['username'];
					$email=$_POST['email'];
					$password=$_POST['password'];
					$confirm=$_POST['confirm'];
					
					//Validate username.
					if(!preg_match('/^.{8,16}$/', $username)){
						$error= "The username must be between 8 and 16 characters long.";
					}
					//Validate email format.
					elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					  $error = "Invalid email format"; 
					}
					//Validate password.
					elseif(!preg_match('/^.*(\d+).*$/', $password)) {
						$error= "The password must contain a number.";
					}elseif(!preg_match('/^.*[A-Za-z+].*$/', $password)){
						$error= "The password must contain a letter.";
					}elseif(!preg_match('/^.{8,50}$/', $password)){
						$error= "The password must be between 8 and 50 characters long.";
					}
					//Check if password entries match.
					elseif($password != $confirm){
						$error="passwords do not match";
					}
					if($error==""){
						$open=2;
					}else{
						$open=0;
					}
				}
				
				if($open==1 || $open==2){
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

				}
				
				
				if($open==1){
					
					//Check database for account.
					$sql="SELECT * FROM CassavaUser";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc())
						{
							if(strtolower($email)==strtolower($row['email'])){
								//Check if password is a match.
								if(password_verify($password, $row['password'])){
									
									$match=true;
									$username=$row['username'];
									$status=$row['status'];
									
								} else{
									$error="Incorrect Login Info";
								}
							}
						}
					}
				} elseif($open==2){
					//Check database for preexisting account.
					$new=true;
					
					$sql="SELECT * FROM CassavaUser";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc())
						{
							if($email==$row['email']){
								
								$new=false;
								$error="There is already an existing account with this email.";

							} elseif($email==$row['username']){
								$new=false;
								$error="There is already an existing account with this username.";
							}
						}
					}
					if($new){
						$status=2;
						$hash=password_hash($password,PASSWORD_BCRYPT);
						$sql = "INSERT INTO CassavaUser";
						$sql .= "(username, email, password, status)";
						$sql .= "VALUES ('" . $username . "', '" . $email . "', '" . $hash . "', " . $status. ");";
						$match=true;
						if ($conn->query($sql) === TRUE) {
							echo "New record created successfully";
						} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
				
				//If a match:
				
				if($match){
					//-Log in the user.
					$_SESSION['login_user']=$username;
					//-Identify authority level.
					$_SESSION['status_tier']=$status;
					
					$mode=2;

				}
			} else{
				$mode=2;
			}			
			
		?>
		<!-- style -->
		<!-- meta -->
		<meta charset="UTF-8" />
		<meta name="description" content="LATIN BAND" />
		<title>Cassava Latin Band</title>
		<!-- style -->
		<link rel='stylesheet' id='style-css'  href='Style.css' type='text/css' media='all' />
		<!-- favicon -->
		<link rel="icon" type="img/ico" href="Images/favicon.ico">
	</head>
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
				<a href="contact.php">Contact</a>
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
		
			<!--Log In Form-->
			
			<?php
				if($mode==0){
			?>
				<form action="MyLogin.php" method="POST">
					<label  class="readable" for="email">Email:</label>
					<br/>
					<input type="text" id="email" name="email" maxlength="90" value=
						<?php echo "'"; if(isset($_POST['email'])){ echo $_POST['email'];} echo "'"; ?> />
					<br/>
					<label  class="readable" for="password">Password:</label>
					<br/>
					<input type="password" id="password" name="password" maxlength="90" value=
						<?php echo "'"; if(isset($_POST['password'])){ echo $_POST['password'];} echo "'"; ?> />
					<br/><br/>
					<input type="submit" class="glow" name="log" value="Log In"/>
					<br/><br/>
				</form>				
			<?php	
				}
				if($mode==2){					
					//Inform the user they are logged in.
					echo '<p class="readable" id="error"> Hello ' . $_SESSION['login_user'] . ', you are logged in. </p>';
					
			?>
			<br/><br/>
			<!--Sign Up Form-->
				
			<form action="MyLogin.php" method="POST">
				<label  class="readable" for="username">Username:</label>
				<br/>
				<input type="text" id="username" name="username" maxlength="16" />
				<br/>
				<label  class="readable" for="email">Email:</label>
				<br/>
				<input type="text" id="email" name="email" maxlength="90" />
				<br/>
				<label  class="readable" for="password">Password:</label>
				<br/>
				<input type="password" id="password" name="password" maxlength="90" />
				<br/>
				<label  class="readable" for="confirm">Confirm Password:</label>
				<br/>
				<input type="password" id="confirm" name="confirm" maxlength="90" value="" />
				<br/><br/>
				<input type="submit" class="glow" name="create" value="Add Admin"/>
				<br/><br/>
			</form>
			
			<?php
					
				}
						
				//Close the database.
				$dbh=null;
				//Display error message.
				echo '<span class="readable" id="error">' . $error . "</span>";
				
			?>
			
			<br class="clear" />
			<p class="footer">
			&copy; Cassava Latin Band &VerticalSeparator; All rights reserved 2017
			</p>
		</p>
		</div>
	</body>
</html>