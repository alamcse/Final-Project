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
if(isset($_POST['social_link'])) 
{
	
	try {
	
		
		if(empty($_POST['fb_link'])){
			throw new Exception('Field can not be empty');	
		}
		else if(empty($_POST['tt_link'])){
			throw new Exception('Field can not be empty');	
		}
		else if(empty($_POST['gp_link'])){
			throw new Exception('Field can not be empty');	
		}
		else if(empty($_POST['li_link'])){
			throw new Exception('Field can not be empty');	
		}
		

			$statement=$db->prepare("update tbl_social set fb_link=?, tt_link=?, gp_link=?, li_link=? where link_id=1");
			$statement->execute(array($_POST['fb_link'], $_POST['tt_link'], $_POST['gp_link'], $_POST['li_link']));
			
	
			$success_message='Field has been updated successfully';
			
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
              <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Social Media';}else{echo'সোশ্যাল মিডিয়া';};?></h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
		<form method="post" action="">

			<?php 
				
			if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
			if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
				
			?>

			<table>
			<?php
						
						$statement=$db->prepare("select * from tbl_social where link_id=1");
						$statement->execute();
						$result=$statement->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result as $row)
						{
							
						?>

		
				<tr>
					<th><h4><?php if($lang_id=='en'){echo'Facebook';}else{echo'ফেসবুক';};?>:</h4></th>
				</tr>
				<tr>
					<td>
						<input type="text" name="fb_link" placeholder="http://facebook.com/....." value="<?php echo $row['fb_link'];?>">
					</td>
				</tr>

				<tr>
					<th><h4><?php if($lang_id=='en'){echo'Twitter';}else{echo'টুইটার';};?>:</h4></th>
				</tr>
				<tr>
					<td>
						<input type="text" name="tt_link" placeholder="http://twitter.com/....." value="<?php echo $row['tt_link'];?>">
					</td>
				</tr>

				<tr>
					<th><h4><?php if($lang_id=='en'){echo'GooglePlus';}else{echo'গুগল প্লাস';};?>:</h4></th>
				</tr>
				<tr>
					<td>
						<input type="text" name="gp_link" placeholder="http://plus.google.com/....." value="<?php echo $row['gp_link'];?>">
					</td>
				</tr>

				<tr>
					<th><h4><?php if($lang_id=='en'){echo'LinkedIn';}else{echo'লিংকডিন';};?>:</h4></th>
				</tr>
				<tr>
					<td>
						<input type="text" name="li_link" placeholder="http://linkedin.com/....." value="<?php echo $row['li_link'];?>">
					</td>
				</tr>
				
			
				<tr>
						<td><input type="submit" name="social_link" value="Save"></td>
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



