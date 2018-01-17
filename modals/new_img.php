<div id="new-img" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close" id="close-img" onclick="closeNewImg()">&times;</span>
			<h2>Odaberite novu sliku</h2>
		</div>
		<div class="modal-body">
			<form id="uploadform" class="modal-form" action="process_upload.php" method="post" enctype="multipart/form-data" target="uploadframe" onsubmit="uploadimg(this); return false">
				<div class = "m-row">
        			<input type="file" name="myfile" id="myfile" required>
   				</div>
   				<div class = "m-row">
   					<input type="submit" value="Potvrdi sliku" class="btnSubmit" />
   				</div>
   				<div class="m-row">
   					<iframe id="uploadframe" name="uploadframe" src="process_upload.php" class="noshow"></iframe>
   				</div>
			</form>
		</div>
	</div>
</div>
