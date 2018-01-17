<div id="modal-user" class="modal modal-reg">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close" id="close-login" onclick="closeUser()">&times;</span>
			<h2>O korisniku</h2>
		</div>
		<div class="modal-body">
			<form class="modal-form" id="user_change_form" onsubmit = "return false">
				<div id="msg-user" class="msg-0"></div>
				<input id="id_u" type="hidden">
                <div class="m-row">
					<label for="l_username">Username</label>
					<input type="text" id="a_username" readonly>
				</div>
				<div class="m-row">
					<label for="l_email">Email</label>
					<input type="email" id="a_email">
				</div>
				<div class="m-row">
                    <label for="user_role">Uloga:</label>
                    <select name="user_role" id="user_role">
 <?php 
    $sql_selected = "SELECT * FROM role_user";
    $stmt_selected = $db->prepare($sql_selected);
    $stmt_selected->execute();
    $result_selected = $stmt_selected -> fetchAll(PDO::FETCH_OBJ);
    foreach ($result_selected as $res){
        $id_r = $res -> id_r;
        $name = $res -> name;
        echo '<option id="option_parent" value="'.$id_r.'">'.$name.'</option>';        
    } ?>
                    </select>
                </div>
                <div class="m-row">
					<label for="fname">Ime</label>
					<input type="text" id="a_fname" readonly>
				</div>
                <div class="m-row">
					<label for="lname">Prezime</label>
					<input type="text" id="a_lname" readonly>
				</div>
                <div class="m-row">
					<label for="address">Adresa</label>
					<input type="text" id="a_address" readonly>
				</div>
                <div class="m-row">
					<label for="city">Grad</label>
					<input type="text" id="a_city" readonly>
				</div>
                <div class="m-row">
					<label for="post_number">Poštanski broj</label>
					<input type="number" min="10000" id="a_post_number" readonly>
				</div>
                <div class="m-row">
					<label for="country">Država</label>
					<input type="text" id="a_country" readonly>
				</div>
                <div class="m-row">
					<label for="date_reg">Datum registracije</label>
					<input type="datetime" id="date_reg" readonly>
				</div>
                <div class="m-row">
					<label for="date_last_change">Datum zadnje promjene</label>
					<input type="datetime" id="date_last_change" readonly>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<a class="btn-modal btn" id="change_user">Izmjeni</a>
		</div>
	</div>
</div>