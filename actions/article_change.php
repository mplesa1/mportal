<?php
     session_start(); 

	if (($_SESSION['user']['role'] != 2) && ($_SESSION['user']['role'] != 3)) {
        header ("location: ../index.php");
        die();
    }
	require_once ('db.php');
	
	$id_a = $_POST['id_a'];
	$id_cat = $_POST['cat'];
	$position = $_POST['position'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$description = $_POST['description'];
	$foto_url = $_POST['new_url_img'];
	$foto_alt = $_POST['foto_alt'];

	if (empty($title)) {
		die('Ispunite naslov članka !');
	}elseif (empty($content)) {
		die('Ispunite sadržaj članka !');
	}elseif (empty($description)) {
		die('Ispunite opis članka !');
	}elseif (empty($foto_alt)) {
		die('Ispunite opis slike članka !');
	}

	$sql = "UPDATE article
			SET fk_id_cat = :id_cat,
				title = :title,
				description = :description,
				content = :content,
				foto_url = :foto_url,
				foto_alt = :foto_alt,
				position = :position
			WHERE id_a = :id_a ";
	$stmt = $db -> prepare($sql);
	$stmt->bindParam(':id_cat', $id_cat);
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':description', $description);
	$stmt->bindParam(':content', $content);
	$stmt->bindParam(':foto_url', $foto_url);
	$stmt->bindParam(':foto_alt', $foto_alt);
	$stmt->bindParam(':position', $position);
	$stmt->bindParam(':id_a', $id_a);
	$stmt -> execute();

	if ($stmt->rowCount() > 0) {
		echo "Članak je uspješno izmjenjen !";
	}