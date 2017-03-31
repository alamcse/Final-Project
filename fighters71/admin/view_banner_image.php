<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	include('../config.php');

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-6 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">

			 <div class="panel panel-default"style="margin-left:0px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;">View Banner Images</h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	
                    	<br><br>
                        
                        
                                   <?php
                                             $i=0;
                                             $statement=$db->prepare("select * from tbl_banner order by banner_id asc ");
                                             $statement->execute();
                                             $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                             foreach ($result as $row)
                                              {
                                                  $i++;
                                        ?>
                                 
                                        <img src="../img/<?php echo $row['banner_image']?>" alt="" width="80%">
                                        <br>
                                        <a href="edit_banner_image.php?id=<?php echo $row['banner_id']?>&lang_id=<?php echo $lang_id;?>">Edit</a>
                                        <a href="delete_banner_image.php?id=<?php echo $row['banner_id']?>&lang_id=<?php echo $lang_id;?>">Delete</a>
                                     
                                   <?php
                                        }
                                   ?>
                       

					
                    </div>
                </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


