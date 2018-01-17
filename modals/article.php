<?php
    $sql = "SELECT * FROM category_article WHERE parent IS NOT NULL AND active = 1 ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
?>
<div id="modal-article" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close" id="close-login" onclick="closeArticle()">&times;</span>
			<h2>Promjena članka</h2>
		</div>
		<div class="modal-body">
			<form class="admin-form modal-form" onsubmit = "return false" id="modalChangeBlogPost">
                <input id="id_a" type="hidden"> 
                <div class="m-row">
                    <label for="category_article">Kategorija:</label>
                    <select name="category_article" id="category_article" required>
            <?php
                $result = $stmt -> fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $res){
                    $name = $res-> name;
                    $id_cat = $res-> id_cat;
            ?>
                        <option value="<?= $id_cat; ?>"><?= $name; ?></option>
            <?php } ?>
                    </select>

                </div>
                <div class="m-row">
                    <label for="position_article">Pozicija na stranici:</label>
                    <select name="position_article" id="position_article" required>
                        <option value="1">Normalno</option>
                        <option value="2">Početna veliki</option>
                        <option value="3">Početna mali</option>
                    </select>
                </div>
                <div class="m-row">
                    <label for="title_article">Naslov:</label>
                    <input type="text" name="title_article" id="title_article" required>
                </div>
                <div class="m-row">
                    <label for="content_article">Sadržaj:</label>
                    <textarea name="content_article" id="content_article" rows="10" required></textarea>
                </div>
                <div class="m-row">
                    <label for="description_article">Kratki opis:</label>
                    <textarea name="description_article" id="description_article" rows="4" required></textarea>
                </div>
                 <div class = "m-row">
                    <label>Trenutna fotografija članka</label>
                </div>
                <div class = "m-row img-article">
                    <img src="" id="img-article">
                </div>
                <div class = "m-row">
                    <a class="btn" id="new_img" onclick="newImg()">Odaberite novu fotografiju članka</a>
                </div>
                <div class = "m-row">
                    Slika URL: <span id="showimg"></span>
                </div>
                <div class="m-row">
                    <label for="foto_alt">Opis slike:</label>
                    <input type="text" id="foto_alt" name="foto_alt" required>
                </div>
                <div class="m-row">
                    <label for="date_publication_a">Datum objave</label>
                    <input type="datetime" id="date_publication_a" readonly>
                </div>
                <div class="m-row">
                    <label for="date_last_ch_a">Datum zadnje promjene</label>
                    <input type="datetime" id="date_last_ch_a" readonly>
                </div>
                <div class="m-row">
                    <label for="editor">Napisao:</label>
                    <input type="text" name="editor" id="editor" readonly>
                </div>
                <div class="m-row">
                    <div id="msg-art" class="msg-0"></div>
                </div>
                <div class="m-row">
                    <a id="change_article" class="btn-objavi btn">Izmjeni</a>
                </div>
            </form>
		</div>
	</div>
</div>
