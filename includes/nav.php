<?php
    $sql = "SELECT * FROM category_article WHERE parent is NULL AND active = 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
?>
<nav>
    <a href="index.php"><img src="img/logo.png" alt="MPortal logo"></a>
    <i class="material-icons" id="ham">&#xe5d2;</i>
    <i class="material-icons" id="ham-close">&#xe14c;</i>
    <ul class="menu" id="menu">
        <?php
            $result = $stmt -> fetchAll(PDO::FETCH_OBJ);
            foreach ($result as $res){   
            $parent_id = $res -> id_cat;
            $name_db = $res -> name;
            $name = substr($name_db, 0, 3);
            $sql2 = "SELECT * FROM category_article WHERE parent = :parent_id AND active = 1";
            $stmt2= $db -> prepare($sql2);
            $stmt2 -> bindValue(":parent_id", $parent_id, PDO::PARAM_INT);
            $stmt2 -> execute(); 
        ?>
        <li>
            <a class="drop" id="drop<?php echo $parent_id;?>" 
                onmouseover="dropdown('<?php echo $parent_id;?>')">
                <?php echo $res-> name ; ?>
            </a>
            <ul class="dropdown dropdown_s" id="dropdown<?php echo $parent_id;?>">
            <?php 
                $result2 = $stmt2 -> fetchAll(PDO::FETCH_OBJ);
                foreach ($result2 as $res2){
                $id_cat = $res2 -> id_cat;
                $name_db2 = $res2 -> name;
                $name2 = substr($name_db2, 0, 3);  
            ?>    
                <li><a a href="cat_art.php?cat=<?php echo $name2, $id_cat; ?>"><?php echo $res2-> name ; ?></a></li>
            <?php } ?> 
            </ul>
        </li>
        <?php } ?> 

        <li>
            <?php
    if(isset($_SESSION['user'])){
?>
<span class="welcome">Pozdrav <?php echo $_SESSION['user']['username']?> !</span>
<?php } ?>  
            <a class="drop" id="drop">Korisnici</a>
            <ul class="dropdown" id="dropdown">
            <?php
                if(!isset($_SESSION['user'])){
            ?>   
                <li><a onclick="openLogin()">Prijava</a></li>
                <li><a onclick="openReg()">Registracija</a></li>
            <?php }else{ ?> 
                <li><a href="profil.php">Profil</a></li>
            <?php if (($_SESSION['user']['role'] == 2) || ($_SESSION['user']['role'] == 3)){?> 
                <li><a href="admin.php">Admin</a></li>
            <?php } ?>    
                <li><a class="logout">Odjava</a></li>
            <?php } ?>     
           </ul>
        </li>
    </ul>
</nav>
   