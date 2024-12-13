<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<?php
	$pageId=2;
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
			<a href="about.php" id="current">About</a>
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
	<div id="central" class="hidePad">
		<div id="sticky1" class="stickyBlock">
			<h1>About Us</h1>
			<p>Cassava is a Latin Band based in Toronto, CANADA that performs music with styles and rhythms from all over Latin America. Our music reflects the colour and flavour of traditional as well as contemporary Latin music. This band specializes in various styles such as Salsa, Bolero and Cha-cha from CUBA; Bossa Nova and Samba from BRAZIL; Cumbia from COLOMBIA; Merengue and Bachata from Dominican Republic. For special events, CASSAVA has an English repertoire and contemporary Latin-Jazz. We also performs our own original vibrant compositions.</p>
			<p>Cassava's performances are colourful and suitable for festivals, clubs and special events. We involve total audience participation and never fail to keep the crowd moving to authentic Latin rhythms: WE MAKE THE WHOLE AUDIENCE PARTICIPATE AND FEEL LIKE PART OF THE SHOW !</p>
			<p>This band has participated in the opening ceremony for the 2015 PANAM GAMES. Since 1997 Cassava has been performing at various festivals such as Dundas Square, Canadian National Exhibition, Sant&eacute;, Ritmo y Color Latin Festival, Northern Lights Festival in Sudbury, Niagara Falls, Barrie's Kempenfest, Hamilton &amp; Oakville Jazz Festivals, Taste of The Danforth, Toronto Street Festival and many more. In 2006 CASSAVA took part in Ritmo Latino, a series of Latin music concerts at Harbourfront. In 2007, we made a successful tour through the Maritimes performing in major theatres, such as the Capitol in Moncton and The Imperial Theatre in Saint John. Also, Cassava has maintained regular engagements at clubs and restaurants; restaurants such as Havana Nights, Louisiana and The Red Violin, in addition to a busy schedule of private functions and festivals throughout Canada.</p>
			<p>Parallel to performances, Cassava holds frequent Rhythm &amp; Dance workshops for elementary and high schools in Ontario. In these events, the musicians also explain the variety of rhythms integral to the music they perform. --We are always pleased to give the audience the opportunity to learn more about Latin music and culture, to show the differences between the various styles.</p>
			<p>Throughout the years, we have held many concerts and cultural celebrations for Latin American and Canadian audiences in Ontario, Quebec and the Maritimes.</p>
			<p>The band to date has produced two CDs, "Encuentros" (Encounters) and &ldquo;Color de Rumba&rdquo; (Colour of Rumba). This last CD has a selection of original compositions by Rodrigo Chavez and Fredy Suarez broadcasted by CBC in English and French. &ndash;Enjoy listening to Cassava!!</p>
		</div>
		
		<div id="sticky3" class="stickyBlock">
			<div id="bandImage">
			</div>
			<h1>BAND MEMBERS</h1>
			<p>Adis Rodriguez, singer</p>
			<p>Alexander Brown, trumpet</p>
			<p>David Labrada, piano</p>
			<p>Juan Pablo Dominguez, bass</p>
			<p>Amhed Mitchel, timbales</p>
			<p>Rodrigo Chavez, congas.</p>
		</div>
		
		<div id="sticky2" class="stickyBlock">
			<h1>RELEVANT PERFORMANCES</h1>
			<p>CP 24 TV Channel, Playing for Sunwing Tourism, Toronto JANUARY 2020</p>
			<p>THE MUSEUM, New Year&rsquo;s Eve Celebration, Kitchener, ON DECEMBER 2019</p>
			<p>GLOW FRESH Restaurant, Fridays at Shops at Don Mills, TORONTO 2019 PANAM GAMES 2015 Closing Ceremony, Nathan Phillips Square, Toronto JULY 24, 2015</p>
			<p>PANAM GAMES CELEBRATION, at Oshawa Civic Centre, JULY 10, 2015l</p>
			<p>LUMINATO FESTIVAL, Harbourfront, Toronto JUNE 20 &amp; 21, 2015</p>
			<p>Guelph Multicultural Festival, Victoria Park, Guelph, JUNE 5, 2015</p>
			<p>Nuance Choir of Whitby, Spring Concert, St. Mathews united Church, Whitby, April 13, 2015</p>
			<p>Latin American Arts Festival, Mel Lastman Square &ndash; Toronto JULY 12, 2014</p>
			<p>Guelph Multicultural Festival, JUNE 6, 2014</p>
			<p>Cuban Tourism Board at Zasafraz Restaurant, Yorkville Toronto, MARCH 2014</p>
			<p>Cuban artists Gala at Royal York Hotel, Toronto DEC 15, 2013</p>
			<p>The Centre for Dreams Foundation Charity event, Paradise Banquet Hall, Toronto NOV 23 2013</p>
			<p>Hamilton Philharmonic Youth Orchestra, Latin Rhythms event, OCT 2013</p>
			<p>Canada Day Celebrations, JULY 1st, 2013</p>
			<p>Salsa in Blue Mountain, Festival June 2013</p>
			<p>Canada Labour Day Parade, Toronto SEP 2013</p>
			<p>Burlington Community Foundation Charity Event, OCT 2012</p>
			<p>Concert for The Royal Yacht Club of Hamilton, NOV 2012</p>
			<p>New Year&rsquo;s Eve Show for the Italian Community in Woodbridge, ON &ndash; DEC 31st, 2011</p>
			<p>Bank Of Nova Scotia, Spring Concert &ndash;Scotia Plaza, APR 26, 2011-Toronto</p>
			<p>CNE (Canadian National Exhibition) AUG 20-SEP 6, 2010 -Toronto</p>
			<p>Caliente Hispanic Festival July 2010 - London</p>
			<p>AGO (Art Gallery of Ontario) July 2010 &ndash;Toronto</p>
			<p>CANADA DAY, July 1st 2010 - Kleinburg</p>
			<p>Bank of Nova Scotia XMAS Concert, Westin Harbour Castle, Nov. 28 2009 -Toronto</p>
			<p>UNICEF International, Toronto Concert, August 22 2009 -Toronto</p>
			<p>Dundas Square Concert, Toronto, September 4 2009 &ndash; Toronto</p>
			<p>Canada Day Celebrations, July 1st 2009 - Kleinburg</p>
			<p>International Salsa Congress, Palais Royal Banquet Hall, April 30 2009 -Toronto</p>
			<p>Station Gallery &ndash;Eco-Show, March 28 2009 -Whitby</p>
			<p>North York Public Library &ndash;Concert, March 21 2009 -Toronto</p>
			<p>Intrepid Travel Canada&rsquo;s Branch, Opening Show, Oct. 4th, 2008 &ndash;Toronto</p>
			<p>Shoppers Drugmart Anniversary Celebration, Sep. 14th, 2008 -Toronto</p>
			<p>Toronto Labour Day Parade, for CEP, September 1st, 2008 &ndash; Toronto</p>
			<p>Langdon Hall Country Hotel &amp; Spa, August 30, 2008 - Cambridge ON Richmond Green Park Festival, August 10, 2008 - Richmond Hill, ON</p>
			<p>CAMMAC Music Centre, July 20-August 3, 2008 &ndash;Lake MacDonald, Quebec</p>
			<p>C-Lounge -Corporate Event for ROGERS COMMUNICATIONS, August 7, 2008 &ndash; Toronto</p>
			<p>Community Nursing Home Anniversary, July 19, 2008 &ndash; Port Hope</p>
			<p>EDGO Conference, Peel Board of education, March 2008 - Toronto</p>
			<p>The Honest Lawyer, Restaurant-Launge, February 2008 - Hamilton</p>
			<p>ESPIRITU! -Concert with Cantores Celestes Choir, Broadcasted by CBC , DEC 1, 2007 - Toronto</p>
			<p>Ondes Africaines, CONGO Festival, Dundas Square &ndash; September 9, 2007 - Toronto</p>
			<p>INDULGE Festival &ndash;Metro Square Stage July 19, 2007 &ndash; Toronto</p>
			<p>Aurora Jazz Festival &ndash; Town Park, July 11, 2007 - Aurora</p>
			<p>Sounds of Music Festival &ndash;June 7, 2007 -Burlingtom</p>
			<p>Four Seasons Centre for the Performing Arts, February 25, 2007 - Toronto</p>
			<p>New Year&rsquo;s Eve celebrations &ndash; Harbourfront, Ontario 2006 / 2007 - Toronto</p>
			<p>Mariposa Folk Festival &ndash; July 9, 2006 - Ontario</p>
			<p>Ondes Africaines, CONGO Festival, Dundas Square - August 13th, 2005 - Toronto</p>
			<p>Kleinburg Arts Festival, July 2005 - Kleinburg</p>
			<p>BATA Museum Anniversary Celebration, June 12th, 2005 - Toronto</p>
			<p>SANTE Wine Festival, Harry Rosen, Yorkville, May 14th 2005 - Toronto</p>
			<p>CBC Christmas Concert at Glen Gould Studio, December 3rd. 2004- Toronto</p>
			<p>Toronto Music Camp Concert, November 9th 2004 &ndash; Toronto</p>
			<p>Potatoes Blue&rsquo;s, Latin Jazz recital, October 16th 2004 - Toronto</p>
			<p>Oakville Jazz Festival, August 7th., 2004 - Oakville</p>
			<p>Downtown Oakville Midnight Madnes Festival, July 16th, 2004 - Oakville</p>
			<p>Global Caf&eacute; World Music Fest, Destillery District, July 7th, 2004 - Toronto</p>
			<p>Stan Rogers Folk Festival, June 30th - July 4th, 2004 Halifax - Nova Scotia</p>
			<p>Guelph Multicultural Festival, June 19th, 2004 - Guelph</p>
			<p>Niagara Simphony Workshops Tour, June 1st- 4th - Niagara</p>
			<p>Milk International Children Festival, May 25th, Harbourfront - Toronto</p>
			<p>CD RELEASE CONCERT &ldquo;Encuentros&rdquo;, The Red Violin, May 22, 2004 - Toronto</p>
			<p>Bell Arte Choir &ldquo;Spirit Matters&rdquo; Concert with CASSAVA, May 10, 2004 - Toronto</p>
			<p>Roy Thompson Hall, Council of Fundations Concert, April 26, 2004 - Toronto</p>
			<p>New Louisiana, 6405 Erin Mills Parkway, Mississauga, Fridays, from October 2003</p>
			<p>The Red Violin, 45 Danforth Ave., Oct./03 &ndash; Feb. 2004 - Toronto</p>
			<p>Voices of The Earth Concert with Bell Arte Choir&rdquo;, October 18th, 2003 - Toronto</p>
			<p>Labour Day Parade Celebrations, Sep 1st, 2003, City Hall - Toronto</p>
			<p>Sounds of the City Festival, August 13, 2003 - Toronto</p>
			<p>Tastes of the Danforth Festival, August 4, 2003 - Toronto</p>
			<p>Summer in the Park Fest, July 29, 2003 - Toronto</p>
			<p>Woodbridge Italian Festival, July 4, 2003 - Toronto</p>
			<p>Worlds&rsquo;s Fare Immerssions, Harbourfront July 9-13, 2003 - Toronto</p>
			<p>Toronto Street Festival, July 5, 2003 &ndash; Toronto</p>
			<p>Sounds Of the Danforth Festival, June 14 &amp; 15, 2003 - Toronto</p>
			<p>Muhtady Drum Festival, Queen&rsquo;s Park, June 8, 2003 - Toronto</p>
			<p>Nastional Ballet of Canada, Royal York Hotel Show, Feb, 28 2003 - Toronto</p>
			<p>International Children&rsquo;s Milk Festival, Harbourfront, May 18, 2003 - Toronto</p>
			<p>Misa Criolla Concert with Vocal Ensemble &ldquo;North 44&rdquo;, May 25, 2003 - Toronto</p>
			<p>Worlds of Music Canada, Concert, U of T, March 6, 2003 - Toronto</p>
			<p>African Month Celebrations Concert, U of T, Feb. 6, 2003 &ndash; Toronto</p>
			<p>Maritimes Tour, by talntic Presenters, Concerts, Jan 29-Feb 2nd - Nova Scotia &amp; New Brunswick</p>
			<p>Savoy Theatre - Glace Bay, Capitol Theatre &ndash; Moncton and Imperial Theatre -Saint John</p>
			<p>New Year&rsquo;s Event Celebrations at LOUISIANA, Dec. 31st 2002 - Toronto</p>
			<p>Concert for PUEBLITO Children&rsquo;s Org. at Lula Lounge, Nov. 2002 - Toronto</p>
			<p>TV Show HISPANOS EN CANADA, TELELATINO, Ritz Hotel, Oct. 2002 - Toronto</p>
			<p>Concert with Boban Markovich Gypsy Band, Opera House, Oct. 2002 - Toronto</p>
			<p>Bell Canadian Open, Golf Finals, Sep. 3, 2002 - Toronto</p>
			<p>Tastes of the Danforth Street Festival, Aug. 10, 2001 - Toronto</p>
			<p>Sounds of the Danforth Festival, June 16, 2001 - Toronto</p>
			<p>Festival Africaine, City Hall, May 25, 2002 - Toronto</p>
			<p>Down Town Fiesta, Saint Catharines, May 18, 2002 - Niagara</p>
			<p>Concert at Ambassador Ball, Ramada Inn, May 17, 2002 - Niagara</p>
			<p>Concert at Caruso Centre, Apr. 12, 2002 - Sudbury</p>
			<p>Cuban Fire, Jazz Concert at Harbourfront, Jan. 2002 - Toronto</p>
			<p>New Year&rsquo;s Event Celebrations at CIADO, Dec. 31st 2001 - Toronto</p>
			<p>CONTACT SHOWCASE, Toronto Centre for the Arts, Nov. 2001 - Toronto</p>
			<p>Tastes of the Danforth Festival, Aug. 2001 - Toronto</p>
			<p>Sounds of the Danforth Festival, May &amp; June 2001 &ndash; Toronto</p>
			<p>CONTACT, Photo Festival, Harbourfront, May 2001 - Toronto</p>
			<p>INTERVISUAL Web Design Event, Apr. 2001 - Toronto</p>
			<p>Jewish Museum of Communications, Mar. 2001 - Toronto</p>
			<p>Roy Thompson Hall, International Marketing Awards, Mar. 2001 - Toronto</p>
			<p>OISE Music Conference for Ontario Teachers, Jan. 2001 - Toronto</p>
			<p>Premier Dance Theatre, Esmeralda Enriques Flamenco, Jan. 2001 - Toronto</p>
			<p>Festival of Lights, New Year Samba Carnival, Dec. 2000 - Toronto</p>
			<p>Bell Arte Singers, Choir Season Concert, Nov. 2000 - Toronto</p>
			<p>Theatre Direct, Fundraising Concert, CN Tower, Nov. 2000 - Toronto</p>
			<p>Durham District Board of Education, Annual Concert, Oct. 2000 - Toronto</p>
			<p>The Government, International Genetics Conference, Sep. 2000 - Toronto</p>
			<p>With Esmeralda Enrique Flamenco Dance Co. Buffalo, Sep. 2000 - U.S.A.</p>
			<p>Ritmo Latino, Concert Series, Harbourfront, Aug. 2000 - Toronto</p>
			<p>Tastes of The Danforth Greek Fest, August 2000 - Toronto</p>
			<p>Canada Day Celebrations, Monarch Park, July 2000 - Toronto</p>
			<p>Special Concert, Rogers Cable TV, Channel 10, June 2000 - Ontario</p>
			<p>Sounds of The Danforth International Festival 2000 - Toronto</p>
			<p>Tennis: Canadian Opening, International Tournament 1999 - Toronto</p>
			<p>Global Roots Dance &amp; Music Festival 1999 - Toronto</p>
			<p>Tastes of The Danforth Greek Fest 1999 - Toronto</p>
			<p>Kempenfest International Festival, Barrie1999 - Ontario</p>
			<p>Canada Day Celebrations, Street Festival 1999 - Toronto</p>
			<p>Rhythms of the World, Workshops, Harbourfront 1999 - Toronto</p>
			<p>Seoul &amp; Tegu Cities, various pefromances 1999 &ndash; S. Korea</p>
			<p>Ritmo y Color Latin Fest, Harbourfront 1999 - Toronto</p>
			<p>Ritmo y Color Latin Fest, Harbourfront 1998 - Toronto</p>
			<p>Seoul &amp; Tegu Cities, various pefromances 1998 - S. Korea</p>
			<p>Black History Month Celebration 1998 - Toronto</p>
			<p>Northern Lights Folk Festival 1998 - Sudbury</p>
			<p>Jazz Festival - Kitchener 1998 - Waterloo</p>
			<p>CBC Radio &amp; TV 1998 - 1997 - Canada</p>
			<p>Cultures Canada Summer Festival 1997 -Ottawa</p>
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
						echo '<p><span class="header">' . $row['header'] . '</span><br>' . $row['content'];
						
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