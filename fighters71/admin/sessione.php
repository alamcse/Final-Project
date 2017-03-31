<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	
?>

       <?php 
        ob_start();
        session_start();
        $_SESSION['name'] = 'bangla';
        $lang_id = 'bn';
        include('index.php');
   ?>