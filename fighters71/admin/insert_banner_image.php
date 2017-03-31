<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	include('../config.php');

?>
<?php
if(isset($_POST['form1'])) 
{
	
	try {
		
	
			$statement=$db->prepare("show table status like 'tbl_banner'");
			$statement->execute();
			$result=$statement->fetchAll();
			foreach($result as $row)
			$new_id=$row[10]; 
				
				
			$up_filename=$_FILES["banner_image"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename,'.')); //strip extention
			$file_ext=substr($up_filename,strripos($up_filename,'.')); //strip name
			$f1=$new_id.$file_ext;
				
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
			throw new Exception('Only png,jpg,jpeg and gif format images are allowed to upload.');
			move_uploaded_file($_FILES["banner_image"]["tmp_name"],"../img/".$f1); 



			$statement=$db->prepare("insert into tbl_banner(banner_image) value(?)");

			$statement->execute(array($f1));

			$success_message='Banner Image has been successfully inserted';
			
		}
		
			catch(Exception $e) {
				$error_message = $e->getMessage();
		}
	
}

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;">Upload Banner Image</h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
         	<?php 
				
			if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
			if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
				
			?>
				<form action="" method="post" enctype="multipart/form-data">

					

					<table>

						
						<tr>
							<th><h5>Insert a New Banner Image:</h5></th>
						</tr>
						<tr>
							<td><input type="file" name="banner_image" ><br></td>
						</tr>

						<tr>
							<td><input type="submit" name="form1" value="Upload Image" ></td>
						</tr>
					</table>
				</form>

				</div>
        </div>
	</div>
		

<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		  