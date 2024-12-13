<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<?php
	$pageId=1;
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
				<a href="contact.php">Contact</a>
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
		<?php
		$addItem==false;
		if(isset($_SESSION['login_user'])){
			if(isset($_POST['add'])){
				$page=$_POST['page'];
				$content=$_POST['content'];
				$location=$_POST['location'];
				$header=$_POST['header'];
				
				if($page=="Home"){
					$pageN=1;
				} elseif ($page=="About"){
					$pageN=2;
				} elseif ($page=="Events"){
					$pageN=8;
				} elseif ($page=="Music"){
					$pageN=6;
				} elseif ($page=="Gallery"){
					$pageN=7;
				} elseif ($page=="School"){
					$pageN=3;
				} elseif ($page=="Corporate"){
					$pageN=4;
				} elseif ($page=="Drumming"){
					$pageN=5;
				} elseif ($page=="Merchandise"){
					$pageN=9;
				} else{
					$pageN=0;
				}
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
				$sql = "INSERT INTO CassavaContent";
				$sql .= "(pageNum, content, header, location)";
				$sql .= "VALUES ('" . $pageN . "', '" . $content . "', '"; 
				$sql .= $header . "', '" . $location . "')";
				$result = $conn->query($sql);
			}
	
		?>
			<form action="add.php" method="POST">
				<label class="readable" for="page">Page:</label>
				<br/>
				<input list="pages" id="page" name="page"/>
				<datalist id="pages">
					<option value="Home" selected>
					<option value="About">
					<option value="Events">
					<option value="Music">
					<option value="Gallery">
					<option value="School">
					<option value="Corporate">
					<option value="Drumming">
					<option value="Merchandise">
				</datalist>
				<br/>
				<label class="readable" for="content">Content:</label>
				<br/>
				<textarea id="content" name="content"></textarea>
				<br/>
				<label class="readable" for="location">File Name &lpar;with the extension&rpar;:</label>
				<br/>
				<input type="text" id="location" name="location"/>
				<br/>
				<label class="readable" for="header">Header &lpar;headers are used on the home, about, events, music, and merchandise pages&rpar;:</label>
				<br/>
				<input type="text" id="header" name="header"/>
				<br/><br/>
				<input type="submit" name="add" value="add" onclick="return confirm('Are you sure?');" />
				<br/><br/>
			
			</form>
			<form action="uploadImg.php" method="POST" enctype="multipart/form-data">
				<label class="readable" for="fileToUpload"> Select image to upload: </label>
				<br/>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<br/>
				<input type="submit" value="Upload Image" name="upload" onclick="return confirm('Are you sure?');" />
			</form>
			
			<br/><br/>
			
			<form action="uploadMsc.php" method="POST" enctype="multipart/form-data">
				<label class="readable" for="fileToUpload"> Select music to upload: </label>
				<br/>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<br/>
				<input type="submit" value="Upload Music" name="upload" onclick="return confirm('Are you sure?');" />
			</form>

		<?php
		}
		//Close the database.
		$dbh=null;
		?>
	</div>
	<p class="footer">
		&copy; Cassava Latin Band &VerticalSeparator; All rights reserved 2017
	</p>
	

</body>

</html>