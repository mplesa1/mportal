<?php
	session_start();
    require_once 'db.php';

     if (empty($_POST['user']) || empty($_POST['email']) || empty($_POST['comment'])) {
   		die("Ispunite sva polja !");
   	}
    $id_a = $_POST['id_a'];
    if (empty($_POST['id_u'])) {
    	$id_u = NULL;
    }else{
    	$id_u = $_POST['id_u'];
    }
    
    $user = $_POST['user'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
   	$date_publication = date("Y-m-d H:i:s"); //("d/m/Y H:i:s");
 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		die("Neispravan format email adrese!");
	}

	$sql = "INSERT INTO comment 
			(fk_id_u, fk_id_a, username, email, comment, date_publication)
			VALUES (:id_u, :id_a, :user, :email, :comment, :date_p) ";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id_u' , $id_u);
	$stmt->bindParam(':id_a', $id_a);
	$stmt->bindParam(':user', $user);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':comment', $comment);
	$stmt->bindParam(':date_p', $date_publication);
	$stmt->execute();

	if ($stmt -> rowCount() > 0) {
				echo "Vaš komentar je objavljen !";
			}else{
				echo "Komentar nije objavljen, pokušajte ponovno !";
			}
?>