<?php

	ob_start();
	session_start();
	$lang_id = $_GET['lang_id'];
	$_SESSION['lang_id'] = $lang_id;
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
?>
<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">

			<h3 style="text-align:center; margin-top:150px"><?php if($lang_id=='en'){echo 'Welcome to Fighters71 Dashboard';}else{echo' Fighters71 ড্যাশবোর্ডে স্বাগতম  ';};?></h3>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


