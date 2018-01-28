<div id="modal-editor" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close" id="close-login" onclick="closeRole()">&times;</span>
			<h2>Dodaj rolu editoru</h2>
		</div>
		<div class="modal-body">
			<form class="admin-form modal-form">
                <div id="msg-role" class="msg-0"></div>
                <div class="m-row">
                    <label for="select_editors">Izaberite editora:</label>
                    <select name="select_editors" id="select_editors">
                        <option selected disabled>Izaberite editora</option>
<?php 
    $sql_selected = "SELECT * FROM user WHERE fk_id_r = 2";
    $stmt_selected = $db->prepare($sql_selected);
    $stmt_selected->execute();
    $result_selected = $stmt_selected -> fetchAll(PDO::FETCH_OBJ);
    foreach ($result_selected as $res){
        $id_u = $res -> id_u;
        $username = $res -> username; 
?>
                        <option id="option_editor" value="<?= $id_u; ?>" onclick="refreshCat('<?= $id_u; ?>')"><?= $username;?></option>
<?php } ?>
                    </select>
                </div>
                <div class="m-row" id="div-cat-editor">
                    
                </div>
                <div class="m-row">
                    <a class="btn-role btn" id="btn-add-role">Dodaj rolu</a>
                </div>
            </form>
		</div>
	</div>
</div>