<?php 
    require_once "../admin_control.php";
    require_once "../../actions/db.php";
    $sql = "SELECT c1.id_cat as child_id, 
                   c1.name child_name,
                   c1.active,
                   c1.parent,
                   c2.name as parent_name 
            FROM category_article c1 
            LEFT OUTER JOIN category_article c2 ON c1.parent = c2.id_cat 
            ORDER BY c1.parent ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
?>
<h2>Kategorije</h2>
<h3 class="add-h" onclick="newCat()">Dodaj kategoriju<i class="add-icon material-icons add-icon">&#xE148;</i></h3>
<table>
    <tr>
        <th>Naziv</th>
        <th>Pripada</th>
        <th>Uredi</th>
        <th>Blokiraj/Aktviraj</th>
    </tr>
<?php        
    $result = $stmt -> fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $res){
        $id_cat = $res-> child_id;
        $name = $res-> child_name;
        $parent = $res-> parent_name;
        $parent_id = $res-> parent;
        $active= $res-> active;
?>  
    <tr class="<?= $active === '1' ? '' : 'blocked' ?>">
        <td id="name_cat"><?php echo $name; ?></td>
        <td><?php echo $parent; ?></td>
        <td><i class="material-icons icon-edit" id="uredi" onclick="openCat(
            '<?php echo $id_cat; ?>',
            '<?php echo $name; ?>',
            '<?php echo $parent_id; ?>')">&#xe22b;</i>
        </td>
        <td> 
    <?php if ($active === '1') { ?>
            <i class="material-icons icon-block" onclick="toggleActivation('<?php echo $id_cat; ?>')">&#xE14B;</i>
    <?php } else { ?>
            <i class="material-icons icon-active" onclick="toggleActivation('<?php echo $id_cat; ?>')">&#xE876;</i>
    <?php } ?>
        </td>
     </tr>
<?php } ?>
</table>