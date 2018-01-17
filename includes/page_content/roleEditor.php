 <?php 
    require_once "../admin_control.php";
    require_once "../../actions/db.php";
    $sql = "SELECT role_editor.*, user.username, category_article.name FROM role_editor 
        INNER JOIN user ON role_editor.fk_id_u = user.id_u 
        INNER JOIN category_article ON role_editor.fk_id_cat = category_article.id_cat ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql_editor = "SELECT role_editor.*, user.username FROM role_editor INNER JOIN user ON role_editor.fk_id_u = user.id_u ";
    $stmt_editor = $db->prepare($sql_editor);
    $stmt_editor->execute();
?>
<h2>Role editor</h2>
<table>
    <tr>
        <th>Username</th>
        <th>Role</th>
        <th></th>
    </tr>
<?php        
    $result = $stmt -> fetchAll(PDO::FETCH_OBJ);
    $result_editor = $stmt_editor -> fetchAll();
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

*/

    foreach ($result_editor as $res2){
    $id_u2 = $res2['fk_id_u'];

    
    $idevi[] = $id_u2;

    $user_id[] = end($idevi);
    

}
/*
print_r($idevi);
print_r($user_id);
*/
    foreach ($result as $res){
        $id_re = $res-> id_re;
        $id_cat = $res-> fk_id_cat;
        $id_u = $res-> fk_id_u;
        $username = $res-> username;
        $name_cat = $res-> name;

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
    <tr>
        <td><?php echo $username; ?></td>
        <td><?php echo $name_cat; ?></td>
        <td><i class="material-icons icon-edit" onclick="openEditor()">&#xe22b;</i></td>
    </tr>
<?php } ?>    
</table>