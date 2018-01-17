<?php
	session_start(); 

	if ($_SESSION['user']['role'] != 3) {
        header ("location: ../index.php");
        die();
    }
	require_once ('db.php');
	
	$id_u = $_POST['id_u'];
	$email = $_POST['email'];
	$role = $_POST['role'];

	if (empty($email)) {
		die('Ispunite email adresu !');
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		die("Neispravan format email adrese !");
	}

	$sql = "UPDATE user
			SET email = :email,
				fk_id_r = :role
			WHERE id_u = :id_u";
	$stmt = $db -> prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':role', $role);
	$stmt->bindParam(':id_u', $id_u);
	$stmt -> execute();

	if ($stmt->rowCount() > 0) {
		echo "Korisnik je usješno izmjenjen !";
	}