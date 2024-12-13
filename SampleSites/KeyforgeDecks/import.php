<?php
//import decks script
session_start();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$msg="";
$fmt = numfmt_create( 'en_CA', NumberFormatter::CURRENCY );
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $msg= "Sorry, your file is too large. Try uploading in smaller batches";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "csv") {
    $msg= "Sorry, only csv files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msg= "Sorry, your file was not uploaded.";
	
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $msg= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

		$status=$_SESSION['status'];
		$DATABASE_HOST = 'localhost';
		$DATABASE_USER = 'kylep072_dwpIPH';
		$DATABASE_PASS = 'pP[u^g@Z0W(f';
		$DATABASE_NAME = 'kylep072_phpdecks';
		$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
		if (mysqli_connect_errno()) {
			die ('Failed to connect to MySQL: ' . mysqli_connect_error());
		}
		$row=0;
		$err="";
		if(($file = fopen($target_file,"r")) !== FALSE) {
			while(($decks = fgetcsv($file, 1000, ",")) !== FALSE)
			{
				$length=count($decks);
				for($i=0; $i<$length; $i++){
					$deckName[$row]=$decks[$i];
					$i++;
					$setNum[$row]=$decks[$i];
					$i++;
					$houseOne[$row]=$decks[$i];
					$i++;
					$houseTwo[$row]=$decks[$i];
					$i++;
					$houseThree[$row]=$decks[$i];
					$i++;
					$sealed[$row]=$decks[$i];
					$i++;
					$chains[$row]=$decks[$i];
					$i++;
					$price[$row]=$decks[$i];
					$i++;
					$description[$row]=$decks[$i];
					if($deckName[$row]==""){
						$_SESSION['errMsg']="Upload Error. Upload cancelled. Missing deckname. Error on row " . $row . ".";
						header('Location: index.php');
					} else if($setNum[$row]==null or $setNum[$row]==0 or $setNum[$row]>99){
						$_SESSION['errMsg']="Upload Error. Upload cancelled. Set number error. Error on row " . $row . ".";
						header('Location: index.php');
					} else if($houseOne[$row]==null or $houseOne[$row]=="" or $houseOne[$row]>99){
						$_SESSION['errMsg']="Upload Error. Upload cancelled. House one error. Error on row " . $row . ".";
						header('Location: index.php');
					} else if($houseTwo[$row]==null or $houseTwo[$row]=="" or $houseTwo[$row]>99){
						$_SESSION['errMsg']="Upload Error. Upload cancelled. House two error. Error on row " . $row . ".";
						header('Location: index.php');
					} else if($houseThree[$row]==null or $houseThree[$row]==0 or $houseThree[$row]=="" or $houseThree[$row]>99){
						$_SESSION['errMsg']="Upload Error. Upload cancelled. House three error. Error on row " . $row . ".";
						header('Location: index.php');
					} else if($sealed[$row]==null or $sealed[$row]=="" or $sealed[$row]>1){
						$_SESSION['errMsg']="Upload Error. Upload cancelled. Sealed status error. Error on row " . $row . ".";
						header('Location: index.php');
					} else if($chains[$row]==null or $chains[$row]=="" or $chains[$row]>99){
						$_SESSION['errMsg']="Upload Error. Upload cancelled. Deck chains error. Error on row " . $row . ".";
						header('Location: index.php');
					} else if($price[$row]==null or $price[$row]==""){
						$_SESSION['errMsg']="Upload Error. Upload cancelled. Price error. Error on row " . $row . ".";
						header('Location: index.php');
					} else{
						switch($houseOne[$row]){
							case 0:
								$houseOne[$row]="unknown";
								break;
							case 1:
								$houseOne[$row]="sanctum";
								break;
							case 2:
								$houseOne[$row]="shadows";
								break;
							case 3:
								$houseOne[$row]="dis";
								break;
							case 4:
								$houseOne[$row]="logos";
								break;
							case 5:
								$houseOne[$row]="untamed";
								break;
							case 6:
								$houseOne[$row]="brobnar";
								break;
							case 7:
								$houseOne[$row]="mars";
								break;
							case 8:
								$houseOne[$row]="saurian";
								break;
							case 9:
								$houseOne[$row]="starAlliance";
								break;
							default:
								$err="Upload Error. Upload cancelled. House one error. Error on row " . $row . ".";
								break;
						}
						switch($houseTwo[$row]){
							case 0:
								$houseTwo[$row]="unknown";
								break;
							case 1:
								$houseTwo[$row]="sanctum";
								break;
							case 2:
								$houseTwo[$row]="shadows";
								break;
							case 3:
								$houseTwo[$row]="dis";
								break;
							case 4:
								$houseTwo[$row]="logos";
								break;
							case 5:
								$houseTwo[$row]="untamed";
								break;
							case 6:
								$houseTwo[$row]="brobnar";
								break;
							case 7:
								$houseTwo[$row]="mars";
								break;
							case 8:
								$houseTwo[$row]="saurian";
								break;
							case 9:
								$houseTwo[$row]="starAlliance";
								break;
							default:
								$err="Upload Error. Upload cancelled. House two error. Error on row " . $row . ".";
								break;
						}
						switch($houseThree[$row]){
							case 0:
								$houseThree[$row]="unknown";
								break;
							case 1:
								$houseThree[$row]="sanctum";
								break;
							case 2:
								$houseThree[$row]="shadows";
								break;
							case 3:
								$houseThree[$row]="dis";
								break;
							case 4:
								$houseThree[$row]="logos";
								break;
							case 5:
								$houseThree[$row]="untamed";
								break;
							case 6:
								$houseThree[$row]="brobnar";
								break;
							case 7:
								$houseThree[$row]="mars";
								break;
							case 8:
								$houseThree[$row]="saurian";
								break;
							case 9:
								$houseThree[$row]="starAlliance";
								break;
							default:
								$err="Upload Error. Upload cancelled. House three error. Error on row " . $row . ".";
								break;
						}
						switch($sealed[$row]){
							case 0:
								$sealed[$row]="No";
								break;
							case 1:
								$sealed[$row]="Yes";
								break;
							default:
								$err="Upload Error. Upload cancelled. Sealed status error. Error on row " . $row . ".";
								break;
						}
						if($price[$row]=="OFFER"){
						} else if($price[$row]>=0 and $price[$row]<=999999){
							$price[$row]=numfmt_format_currency($fmt, $price[$row], "CAD");
						}else{
							$err="Upload Error. Upload cancelled. Price error. Error on row " . $row . ".";
						}
					}
					if($err!=""){
						$_SESSION['errMsg']=$err;
						header('Location: index.php');
					}
					$row++;
				}
			}
			fclose($handle);
		}

		unlink($target_file);
		$user=$_SESSION['id'];
		for($i=0;$i<$row; $i++){
			// Check if decks already exist.
			if ($stmt = mysqli_prepare($link, 'SELECT * FROM decks WHERE deckName = ?')) {
				mysqli_stmt_bind_param($stmt, 's', $deckName[$i]);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if (mysqli_stmt_num_rows($stmt) == 0) {
					mysqli_stmt_close($stmt);
					// Store deck.
					if ($stmt=mysqli_prepare($link, "INSERT INTO decks (id, deckName, setNum, houseOne, houseTwo, houseThree, sealed,
						chains, price, description, displayLocation, user) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, '', ?)")){
						mysqli_stmt_bind_param($stmt, 'sissssissi', $deckName[$i], $setNum[$i], $houseOne[$i], $houseTwo[$i], $houseThree[$i], $sealed[$i],
						$chains[$i], $price[$i], $description[$i], $user);
						mysqli_stmt_execute($stmt);
					}
				}
			}
		}
		
	} else {
		$msg= "Sorry, there was an error uploading your file.";
    }
}
mysqli_stmt_close($stmt);
header('Location: index.php');
?>