<?php
    require_once "includes/editor_control.php";
    require_once 'actions/db.php';

    $sql = "SELECT * FROM category_article WHERE parent IS NOT NULL ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | MPortal</title>
		<meta name="description" content="Portal je namjenjem svim ljubiteljima zanimljivog sadržaja">
        <?php include_once "includes/head.php"; ?>
    </head>
    <body>
        <header>
            <?php include_once "includes/nav.php"; ?>
        </header>
        <div class="wrapper">
            <div class="admin-nav <?= $_SESSION['user']['role'] == '3' ? '' : 'editor-nav' ?>">
                <nav>   
                    <ul>
                        <li><a onclick="refreshContent('includes/page_content/addArticle.php', 'admin-content');">Novi članak</a></li>
                        <li><a onclick="refreshContent('includes/page_content/articleAdmin.php', 'admin-content');">Članci</a></li>
                        <?php if ($_SESSION['user']['role'] == 3){ ?>
                        <li><a onclick="refreshContent('includes/page_content/catAdmin.php', 'admin-content');">Kategorije</a></li>
                        <li><a onclick="refreshContent('includes/page_content/userAdmin.php', 'admin-content');">Korisnici</a></li>
                        <li><a onclick="refreshContent('includes/page_content/roleEditor.php', 'admin-content');">Role editora</a></li>
                        <?php } ?>
                    </ul>
                </nav> 
            </div>
        </div>
        <hr>
        <div class="wrapper">
            <section class="admin-content" id="admin-content">
                <?php include_once "includes/page_content/addArticle.php"; ?>
            </section>
        </div>
        <hr>
        <footer class="footer">
           <?php include_once "includes/footer.php"; ?>
        </footer>
        <?php include_once "modals/user.php"; ?>
        <?php include_once "modals/editor_role.php"; ?>
        <?php include_once "modals/cat.php"; ?>
        <?php include_once "modals/article.php"; ?>
        <?php include_once "modals/new_img.php"; ?>
        <script src="js/script.js"></script>
    </body>
</html>