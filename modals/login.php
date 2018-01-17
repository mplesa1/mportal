<div id="modal-login" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close" id="close-login" onclick="closeLogin()">&times;</span>
			<h2>Prijava</h2>
		</div>
		<div class="modal-body">
			<form class="modal-form" id="login-form" onsubmit = "return false">
				<div id="msg-login" class="msg-0"></div> 
				<div class="m-row">
					<label for="email">Email</label>
					<input type="email" id="email_l" required>
				</div>
				<div class="m-row">
					<label for="pwd">Lozinka</label>
					<input type="password" id="pwd_l" required>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<a class="btn-modal btn" id="btn-login" type="submit" onclick="login()";>Prijavi se</a>
		</div>
	</div>
</div>
