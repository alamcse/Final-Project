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

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6" style="background:#F5F5F5;min-height:510px">

			 <div class="panel panel-default"style="margin-left:0px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Upload Image Management';}else{echo'আপলোড ছবি ম্যানেজমেন্ট';};?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	
                    	<br><br>
                    	
                    	<table class="table table-hover table-bordered" style="text-align:center">

                    		<tbody>
                                  <tr>
                                   <td><a class="btn" href="insert_image.php?lang_id=<?php echo $lang_id;?>">Add Gallery Image </a></td>
                                   <td><a class="btn" href="view_image.php?lang_id=<?php echo $lang_id;?>">View Image</a></td>
                                  </tr>
                                  <tr>
                                   <td><a class="btn" href="insert_slider_image.php?lang_id=<?php echo $lang_id;?>">Add Slider Image </a></td>
                                   <td><a class="btn" href="view_slider_image.php?lang_id=<?php echo $lang_id;?>">View Image</a></td>
                                  </tr>
                                  <tr>
                                   <td><a class="btn" href="insert_banner_image.php?lang_id=<?php echo $lang_id;?>">Add Banner Image </a></td>
                                   <td><a class="btn" href="view_banner_image.php?lang_id=<?php echo $lang_id;?>">View Image</a></td>
                                  </tr>
                                  <tr>
                                   <td><a class="btn" href="insert_footer_logo_image.php?lang_id=<?php echo $lang_id;?>">Add Footer Logo </a></td>
                                   <td><a class="btn" href="view_footer_logo_image.php?lang_id=<?php echo $lang_id;?>">View Logo</a></td>
                                  </tr>
                                  <tr>

                    			
                    		</tbody>
                    	</table>
						

					
                    </div>
                </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


