<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<?php
	$pageId=7;
	$first=0;
	$previous=0;

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
<body id="g-page">
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
			<a href="gallery.php" id="current">Gallery</a>
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
	<div id="central" class="hideBar">
		<div id="sticky1">
			<h2>CASSAVA GALLERY</h2>
			<p>Here, we have a quality selection of photos taken of our band, performances, workshops, and instruments</p>
		</div>
		<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- The Close Button -->
		  <span class="close">&times;</span>

		  <!-- Modal Content (The Image) -->
		  <img class="modal-content" id="img01">

		  <!-- Modal Caption (Image Text) -->
		  <div id="caption"></div>
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
			//Check database content.
			$sql="SELECT location FROM CassavaContent WHERE pageNum=7";
			$result = $conn->query($sql);
			$total = $result->num_rows;
			$sql="SELECT * FROM CassavaContent";
			$result = $conn->query($sql);
			$count=0;
			if ($result->num_rows > 0) {
				echo '<p></p>';
				$first=0;
				while($row = $result->fetch_assoc())
				{
					if($pageId==$row['pageNum']){
						$count++;
						echo '<img class= "gallery-image" id="sub-image' . $count . '" src="images/' . $row['location']
							. '" onClick="loadModal(\'sub-image' . $count . '\', \'' . $row['content'] . '\');" alt="' . $row['content'] . '" />';
						if(isset($_SESSION['login_user'])){
							echo '<p class="description" style="clear:both;">';
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
							echo '</p>';
						}
					}
				}
			}		
			//Close the database.
			$dbh=null;
		?>
		<div id="page-drop"></div>
	</div>
		<?php
			echo '<script type="text/javascript">';
			echo 'var total = ' . json_encode($total) . ';';
			echo '</script>'; 
		?>
		<script type="text/javascript">	
			var modal = document.getElementById('myModal');
			function loadModal(i, c) {
				
				var modalImg = document.getElementById("img01");
				var img = document.getElementById(i);
				var modalCaption= document.getElementById('caption');
				var captionText = c;
				modal.style.display = "block";
				modalImg.src = img.src;
				modalCaption.innerHTML = captionText;
			};

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() { 
				modal.style.display = "none";
			}
			
			var i=0;
			function changeBg(){
				if(i!=0){
					if(i >= total){
						i=1;
					} else {
						i++;
					}
					targetId='sub-image' + i;
					bgImage=document.getElementById(targetId);
					bg=document.getElementById('central');
					bg.style.backgroundImage = 'url(' + bgImage.src + ')';
				} else {
					i++;
				}
				setTimeout(changeBg, 3000);
			}
			setTimeout(changeBg, 3000);
			
			
		</script>
</body>

</html>