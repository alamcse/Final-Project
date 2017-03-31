<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	include('../config.php');

?>
<?php

if(!isset($_REQUEST['id'])){
	header('location:view_footer_logo_image.php');
}
else{
	$id=$_REQUEST['id'];
}

?>

<?php
if(isset($_POST['form1'])) 
{
	
	try {
	
		
			

			$up_filename=$_FILES["footer_logo_image"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename,'.')); //strip extention
			$file_ext=substr($up_filename,strripos($up_filename,'.')); //strip name
			$f1=$id.$file_ext;
				
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
			throw new Exception('Only png,jpg,jpeg and gif format images are allowed to upload.');

			$statement=$db->prepare("select * from tbl_footer_logo where footer_logo_id=?");
			$statement->execute(array($id));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) 
			{
				$real_path="../img/".$row['footer_logo_image'];
				unlink($real_path);

			}


			move_uploaded_file($_FILES["footer_logo_image"]["tmp_name"],"../img/".$f1); 
				

			$statement=$db->prepare("update tbl_footer_logo set footer_logo_image=? where footer_logo_id=?");
			$statement->execute(array($f1,$id));

			$success_message='Logo Image has been successfully updated';
			
		}
		
			catch(Exception $e) {
				$error_message = $e->getMessage();
		}
	
}

?>

<?php
			$statement=$db->prepare("select * from tbl_footer_logo where footer_logo_id=?");
			$statement->execute(array($id));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
			
				$footer_logo_image=$row['footer_logo_image'];
						
			}

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;">Update Footer Logo Image</h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
         	<?php 
				
			if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
			if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
				
			?>
		<form action="" method="post" enctype="multipart/form-data">

			

			<table>

				
				<tr>
					<td>Previous Logo Image Preview</td>
		
				</tr>
				<tr>
					<td><img src="../img/<?php echo $footer_logo_image; ?>" alt="" width="50%"></td>
		
				</tr>
				<tr>
					<td>Insert a New Logo Image</td>
		
				</tr>
				<tr>
					<td><input type="file" name="footer_logo_image" value="Upload"> </td>
				</tr>
					
				<tr>
						<td><input type="submit" name="form1" value="Save"></td>
				</tr>
		</table>

	</form>
		
		
        </div>
	</div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	