<?php 
	session_start(); 

	if ($_SESSION['user']['role'] != 3) {
        header ("location: ../index.php");
        die();
    }
	require_once ('db.php');

	if (empty($_POST['id_u']) || empty($_POST['id_cat'])) {
		die('Odaberite editora i kategoriju !');
	}
	
	$id_u = $_POST['id_u'];
	$id_cat = $_POST['id_cat'];

	$sql = "INSERT INTO role_editor (fk_id_cat, fk_id_u) VALUES (:id_cat, :id_u)";
	$stmt = $db -> prepare($sql);
	$stmt->bindParam(':id_cat', $id_cat);
	$stmt->bindParam(':id_u', $id_u);
	$stmt -> execute();

	if ($stmt->rowCount() > 0) {
		echo "Rola je uspješno dodana !";
	}