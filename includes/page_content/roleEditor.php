 <?php 
    require_once "../admin_control.php";
    require_once "../../actions/db.php";
    $sql = "SELECT role_editor.*, user.username, category_article.name FROM role_editor 
        INNER JOIN user ON role_editor.fk_id_u = user.id_u 
        INNER JOIN category_article ON role_editor.fk_id_cat = category_article.id_cat 
        ORDER BY user.username ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();


?>
<h2>Role editor</h2>
<h3 class="add-h" onclick="openRole()">Dodaj rolu<i class="add-icon material-icons add-icon">&#xE148;</i></h3>
<table>
    <tr>
        <th>Username</th>
        <th>Rola</th>
        <th>Obriši rolu</th>
    </tr>
<?php        
    $result = $stmt -> fetchAll(PDO::FETCH_OBJ);

    foreach ($result as $res){
        $id_re = $res-> id_re;
        $id_cat = $res-> fk_id_cat;
        $id_u = $res-> fk_id_u;
        $username = $res-> username;
        $name_cat = $res-> name;   
?>
    <tr>
        <td><?php echo $username; ?></td>
        <td><?php echo $name_cat; ?></td>
        <td><i class="material-icons icon-block" onclick="deleteRole('<?= $id_re; ?>')">delete_forever</i></td>
    </tr>
<?php } ?>    
</table>

<?php
/*

        $sql = "SELECT * FROM role_editor WHERE fk_id_u = 32";
        $stmt= $db -> prepare($sql);
        //$stmt -> bindValue(":id_u", $id_u, PDO::PARAM_INT);
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
                $output = '<label for="category_editor">Izaberite kategoriju:</label>';
                $output .= '<select name="category_editor" id="select_cat" class="category_editor">';
            foreach ($result2 as $res2){
                $name = $res2-> name;
                $id_cat = $res2-> id_cat;

                $output .= '<option id="option_editor" value="'.$res2-> id_cat.'">'.$res2-> name.'</option>';
            }
                $output .= "</select>";
            echo "<pre>";
            print_r($result2);
            echo $output;
*/


//IDEJE
    /*$sql_editor = "SELECT role_editor.*, user.username FROM role_editor INNER JOIN user ON role_editor.fk_id_u = user.id_u ";
    $stmt_editor = $db->prepare($sql_editor);
    $stmt_editor->execute();*/
    /*$result_editor = $stmt_editor -> fetchAll();


    foreach ($result_editor as $res2){
    $id_editor_all[] = $res2['fk_id_u'];    

}
echo "<pre>";
print_r($id_editor_all);*/
   /* echo '<pre>';
    print_r($result);
    echo '<pre>';
    print_r($result_editor);
    
    
    //echo $result->fk_id_cat;

   // $count = $stmt->rowCount();
   // echo $count;
    /*$kategorije = array_map(function($result) {
        return $result['name'];
    }, $result);
    echo join($kategorije, ', ');


       /* echo "<br>";
    echo $id_u;
    /*$cat = array_map(function(){
        return $name_cat;
    } );
    echo join($cat, ', ');

    function cat_user($user_id, $res) {
        if ($user_id === $res->fk_id_u) {
            # code...
        }
    }*/
 ?>