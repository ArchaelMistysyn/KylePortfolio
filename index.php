<!DOCTYPE html>
<html lang="en-US">
<?php
	session_start();
	require 'db_config.php';
?>

	<head>
		<!-- meta -->
		<meta charset="UTF-8" />
		<meta name="description" content="Kyle Mistysyn Portfolio" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kyle Mistysyn Portfolio</title>
		<!-- style -->
		<link rel="stylesheet" type="text/css" href="Style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

		<!-- favicon -->
		<link rel="icon" type="img/ico" href="./images/favicon.ico">
	</head>
	
		<script>
		
		
		var pMenu=[];
		var pContent=[];
		var pContentNum=0;
		var p=0;
		
		var menu=[];
		var content=[];
		var contentNum=0;
		var n=0;
		
		
		function splashClick(){
			document.getElementById("splashPage").style.display="none";
			document.getElementById("hidden").style.display="flex";
		}
		
		function modeSwap(){
			var splashOptions=document.getElementsByClassName('splashOption');
			var resumeBoxes=document.getElementsByClassName('resumeBox');
			var mainHeaders=document.getElementsByClassName('mainHeader');
			var inputAreas=document.getElementsByClassName('inputArea');
			var i;
			if(modeToggle.classList.contains('dayM')){
				modeToggle.classList.remove('dayM');
				modeToggle.classList.add('nightM');
				modeToggle.innerHTML='Day Mode';
				document.body.style.backgroundColor="black";
				document.getElementById('splashPage').style.background=
				"url(./images/sway1.png) no-repeat top, url(./images/sway4.png) no-repeat bottom, black";
				document.getElementById('splashPage').style.backgroundSize='cover';
				document.getElementById('splashText1').style.color="#376f7c";
				document.getElementById('splashText3').style.color="#376f7c";
				for (i = 0; i < splashOptions.length; i++) {
				  splashOptions[i].style.color="#a5b8f9";
				}
				for (i = 0; i < mainHeaders.length; i++) {
				  mainHeaders[i].style.color="#a5b8f9";
				}
				for (i = 0; i < resumeBoxes.length; i++) {
				  resumeBoxes[i].style.backgroundColor="#a5b8f9";
				}
				for (i = 0; i < inputAreas.length; i++) {
				  inputAreas[i].style.backgroundColor="#141d26";
				  inputAreas[i].style.color="#a5b8f9";
				}
				document.getElementById('phoneText').style.color="#a5b8f9";
				document.getElementById('aboutText').style.backgroundColor="#a5b8f9";
				document.getElementById('aboutHeader').style.color="#a5b8f9";
				document.getElementById('contactHeader').style.color="#a5b8f9";
				document.getElementById('sendButton').style.color="#a5b8f9";
				document.getElementById('sendButton').style.backgroundColor="black";
				document.getElementById('phone-icon').style.backgroundImage="url('./images/phoneIcon2.png')";
				document.getElementById('linkedIn').id='linkedInNight';
				document.getElementById('github').id='githubNight';
				document.getElementById('repl').id='replNight';
				document.getElementById('fiverr').id='fiverrNight';
				document.getElementById('stackoverflow').id='stackoverflowNight';
				setCookie("mode", "night", (365*5));
			} else {
				modeToggle.classList.remove('nightM');
				modeToggle.classList.add('dayM');
				modeToggle.innerHTML='Night Mode';
				document.body.style.backgroundColor="white";
				document.getElementById('aboutHeader').style.color="#black";
				document.getElementById('aboutText').style.backgroundColor="white";
				document.getElementById('splashPage').style.background=
				"url(./images/sway1.png) no-repeat top, url(./images/sway4.png) no-repeat bottom, white";
				document.getElementById('splashPage').style.backgroundSize='cover,cover,cover';
				document.getElementById('splashText1').style.color="black";
				document.getElementById('splashText3').style.color="black";
				for (i = 0; i < splashOptions.length; i++) {
				  splashOptions[i].style.color="black";
				}
				for (i = 0; i < resumeBoxes.length; i++) {
				  resumeBoxes[i].style.backgroundColor="white";
				}
				for (i = 0; i < mainHeaders.length; i++) {
				  mainHeaders[i].style.color="black";
				}
				for (i = 0; i < inputAreas.length; i++) {
				  inputAreas[i].style.backgroundColor="white";
				  inputAreas[i].style.color="#555589";
				}
				document.getElementById('phoneText').style.color="black";
				document.getElementById('contactHeader').style.color="black";
				document.getElementById('sendButton').style.color="#555589";
				document.getElementById('sendButton').style.backgroundColor="white";
				document.getElementById('phone-icon').style.backgroundImage="url('./images/phoneIcon.png')";
				document.getElementById('linkedInNight').id='linkedIn';
				document.getElementById('githubNight').id='github';
				document.getElementById('replNight').id='repl';
				document.getElementById('fiverrNight').id='fiverr';
				document.getElementById('stackoverflowNight').id='stackoverflow';
				setCookie("mode", "day", (365*5));
			}
		}
		
		function setCookie(cname, cvalue, exdays) {
		  var d = new Date();
		  d.setTime(d.getTime() + (exdays*24*60*60*1000));
		  var expires = "expires="+ d.toUTCString();
		  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}
		
		function getCookie(cname) {
		  var name = cname + "=";
		  var ca = document.cookie.split(';');
		  for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
			  c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
			  return c.substring(name.length, c.length);
			}
		  }
		  return "";
		}
		
		function checkCookie() {
		  var mode = getCookie("mode");
		  if (mode == "night") {
			modeSwap();
		  }
		}
		
		function loadModal(webScreenshot1, webScreenshot2, webAbout, webTitle, webLink){
			
			popImg[0].style.backgroundImage="url('" + webScreenshot1 + "')";
			popImg[1].style.backgroundImage="url('" + webScreenshot2 + "')";
			popTitle.innerHTML=webTitle;
			popText.innerHTML=webAbout;
			popLink.innerHTML="<a href='https://www." + webLink + "' target='_blank'>View Site</a>"
			popup.classList.add('fade-in');
			popup.style.display="block";
			popWebDisplay.style.display="block";
		}
		
		function exitModal(){
			popError.style.display="none";
			popWebDisplay.style.display="none";
			popup.style.display="none";
		}
		
		<?php 
			if(!isset($_SESSION['pageLoc'])){?>
				pDisplayContent(0);	
			<?php } else { ?>
				pDisplayContent(<?php $_SESSION['pageLoc'] ?>);
				splashClick();
			<?php } ?>
	</script>
	
	<body>
		<div id="splashPage" onclick="splashClick()" class="fade-in">
			<div id="canada"></div>
			<div id="splashText1" class="splashText">Kyle</div>
			<div id="splashText2" class="splashText">Mistysyn</div>
			<div id="splashText3" class="splashText">Developer Portfolio</div>
			<div id="splashMenu">
				<div class="splashOption" onclick="sDisplayContent(0)">Home</div>
				<div class="splashOption" onclick="sDisplayContent(1)">Resume</div>
				<div class="splashOption" onclick="sDisplayContent(2)">Samples</div>
				<div class="splashOption" onclick="sDisplayContent(3)">About</div>
				<div class="splashOption" onclick="sDisplayContent(4)">Contact</div>
			</div>
		</div>
		<div id="popup">
			<div id="pop-web">
				<div id="p-left">
					<div id="p-img1" class="p-img"></div>
					<div id="p-img2" class="p-img"></div>
				</div>
				<div id="p-exit" onClick="exitModal()"></div>
				<div id="p-right">
					<span id="p-title"></span>
					<p id="p-text"></p>
					<span id="p-link"></span>
				</div>
			</div>
			<div id="pop-err">
				<div id="err-msg">
				</div>
			</div>
		</div>
		<div id="hidden" class="fade-in">
			<div id="header">
				<div id="headerBG">
					<div id="headerText">Resume</div>
					<div id="modeToggle" class="dayM" onclick="modeSwap()">Night Mode</div>
				</div>
					<!--primary menu-->
				
					<div class="p-g-i">
						<h1 id="pMenu0" class="button" onclick="pDisplayContent(0)">Home</h1>
					</div>
					<div class="p-g-i">
						<h1 id="pMenu1" class="button" onclick="pDisplayContent(1)">Resume</h1>
					</div>
					<div class="p-g-i">
						<h1 id="pMenu2" class="button" onclick="pDisplayContent(2)">Samples</h1>
					</div>
					<div class="p-g-i">
						<h1 id="pMenu3" class="button" onclick="pDisplayContent(3)">About</h1>
					</div>
					<div class="p-g-i">
						<h1 id="pMenu4" class="button" onclick="pDisplayContent(4)">Contact</h1>
					</div>
					
			</div>
			<div id="mainBG">
				<div id="pContent0" class="content">
					<div id="mainContain">
						<div class="itemContain">
							<div class="mainHeader">Download Resume</div>
							<div class="mainIMG" id="m-img-1"><a href="./files/KyleMistysynResume.docx" download></a></div>
						</div>
						<div class="itemContain">
							<div class="mainHeader">Programming Diploma</div>
							<div class="mainIMG" id="m-img-2"><a href="./files/SenecaDiploma.png" target="_blank"></a></div>
						</div>
						<div class="itemContain" id="hide3">
							<div class="mainHeader">Night Mode Toggle</div>
							<div class="mainIMG" id="m-img-3" onclick="modeSwap()">Recommended</div>
						</div>
					</div>
				</div>
				<div id="pContent1" class="content">
					<div id="g-c">
						<!--resume submenu-->
						<div class="g-i">
							<h1 id="menu0" class="button" onclick="displayContent(0)">Languages</h1>
						</div>
						<div class="g-i">
							<h1 id="menu1" class="button" onclick="displayContent(1)">Education</h1>
						</div>
						<div class="g-i">
							<h1 id="menu2" class="button" onclick="displayContent(2)">Projects</h1>
						</div>
						<div class="g-i">
							<h1 id="menu3" class="button" onclick="displayContent(3)">Work Exp.</h1>
						</div>
						<div class="g-i">
							<h1 id="menu4" class="button" onclick="displayContent(4)">References</h1>
						</div>
						<div class="g-i" id="display">
							<div id="content0" class="content">
								<div id="boundingBox">
									<div id="menuContainer">
										<ul>
											<li class="dropdown color1" onclick="displayDrop(0)"><h2>HTML</h2></li>
											<li class="drop-content" id="drop0"><h2>HTML - <?php echo date("Y")-2015;?>+ Years</h2>
												I am quite confident with my HTML as I have now made several websites for fun, as projects, or to sell to others. 
												Some websites include a cottege rental website, band website, marketplace website, and bot wiki. 
												All my websites are custom built without the use of templates, wordpress, or other web builders so that I can build things right from the ground up.'
												<div class="demoButton" onclick="pDisplayContent(2)">Samples</div>
											</li>
											<li class="dropdown color2" onclick="displayDrop(1)"><h2>CSS</h2></li>
											<li class="drop-content" id="drop1"><h2>CSS - <?php echo date("Y")-2015;?>+ Years</h2>
												Paired with HTML, I taught myself to use CSS to bring my pages to life with new layers of depth and expression. Let the demo speak for itself, hover below!
												<div class="glow-button">Hover Me</div>
											</li>
											<li class="dropdown color1" onclick="displayDrop(2)"><h2>PHP</h2></li>
											<li class="drop-content" id="drop2"><h2>PHP - 6+ Years</h2>
												Weaving PHP and HTML to create dynamic displays, sending post data, or simply using it to run SQL queries. Check out the contact page where I use a PHPmailer to enable emailing from the website.
												<div class="demoButton" onclick="pDisplayContent(4)">PHP Mailer</div>
											</li>
											<li class="dropdown color2" onclick="displayDrop(3)"><h2>SQL</h2></li>
											<li class="drop-content" id="drop3"><h2>SQL - <?php echo date("Y")-2015;?>+ Years</h2>
												I work extensively with databases using them for everything from storing the samples and archived websites on this portfolio to managing user and item data for bot I run 'Pandora Bot' and it's website: 
												<a href="https://www.pandoraportal.ca" target="_blank">Pandora Portal</a>. 
												<div class="demoButton" onclick="pDisplayContent(2)">Samples</div>
											</li>
											<li class="dropdown color1" onclick="displayDrop(4)"><h2>Python</h2></li>
											<li class="drop-content" id="drop4"><h2>Javascript - 6+ Years</h2>
												This website uses a 'single page design' by leveraging javascript to dynamically change the content and styles as needed allowing for a smooth experience.  
												I use it to accomplish tasks that are difficult or otherwise impossible with just HTML and CSS alone. Click the below button to load the samples page, the javascript way!
												<div class="demoButton" onclick="pDisplayContent(2)">Samples</div>
											</li>
											
											<li class="dropdown color2" onclick="displayDrop(5)"><h2>Python</h2></li>
											<li class="drop-content" id="drop5"><h2>Python - 1+ Years</h2>
												The newest language added to my arsenal, but after building an entire game bot over the course of a year I can comfortably claim proficiency with this language. 
												The code is private, but you can check out the bot's website at: <a href="https://www.pandoraportal.ca" target="_blank">Pandora Portal</a>. 
											</li>
											<li class="dropdown color1" onclick="displayDrop(6)"><h2>C++/Java</h2></li>
											<li class="drop-content" id="drop6"><h2>C++ / Java - 2+ Years</h2>
												While earning my college diploma for computer programming I learned about these languages which also taught me the fundamentals for object-oriented programming. 
												I carried those skills over to other projects like my bot <a href="https://www.pandoraportal.ca" target="_blank">Pandora Portal</a> and was able to improve my user and item systems with an object-oriented approach.
											</li>
											<li class="dropdown color2" onclick="displayDrop(7)"><h2>VB6</h2></li>
											<li class="drop-content" id="drop7"><h2>Visual Basic - 2 Years</h2>
												Everyone has a starting point and for me it was Visual Basic 6. It taught me the fundamentals of programming and started me on this journey. 
												I made projects like Othello in this language and competed in programming competitions using it. 
												I earned a certificate of distinction from the university of waterloo and received a perfect score in a computing competition in 2014.
											</li>
										</ul>
									</div>
									<div class="resumeBox" id="dropDisplay">
										
									</div>
								</div>
							</div>
							<div id="content1" class="content">
								<div id="boundingBox">
									<div id="sideContent" class="hideSide">
									</div>
									<div class="resumeBox">
										<h2>Seneca College - Seneca Computer Programming Diploma</h2>
										I took a two year course on computer programming at Seneca. This taught me a wide array of coding languages and life skills.
										<h2>Riverdale C.I. - Completed High School</h2>
										In high school I completed the French Extended program as well as multiple programming and web development courses.
									</div>
								</div>
							</div>
							<div id="content2" class="content">
								<div id="boundingBox">
									<div id="sideContent" class="hideSide">
									</div>
									<div class="resumeBox" onclick="pDisplayContent(2)">
										<h2>Websites</h2>
										As a developer I am constantly working on programming projects despite my full time job. Most commonly I've worked on websites for my own projects or to sell. 
										I excel as a back-end developer and have begun to team up with artists and designers to create really cool projects. 
										<h2>Discord Bots</h2>
										Recently, as the owner of a 200+ user discord server, I have begun working on discord bots as my new passion projects. 
										I am currently making an entire game that can run on discord as a bot with inventory management, user accounts, combat systems, and crafting systems.
										<div class="demoButton" onclick="pDisplayContent(2)">SAMPLES</div>
									</div>
								</div>
							</div>
							<div id="content3" class="content">
								<div id="boundingBox">
									<div id="sideContent" class="hideSide">
									</div>
									<div class="resumeBox" onclick="window.open('https://store.401games.ca')">
										<h2>401 Games 2017-2020 - Head of JTCG Section</h2>
										
										My role at the best card store in Toronto required me to do online reporting, ordering, researching, training staff, customer service, social media advertising, and 
										also playing around with both the back-end and front-end of the website.
										Additional requirements in this position also included actively keeping up-to-date on prices, determining the winners and losers of each release, deciding when to open or sell stock, and contributing to consistently improving all store sections.
										<h2>Home Depot 2022-Current - Appliance Support Team, Digital Support Specialist</h2>
										My newest role at the Home Depot presents an opportunity for me to use my diverse skillset and resolve major issues in a fast, efficient, and effective manner. 
										I provide feedback for the team on a regular basis, help with QA testing, and intend to pursue future positions that align with my career path.
									</div>
								</div>
							</div>
							<div id="content4" class="content">
								<div id="boundingBox">
									<div id="sideContent" class="hideSide">
									</div>
									<div class="resumeBox">
										<h2>Supriya Kapoor</h2>
										The Home Depot, Appliance Supervisor – (365) - 773 - 4342
										<h2>Cheryl Eadie</h2>
										The Home Depot, Appliance Supervisor – (905) - 330 - 3292
										<h2>Josh Lacasse</h2>
										401 Games, Manager - (647) - 471 - 7984
										<h2>Evan McMahon</h2>
										401 Games, Co-Worker - (647) - 309 - 9792
										<h2>Jeremy Molko</h2>
										401 Games, Co-Worker - (647) - 302 - 9909
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<div id="pContent2" class="content">
					<?php 
						// Create connection
						$conn = new mysqli($sn, $dbu, $dbp, $dbn);
						
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 
						//Check database content.
						$sql="SELECT * FROM websites";
						$result = $conn->query($sql);
						$total = $result->num_rows;
						$count=0;
						
						if ($result->num_rows > 0) {
							echo '<div id="webContain">';
								while($row = $result->fetch_assoc())
								{
									if($pageId==$row['pageNum']){
										$count++;
										if($count==3){
											echo '<div class="displayWebsite" id="hideThird">';
										} else {
											echo '<div class="displayWebsite">';
										}
										echo '<div class="web-img" style="background-image:url(\'' . htmlspecialchars($row['webScreenshot'], ENT_QUOTES) . '\')"></div><div class="web-img-tint"><div class="inner-tint">' . htmlspecialchars($row['webName'], ENT_QUOTES) . '</div></div>';
										echo '<div class="more-info" onClick="loadModal(\'' . htmlspecialchars($row['webScreenshot'], ENT_QUOTES) . '\', \'' . htmlspecialchars($row['webScreenshot2'], ENT_QUOTES) 
											. '\', \'' . htmlspecialchars($row['webAbout'], ENT_QUOTES) . '\', \'' . htmlspecialchars($row['webName'], ENT_QUOTES) . '\', \'' . htmlspecialchars($row['webLink'], ENT_QUOTES) . '\')">More Info</div>';
										echo '<div class="view-site"><a class="webLink" href="https://www.' . htmlspecialchars($row['webLink'], ENT_QUOTES) . '" target="_blank">View Site</a></div>';
										echo '</div>';

									}
								}
							echo '</div>';
						}		
						
						//Close the database.
						$dbh=null;
					?>
				</div>
				<div id="pContent3" class="content">
					<h3 id="aboutHeader">About Me</h3>
					<!--<div id="aboutImgContainer"><div id="aboutImg"></div></div>-->
					<div id="fadeOther">
						<div id="linkedIn" class="fadeButton">
							<a href="https://www.linkedin.com/in/kyle-mistysyn-4790a5bb/" target="_blank"></a>
						</div>
						<div id="github" class="fadeButton">
							<a href="https://github.com/ArchaelMistysyn/PandoraBot" target="_blank"></a>
						</div>
						<div id="repl" class="fadeButton">
							<a href="https://repl.it/@ArchaelKawika" target="_blank"></a>
						</div>
						<div id="fiverr" class="fadeButton">
							<a href="https://www.fiverr.com/archaelmistysyn?up_rollout=true" target="_blank"></a>
						</div>
						<div id="stackoverflow" class="fadeButton">
							<a href="https://stackoverflow.com/users/4288381/archael?tab=profile" target="_blank"></a>
						</div>
					</div>
					<div id="aboutText"><p>Hi! I'm Kyle Kawika Mistysyn and I am a web developer. I make all my websites from scratch
					and have a couple of passion projects on the go at any given time. I've been coding in different languages since I 
					was a child and it is molded me into the person I am today.</p><p>I have worked many different jobs and met many different people
					which has developed my ability to understand, collaberate, and assist those I work with. I'm always looking for new artists and designers with whom I can 
					create amazing projects.</p></div>
				</div>
				<div id="pContent4" class="content">
					<div>
						<h3 id="contactHeader">Contact Me</h3>
						<div id="phone-txt">
							<div id="phone-icon"></div>
							<div id="phoneText">647-746-8413</div>
						</div>
					</div>
					<form id="contactForm" method="post" action="contact.php">
						<div id="mail-txt">
							<div id="mail-icon"></div>
							<div id="mailText">E-Mail: Archael&commat;hotmail.ca</div>
						</div>
						<div id= "f-contact">
							<div class="f-c-i">
								<input type="email" id="email" class="inputArea" name="email" placeholder = "Email Address*" required>
							</div>
							<div class="f-c-i">
								<input type="text" id="name" class="inputArea" name="name" placeholder = "Name*" required>
							</div>
							<div class="f-c-i">
								<input type="text" id="subject" class="inputArea" name="subject" placeholder = "Subject*" required>
							</div>
						</div>
						<textarea id="message" class="inputArea" name="message" placeholder = "Message*" required></textarea>
						<button id="sendButton" type="submit">Send Message</button>
					</form>
				</div>
				
			</div>
		</div>
	</body>
	<script>
		var modeToggle=document.getElementById('modeToggle');
		var popup = document.getElementById('popup');
		var popImg = [document.getElementById('p-img1'), document.getElementById('p-img2')];
		var popTitle = document.getElementById('p-title');
		var popLink = document.getElementById('p-link');
		var popText = document.getElementById('p-text');
		var popWebDisplay= document.getElementById('pop-web');
		var popError=document.getElementById('pop-err');
		var errMsg= document.getElementById('err-msg');
		
		var dropDisplay = document.getElementById('dropDisplay');
		
		var hText = document.getElementById('headerText');
		
		while(contentNum==0){
			idLoc = "menu".concat(n);
			if(document.getElementById(idLoc) != null){
				idLoc = "content".concat(n);
				menuLoc = "menu".concat(n);
				menu[n]=document.getElementById(menuLoc);
				content[n]=document.getElementById(idLoc);
				content[n].style.display="none";
			} else{
				contentNum=n;
			}
			n++;
		}
		
		while(pContentNum==0){
			idLoc = "pMenu".concat(p);
			if(document.getElementById(idLoc) != null){
				idLoc = "pContent".concat(p);
				menuLoc = "pMenu".concat(p);
				pMenu[p]=document.getElementById(menuLoc);
				pContent[p]=document.getElementById(idLoc);
				pContent[p].style.display="none";
			} else{
				pContentNum=p;
			}
			p++;
		}
		
		function displayDrop(loc){
			locContent=document.getElementById('drop' + loc);
			dropDisplay.innerHTML= locContent.innerHTML;
		}
		
		function displayContent(displayItem) {
		  for (var i = 0; i < contentNum; i++) {
			content[i].style.display = "none";
			menu[i].classList.remove("selected");
		  }
		  
		  if (content[displayItem].style.display === "none") {
			content[displayItem].style.display = "inline-block";
			menu[displayItem].classList.add("selected");
		  }
		}
		
		function pDisplayContent(displayItem) {
		  for (var i = 0; i < pContentNum; i++) {
			pContent[i].style.display = "none";
			pMenu[i].classList.remove("activePage");
		  }
		  
		  if (pContent[displayItem].style.display === "none") {
			pContent[displayItem].style.display = "inline-block";
			pMenu[displayItem].classList.add("activePage");
			hText.innerHTML = pMenu[displayItem].innerHTML;
		  }
		}
		
		function sDisplayContent(displayItem){
			pDisplayContent(displayItem);
			splashClick();
		}
		
		displayDrop(0);
		displayContent(0);
		checkCookie();
		
	</script>
</html>