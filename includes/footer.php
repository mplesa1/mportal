<?php
	$sql_count = "SELECT COUNT(*) FROM article";
	$stmt_count = $db->prepare($sql_count);
    $stmt_count->execute();
    $result_count = $stmt_count->fetch();
?>
<div class="footer-left">
    <a href="index.php"><img src="img/logo.png" alt="MPortal logo"></a>
</div>
<div class="footer-right">
    <h3>Objavljeno članaka: <?= $result_count['COUNT(*)']; ?></h3>
    <p class="copy">Copyright&copy; by <i>Marko Pleša</i> - 2017</p>
</div>