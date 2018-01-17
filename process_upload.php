<?php
	session_start();
	if (($_SESSION['user']['role'] != 2) && ($_SESSION['user']['role'] != 3)) {
	        header ("location: ../index.php");
	        die();
	}

	$id = round(microtime(true));
	$savefolder = "img/article";
	$name = "img_".$id.".";

	$allowedtypes = array("image/jpeg", "image/pjpeg", "image/png", "image/gif");
	
	if (isset($_FILES['myfile'])){
		if (in_array($_FILES['myfile']['type'], $allowedtypes)){
			if ($_FILES['myfile']['error'] == 0 && $_FILES['myfile']['size'] <= 600000){
				$temp = explode(".", $_FILES['myfile']['name']);
				$newFileName = $name . end($temp);
				$thefile = $savefolder ."/". $newFileName;
				if (!move_uploaded_file($_FILES['myfile']['tmp_name'], $thefile)){
					echo "Prijenos nije uspio";
				}else {
					?>
					<!DOCTYPE html>
					<html>
						<head>
							<script src = "js/script.js"></script>
						</head>
						<body onload = "doneloading(parent, '<?php echo $thefile; ?>')">
							<img src = "<?php echo $thefile; ?>"/> 
						</body>
					</html>
					<?php
				}
			}else {
				echo "Logo ne smije biti veći od 600 kilobajta!";
			}
		}
	}
	
?>