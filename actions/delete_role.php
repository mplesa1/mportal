<?php
	session_start(); 

	if (($_SESSION['user']['role'] != 3)) {
        header ("location: ../index.php");
        die();
    }
    require_once 'db.php';

    if (!isset($_POST['id_re'])) {
    	die('Nisu dohvaćeni svi podaci !');
    }

    $id_re = $_POST['id_re'];

    $sql = "DELETE FROM role_editor WHERE id_re = :id";
    $stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id_re);
	$stmt->execute();

	if ($stmt -> rowCount() > 0) {
		die('Rola je trajno izbrisana, ako želite ponovno dodati rolu editoru pritisnite "Dodaj rolu +"  !');
	}else{
		die("Brisanje role nije uspjelo !");
	}
