<div id="modal-cat" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close" id="close-cat" onclick="closeCat()">&times;</span>
			<h2 id="modal_title">Promjena kategorije</h2>
		</div>
		<div class="modal-body">
			<form class="admin-form modal-form" id="cat_change_form" onsubmit="return false">
            <div id="msg-cat" class="msg-0"></div>
                <input id="cat_id" type="hidden"> 
                <div class="m-row">
                    <label for="title_category">Naziv:</label>
                    <input type="text" id="title_category" name="title_category">
                </div>
                <div class="m-row">
                    <label for="category_parent">Pripada:</label>
                    <select name="category_parent" id="category_parent">
<?php 
    $sql_selected = "SELECT * FROM category_article WHERE parent is NULL";
    $stmt_selected = $db->prepare($sql_selected);
    $stmt_selected->execute();
    $result_selected = $stmt_selected -> fetchAll(PDO::FETCH_OBJ);
    foreach ($result_selected as $res){
        $id_c = $res -> id_cat;
        $name = $res -> name;
        echo '<option id="option_parent" value="'.$id_c.'">'.$name.'</option>';        
    } ?>
                    </select>
                </div>
                <div class="m-row">
                    <a class="btn-objavi btn" id="change_cat">Izmjeni</a>
                </div>
            </form>
		</div>
	</div>
</div>
