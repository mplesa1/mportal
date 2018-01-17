<?php 
	if(!isset($_SESSION)){ 
        session_start(); 
    } 

	if (($_SESSION['user']['role'] != 2) && ($_SESSION['user']['role'] != 3)) {
        header ("location: index.php");
        die();
    }