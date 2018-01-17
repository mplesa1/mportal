<?php
    session_start();
    require_once 'actions/db.php';
// MAIN ARTICLE
    $sql_main = "SELECT article.*, category_article.name 
                FROM article 
                INNER JOIN category_article ON article.fk_id_cat = category_article.id_cat 
                WHERE article.position = 2 AND article.active = 1 
                ORDER BY (article.date_publication) DESC LIMIT 1 ";
    $stmt_main = $db->prepare($sql_main);
    $stmt_main->execute();
    $result_main = $stmt_main->fetchall(PDO::FETCH_OBJ);

// SMALL ARTICLE
    $sql_small = "SELECT a.id_a as id_a, a.title as title, a.description as description, a.foto_url as foto_url, a.foto_alt as foto_alt, a.date_publication as date_publication, a.date_last_change as date_last_change, a.position as position, a.fk_id_cat as fk_id_cat, c.name as name_cat 
                FROM article a, category_article c 
                WHERE a.fk_id_cat = c.id_cat 
                AND a.position = 3 
                AND a.active = 1 
                ORDER BY (date_publication) 
                DESC LIMIT 2 ";
    $stmt_small = $db->prepare($sql_small);
    $stmt_small->execute();
    $result_small = $stmt_small->fetchall(PDO::FETCH_OBJ);

// TOP RATED ARTICLE
    $sql_rated = "SELECT article.*, category_article.name 
                FROM article 
                INNER JOIN category_article ON article.fk_id_cat = category_article.id_cat 
                WHERE article.active = 1 
                ORDER BY (article.number_likes) DESC LIMIT 10 ";
    $stmt_rated = $db->prepare($sql_rated);
    $stmt_rated->execute();
    $result_rated = $stmt_rated->fetchall(PDO::FETCH_OBJ);


// LAST PUBLISHED ARTICLE
    $sql_last = "SELECT article.*, category_article.name 
                FROM article 
                INNER JOIN category_article ON article.fk_id_cat = category_article.id_cat 
                WHERE article.active = 1 
                ORDER BY (article.date_publication) DESC LIMIT 10 ";
    $stmt_last = $db->prepare($sql_last);
    $stmt_last->execute();
    $result_last = $stmt_last->fetchall(PDO::FETCH_OBJ);
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Početna | MPortal</title>
		<meta name="description" content="Portal je namjenjem svim ljubiteljima zanimljivog sadržaja">
        <?php include_once "includes/head.php"; ?>
    </head>
    <body>
        <header>
            <?php include_once "includes/nav.php"; ?>
        </header>
        <div class="wrapper">
            <section class="main-art">
<?php foreach ($result_main as $res_main) { 
        $name_cat = $res_main-> name;
        $cat_url = substr($name_cat, 0, 3);
        $id_cat = $res_main-> fk_id_cat; 
?>
                <a href="article.php?cat=<?php echo $cat_url,$id_cat;?> &art=<?= $res_main-> id_a; ?>">
                    <div class="big-art">
                        <img src="<?= $res_main-> foto_url; ?>" alt="<?= $res_main-> foto_alt; ?>">
                        <div class="big-art-name">
                            <h2><?= $res_main-> title; ?></h2>
                        </div>
                       <a href="cat_art.php?cat=<?php echo $cat_url,$id_cat;?>"><span class="art-cat-big"><?= $res_main-> name; ?></span></a>
                    </div>
                </a>
<?php } 
    foreach ($result_small as $res_small) { 
        $name_cat = $res_small-> name_cat;
        $cat_url = substr($name_cat, 0, 3);
        $id_cat = $res_small-> fk_id_cat; 
?>
                <a href="article.php?cat=<?php echo $cat_url,$id_cat;?> &art=<?= $res_small-> id_a; ?>">
                    <div class="small-art">
                        <img src="<?= $res_small-> foto_url; ?>" alt="<?= $res_small-> foto_alt; ?>">
                        <div class="small-art-name s-art-name">
                            <h2><?= $res_small-> title; ?></h2>
                        </div>
                        <a href="cat_art.php?cat=<?php echo $cat_url,$id_cat;?>"><span class="art-cat-small art-cat-s"><?= $res_small-> name_cat; ?></span></a>
                    </div>
                </a>
<?php } ?>  
            </section>
        </div>
        <hr>
        <div class="wrapper">
            <section class="other-section">
                <div class="new-art">
                    <h1>Najnoviji članci</h1>
  <?php foreach ($result_last as $res_last) { 
        $name_cat = $res_last-> name;
        $cat_url = substr($name_cat, 0, 3);
        $id_cat = $res_last-> fk_id_cat; 
?>
                    <a href="article.php?cat=<?php echo $cat_url,$id_cat;?> &art=<?= $res_last-> id_a; ?>">
                        <div class="other-art">
                            <img src="<?= $res_last-> foto_url; ?>" alt="<?= $res_last-> foto_alt; ?>">
                            <div class="small-art-name">
                               <h2><?= $res_last-> title; ?></h2>
                            </div>
                            <a href="cat_art.php?cat=<?php echo $cat_url,$id_cat;?>"><span class="art-cat-small"><?= $res_last-> name; ?></span></a>
                        </div>
                    </a>
<?php } ?>  
                </div>
                
                <div class="score-art">
                    <h1>Najbolje ocjenjeni članci</h1>
<?php foreach ($result_rated as $res_rated) { 
        $name_cat = $res_rated-> name;
        $cat_url = substr($name_cat, 0, 3);
        $id_cat = $res_rated-> fk_id_cat; 
?>
                    <a href="article.php?cat=<?php echo $cat_url,$id_cat;?> &art=<?= $res_rated-> id_a; ?>">
                        <div class="other-art">
                            <img src="<?= $res_rated-> foto_url; ?>" alt="<?= $res_rated-> foto_alt; ?>">
                            <div class="small-art-name">
                               <h2><?= $res_rated-> title; ?></h2>
                            </div>
                            <a href="cat_art.php?cat=<?php echo $cat_url,$id_cat;?>"><span class="art-cat-small"><?= $res_rated-> name; ?></span></a>
                        </div>
                    </a>
<?php } ?>  
                </div>
            </section>
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