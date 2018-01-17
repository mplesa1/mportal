<?php
	session_start(); 

	if (($_SESSION['user']['role'] != 2) && ($_SESSION['user']['role'] != 3)) {
        header ("location: ../index.php");
        die();
    }
    require_once 'db.php';

    //CATEGORY
    if (($_POST['id_cat']) !== 'undefined') {
	    $id = $_POST['id_cat'];

	    if (!isset($id)) {
			die('Nisu dohvaćeni svi podaci !');
		}

		$sql = "SELECT active FROM category_article WHERE id_cat = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$active = $stmt->fetch();
		$is_active = !$active['active'];

		$sql = 'UPDATE category_article SET active = :active WHERE id_cat = :id';
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':active', $is_active);
		$stmt->execute();

		if ($is_active === '1') {
			die("Kategorija je aktivirana i ponovno je vidljiva korisnicima !");
		}else{
			die("Kategorija je deaktivirana i nije vidljiva korisnicima !");
			}
	//USER
	}elseif(($_POST['id_u']) !== 'undefined') {
	    $id = $_POST['id_u'];

	    if (!isset($id)) {
			die('Nisu dohvaćeni svi podaci !');
		}

		$sql = "SELECT active FROM user WHERE id_u = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$active = $stmt->fetch();
		$is_active = !$active['active'];

		$sql = 'UPDATE user SET active = :active WHERE id_u = :id';
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':active', $is_active);
		$stmt->execute();

		if ($is_active === '1') {
			die("Korisnik je ponovno aktiviran, te se može prijaviti !");
		}else{
			die("Korisnik je blokiran i ne može se više prijaviti !");
			}
	//ARTICLE
	}elseif(($_POST['id_a']) !== 'undefined') {
	    $id = $_POST['id_a'];

	    if (!isset($id)) {
			die('Nisu dohvaćeni svi podaci !');
		}

		$sql = "SELECT active FROM article WHERE id_a = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$active = $stmt->fetch();
		$is_active = !$active['active'];

		$sql = 'UPDATE article SET active = :active WHERE id_a = :id';
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':active', $is_active);
		$stmt->execute();

		if ($is_active === '1') {
			die("Članak je aktiviran i ponovno je vidljiv korisnicima !");
		}else{
			die("Članak je deaktiviran i nije vidljiv korisnicima !");
			}
	}