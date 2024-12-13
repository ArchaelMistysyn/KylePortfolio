<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'kylep072_6OuKGT';
$DATABASE_PASS = 'n4wt!~@vmq.r';
$DATABASE_NAME = 'kylep072_JeremyMolko';

?>

<!DOCTYPE html>
<html lang="en-US">


  <head>

    <!-- meta -->
    <meta charset="UTF-8" />
    <meta name="description" content="Jeremy Molko" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeremy Molko</title>
    <!-- style -->
    <link rel='stylesheet' id='style-css' href='JMstyle.css?v=<?php echo date('his'); ?>' type='text/css' media='all' />
    <!-- favicon -->
    <link rel="icon" type="img/ico" href="./images/favicon.ico"/>
	<script src="./modernizr-2.6.2.min.js"></script>
  </head>
  
  <body>
	<div id="splashPage">
		<div id="splashImages">
			<div class="splashBox">
				<div id="s1" class="splashImage" onclick='pageChange(1)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
			</div>
			<div class="splashBox">
				<div id="s2" class="splashImage" onclick='pageChange(2)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
			</div>
			<div class="splashBox">	
				<div id="s3" class="splashImage" onclick='pageChange(3)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
			</div>
			<div class="splashBox">	
				<div id="s4" class="splashImage" onclick='pageChange(4)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
			</div>
			<div class="splashBox">	
				<div id="s5" class="splashImage" onclick='pageChange(5)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
			</div>
		</div>
		<div id="splashWord">
			<div class="splashLetter">M</div>
			<div class="splashLetter">O</div>
			<div class="splashLetter">L</div>
			<div class="splashLetter">K</div>
			<div class="splashLetter">O</div>
		</div>
		<div id="splashText">
		DESIGN PORTFOLIO
		</div>
		<div id="splashButton">
			View Gallery
		</div>
	</div>
	
	<div id="hidden">
		<div id="dropContainer">
			<img onclick="menuToggle()" id="dropdown" alt="" src="./images/dropdown.png"/>
		</div>
		<header id="header-container">
			<div id="header">
				<div id="container">
					<div class="shrinkBox">
						<div id="i1" class="headerImage" onclick='pageChange(1,2)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
					</div>
					<div class="shrinkBox">
						<div id="i2" class="headerImage" onclick='pageChange(2,2)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
					</div>
					<div class="shrinkBox">
						<div id="i3" class="headerImage" onclick='pageChange(3,2)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
					</div>
					<div class="shrinkBox">	
						<div id="i4" class="headerImage" onclick='pageChange(4,2)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
					</div>
					<div class="shrinkBox">	
						<div id="i5" class="headerImage" onclick='pageChange(5,2)'><img class="placeholder" alt="" src="./images/headerimg3.png"/></div>
					</div>
				</div>
			</div>
		</header>
		<!--Page 0-->
		<div id="page0" class="page">
		</div>
		
		<!--Page 0 End-->
		
		<!--Page 1-->
		<?php
			// Create connection
			$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
		?>
		<div id="page1" class="page">
			<div id="galleryBlock" onclick="exitModal()">
				<div id="whiteBG">
					<div id="displayDiv">
						 <img id="templateImage" src="data:," style="visibility: hidden;"/>
					</div>
				</div>
			</div>
			<div class="banner">
				<h1>
					G&nbsp;A&nbsp;L&nbsp;L&nbsp;E&nbsp;R&nbsp;Y
				</h1>
			</div>
			<div class="subContainer">
				<div class="subButton">
					<h1 onclick="toggleSub()">
						D&nbsp;E&nbsp;S&nbsp;I&nbsp;G&nbsp;N
					</h1>
				</div>
				<div class="subButton">
					<h1 onclick="toggleSub(1)">
						I&nbsp;L&nbsp;L&nbsp;U&nbsp;S&nbsp;T&nbsp;R&nbsp;A&nbsp;T&nbsp;I&nbsp;O&nbsp;N
					</h1>
				</div>
			</div>
			<div id="design">
				<div class="subBanner">
					<h1>
						D&nbsp;E&nbsp;S&nbsp;I&nbsp;G&nbsp;N
					</h1>
				</div>
				<div class="g-container">
					<?php
						//Check database content.
						$sql="SELECT * FROM JeremyTable WHERE type = 'design'";
						$result = $conn->query($sql);
						$total = $result->num_rows;
						$count=0;
						$pageId=0;
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc())
							{
								$images[$count]=$row['location'];
								
								if($count<4){
									echo '<div id="boxDesign'. $count . '" class="gShrinkBox">' .
									'<img id="imgDesign' . $count . '" onclick="imageModal(this)" alt="" src="' . $row['location'] . '"> . 
									</div>';
								}
								$count++;
							}
						}
					?>
				</div>
				<div id="buttonLeft" class="cycleButton" onclick='cycleImage(<?php echo json_encode($images) . ", " . $count . ", -1, 0"; ?>)'>
				</div>
				<div id="buttonRight" class="cycleButton" onclick='cycleImage(<?php echo json_encode($images) . ", " . $count . ", 1, 0"; ?>)'>
				</div>
				<div id="buttonLeft" class="cycleButton2" onclick='cycleImageMono(<?php echo json_encode($images) . ", " . $count . ", -1, 0"; ?>)'>
				</div>
				<div id="buttonRight" class="cycleButton2" onclick='cycleImageMono(<?php echo json_encode($images) . ", " . $count . ", 1, 0"; ?>)'>
				</div>
			</div>
			<div id="illustration">
				<div class="subBanner">
					<h1 >
						I&nbsp;L&nbsp;L&nbsp;U&nbsp;S&nbsp;T&nbsp;R&nbsp;A&nbsp;T&nbsp;I&nbsp;O&nbsp;N
					</h1>
				</div>
				<div class="g-container">
					
					<?php
						//Check database content.
						$sql="SELECT * FROM JeremyTable WHERE type = 'illus'";
						$result = $conn->query($sql);
						$total = $result->num_rows;
						$count=0;
						$page=0;
						$images=[];
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc())
							{
								$images[$count]=$row['location'];
								
								if($count<4){
									echo '<div id="boxIllus'. $count . '" class="gShrinkBox">' .
									'<img id="imgIllus'. $count . '" onclick="imageModal(this)" alt="" src="' . $row['location'] . '"> . 
									</div>';
								}
								$count++;
							}
						}
					?>
				</div>
				<div id="buttonLeft" class="cycleButton" onclick='cycleImage(<?php echo json_encode($images) . ", " . $count . ", -1, 1"; ?>)'>
				</div>
				<div id="buttonRight" class="cycleButton" onclick='cycleImage(<?php echo json_encode($images) . ", " . $count . ", 1, 1"; ?>)'>
				</div>
				<div id="buttonLeft" class="cycleButton2" onclick='cycleImageMono(<?php echo json_encode($images) . ", " . $count . ", -1, 1"; ?>)'>
				</div>
				<div id="buttonRight" class="cycleButton2" onclick='cycleImageMono(<?php echo json_encode($images) . ", " . $count . ", 1, 1"; ?>)'>
				</div>
			</div>
		</div>
		<!--Page 1 End-->
		
		<!--Page 2-->
		<div id="page2" class="page">
			<div class="banner">
				<h1>
					P&nbsp;R&nbsp;O&nbsp;J&nbsp;E&nbsp;C&nbsp;T&nbsp;S
				</h1>
			</div>
		</div>
		<!--Page 2 End-->
		
		<!--Page 3-->
		<div id="page3" class="page">
			<div class="banner">
				<h1>
					A&nbsp;B&nbsp;O&nbsp;U&nbsp;T&nbsp;&nbsp;&nbsp;M&nbsp;E
				</h1>
			</div>	
			<div id="wrap">
				<div class="wContainer">
					<div id="aboutImage"></div>
				</div>
				<div class="cContainer">
					<p>
						Hello there! I&#x27;m Jeremy and I&#x27;m a graphic designer. 
						I have had a passion for design ever since I was a teenager and have been honing my skills 
						ever since. Much of my design inspiration comes from my hobbies: video 
						games, illustration, trading card games, 
						and reading. Each uses design in unique ways that I continue to learn from.
					</p>
					
					<p>
						My desire to see my ideas and projects shaped and molded over time into a finished project 
						is what motivates me to keep working. Be it on my own or on a team, I always try to solve a 
						problem on my own before asking anyone for help as I believe that any challenge can 
						become a learning opportunity with the right attitude.
					</p>
				</div>
			</div>
		</div>
		<!--Page 3 End-->
		
		<!--Page 4-->
		<div id="page4" class="page">
			<div class="banner">
				<h1>
					G&nbsp;O&nbsp;A&nbsp;L&nbsp;S
				</h1>
			</div>
		</div>
		<!--Page 4 End-->
		
		<!--Page 5-->
		<div id="page5" class="page">
			<div class="banner">
				<h1>
					C&nbsp;O&nbsp;N&nbsp;T&nbsp;A&nbsp;C&nbsp;T
				</h1>
			</div>
			<div class="contact-container">
				<div id="aboutImage"></div>
			</div>
			<div id="contact-wrap">
				<form id="contactForm" method="post" action="contact.php">
					<div class="note center">
						To contact me via email, please fill out your information and type a message
					</div>
					<input type="text" id="name" class="inputArea" name="name" placeholder = "First and Last Name*" required>
					<input type="email" id="email" class="inputArea" name="email" placeholder = "Email Address*" required>
					<textarea id="message" class="inputArea" name="message" placeholder = "Type message here*" required></textarea>
					<div class="note left">*Required</div>
					<button id="sendButton" type="submit">Send</button>
				</form>
			</div>
		</div>
		<!--Page 5 End-->
	</div>
	
	<div id="menuPage" onclick="menuToggle();">
	</div>
	<div id="menuContainer">
		<div id="menuBlock">
		</div>
		<ul id="menu">
			<li id="menu0" onclick='pageChange(0, 1)'>Home</li>
			<li id="menu1" class= "selected" onclick='pageChange(1, true)'>Gallery</li>
			<li id="menu2" onclick='pageChange(2, 1)'>Projects</li>
			<li id="menu3" onclick='pageChange(0, 1)'>About Me</li>
			<li id="menu4" onclick='pageChange(4, 1)'>Goals</li>
			<li id="menu5" onclick='pageChange(5, 1)'>Contact</li>
		</ul>
	</div>
	<script>
		const a = "#2d2d2d";
		const b = "#48bbb8";
		const c = "#a5d7d7";
		const d = "#222629";
		
		var menu=[];
		var page=[];
		var n=0;
		var numPages=0;
		var sPage=document.getElementById('splashPage');
		var hPage=document.getElementById('hidden');
		var menuIcon=document.getElementById('dropContainer');
		var menuPage=document.getElementById('menuPage');
		var menuItems=document.getElementById('menuContainer');
		var currentPage=1;
		var illustration =document.getElementById('illustration');
		var design =document.getElementById('design');
		var galleryBlock=document.getElementById('galleryBlock');
		var displayDiv=document.getElementById('displayDiv');
		var templateImage=document.getElementById('templateImage');
		var currentSpot=0;
		
		
		function cycleImage(images, count, direction, type){
			for(var i=0;i<4;i++){
				var image;
				if(type==0){
					image=document.getElementById('imgDesign' + i);
				} else{
					image=document.getElementById('imgIllus' + i);
				}
				if(direction==1){
					newSpot=currentSpot+i+4;
					if(newSpot>=count){
						newSpot-=count;
					}
					image.src=images[newSpot];
				} else{
					newSpot=currentSpot+i-4;
					if(newSpot<0){
						newSpot+=count;
					}
					image.src=images[newSpot];
					
				}
			}
			currentSpot+=(direction*4);
			if(currentSpot<0){
				currentSpot+=count;
			} else if(currentSpot>=count){
				currentSpot-=count;
			}
		}
		
		function cycleImageMono(images, count, direction, type){
			for(var i=0;i<4;i++){
				var image;
				if(type==0){
					image=document.getElementById('imgDesign' + i);
				} else{
					image=document.getElementById('imgIllus' + i);
				}
				if(direction==1){
					newSpot=currentSpot+i+5;
					if(newSpot>=count){
						newSpot-=count;
					}
					image.src=images[newSpot];
				} else{
					newSpot=currentSpot+i-5;
					if(newSpot<0){
						newSpot+=count;
					}
					image.src=images[newSpot];
				}
			}
			currentSpot+=(direction*5);
			if(currentSpot<0){
				currentSpot+=count;
			} else if(currentSpot>=count){
				currentSpot-=count;
			}
		}
		
		function imageModal(imgLoc){
			displayDiv.style.backgroundImage='url('+imgLoc.src+')';
			templateImage.src=imgLoc.src;
			galleryBlock.style.display="block";
		}
		
		function exitModal(){
			galleryBlock.style.display="none";
		}
		
		function toggleSub(subDisplay=0){
			if(subDisplay==0){
				design.style.display="block";
				illustration.style.display="none";
			} else{
				design.style.display="none";
				illustration.style.display="block";
			}
		}
		
		function pageChange(pageNum, toggle=0){
			setSelected(pageNum);
			if(toggle==0){
				toggleSplash();
			} else if(toggle==1){
				menuToggle();
			}
			displayPage(pageNum);
		}
		
		function menuToggle(){
			if(menuIcon.style.zIndex!=10){
				menuIcon.style.zIndex=10;
				menuPage.style.display="block";
				menuItems.style.display="block";
				document.body.style.overflowY="scroll";
				scrollToggle(true);
			} else{
				menuIcon.style.zIndex=3;
				menuPage.style.display="none";
				menuItems.style.display="none";
				document.body.style.overflowY="auto";
				scrollToggle(false);
			}
		}
		function scrollToggle(disableScroll){
			if(disableScroll){
				window.addEventListener('scroll', noScroll);
			} else {
				window.removeEventListener('scroll', noScroll);
			}
		}
		function setSelected(pageNum){
			menu[currentPage].classList.remove('selected');
			menu[pageNum].classList.add('selected');
		}
		function noScroll(){
			window.scrollTo(0, 0);
		}
		
		function displayPage(pageNum) {
		  for (var i = 0; i < numPages; i++) {
			page[i].style.display = "none";
		  }
		  if(pageNum==0){
			  document.getElementById('splashButton').style.display="none";
			  toggleSplash();
		  }else if (page[pageNum].style.display === "none") {
			page[pageNum].style.display = "block";
		  }
		  currentPage=pageNum;
		}
		
		function toggleSplash(){
			if(sPage.style.display=="none"){
				sPage.style.display="block";
				hPage.style.display="none";	
			} else{
				sPage.style.display="none";
				hPage.style.display="block";
			}
		}
		
		while(numPages==0){
			idLoc = "menu".concat(n);
			if(document.getElementById(idLoc) != null){
				idLoc = "page".concat(n);
				menuLoc = "menu".concat(n);
				menu[n]=document.getElementById(menuLoc);
				page[n]=document.getElementById(idLoc);
			} else{
				numPages=n;
			}
			n++;
		}
		
		displayPage(1);
		document.getElementById("splashButton").addEventListener("click", toggleSplash);
	</script>
  </body>