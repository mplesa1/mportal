<?php
	require_once ('db.php');

	$username = $_POST['username'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$pwd_repeated = $_POST['pwd_repeated'];
	$role = 1;
	$date_reg = date("Y-m-d H:i:s");
	$msg = '';
	$error = 0;


	if (empty($username) || empty($email) || empty($pwd) || empty($pwd_repeated)) {
		$msg = "Niste ispunili sva polja!";
		$error = 1;
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$msg = "Neispravan format email adrese!";
		$error = 1;
	}

	if ($pwd !== $pwd_repeated) {
		$msg = "Lozinka i ponovljena lozinka se ne podudaraju!";
		$error = 1;
	}
	if (strlen($pwd) < 5 ) {
		$msg = "Lozinka mora sadržavati minimalno 5 znamenki!";
		$error = 1;
	}

	if ($error == 0) {
		$sql = "SELECT * FROM user WHERE username = :username || email = :email";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(':username' => $username , ':email' => $email ));

		if ($stmt -> rowCount() > 0) {
			$msg = "Korisnik sa istim userom ili email adresom već postoji!"; 
		}else{
			$pwd_hash = password_hash($pwd, PASSWORD_DEFAULT, ['cost'=>12]);

			$sqlI = "INSERT INTO user
					(fk_id_r, username, email, password, date_registration)
					VALUES(:fk_id_r, :username, :email, :pwd, :date_reg )";
			$stmtI = $db-> prepare($sqlI);
			$stmtI -> execute(array(':fk_id_r'=> $role, ':username' => $username , ':email' => $email, ':pwd' => $pwd_hash, ':date_reg' => $date_reg ));

			if ($stmtI -> rowCount() > 0) {
				$msg = "Registracija je uspjela, sada se možete prijaviti!";
			}else{
				$msg = "Registracija nije uspjela!";
			}
		}
	}

	echo $msg;

?>