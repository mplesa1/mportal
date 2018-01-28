<div id="modal-reg" class="modal modal-reg">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close" id="close-login" onclick="closeReg()">&times;</span>
			<h2>Registracija</h2>
		</div>
		<div class="modal-body">
			<form class="modal-form" id="reg-form" onsubmit = "return false">
				<div id="msg-reg" class="msg-0"></div> 
				<div class = "m-row">
					<div id = "login-notice"></div>
				</div>
                <div class="m-row">
					<label for="username">Username</label>
					<input type="text" id="username" required>
				</div>
				<div class="m-row">
					<label for="email">Email</label>
					<input type="email" id="email" required>
				</div>
				<div class="m-row">
					<label for="pwd">Lozinka</label>
					<input type="password" id="pwd" required>
				</div>
                <div class="m-row">
					<label for="pwd_repeated">Ponovljena lozinka</label>
					<input type="password" id="pwd_repeated" required>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<a class="btn-modal btn" id="btn-reg" type="submit" onclick="register()";>Registriraj se</a>
		</div>
	</div>
</div>