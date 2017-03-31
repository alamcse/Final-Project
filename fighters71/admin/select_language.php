<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');

	}
	include('../config.php');

?>

<?php include'admin_includes/header.php';?>


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        
         <div class="panel-body" style="height:450px;">
         	<br>
         	<h2 style="text-align:center;">Select a Language</h2>

         	<h1 class="button_area" style="height:200px;margin-top:80px;background:#a08f8f;text-align:center">
			<?php
	            $i=0;
	            $statement=$db->prepare("select * from tbl_language ");
	            $statement->execute();
	            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
	          	foreach ($result as $row)
	            {
	            ?>	
	            <a class="btn btn-large btn-primary" style="margin-top:80px;" href="index.php?lang_id=<?php echo $row['lang_id']; ?>"><?php echo $row['lang_name']; ?></a>
	         <?php
	         	}
	         ?> 
	         <br>
	         

         	</h1>  
         	<p class="logout"style="text-align:right"><a class="btn btn-sm btn-success"  href="logout.php">Logout</a></p>  

		
		
        </div>
	</div>
		
</div>

<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


