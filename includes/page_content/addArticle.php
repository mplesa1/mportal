<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    } 
    if (!isset($db)) {
       include_once  "../../actions/db.php";
    }

    if (($_SESSION['user']['role'] != 2) && ($_SESSION['user']['role'] != 3)) {
        header ("location: index.php");
        die();
    }
    
    $msg = "";
    $id = round(microtime(true));
    $name = "img_".$id.".";
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST['submit'])) {
          if (empty($_POST['category_article']) || empty($_POST['position_article']) || 
              empty($_POST['title_article']) || empty($_POST['content_article']) || 
              empty($_POST['description_article']) || empty($_POST['foto_alt'])) {
                  $msg = '<div class="msg-article">Niste ispunili sva polja !</div>';
          }else{
              $fk_id_cat = $_POST['category_article'];
              $position = $_POST['position_article'];
              $title = $_POST['title_article'];
              $content = $_POST['content_article'];
              $description = $_POST['description_article'];
              $foto_alt = $_POST['foto_alt'];
              $foto_url = "";
              $date_publication = date("Y-m-d H:i:s");

              $status_upload = 0;

              if(isset($_FILES['foto'])){
                $errors= array();
                $file_name = $_FILES['foto']['name'];
                $foto_url = $file_name;
                $file_size =$_FILES['foto']['size'];
                $file_tmp =$_FILES['foto']['tmp_name'];
                $file_type=$_FILES['foto']['type'];
                $tmp = explode('.',$_FILES['foto']['name']);
                $file_ext=strtolower(end($tmp));
                $fk_id_u = $_SESSION['user']['id']; 
                $newFileName = $name . end($tmp);
                $expensions= array("jpeg","jpg","png");
                
                if(in_array($file_ext,$expensions)=== false){
                   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }
                
                if($file_size > 2097152){
                   $errors[]='File size must be excately 2 MB';
                }
                
                if(empty($errors)==true){
                   move_uploaded_file($file_tmp,"img/article/".$newFileName);
                   $status_upload = 1;
                }
              }else{
                  $msg = '<div class="msg-article">Odaberite fotografiju klikom na Browse...</div>';
              }

              if ($status_upload = 1) {
                  $sql = "INSERT INTO article (fk_id_u, fk_id_cat, title, description, content, foto_url, foto_alt, date_publication, position)
                      VALUES (:fk_id_u, :fk_id_cat, :title, :description, :content, :foto_url, :foto_alt, :date_publication, :position)";
                  $stmt = $db -> prepare($sql);
                  $stmt->execute(array(':fk_id_u'=>$fk_id_u, ':fk_id_cat'=>$fk_id_cat, ':title'=>$title, ':description'=>$description, ':content'=>$content, ':foto_url'=>"img/article/".$newFileName, ':foto_alt'=>$foto_alt, ':date_publication'=>$date_publication, ':position'=>$position));

                  if ($stmt -> rowCount() > 0) {
                           $msg = '<div class="msg-article">Članak je uspješno objavljen !</div>';
                      }else{
                           $msg = '<div class="msg-article">Nažalost, članak nije dodan !</div>';
                      }
              }
        }
      }
    }


?>
<h2>Novi članak</h2>
<?php if ($msg != ""){ echo $msg; }?>
<form class="admin-form modal-form" method="POST" action="" enctype="multipart/form-data">
    <div class="m-row">
        <label for="category_article">Kategorija:</label>
        <select name="category_article" id="category_article" required>
<?php
    if ($_SESSION['user']['role'] == 2) {
      $sql_editor = "SELECT r.fk_id_cat as id_parent, r.fk_id_u as id_u, c.id_cat as id_cat, c.name as name
                    FROM role_editor r, category_article c
                    WHERE r.fk_id_cat = c.parent
                    AND r.fk_id_u = :id_u
                    AND c.active = 1";
      $stmt_editor = $db->prepare($sql_editor);
      $stmt_editor->bindParam(':id_u', $_SESSION['user']['id']);
      $stmt_editor->execute();
      $result_editor = $stmt_editor -> fetchAll(PDO::FETCH_OBJ);
      foreach ($result_editor as $res_editor){
          $name_editor = $res_editor-> name;
          $id_cat_editor = $res_editor-> fk_id_cat;
?>
            <option value="<?php echo $id_cat_editor; ?>"><?php echo $name_editor; ?></option>
<?php
      }  }elseif ($_SESSION['user']['role'] == 3){
      $sql = "SELECT * FROM category_article WHERE parent IS NOT NULL AND active = 1";
      $stmt = $db->prepare($sql);
      $stmt->execute();
      $result = $stmt -> fetchAll(PDO::FETCH_OBJ);
      foreach ($result as $res){
          $name = $res-> name;
          $id_cat = $res-> id_cat;
?>
            <option value="<?php echo $id_cat; ?>"><?php echo $name; ?></option>
<?php } }?>
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
        <label for="foto_upload">Fotografija proizvoda</label>
    </div>
    <div class = "m-row">
        <input type="file" name="foto" id="foto_upload" required>
    </div>
    <div class="m-row">
        <label for="foto_alt">Opis slike:</label>
        <input type="text" id="foto_alt" name="foto_alt" required>
    </div>
    <div class="m-row">
        <button class="btn-objavi btn" type="submit" name="submit">Objavi</button>
    </div>
</form>