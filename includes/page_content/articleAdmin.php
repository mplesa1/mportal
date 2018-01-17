<?php
    require_once "../editor_control.php";
    require_once "../../actions/db.php";
?>
<h2>Članci</h2>
<table>
    <tr>
        <th>Naslov</th>
        <th>Datum i vrijeme</th>
        <th>Kategorija</th>
        <th>Uredi</th>
        <th>Blokiraj/Aktviraj</th>
    </tr>
<?php
    if ($_SESSION['user']['role'] == 3) {
        $sql = "SELECT article.*, category_article.name, user.username
                FROM article 
                INNER JOIN category_article ON article.fk_id_cat = category_article.id_cat
                INNER JOIN user ON article.fk_id_u = user.id_u 
                ORDER BY active DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute();        
        $result = $stmt -> fetchAll(PDO::FETCH_OBJ);
        foreach ($result as $res){
            $id_a = $res-> id_a;
            $fk_id_u = $res-> fk_id_u;
            $fk_id_cat = $res-> fk_id_cat;
            $title = $res-> title;
            $description = $res-> description;
            $content = $res-> content;
            $foto_url = $res-> foto_url;
            $foto_alt = $res-> foto_alt;
            $date_publication = $res-> date_publication;
            $date_last_change = $res-> date_last_change;
            $position = $res-> position;
            $number_likes = $res-> number_likes;
            $active = $res-> active;
            $name_cat = $res-> name;
            $username = $res-> username;
            require_once '../../actions/date_format.php';        
?>
    <tr class="<?= $active === '1' ? '' : 'blocked' ?>">
        <td><?= $title; ?></td>
        <td><?= date_format_ch($date_publication); ?></td>
        <td><?= $name_cat; ?></td>
        <td><i class="material-icons icon-edit" onclick="openArticle(
                '<?= $id_a; ?>',
                '<?= $fk_id_u; ?>',
                '<?= $fk_id_cat; ?>',
                '<?= htmlentities($title); ?>',
                '<?= htmlentities($description); ?>',
                `<?= htmlentities($content); ?>`,
                '<?= $foto_url; ?>',
                '<?= $foto_alt; ?>',
                '<?= date_format_ch($date_publication); ?>',
                '<?= date_format_ch($date_last_change); ?>',
                '<?= $position; ?>',
                '<?= $number_likes; ?>',
                '<?= $name_cat; ?>',
                '<?= $username; ?>')">&#xe22b;</i>
        </td>
        <td>
    <?php if ($active === '1') { ?>
            <i class="material-icons icon-block" onclick="toggleActivation(
            'undefined', 'undefined',
            '<?php echo $id_a; ?>')">&#xE14B;</i>
    <?php } else { ?>
            <i class="material-icons icon-active" onclick="toggleActivation(
            'undefined', 'undefined',
            '<?php echo $id_a; ?>')">&#xE876;</i>
    <?php } ?>
        </td>
    </tr>
<?php } }elseif ($_SESSION['user']['role'] == 2) {
        $sql_editor = "SELECT r.fk_id_cat as id_parent, r.fk_id_u as id_u, 
                    c.id_cat as id_cat, c.name as name, a.*, u.username as username
                    FROM role_editor r, category_article c, article a, user u
                    WHERE r.fk_id_cat = c.parent
                    AND r.fk_id_u = :id_u
                    AND c.active = 1
                    AND a.fk_id_cat = c.id_cat
                    AND u.id_u = a.fk_id_u
                    ORDER BY a.active DESC";
        $stmt_editor = $db->prepare($sql_editor);
        $stmt_editor->bindParam(':id_u', $_SESSION['user']['id']);
        $stmt_editor->execute();        
        $result_editor = $stmt_editor -> fetchAll(PDO::FETCH_OBJ);
        foreach ($result_editor as $res_editor){
            $id_a = $res_editor-> id_a;
            $fk_id_u = $res_editor-> fk_id_u;
            $fk_id_cat = $res_editor-> fk_id_cat;
            $title = $res_editor-> title;
            $description = $res_editor-> description;
            $content = $res_editor-> content;
            $foto_url = $res_editor-> foto_url;
            $foto_alt = $res_editor-> foto_alt;
            $date_publication = $res_editor-> date_publication;
            $date_last_change = $res_editor-> date_last_change;
            $position = $res_editor-> position;
            $number_likes = $res_editor-> number_likes;
            $active = $res_editor-> active;
            $name_cat = $res_editor-> name;
            $username = $res_editor-> username;
            require_once '../../actions/date_format.php';        
?>
    <tr class="<?= $active === '1' ? '' : 'blocked' ?>">
        <td><?= $title; ?></td>
        <td><?= date_format_ch($date_publication); ?></td>
        <td><?= $name_cat; ?></td>
        <td><i class="material-icons icon-edit" onclick="openArticle(
                '<?= $id_a; ?>',
                '<?= $fk_id_u; ?>',
                '<?= $fk_id_cat; ?>',
                '<?= htmlentities($title); ?>',
                '<?= htmlentities($description); ?>',
                `<?= htmlentities($content); ?>`,
                '<?= $foto_url; ?>',
                '<?= $foto_alt; ?>',
                '<?= date_format_ch($date_publication); ?>',
                '<?= date_format_ch($date_last_change); ?>',
                '<?= $position; ?>',
                '<?= $number_likes; ?>',
                '<?= $name_cat; ?>',
                '<?= $username; ?>')">&#xe22b;</i>
        </td>
        <td>
    <?php if ($active === '1') { ?>
            <i class="material-icons icon-block" onclick="toggleActivation(
            'undefined', 'undefined',
            '<?php echo $id_a; ?>')">&#xE14B;</i>
    <?php } else { ?>
            <i class="material-icons icon-active" onclick="toggleActivation(
            'undefined', 'undefined',
            '<?php echo $id_a; ?>')">&#xE876;</i>
    <?php } ?>
        </td>
    </tr>
<?php } } ?>
</table>

