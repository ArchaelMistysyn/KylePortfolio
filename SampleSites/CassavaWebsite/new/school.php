<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<?php
	$pageId=3;
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
			<h1>WORKSHOP INFORMATION</h1>
			<p>This is a practical and interactive &ldquo;hands-on&rdquo; drumming workshop directed and adapted to students of</p>
			<p>Grade 4 elementary to High school levels, tailored to their ability and musical capacity. The workshops are designed to give students basic knowledge on instruments such as congas, bongos, bass drums, maracas, guiro and cowbells through a selection of Latin American rhythms. All these instruments and rhythms are intrinsically connected to the history of South America and its Geography.</p>
			<p>It is an inclusive workshop where all students are invited to participate in a safe environment of drumming, appealing to all gender, religious and cultural orientation. No musical background is required. Respect, attention, focus and memory are encouraged since Latin rhythms are complex and based on oral tradition.</p>
			<p>The Drum-Circle is a collective experience since historically large groups of African slaves were playing these rhythms in the plantations of the New World. By taking their wisdom, history and art into the schools, we can involve the whole class in learning and performing some of these beautiful rhythms. The students will acquire a rich musical vocabulary as well as an understanding of other cultures.</p>
			<p>All instruments are provided by the instructor: bongos, congas, shakers, maracas, cowbells, bass drums, guiros, claves and Samba instruments --- enough for the whole class!!</p>
			<p>Elements of History, African slavery, Geography, Singing and dancing will also be part of this intense workshop. As a multidisciplinary program, it aims to develop senses, body coordination and memory. This is an integral part of the curriculum, to learn about the culture and music of the Americas. Theory on the African wisdom, culture, and intricate drum techniques are also part of the workshop.</p>
		</div>
		
		<div id="sticky2" class="stickyBlock">
			<div id="map">
			</div>
			<p><b>RHYTHMS TO STUDY:</b> Salsa, Bolero, Cha-cha-cha, Conga, Bemebe (from CUBA)/ Samba, Batucada, Olodum (from BRAZIL)/ Merengue, Bachata (from DOMINICAN REPUBLIC)/ Cumbia (from COLOMBIA)/ Calypso, Soca (from TRINIDAD), Parranda (from VENEZUELA), Festejo and Lando (from PERU).</p>
			<p>A short performance of 30-45 min. can be planned at the end of the workshop (when the whole week is booked, MON-FRI). The performance usually culminates with the full participation of the students playing what they learned.</p>
			<p><b>REQUIREMENTS:</b> Any room with enough chairs for a &ldquo;drum-circle&rdquo;. All drums and equipment are provided by the instructor, you don&rsquo;t need to buy or rent anything.</p>
			<p>34 students Max, at once.</p>
			<p><b>AVAILABILITY:</b> All year round</p>
			<p><b>CONTACT:</b> Rodrigo Chavez, Percussionist/ workshop instructor</p>
			<p><b>Tel.</b> 647.896.5516 / rodcassava@gmail.com</p>
			
		</div>
		
		<div id="sticky3" class="stickyBlock">
			<h1>Rodrigo Chavez / TEACHING PHILOSOPHY</h1>
			<p>&nbsp;</p>
			<p>Since the year 2000 I have been teaching and conducting workshops of Afro-Latin music and Native music of Central and South America. Before that, I studied classical guitar in Buenos Aires and traveled through Argentina, Cuba, Venezuela, Peru and Bolivia, seeking out masters of the Native and Afro-Latin music to connect these traditions with my own creative vision.</p>
			<p>Currently, I teach for the OAC (Ontario Arts Council) through the Artists in Education Program and I am the Artistic Director of CASSAVA LATIN BAND, composing contemporary Latino-Canadian music, exploring the rich variety of Latin American Rhythms and performing on different stages around Canada and the USA. I also conduct percussion workshops focused on Latin American Music, presenting an ecological approach to sound and environment as part of an educational integrated arts program called &ldquo;Global Rhythms&rdquo;. I present Global Rhythms workshop through different Boards of Education, performing yearly in many schools and universities of Ontario. I constantly take part on a variety of other multi-disciplinary projects, with such companies as &ldquo;Angikam Dance Initiative&rdquo; (a classical Indian Kathak dance troupe), &ldquo;Esmeralda Enriquez&rdquo; (Flamenco Dance Company), recording for Kiran Ahluwalia (Indo-Pakistani Singer) and playing for &ldquo;Mediterraneo&rdquo; (Greek Music Ensemble).</p>
			<p>I feel that the teaching of drumming, especially when drawing on the oral traditions and the techniques of ancient cultures, offers the students an opening into an entirely new set of tools for their personal expression. Students develop listening skills, respect for their instruments and others, and the mental discipline required to master complex Afro-Latin rhythms. They learn how to interact with each other co-operatively. As the students create and perform music on their own instruments, this undoubtedly will promote gains in self &ndash;esteem. The teachings give students a fuller understanding not only of the music, but of the day-to-day reality of other cultures. By playing the conga drums or the cowbells, for example -by becoming a part of that musical tradition- they learn about and gain an understanding of those cultures.</p>
			<p>My teaching philosophy is grounded in giving students tools for their own creation. These tools open a window to an entirely new world of expression, a world that is both magical and connected to their own reality. They can then explore in the context of their daily life, and create new forms of expression.</p>
			<p>- Rodrigo Chavez</p>
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