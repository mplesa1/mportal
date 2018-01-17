<?php
	session_start(); 

	if ($_SESSION['user']['role'] != 3) {
        header ("location: ../index.php");
        die();
    }
	require_once ('db.php');
	
	$id_cat = $_POST['id_cat'];
	$cat_name = $_POST['cat_name'];
	$parent = $_POST['parent'];

	if (empty($cat_name)) {
		die('Ispunite naziv kategorije !');
	}

	if ($parent == null) {
		$parent = NULL;
	}
	$sql = "UPDATE category_article
			SET name = :name,
				parent = :parent
			WHERE id_cat = :id_cat";
	$stmt = $db -> prepare($sql);
	$stmt->bindParam(':name', $cat_name);
	$stmt->bindParam(':parent', $parent);
	$stmt->bindParam(':id_cat', $id_cat);
	$stmt -> execute();

	if ($stmt->rowCount() > 0) {
		echo "Kategorija je uspješno izmjenjena !";
	}