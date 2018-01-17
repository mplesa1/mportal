<?php
	session_start(); 

	if ($_SESSION['user']['role'] != 3) {
        header ("location: ../index.php");
        die();
    }
	require_once ('db.php');
	
	$cat_name = $_POST['cat_name'];
	$parent = $_POST['parent'];

	if (empty($cat_name)) {
		die('Ispunite naziv kategorije !');
	}

	$sql = "INSERT INTO category_article (name, parent) VALUES (:name, :parent)";
	$stmt = $db -> prepare($sql);
	$stmt->bindParam(':name', $cat_name);
	$stmt->bindParam(':parent', $parent);
	$stmt -> execute();

	if ($stmt->rowCount() > 0) {
		echo "Kategorija je uspješno dodana !";
	}