<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<?php
	$pageId=6;
	$first=0;
	$previous=0;

?>

<head>

<!-- meta -->
<meta charset="UTF-8" />
<meta name="description" content="LATIN BAND" />
<meta name="google" content="notranslate">
<title>Cassava Latin Band</title>
<!-- style -->
<link rel='stylesheet' id='style-css'  href='Style.css' type='text/css' media='all'/>
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
			<a href="music.php" id="current">Music</a>
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
	<div id="central" class="hidePad-t">
		<div id="sticky1">
			<h2>CASSAVA MUSIC</h2>
			<p>Enjoy a selection of our music below!</p>
				
				<div id="slideContainer" class="tooltip">
					<input id="vol-control" type="range" min="0" max="100" step="1" oninput="setVolume" onchange="setVolume"></input>
					<span class="tooltiptext">Volume Control</span>
				</div>	
	</div>
		<?php
		if(isset($_SESSION['login_user'])){
		?>
			<a class="modify" href="add.php">Add Content</a>
		<?php
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
				
			$id=0;
			$pageNum=0;
			$content="";
			$location="";
			$sql="SELECT location FROM CassavaContent WHERE pageNum=6";
			$result = $conn->query($sql);
			$total = $result->num_rows;
			$count=0;
			//Check database content.
			$sql="SELECT * FROM CassavaContent";
			$result = $conn->query($sql);
			$first=0;
			if ($result->num_rows > 0) {
				echo '<p></p>';
				while($row = $result->fetch_assoc())
				{
					if($pageId==$row['pageNum']){
						$count++;
						
						$last=$row['id'];
						echo '<div class="cd" onClick="togglePlay(\'music' . $count . '\', ' . $total . ');" preload="true">
							<audio id="music' . $count . '">
								<source src="music/' . $row['location'] . '" type="audio/mpeg">
							</audio>
						</div>';
						echo '<p class="description"><span class="header">' . $row['header'] . '</span><br/><span class="musicDescription">' . $row['content'] . '</span>';
						
						if(isset($_SESSION['login_user'])){
							$rowId=$row['id'];
							echo '<a class="modify" href="delete.php?rowId=' . $rowId . '">Remove Content</a>';
							
							if($first==0){
								$first=$row['id'];
								$previous=$row['id'];
							} else {
								echo '<a class="modify" href="promote.php?location=' . $first . '&rowId=' . $rowId . '">Switch With Top</a>';
								echo '<a class="modify" href="promote.php?location=' . $previous . '&rowId=' . $rowId . '">Move Up One</a>';
								$previous=$row['id'];
							}
						}
						
						echo "</p>";
					}
				}
			}		
			//Close the database.
			$dbh=null;
		?>
	</div>
	<!-- script -->
	<script type="text/javascript">		
		var activeMedia="";
		var volumeControl = document.getElementById('vol-control');
		var setVolume = function() { if(activeMedia!=""){audio.volume = this.value / 100;} };
		
		function togglePlay(e, total) {
		  var check;
		  for (i = 1; i <= total; i++) { 
			c="music" + i;
			check = document.getElementById(c);
			
			if(!check.paused && c!=e){
			  check.pause();
		    }
			
		  }
		  var music = document.getElementById(e);
		  if(music.paused){
			  activeMedia=e;
			  audio = document.getElementById(activeMedia);
			  setVolume;
			  audio.volume=volumeControl.value / 100;
			music.play();
			
		  } else {
			music.pause();
		  }
		};
		
		volumeControl.addEventListener('change', function() {
			if(activeMedia!=""){audio.volume = this.value / 100;}
		});
		
		volumeControl.addEventListener('change', setVolume);
		volumeControl.addEventListener('input', setVolume);
	
	</script>
	

</body>

</html>