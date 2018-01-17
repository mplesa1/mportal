<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    } 
    require_once "../../actions/db.php";

    if (($_SESSION['user']['role'] != 2) && ($_SESSION['user']['role'] != 3)) {
        header ("location: index.php");
        die();
    }
    $sql = "SELECT user.*, role_user.name FROM user INNER JOIN role_user ON user.fk_id_r = role_user.id_r ORDER BY active DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
?>
<h2>Korisnici</h2>
<table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Uloga</th>
        <th>Uredi</th>
        <th>Blokiraj/Aktviraj</th>
    </tr>
<?php        
    $result = $stmt -> fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $res){
        $id_u = $res-> id_u;
        $user = $res-> username;
        $email = $res-> email;
        $role = $res-> name;
        $role_id = $res-> fk_id_r;
        $fname = $res-> fname;
        $lname = $res-> lname;
        $address = $res-> address;
        $city = $res-> city;
        $post_number = $res-> post_number;
        $country = $res-> country;
        $date_reg = $res-> date_registration;
        $date_last_change = $res-> date_last_change;
        $active = $res-> active;
        require_once '../../actions/date_format.php';        
?>
    <tr class="<?= $active === '1' ? '' : 'blocked' ?>">
        <td><?php echo $user; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $role; ?></td>
        <td><i class="material-icons icon-edit" onclick="openUser(
            '<?php echo $id_u; ?>',
            '<?php echo $user; ?>',
            '<?php echo $email; ?>',
            '<?php echo $role_id; ?>',
            '<?php echo $fname; ?>',
            '<?php echo $lname; ?>',
            '<?php echo $address; ?>',
            '<?php echo $city; ?>',
            '<?php echo $post_number; ?>',
            '<?php echo $country; ?>',
            '<?php echo date_format_ch($date_reg); ?>',
            '<?php echo date_format_ch($date_last_change); ?>'
        )">&#xe22b;</i></td>
        <td>
    <?php if ($active === '1') { ?>
            <i class="material-icons icon-block" onclick="toggleActivation(
            'undefined',
            '<?php echo $id_u; ?>')">&#xE14B;</i>
    <?php } else { ?>
            <i class="material-icons icon-active" onclick="toggleActivation(
            'undefined',
            '<?php echo $id_u; ?>')">&#xE876;</i>
    <?php } ?>
        </td>
    </tr>
<?php } ?>
</table>
