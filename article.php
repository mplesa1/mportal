<?php
    session_start();
    require_once 'actions/db.php';

    if (isset($_GET['art'])) {
        $id_a = $_GET['art'];
        $sql_a = "SELECT article.*, user.username 
                  FROM article 
                  INNER JOIN user ON article.fk_id_u = user.id_u 
                  WHERE id_a = :id_a";
        $stmt_a = $db->prepare($sql_a);
        $stmt_a->bindParam(':id_a', $id_a);
        $stmt_a->execute();
        $result_a = $stmt_a->fetchall(PDO::FETCH_OBJ);
        foreach ($result_a as $res_a) {
            $title = $res_a-> title;
            $foto_url = $res_a-> foto_url;
            $foto_alt = $res_a-> foto_alt;
            $id_u = $res_a-> fk_id_u;
            $date =  $res_a-> date_publication;
            $content = $res_a-> content;
            $likes = $res_a-> number_likes;
            $author = $res_a-> username;
            require_once 'actions/date_format.php';    
        }
// LOG VIEWS
        $sql_log = "INSERT INTO log_views (fk_id_a) VALUES ( :id_a)";
        $stmt_log = $db->prepare($sql_log);
        $stmt_log->bindParam(':id_a', $id_a);
        $stmt_log->execute();
    }

// LIEKS 
    if (isset($_POST['id'])) {
        $likeID = $_POST['id'];
        $sql_l = "UPDATE article 
                  SET number_likes = number_likes + 1
                  WHERE id_a = :id";
        $stmt_l = $db -> prepare($sql_l);
        $stmt_l -> execute(array(':id'=>$likeID));

        if ($stmt_l -> rowCount() > 0){
            echo "Drago nam je da Vam se članak sviđa !";
            die();
        }else {
            echo "Došlo je do greške, pokušajte ponovno !";
            die();
            }
    }
// MOST POPULAR ARTICLE
    $sql_v = "SELECT COUNT(fk_id_a) AS article_view, l.fk_id_a as fk_id_a, a.title as title, a.description as description, a.foto_url as foto_url, a.foto_alt as foto_alt, c.name as name_cat, c.id_cat as id_cat
            FROM log_views l, article a, category_article c 
            WHERE l.fk_id_a = a.id_a
            AND a.active = 1
            AND a.id_a != :id_a
            AND c.id_cat = a.fk_id_cat 
            GROUP BY fk_id_a 
            ORDER BY COUNT(fk_id_a) DESC 
            LIMIT 4";
    $stmt_v = $db->prepare($sql_v);
    $stmt_v->bindParam(':id_a', $id_a);
    $stmt_v->execute();
    $result_v = $stmt_v->fetchall(PDO::FETCH_OBJ)
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Članak | MPortal</title>
		<meta name="description" content="Portal je namjenjem svim ljubiteljima zanimljivog sadržaja">
        <?php include_once "includes/head.php"; ?>
    </head>
    <body>
        <header>
            <?php include_once "includes/nav.php"; ?>
        </header>
        <hr>
        <div class="wrapper">
            <section class="article-section">  
                <article>
                    <h1><?php echo $title; ?></h1>
                    <div class="article-img">
                        <img src="<?php echo $foto_url; ?>" alt="<?php echo $foto_alt; ?>">
                    </div>
                    <div class="article-details">
                        <span>Autor: <?php echo $author; ?> / Objavljeno: <?php echo date_format_ch($date); ?></span>
                    </div>
                    <p><?php echo $content; ?></p>
                </article>
                <aside>
                    <h2>Najčitanije:</h2>
<?php 
     foreach ($result_v as $res_v) {
        $name_cat = $res_v-> name_cat;
        $cat_url = substr($name_cat, 0, 3);
        $id_cat = $res_v-> id_cat; 
?>
                    <a href="article.php?cat=<?php echo $cat_url,$id_cat;?> &art=<?= $res_v-> fk_id_a; ?>">
                        <div class="small-art aside-art">
                            <img src="<?= $res_v-> foto_url; ?>" alt="<?= $res_v-> foto_alt; ?>">
                            <div class="small-art-name aside-art-name">
                               <h2><?= $res_v-> title; ?></h2>
                            </div>
                        </div>
                    </a>
<?php } ?>
                </aside>
            </section>
        </div>
        <div class="wrapper">
            <div class="likes" id="likes">
                <a class="like btn" id="btn-like" onclick="like('<?php echo $id_a; ?>')"><p>Sviđa mi se članak</p></a>
            <span id="span-like">
                <h2 id="number-likes">Ukupno "sviđa mi se članak" : <?php echo $likes ?></h2>
            </span>
            </div>
            <hr>
<?php 
    if(isset($_SESSION['user'])){
        $id_user = $_SESSION['user']['id'];
        $username = $_SESSION['user']['username'];
        $email = $_SESSION['user']['email'];
    }else{
        $id_user = '';
        $username = '';
        $email = '';
    }
    
?>
        <div id="commetns-refresh">
            <div class="comments">
                <form class="comment-form" id="comment-form" onsubmit = "return false">
                    <h2>Komentiraj članak</h2>
                    <div class="comment-form-row">
                        <label for="name">Ime ili nadimak *</label>
                        <input type="text" id="user_c" placeholder="Ime ili nadimak" value="<?php echo $username; ?>" required>
                    </div>
                    <div class="comment-form-row">
                        <label for="email">Email *(nije vidljiv javno)</label>
                        <input type="email" id="email_c" placeholder="Email" value="<?php echo $email; ?>" required>
                    </div>
                    <textarea id="comment" placeholder=" Komentar..." required></textarea>
                    <a class="comment-btn btn" type="submit" onclick="comment('<?php echo $id_user; ?>',
                                '<?php echo $id_a; ?>')">Objavi</a>
                </form>   
            </div>

            <h2 class="comments-h2">Komentari:</h2>
<?php
    $sql_k = "SELECT username, comment, 
    DATE_FORMAT(date_publication, '%d.%m.%Y %H:%i:%s') AS front_date
    FROM comment 
    WHERE fk_id_a = :id_a 
    AND active = 1 
    ORDER BY date_publication DESC ";
            $stmt_k = $db->prepare($sql_k);
            $stmt_k->bindParam(':id_a', $id_a);
            $stmt_k->execute();
            $result_k = $stmt_k->fetchall(PDO::FETCH_OBJ);
            foreach ($result_k as $res_k) {
?>            
            <div class="comments-review">
                <h3>User: <?php echo $res_k->username; ?></h3>
                <h4>Datum/vrijeme: <?php echo $res_k-> front_date;?>
                    <br><br>Komentar: </h4>
                <p><?php echo $res_k->comment; ?></p>
            </div>
<?php } ?>
        </div>
        </div>
        <hr>
       <footer class="footer">
           <?php include_once "includes/footer.php"; ?>
        </footer>
        <?php include_once "modals/login.php"; ?>
        <?php include_once "modals/reg.php"; ?>
        <script src="js/script.js"></script>
    </body>
</html>