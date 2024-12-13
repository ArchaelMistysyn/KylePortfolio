<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<?php
	$pageId=5;
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
				<a id="current">Workshops</a>
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
	<div id="central" class="hidePad">
		<div id="sticky1" class="stickyBlock">
			<h2>COMMUNITY LATIN DRUMMING WORKSHOP FOR TEENS &amp; ADULTS</h2>
			<h1>Conducted by Rodrigo Chavez, Percussionist / educator</h1>
			<p>This is a practical and interactive &ldquo;hands-on&rdquo; drumming workshop directed and adapted to high school students, music lovers and teachers; all members of our vibrant community. These workshops are open to people of all levels of musical expertise. This program has been designed to give the participants a basic knowledge on the conga drums, bongos, timbales, maracas, guiro and cowbells as well as a selection of amazing Latin American rhythms.</p>
			<p>No musical background is required. Respect, attention, focus and memory are encouraged since Latin rhythms are based on oral tradition and are complex.</p>
			<p>It is a collective experience since traditionally; Afro-Latin rhythms were played by large groups of Africans and native people. By taking their wisdom, history and art into the drum-circle, we can involve the whole group in learning and performing some of these beautiful rhythms. Participants will acquire a rich musical vocabulary as well as an understanding of other cultures.</p>
			<p>All instruments will be provided by the instructor: bongos, congas, shakers, maracas, cowbells, bass drums, guiros, claves and timbales. Enough for the whole class!!</p>
			<p>Theory on the African rhythms and techniques are also part of this workshop.</p>
			<p>Singing and dancing are part of the workshop as well as learning about the history and legends of the traditions studied. Theory on the African rhythms and techniques are also part of this workshop. This is an integral part of team-building, collective interaction and communication.</p>
			<p><b>RHYTHMS</b></p>
			<p>Salsa, Bolero, Cha-cha-cha, Conga, Rumba, Bemebe (CUBA) / Samba, Batucada, Olodum (BRAZIL) / Merengue, Bachata (DOMINICAN REPUBLIC) / Cumbia (COLOMBIA) / Calypso, Soca (TRINIDAD), Parranda (VENEZUELA), Festejo, Lando (PERU).</p>
		</div>
		
		<div id="sticky3" class="stickyBlock">
			<div id="map2">
			</div>
			<h1>TEACHING PHILOSOPHY</h1>
			<p>In Toronto, I have been teaching and conducting workshops since 1984 of Afro-Latin music and Native music of Central and South America. Before that, I studied classical guitar in Buenos Aires, Argentina. I have traveled to Argentina, Cuba, Venezuela, Peru and Bolivia, seeking out masters of Native and Afro-Latin music to connect these traditions with my own creative vision.</p>
			<p>Currently, I am the Artistic Director of CASSAVA LATIN BAND, composing contemporary Latino-Canadian music, exploring the rich variety of Latin Rhythms and performing in different stages of Canada and USA. I also conduct percussion workshops on Latin Music, presenting an ecological approach to sound and environment, as part of an educational integrated arts program called Global Rhythms. I present this work in different Boards of Education, performing yearly in many schools and universities of Ontario. I constantly take part on a variety of other multi-disciplinary projects, with such companies as Angikam Dance Initiative classical Indian Kathak dance troupe, Esmeralda Enriquez, Flamenco Dance Company, recording for Kiran Ahluwalia Indo-Pakistani Singer and Mediterraneo Greek Music Ensemble, directed by master bouzuky player Kostas Apostolakis.</p>
			<p>I feel that the teaching of drumming, especially when drawing on the oral traditions and the techniques of ancient cultures, offers the students an opening into an entirely new set of tools for their personal expression. Students develop listening skills, respect for their instruments and themselves, and the mental discipline required to master complex Afro-Latin rhythms. They learn how to interact with each other unselfishly and co-operatively. Each gains in self-esteem as they create and perform music on their own instruments. The teachings give students a fuller understanding not only of the music, but of the day-to-day reality of other cultures. By playing the conga drums or the cowbells, for example -by becoming a part of that musical tradition- they learn about and gain an understanding of those cultures.</p>
			<p>My teaching philosophy is grounded in giving students tools for their own creation. These tools open a window to an entirely new world of expression, a world that is both magical and connected to their own reality. They can then explore in the context of their daily life, and create new forms of expression.</p>
			<p><i>- Rodrigo Chavez -</i></p>
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
			$sql="SELECT * FROM CassavaContent";
			$result = $conn->query($sql);
			$first=0;
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc())
				{
					if($pageId==$row['pageNum']){
						echo "<p>" . $row['content'];
						
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
	

</body>

</html>