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


<?php
if(isset($_POST['footer'])) 
{
	
	try {
	
		
		if(empty($_POST['footer_text'])){
			throw new Exception('Field can not be empty');
			
		}
		

			$statement=$db->prepare("update tbl_footer set footer_text=? where footer_id=1");
			$statement->execute(array($_POST['footer_text']));
			
	
			$success_message='Text has been successfully updated';
			
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
              <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Footer';}else{echo'ফুটার ';}?></h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
		<form method="post" action="" enctype="multipart/form-data">

			<?php 
				
			if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
			if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
				
			?>

			<table>
			<?php
						
						$statement=$db->prepare("select * from tbl_footer where footer_id=1");
						$statement->execute();
						$result=$statement->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result as $row)
						{
							
						?>

		
				<tr>
					<th><h4><?php if($lang_id=='en'){echo'Footer Text ';}else{echo'ফুটার টেক্সট ';}?>:</h4></th>
				</tr>
				<tr>
					<td>
						<input type="text" name="footer_text" value="<?php echo $row['footer_text'];?>">
					</td>
				</tr>

				<tr>
						<td><input type="submit" name="footer" value="Save"></td>
				</tr>

				<?php 
					}
				?>
			</table>
	

		</form>
	
		<br>

        </div>
	</div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>



