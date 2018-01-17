<?php
	session_start();
	require_once ('db.php');
	
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$msg ='';

	// redirect if logged in
	if(isset($_SESSION['user'])) {
  	header('Location: index.php');
  	die;
	}

	if (empty($email) && empty($pwd)){
		die($msg = "Niste ispunili sva polja!");
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		die($msg = "Neispravan format email adrese!");
	}

	$sql = "SELECT * FROM user WHERE email = :email";
	$stmt = $db -> prepare($sql);
	$stmt->bindValue(':email', $email, PDO::PARAM_STR);
	$stmt -> execute();
	$result = $stmt ->fetchAll(PDO::FETCH_OBJ);

	foreach ($result as $res) {
		$id = $res -> id_u;
		$role = $res -> fk_id_r;
		$username = $res -> username;
		$email_db = $res -> email;
		$pwd_db = $res -> password;
		$fname = $res -> fname;
		$lname = $res -> lname;
		$address = $res -> address;
		$city = $res -> city;
		$post_number = $res -> post_number;
		$country = $res -> country;
		$date_registration = $res -> date_registration;
		$date_last_change = $res -> date_last_change;
		$active = $res -> active;
		}

		if(!$result){
			die($msg = "Kriva email adresa ili lozinka!");
		}
		elseif(!password_verify($pwd, $pwd_db)) {
			die($msg = "Kriva email adresa ili lozinka!");
		}
		elseif($active != 1){
			die($msg = "Vaš račun je neaktivan!");
		}
		else{
			$_SESSION['user'] = array();
			$_SESSION['user']['id'] = $id;
			$_SESSION['user']['role'] = $role;
			$_SESSION['user']['username'] = $username;
			$_SESSION['user']['email'] = $email_db;
			$_SESSION['user']['fname'] = $fname;
			$_SESSION['user']['lname'] = $lname;
			$_SESSION['user']['address'] = $address;
			$_SESSION['user']['city'] = $city;
			$_SESSION['user']['post_number'] = $post_number;
			$_SESSION['user']['country'] = $country;
			$_SESSION['user']['date_registration'] = $date_registration;
			$_SESSION['user']['date_last_change'] = $date_last_change;
			$_SESSION['user']['active'] = $active;

			$msg = "Uspješno ste se prijavili!";
		}

		echo $msg;

?>