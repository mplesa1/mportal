<div id="modal-editor" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close" id="close-login" onclick="closeEditor()">&times;</span>
			<h2>Promjena role editora</h2>
		</div>
		<div class="modal-body">
			<form class="admin-form modal-form">
                <div class="m-row">
                    <label for="l_username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="m-row row-check">
                    <p>Sport</p>
                    <input class="checkbox" type="checkbox" value="Sport">
                </div>
                <div class="m-row row-check">
                    <p>Tehnologija</p>
                    <input class="checkbox" type="checkbox" value="Tehnologija" checked>
                </div>
                <div class="m-row row-check">
                    <p>Povijest</p>
                    <input class="checkbox" type="checkbox" value="Povijest" checked>
                </div>
                <div class="m-row row-check">
                    <p>Avantura</p>
                    <input class="checkbox" type="checkbox" value="Avantura" checked>
                </div>
                <div class="m-row">
                    <a class="btn-objavi btn">Izmjeni</a>
                </div>
            </form>
		</div>
	</div>
</div>