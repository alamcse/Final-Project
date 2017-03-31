<?php

     ob_start();
     session_start();
     if($_SESSION['name']!='admin'){
          header('location:login.php');
     }

     if(isset($_REQUEST['lang_id'])){

          $lang_id=$_REQUEST['lang_id'];
     }

     include('../config.php');

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-6 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">

			 <div class="panel panel-default"style="margin-left:0px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;">View Slider Images</h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	<a href="insert_slider_image.php" class="btn btn-success pull-right"> Insert Slider Image</a>
                    	<br><br>
                         <table class="table table-hover table-bordered"style="text-align:center">
                              <thead>
                                   <th>Photo</th>
                                   <th>Title</th>
                                   <th>Caption</th>
                                   <th>Action</th>
                              </thead>
                    		<tbody>
                                   <?php
                                             $i=0;
                                             $statement=$db->prepare("select * from tbl_slider_image order by slider_image_id asc ");
                                             $statement->execute();
                                             $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                             foreach ($result as $row)
                                              {
                                                  $i++;
                                        ?>
                                   <tr>
                                        <td><img src="../img/slider/<?php echo $row['slider_image']?>" style="width:200px;height:150px;"></td>
                                        <td><?php echo $row['slider_image_title']?></td>
                                        <td><?php echo $row['slider_image_caption']?></td>
                                        <td> <a href="edit_slider_image.php?id=<?php echo $row['slider_image_id']?>&lang_id=<?php echo $lang_id;?>&lang_id=<?php echo $lang_id;?>">Edit</a>
                                             <a href="delete_slider_image.php?id=<?php echo $row['slider_image_id']?>&lang_id=<?php echo $lang_id;?>">Delete</a>
                                        </td>
                                   </tr>
                                   <?php
                                        }
                                   ?>
                                   

                              </tbody>
                    		
                    	</table>
						

					
                    </div>
                </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


