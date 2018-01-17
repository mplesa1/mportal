<?php
    session_start();
    require_once 'actions/db.php';
    $id_cat3 = substr(trim(htmlentities($_GET['cat'])),3 , 4);

    $sql3 =  "SELECT a.id_a as id_a, a.title as title, a.description as description, a.foto_url as foto_url, a.foto_alt as foto_alt, c.name as name_cat 
        FROM article a, category_article c
        WHERE a.fk_id_cat = :id_cat 
        AND c.id_cat = :id_cat
        AND a.active = 1";
    $stmt3 = $db->prepare($sql3);
    $stmt3->bindParam(':id_cat', $id_cat3);
    $stmt3->execute();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Nogomet | MPortal</title>
		<meta name="description" content="Portal je namjenjem svim ljubiteljima zanimljivog sadržaja">
        <?php include_once "includes/head.php"; ?>
    </head>
    <body>
        <header>
            <?php include_once "includes/nav.php"; ?>
        </header>
        <hr>
        <div class="wrapper">
            <section class="cat-section">            
<?php
    $result3 = $stmt3->fetch();
    $name_cat = $result3['name_cat'];
?>
    <h1><?php echo $name_cat;?></h1>              
<?php
    $cat_url = substr($name_cat, 0, 3); 
    $stmt3->execute();
    $result4 = $stmt3->fetchall();
    foreach ($result4 as $res3) {      
?>           
                <a href="article.php?cat=<?php echo $cat_url,$id_cat3;?> &art=<?php echo $res3['id_a']; ?>">
                    <div class="cat-art">
                        <img src="<?php echo $res3['foto_url'] ;?>" alt="<?php echo $res3['foto_alt'] ;?>">
                        <div class="cat-art-name">
                            <h2><?php echo $res3['title']; ?></h2>
                        </div>
                    </div>
                </a>
<?php }
?>
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