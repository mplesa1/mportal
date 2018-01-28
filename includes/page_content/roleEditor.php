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
