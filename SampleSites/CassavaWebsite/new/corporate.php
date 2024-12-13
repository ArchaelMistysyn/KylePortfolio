<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<?php
	$pageId=4;
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
			<h2>LATIN DRUMMING CORPORATE WORKSHOP</h2>
			<h1>Conducted by Rodrigo Chavez, Percussionist / educator</h1>
			<p>In the past 12 years CASSAVA has facilitated interactive drumming workshops for the corporate sector with amazing results. The workshops are fun and intense, conducted in a &ldquo;Drum Circle&rdquo; format geared to produce better interaction and fluent communication amongst the participants.</p>
			<p>This is a &ldquo;hands-on&rdquo; percussion workshop where everyone is welcome in a safe and inclusive environment. No musical background is required but an open mind is important to excel in this workshop.</p>
			<p>The workshop will be describing the historical and geographical origins of Afro-Latin drumming, and the characteristics of each style. Dancing and singing are also part of this program which can come in formats of 1 to 2 Hrs</p>
			<p><b>RHYTHMS</b></p>
			<p>Salsa, Bolero, Cha-cha-cha, Conga, Rumba, Bemebe (CUBA) / Samba, Batucada, Olodum (BRAZIL) / Merengue, Bachata (DOMINICAN REPUBLIC) / Cumbia (COLOMBIA) / Calypso, Soca (TRINIDAD), Parranda (VENEZUELA), Festejo, Lando (PERU).</p>
			<p><b>WHY THIS WORKSHOP IS BENEFICIAL FOR YOUR COMPANY?</b></p>
			<p>Bring the team together in a motivational setting to inspire and uplift them.</p>
			<p>Create a Corporate Image / Improve team work / Improve self-esteem / understand the company&rsquo;s goals / Increase imagination when facing challenges, difficulties / increased communication and interaction among members / continual self-improvement, and mutual respect / Trusting and sharing with each other.</p>
			<p><b>Aims of CASSAVA Corporate workshop:</b></p>
			<p>To help people and businesses around the world to communicate better and realize their full potential</p>
			<p><b>REQUIREMENTS</b></p>
			<p>Any room with good ventilation can be used for this workshop, 1 electrical outlet and enough chairs for all participants. All drums and equipment are provided by professional instructors, you don&rsquo;t need to buy or rent anything.</p>
			<p><b>REFERENCES</b></p>
			<p>BAYER PHARMACEUTICAL /MICROSOFT CANADA CO. / UNICEF INTERNATIONAL / APL TRANSPORT &ndash;CANADA / ABCD: Art Building for African Children /Blue Mountain Resorts Ltd. / SCHWARZKOPF PROFESSIONAL INC. A Division of Henkel Consumer Goods Canada Inc. / SCOTIA BANK / Common Thread Choir / EMPIRE CONDO LIVING / DUNDEE PLACE PROPERTIES / TRIDEL DEVELOPMENTS / STATION GALLERY / AGO Toronto / Toronto Catholic District School Board /North American Centre Properties / PUEBLITO / LASA CONFERENCE (Latin American Studies Association) / North York Central Library / YORK UNIVERSITY / STARFISH LEARNIG INC. / CSS (Canadian Sleep Society) Neurologist-Department / The Hospital for Sick Children / INMUNOLOGY CONFERENCE, U of T / WORLDS OF MUSIC TORONTO / YMCA WOMENS GROUP / RANBAXY PHARMACEUTICALS CANADA INC. / MONT TREMBLENT RESORTS /CHIN RADIO / Royal Ontario Museum / TD BANK / RICHTREE INC.</p>	
			<p><b>ACTIVITY QUESTIONARY</b></p>
			<p>If you are positive in booking CASSAVA for a corporate drumming workshop a short questioner can be of great help to visualize the goals of your company:</p>
			<ul class="colorGreen">
				<li>Average age of the participants?</li>
				<li>Percentage male / female?</li>
				<li>Average length of service with your company?</li>
				<li>Department participants are from? Positions within the organization?</li>
				<li>Public Relations / Communications / Customer Partner Experience / Technical</li>
				<li>How well do the participants know each other? Dynamics of group?</li>
				<li>What are the main goals to achieve through in this activity?</li>
			</ul>
		</div>
		
		<div id="sticky2" class="stickyBlock">
			<h2>CORPORATE WORKSHOPS</h2>
			<h1>Rodrigo Chavez / TEACHING PHILOSOPHY</h1>
			<p>I have been teaching and conducting workshops since 1984 of Afro-Latin music and Native music of Central and South America. Before that, I studied classical guitar in Buenos Aires, Argentina. I have traveled to Argentina, Cuba, Venezuela, Peru and Bolivia, seeking out masters of Native and Afro-Latin music to connect these traditions with my own creative vision.</p>
			<p>Currently, I am the Artistic Director of CASSAVA LATIN BAND, composing contemporary Latino-Canadian music, exploring the rich variety of Latin Rhythms and performing on different stages in Canada and the USA. I also conduct percussion workshops on Latin Music, presenting an ecological approach to sound and environment, as part of an educational integrated arts program called Global Rhythms. I present this work in different Boards of Education, performing yearly in many schools and universities of Ontario. I constantly take part on a variety of other multi-disciplinary projects, with such companies as Angikam Dance Initiative classical Indian Kathak dance troupe, Esmeralda Enriquez, Flamenco Dance Company, recording for Kiran Ahluwalia Indo-Pakistani Singer and Mediterraneo Greek Music Ensemble, directed by master bouzuky player Kostas Apostolakis.</p>
			<p>I feel that the teaching of drumming, especially when drawing on the oral traditions and the techniques of ancient cultures, offers the students an opening into an entirely new set of tools for their personal expression. Students develop listening skills, respect for their instruments and themselves, and the mental discipline required to master complex Afro-Latin rhythms. They learn how to interact with each other unselfishly and co-operatively. Each gains in self-esteem as they create and perform music on their own instruments. The teachings give students a fuller understanding not only of the music, but of the day-to-day reality of other cultures. By playing the conga drums or the cowbells, for example -by becoming a part of that musical tradition- they learn about and gain an understanding of those cultures.</p>
			<p>My teaching philosophy is grounded in giving students tools for their own creation. These tools open a window to an entirely new world of expression, a world that is both magical and connected to their own reality. They can then explore in the context of their daily life, and create new forms of expression.</p>
			<p><i>- Rodrigo Chavez &ndash;</i></p>
		</div>
		
		<div id="sticky3" class="stickyBlock">
			<h2>SCHOOLS</h2>
			<h1>Rodrigo Chavez / TEACHING PHILOSOPHY</h1>
			<p>Since the year 2000 I have been teaching and conducting workshops of Afro-Latin music and Native music of Central and South America. Before that, I studied classical guitar in Buenos Aires and traveled through Argentina, Cuba, Venezuela, Peru and Bolivia, seeking out masters of the Native and Afro-Latin music to connect these traditions with my own creative vision.</p>
			<p>Currently, I teach for the OAC (Ontario Arts Council) through the Artists in Education Program and I am the Artistic Director of CASSAVA LATIN BAND, composing contemporary Latino-Canadian music, exploring the rich variety of Latin American Rhythms and performing on different stages around Canada and the USA. I also conduct percussion workshops focused on Latin American Music, presenting an ecological approach to sound and environment as part of an educational integrated arts program called &ldquo;Global Rhythms&rdquo;. I present Global Rhythms workshop through different Boards of Education, performing yearly in many schools and universities of Ontario. I constantly take part on a variety of other multi-disciplinary projects, with such companies as &ldquo;Angikam Dance Initiative&rdquo; (a classical Indian Kathak dance troupe), &ldquo;Esmeralda Enriquez&rdquo; (Flamenco Dance Company), recording for Kiran Ahluwalia (Indo-Pakistani Singer) and playing for &ldquo;Mediterraneo&rdquo; (Greek Music Ensemble).</p>
			<p>I feel that the teaching of drumming, especially when drawing on the oral traditions and the techniques of ancient cultures, offers the students an opening into an entirely new set of tools for their personal expression. Students develop listening skills, respect for their instruments and others, and the mental discipline required to master complex Afro-Latin rhythms. They learn how to interact with each other co-operatively. As the students create and perform music on their own instruments, this undoubtedly will promote gains in self &ndash;esteem. The teachings give students a fuller understanding not only of the music, but of the day-to-day reality of other cultures. By playing the conga drums or the cowbells, for example -by becoming a part of that musical tradition- they learn about and gain an understanding of those cultures.</p>
			<p>My teaching philosophy is grounded in giving students tools for their own creation. These tools open a window to an entirely new world of expression, a world that is both magical and connected to their own reality. They can then explore in the context of their daily life, and create new forms of expression.</p>
			<p><i>- Rodrigo Chavez</i></p>
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