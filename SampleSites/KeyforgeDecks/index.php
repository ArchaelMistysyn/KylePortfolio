<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'kylep072_DMFci3';
$DATABASE_PASS = '$LraV_3T^28q';
$DATABASE_NAME = 'kylep072_phplogin';
// Try and connect using the info above.
$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}


if(isset($_SESSION['errMsg'])){
	$errorMessage=$_SESSION['errMsg'];
} else {
	$errorMessage="";
}

/* filter code */
$filter="";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$filter="SELECT * FROM decks";
	
	/* sealed check */
	
	if(isset($_POST['filterSealed']) && $_POST['filterSealed'] != "either"){
		$filter.= " WHERE sealed = '" . $_POST['filterSealed'] . "'";
	} else {
		//begin where clause to avoid further if checks.
		$filter .= " WHERE sealed <> 'e'";
	}
	
	/* house checks */
	
	if(isset($_POST['checkShadows']) && $_POST['checkShadows']=="shadows" ){
		$filter.= " AND (houseOne = 'shadows' OR houseTwo = 'shadows' OR houseThree = 'shadows')";
	}
	
	if(isset($_POST['checkSanctum']) && $_POST['checkSanctum']=="sanctum" ){
		$filter.= " AND (houseOne = 'sanctum' OR houseTwo = 'sanctum' OR houseThree = 'sanctum')";
	}
	
	if(isset($_POST['checkBrobnar']) && $_POST['checkBrobnar']=="brobnar" ){
		$filter.= " AND (houseOne = 'brobnar' OR houseTwo = 'brobnar' OR houseThree = 'brobnar')";
	}
	
	if(isset($_POST['checkDis']) && $_POST['checkDis']=="dis" ){
		$filter.= " AND (houseOne = 'dis' OR houseTwo = 'dis' OR houseThree = 'dis')";
	}
	
	if(isset($_POST['checkUntamed']) && $_POST['checkUntamed']=="untamed" ){
		$filter.= " AND (houseOne = 'untamed' OR houseTwo = 'untamed' OR houseThree = 'untamed')";
	}
	
	if(isset($_POST['checkLogos']) && $_POST['checkLogos']=="logos" ){
		$filter.= " AND (houseOne = 'logos' OR houseTwo = 'logos' OR houseThree = 'logos')";
	}
	
	if(isset($_POST['checkMars']) && $_POST['checkMars']=="mars" ){
		$filter.= " AND (houseOne = 'mars' OR houseTwo = 'mars' OR houseThree = 'mars')";
	}
	
	if(isset($_POST['checkStarAlliance']) && $_POST['checkStarAlliance']=="starAlliance" ){
		$filter.= " AND (houseOne = 'starAlliance' OR houseTwo = 'starAlliance' OR houseThree = 'starAlliance')";
	}
	
	if(isset($_POST['checkSaurian']) && $_POST['checkSaurian']=="saurian" ){
		$filter.= " AND (houseOne = 'saurian' OR houseTwo = 'saurian' OR houseThree = 'saurian')";
	}
	
	/* not house checks */
	
	if(isset($_POST['checkNShadows']) && $_POST['checkNShadows']=="shadows" ){
		$filter.= " AND houseOne <> 'shadows' AND houseTwo <> 'shadows' AND houseThree <> 'shadows'";
	}
	
	if(isset($_POST['checkNSanctum']) && $_POST['checkNSanctum']=="sanctum" ){
		$filter.= " AND houseOne <> 'sanctum' AND houseTwo <> 'sanctum' AND houseThree <> 'sanctum'";
	}
	
	if(isset($_POST['checkNBrobnar']) && $_POST['checkNBrobnar']=="brobnar" ){
		$filter.= " AND houseOne <> 'brobnar' AND houseTwo <> 'brobnar' AND houseThree <> 'brobnar'";
	}
	
	if(isset($_POST['checkNDis']) && $_POST['checkNDis']=="dis" ){
		$filter.= " AND houseOne <> 'dis' AND houseTwo <> 'dis' AND houseThree <> 'dis'";
	}
	
	if(isset($_POST['checkNUntamed']) && $_POST['checkNUntamed']=="untamed" ){
		$filter.= " AND houseOne <> 'untamed' AND houseTwo <> 'untamed' AND houseThree <> 'untamed'";
	}
	
	if(isset($_POST['checkNLogos']) && $_POST['checkNLogos']=="logos" ){
		$filter.= " AND houseOne <> 'logos' AND houseTwo <> 'logos' AND houseThree <> 'logos'";
	}
	
	if(isset($_POST['checkNMars']) && $_POST['checkNMars']=="mars" ){
		$filter.= " AND houseOne <> 'mars' AND houseTwo <> 'mars' AND houseThree <> 'mars'";
	}
	
	if(isset($_POST['checkNStarAlliance']) && $_POST['checkNStarAlliance']=="starAlliance" ){
		$filter.= " AND houseOne <> 'starAlliance' AND houseTwo <> 'starAlliance' AND houseThree <> 'starAlliance'";
	}
	
	if(isset($_POST['checkNSaurian']) && $_POST['checkNSaurian']=="saurian" ){
		$filter.= " AND houseOne <> 'saurian' AND houseTwo <> 'saurian' AND houseThree <> 'saurian'";
	}
	
	if(isset($_POST['filterKeyword']) && $_POST['filterKeyword']!="None"){
		$filter.= " AND LOWER(description) LIKE LOWER('%" . $_POST['filterKeyword'] . "%')";
	}
	if(isset($_POST['filterSet']) && $_POST['filterSet']!="0"){
		$filter.= " AND setNum =" . $_POST['filterSet'];
	}
	
	if(isset($_POST['filterPriced']) && $_POST['filterPriced']!="0"){
		if($_POST['filterPriced']=="1"){
			$filter.= " AND LOWER(price) <> LOWER('OFFER')";
		} else{
			$filter.= " AND LOWER(price) = LOWER('OFFER')";
		} 
	}
	
	if(isset($_POST['filterChains']) && $_POST['filterChains']!="0"){
		if($_POST['filterChains']=="1"){
			$filter.= " AND chains <> '0'";
		} else{
			$filter.= " AND chains = '0'";
		} 
	}
	
	if(isset($_POST['filterUser']) && $_POST['filterUser']!="0"){
		$filter.= " AND user = '" . $_POST['filterUser'] . "'";
	}
	
	if(isset($_POST['filterSort'])){		
		switch($_POST['filterSort']){
			case 0:
				$filter.= " ORDER BY price ASC, deckName ASC";
				break;
			case 1:
				$filter.= " ORDER BY price DESC, deckName ASC";
				break;
			case 2:
				$filter.= " ORDER BY chains ASC, deckName ASC";
				break;
			case 3:
				$filter.= " ORDER BY chains DESC, deckName ASC";
				break;
		}
	} else {
		$filter.= " ORDER BY price ASC, deckName ASC";
	}
	
	
}

?>

<!DOCTYPE html>
<html lang="en-US">


  <head>

    <!-- meta -->
    <meta charset="UTF-8" />
    <meta name="description" content="Keyforge Shoppe" />
    <title>Keyforge Shoppe</title>
    <!-- style -->
    <link rel='stylesheet' id='style-css' href='KFstyle.css?v=<?php echo date('his'); ?>' type='text/css' media='all' />
    <!-- favicon -->
    <link rel="icon" type="img/ico" href="../images/favicon.ico"/>
    <script type="text/javscript" src="../modernizr-2.6.2.min.js"></script>
	  
  </head>

  <body>
	
    <div id="main">
      <!-- Start of Menu -->
      <div id="header">
		<img src="../images/headerImage.jpg" alt="Keyforge Shoppe" id="headerImage"/>
        <ul id="menu">
          <li><a class="menuLink" id="menu0" onclick="displayPage(0)" href="#">Home</a></li>
          <li><a class="menuLink" id="menu1" onclick="displayPage(1)" href="#">Decks</a></li>
          <li><a class="menuLink" id="menu2" onclick="displayPage(2)"href="#">Contact</a></li>
          <li><a class="menuLink" id="menu3" onclick="displayPage(3)" href="#">Requests</a></li>
		  <li><a class="menuLink" id="menu4" onclick="displayPage(4)"href="#">
		  <?php if (isset($_SESSION['loggedIn'])) { ?>
			Profile
		  <?php } else { ?>
			Login
		  <?php } ?>
		  </a></li>
		  
		  <?php if(isset($_SESSION['loggedIn'])){ ?>
		  <li><a class="menuLink" id="menu5" rel="external" href="logout.php">Logout</a></li>
		  <?php } ?>
        </ul>
      </div>
      <!-- End of Menu -->
	  
	  <!-- Error Display -->
	<?php if(isset($_SESSION['errMsg'])){
			if($_SESSION['errMsg']!==""){?>
				<div id="errorDisplay">
					<p id="msg2"><?php echo $_SESSION['errMsg'];?></p>
					<button type="button" id="error-return" onclick="popToggle(null, 'errorDisplay', 'loginButton', 'registerButton'); popToggle(null, null, 'importButton', null);"class="return">Return</button>
				</div>
	<?php
			}
		} 
		$_SESSION['errMsg']="";
		?>
	
      <!--Page 0 -->
      <div id="page0">
	  <!-- Banner -->
		&copy; 2019 Kyle Mistysyn
	  </div>
	  
      <!--Page 0 End-->

      <!--Page 1-->
      <div id="page1">
	   <!-- Add deck if logged in -->
       <!-- Search Decks -->
	   <button type="button"  class="show" id="filter-button" onclick="popToggle(null, null, 'fMenu', 'filterButton')">Filter</button>
	   <div class="popup">
		   <form id="fMenu" class="fMenu" action="index.php" method="post">
			<ul class="checkMenu">
				<li>
					<input type="checkbox" id="checkShadows" name="checkShadows" value="shadows"/>
					<label for="checkShadows"><img class="checkLabel" src="../images/shadows.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkSanctum" name="checkSanctum" value="sanctum"/>
					<label for="checkSanctum"><img class="checkLabel" src="../images/sanctum.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkMars" name="checkMars" value="mars"/>
					<label for="checkMars"><img class="checkLabel" src="../images/mars.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkDis" name="checkDis" value="dis"/>
					<label for="checkDis"><img class="checkLabel" src="../images/dis.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkBrobnar" name="checkBrobnar" value="brobnar"/>
					<label for="checkBrobnar"><img class="checkLabel" src="../images/brobnar.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkUntamed" name="checkUntamed" value="untamed"/>
					<label for="checkUntamed"><img class="checkLabel" src="../images/untamed.png" /></label>
				</li>
					
				<li>
					<input type="checkbox" id="checkLogos" name="checkLogos" value="logos"/>
					<label for="checkLogos"><img class="checkLabel" src="../images/logos.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkSaurian" name="checkSaurian" value="saurian"/>
					<label for="checkSaurian"><img class="checkLabel" src="../images/saurian.png" /></label>
				</li>

				<li>
					<input type="checkbox" id="checkStarAlliance" name="checkStarAlliance" value="starAlliance"/>				
					<label for="checkStarAlliance"><img class="checkLabel" src="../images/starAlliance.png" /></label>
				</li>
				
			 </ul>
			<ul class="checkMenu">
				<li>
					<input type="checkbox" id="checkNShadows" name="checkNShadows" value="shadows"/>
					<label class="notItem"for="checkNShadows"><img class="checkLabel" src="../images/shadows.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkNSanctum" name="checkNSanctum" value="sanctum"/>
					<label class="notItem"for="checkNSanctum"><img class="checkLabel" src="../images/sanctum.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkNMars" name="checkNMars" value="mars"/>
					<label class="notItem"for="checkNMars"><img class="checkLabel" src="../images/mars.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkNDis" name="checkNDis" value="dis"/>
					<label class="notItem"for="checkNDis"><img class="checkLabel" src="../images/dis.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkNBrobnar" name="checkNBrobnar" value="brobnar"/>
					<label class="notItem"for="checkNBrobnar"><img class="checkLabel" src="../images/brobnar.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkNUntamed" name="checkNUntamed" value="untamed"/>
					<label class="notItem" for="checkNUntamed"><img class="checkLabel" src="../images/untamed.png" /></label>
				</li>
					
				<li>
					<input type="checkbox" id="checkNLogos" name="checkNLogos" value="logos"/>
					<label class="notItem" for="checkNLogos"><img class="checkLabel" src="../images/logos.png" /></label>
				</li>
				
				<li>
					<input type="checkbox" id="checkNSaurian" name="checkNSaurian" value="saurian"/>
					<label class="notItem"for="checkNSaurian"><img class="checkLabel" src="../images/saurian.png" /></label>
				</li>

				<li>
					<input type="checkbox" id="checkNStarAlliance" name="checkNStarAlliance" value="starAlliance"/>				
					<label class="notItem" for="checkNStarAlliance"><img class="checkLabel" src="../images/starAlliance.png" /></label>
				</li>
				
			 </ul>
			 

			<select id="filterSealed" name="filterSealed">
			  <option value="either">Sealed&colon; Any &lpar;default&rpar;</option>
			  <option value="yes">Sealed&colon; Yes</option>
			  <option value="no">Sealed&colon; No</option>
			</select>
			 
			<select id="filterKeyword" name="filterKeyword">
			  <option value="None">Keyword&colon; None &lpar;default&rpar;</option>
			  <option value="Maverick">Keyword&colon; Maverick</option>
			  <option value="Legacy">Keyword&colon; Legacy</option>
			  <option value="Anomaly">Keyword&colon; Anomaly</option>
			  <option value="Horseman">Keyword&colon; Horseman</option>
			  <option value="Timetraveller">Keyword&colon; Timetraveller</option>
			</select>
			 
			<select id="filterSet" name="filterSet">
			  <option value="0">Set&colon; Any &lpar;default&rpar;</option>
			  <option value="1">Set&colon; 1</option>
			  <option value="2">Set&colon; 2</option>
			  <option value="3">Set&colon; 3</option>
			</select>
			
			<select id="filterChains" name="filterChains">
			  <option value="0">Chains&colon; Any &lpar;default&rpar;</option>
			  <option value="1">Chains&colon; Yes</option>
			  <option value="2">Chains&colon; No</option>
			</select>
			
			<select id="filterSort" name="filterSort">
			  <option value="0">Price&colon; Low to High &lpar;default&rpar;</option>
			  <option value="1">Price&colon; High to Low</option>
			  <option value="2">Chains&colon; Low to High</option>
			  <option value="3">Chains&colon; High to Low</option>
			</select>
			
			<select id="filterPriced" name="filterPriced">
			  <option value="0">Priced&colon; Any &lpar;default&rpar;</option>
			  <option value="1">Priced&colon; Yes</option>
			  <option value="2">Priced&colon; No</option>
			</select>
			
			<select id="filterUser" name="filterUser">
				<option value="0">User&colon; Any</option>
			<?php
			$stmt = 'SELECT * FROM accounts';
			if($result=mysqli_query($link, $stmt)){
				if(mysqli_num_rows($result) > 0){
					while($row=mysqli_fetch_array($result))
					{
						$userList[$row['id']]=$row['username'];
						$emailList[$row['id']]=$row['email'];
						$statusList[$row['id']]=$row['status'];
						echo "<option value='" . $row['id'] . "'>User&colon; " . $userList[$row['id']] . "</option>";
					}
				}
			}
			?>
			</select>
			
			<input type="submit" value="Filter" name="submit">
			<button type="button"  class="return" onclick="popToggle(null, null, 'fMenu', 'filterButton')">Return</button>
		   </form>
		  </div>
	   <!-- View Deck/Edit Deck -->
		<?php 
				
				$status=$_SESSION['status'];
				$user=$_SESSION['id'];
				$DATABASE_HOST = 'localhost';
				$DATABASE_USER = 'kylep072_dwpIPH';
				$DATABASE_PASS = 'pP[u^g@Z0W(f';
				$DATABASE_NAME = 'kylep072_phpdecks';
				$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
				if (mysqli_connect_errno()) {
					die ('Failed to connect to MySQL: ' . mysqli_connect_error());
				}
				// Get all decks.
				if ($filter!=""){
					$stmt=$filter;
				} else{
					$stmt="SELECT * FROM decks ORDER BY price ASC, deckName ASC";
				}
				$deckNum=0;
				$pageNum=0;
				if($result=mysqli_query($link, $stmt)){
					if(mysqli_num_rows($result) > 0){
						while($row=mysqli_fetch_array($result))
						{
							$deckNum++;
						?>
							<div class="deckList">
								<a class="deckLink" rel="external" target="_blank" href="https://decksofkeyforge.com/decks?title=<?php echo urlencode($row['deckName']);?>"></a>
								<span class="deckName color<?php echo $row['setNum']; ?>"><?php echo $row['deckName'];?></span>
								<table>
									<tr class="deckHeader">
										<th class="userDisplay">Owner: <?php echo $userList[$row['user']];?></th>
										<th class="sealed">Sealed: <?php echo $row['sealed'];?></th>
										<th class="chains">Chains: <?php echo $row['chains'];?></th>
										<th class="price">Price: <?php echo $row['price'];?></th>
									</tr>
										
									<tr>
										<td>
											<img class="houses" src="../images/<?php echo $row['houseOne'];?>.png"/>
											<img class="houses" src="../images/<?php echo $row['houseTwo'];?>.png"/>
											<img class="houses" src="../images/<?php echo $row['houseThree'];?>.png"/>
										</td>
										<td colspan="3" class="description"><?php echo $row['description'];?></td>
									</tr>
								</table>
							</div>
						<?php
						}
					}
					//echo "<div class='results'> Results: " . $deckNum . "</div>";

				} else {
					echo "Decks failed to load.";
				}
				mysqli_free_result($result);
				mysqli_close($link);
				?>
      </div>
      <!--Page 1 End-->

      <!--Page 2-->
      <div id="page2">
	    <!-- Contact Site Admin -->
        <!-- Registered User List -->
		<!-- Contact User -->
      </div>
      <!--Page 2 End-->

      <!--Page 3-->
      <div id="page3">
        <!-- Decks Requested by Registered Users -->
      </div>
      <!--Page 3 End-->
	  
	  <!--Page 4-->
      <div id="page4">
        <!-- Profile -->
		<?php 
		if (isset($_SESSION['loggedIn'])) {?>
			<div id="profile">
			<h1>Profile Page</h1>
			<p>Your account details are below:</p>
			<table>
				<tr>
					<td>Username:</td>
					<td><?php echo $_SESSION['name']?></td>
				</tr>
				<tr>
					<td>Account Status:</td>
					<?php if($status==3){ ?>
						<td>Administrator Account</td>
					<?php } else if ($status==2){ ?>
						<td>Approved Account</td>
					<?php } else { ?>
						<td>Non-Approved Account</td>
					<?php } ?>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo $_SESSION['email']?></td>
				</tr>
			</table>
			</div>
			<button type="button"  class="show" id="import-button" onclick="popToggle(null, null, 'fImport', 'importButton')">Import</button>
			<div class="popup">
				<form action="import.php" id="import" method="post" enctype="multipart/form-data">
					<label for="fileToUpload">
						<i></i>
					</label>
					<input type="file" name="fileToUpload" id="fileToUpload" accept=".csv">
					<input type="submit" value="Upload CSV" name="submit">
					<button type="button"  class="return" onclick="popToggle(null, null, 'fImport', 'importButton')">Return</button>
				</form>
			</div>
			<?php 				
			// Get all decks from user.
			$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
			if (mysqli_connect_errno()) {
				die ('Failed to connect to MySQL: ' . mysqli_connect_error());
			}
			$stmt="SELECT * FROM decks WHERE user = " . $user;
			if($result=mysqli_query($link, $stmt)){
				if(mysqli_num_rows($result) > 0){							
					while($row=mysqli_fetch_array($result))
					{
					?>
						<div class="deckList">
							<!--$row['id']-->
							<span class="deckName color<?php echo $row['setNum']; ?>"><?php echo $row['deckName'];?></span>
							<table>
								<tr class="deckHeader">
									<th class="sealed">Sealed: <?php echo $row['sealed'];?></th>
									<th class="chains">Chains: <?php echo $row['chains'];?></th>
									<th class="price">Price: <?php echo $row['price'];?></th>
								</tr>
									
								<tr>
									<td>
										<img class="houses" src="../images/<?php echo $row['houseOne'];?>.png"/>
										<img class="houses" src="../images/<?php echo $row['houseTwo'];?>.png"/>
										<img class="houses" src="../images/<?php echo $row['houseThree'];?>.png"/>
									</td>
									<td colspan="2" class="description"><?php echo $row['description'];?></td>
								</tr>
							</table>
						</div>
					<?php
					}
				} else{
					echo "There are currently no decks on this account.";
				}
			} else {
				echo "Decks failed to load.";
			}
			mysqli_free_result($result);
			mysqli_close($link); 
			} else { ?>
			<button type="button"  class="show" id="login-button" onclick="popToggle('login', null, 'registerButton', 'loginButton')">Login</button>
			<button type="button"  class="show" id="register-button" onclick="popToggle('register', null, 'registerButton', 'loginButton')">Register</button>
			<!-- Login -->
		  <div class="popup">
			  <form id="authenticater1" action="authenticate.php" method="post">
					<!-- username -->
				<label for="username">
					<i></i>
				</label>
				<input type="text" class="textField" name="username" placeholder="Username" 
					id="username">
				<!-- password -->
				<label for="password">
					<i></i>
				</label>
				<input type="password" class="textField" name="password" placeholder="Password" 
					id="password">
				<label for="showPass1">
					<i></i>
				</label>
				<input id="showPass1" type="checkbox" onclick="showPass('loginPass', null, 1)"/>
				<input type="submit" value="Login"/>
				<button type="button" class="return" onclick="popToggle('login', null, 'loginButton', 'registerButton')">Return</button>
			  </form>
		  </div>
	  
		  <!-- request account -->
			<div class="popup">
				<form id="authenticater2" action="authenticateregister.php" method="post">
				
					<!-- username -->
					<label for="rusername">
						<i class="user"></i>
					</label>
					<input type="text" class="textField" name="rusername" placeholder="Username" 
						id="rusername">
					<!-- password -->
					<label for="rpassword">
						<i></i>
					</label>
					<input type="password" class="textField" name="rpassword" placeholder="Password" 
						id="rpassword">
					<!-- confirm password -->
					<label for="confirm">
						<i></i>
					</label>
					<input type="password" class="textField" name="confirm" placeholder="Confirm Password" 
						id="confirm">
					<!-- email -->
					<label for="email">
						<i></i>
					</label>
					<input type="text" name="email" placeholder="Email" 
						id="email">
					<label for="showPass2">
						<i></i>
					</label>
					<input id="showPass2" class="textField" type="checkbox" onclick="showPass('registerPass', 'checkPass', 2)"/>
					<!-- submit -->
					<input type="submit" value="Register"/>
					<button type="button"  class="return" onclick="popToggle('register', null, 'registerButton', 'loginButton')">Return</button>
					<!--<p id="msg1">Request an account. Accounts allow you to post decks
					and therefore must be status by a site admin.</p>-->
				</form>
			</div>
		<?php } ?>
      </div>
      <!--Page 4 End-->
	  
    </div>
	<script>
		const a = "#111111";
		const b = "#222629";
		const c = "#474B4F";
		const d = "#222629";
		const e = "#222629";
		const f = "#6B6E70";
		
		var main = document.getElementById("main");
		var fImport = document.getElementById("import");
		var importButton = document.getElementById("import-button");
		var fMenu = document.getElementById("fMenu");
		var filterButton = document.getElementById("filter-button");
		var loginButton = 0;
		loginButton = document.getElementById("login-button");
		var registerButton = document.getElementById("register-button");
		var login = document.getElementById("authenticater1");
		var register = document.getElementById("authenticater2");
		var loginPass = document.getElementById("password");
		var registerPass = document.getElementById("rpassword");
		var checkPass = document.getElementById("confirm");
		var errorDisplay=document.getElementById("errorDisplay");
		var menu = [document.getElementById("menu0"), document.getElementById("menu1"),
			document.getElementById("menu2"), document.getElementById("menu3"),
			document.getElementById("menu4")];
		var headerImage = document.getElementById("headerImage");
		var page = [document.getElementById("page0"), document.getElementById("page1"),
			document.getElementById("page2"), document.getElementById("page3"), 
			document.getElementById("page4")];
		var errorReturn=document.getElementById["error-return"];
		for (var i = 0; i < 5; i++) {
			page[i].style.display = "none";
		}
		function displayPage(pageNum) {
		  

		  for (i = 0; i < 5; i++) {
			page[i].style.display = "none";
			menu[i].style.color=a;
			menu[i].style.backgroundColor=f;
		  }
		  
		  if (page[pageNum].style.display === "none") {
			page[pageNum].style.display = "block";
			menu[pageNum].style.color=a;
			menu[pageNum].style.backgroundColor=b;
		  }
		  if (pageNum === 0) {
			setColor(a);
			headerImage.style.display="block";
		  } else{
			setColor(a);
			headerImage.style.display="none";
		  }
		}

		function setColor(colour){
			main.style.backgroundColor=colour;
		}

		function popToggle(item, item2, item3, item4){
			if(item !== null){
				if (window[item]!= null){
					window[item].classList.toggle("show");
				}
			}
			if(item2 !== null){
				if (window[item2]!= null){
					window[item2].classList.toggle("hide");
				}
			}
			if(item3 !== null){
				if (window[item3]!= null){
					window[item3].classList.toggle("hide");
					window[item3].classList.toggle("show");
				}
			}
			if(item4 !== null){
				if (window[item4]!= null){
					window[item4].classList.toggle("hide");
					window[item4].classList.toggle("show");
				}
			}
		}
		
		function showPass(item, item2, numItems) {
			var temp = new Array(window[item], window[item2]);
			var i;
			for(i=0;i<numItems;i++){
			  if(temp[i].type === "password") {
				temp[i].type = "text";
			  } else {
				temp[i].type = "password";
			  }
			}
		}		
	</script>
			
	<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		echo '<script> displayPage(1);</script>';
	} else{
		echo '<script> displayPage(0);</script>';
	}
	
	if(isset($_SESSION['errMsg'])){
		if ($errorMessage!="") { ?>
			<script>
				displayPage(4);
				popToggle(null, null, 'loginButton', 'registerButton');
				popToggle(null, null, 'importButton', null);
			</script>	
		<?php }
	}
	
	/* close connection */
	mysqli_stmt_close($stmt);
	mysqli_close();

	?>
  </body>

</html>
