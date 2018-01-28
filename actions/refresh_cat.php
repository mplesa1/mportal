<?php
	 session_start(); 

	if (($_SESSION['user']['role'] != 2) && ($_SESSION['user']['role'] != 3)) {
        header ("location: ../index.php");
        die();
    }
	require_once ('db.php');
	$output = '';

	if (isset($_POST["id_u"])) {
		$id_u = $_POST["id_u"];
	    $sql = "SELECT * FROM role_editor WHERE fk_id_u = :id_u";
	    $stmt= $db -> prepare($sql);
	    $stmt -> bindValue(":id_u", $id_u, PDO::PARAM_INT);
	    $stmt -> execute(); 
	    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
	        foreach ($result as $res){
	            $id_cats[] = $res['fk_id_cat'];
	        }
	        foreach($id_cats as $val){
	        $val=$db->quote($val); 
	        $in = implode(',',$id_cats); 
	        }
	   $sql2 = "SELECT * FROM category_article WHERE id_cat NOT IN ($in) AND parent is NULL ";
	   $stmt2= $db -> prepare($sql2);
	   $stmt2 -> execute(); 
	   $result2 = $stmt2 -> fetchAll(PDO::FETCH_OBJ);
                $output .= '<label for="category_editor">Izaberite kategoriju:</label>';
                $output .= '<select name="category_editor" id="select_cat" class="category_editor">';
            foreach ($result2 as $res2){
                $name = $res2-> name;
                $id_cat = $res2-> id_cat;

                $output .= '<option id="option_editor" value="'.$res2-> id_cat.'">'.$res2-> name.'</option>';
            }
                $output .= "</select>";
	    
	}

	echo $output;
?>