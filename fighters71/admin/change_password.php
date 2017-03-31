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
if(isset($_POST['form1']))
{
	
	try {
	
		
		if(empty($_POST['current_password'])){
			throw new Exception('Current Password Can not be empty');
			
		}
		if(empty($_POST['new_password'])){
			throw new Exception('New Password Can not be empty');
			
		}
		if(empty($_POST['confirm_password'])){
			throw new Exception('Confirm Password Can not be empty');
			
		}
		
		$current_password=$_POST['current_password'];

		$statement=$db->prepare("select * from login ");
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row)
        {
         
	         if($current_password!=$row['password'])
	         {
	         	throw new Exception('Password Does not Match');
	         }

         }

         $new_password=$_POST['new_password'];
         $confirm_password=$_POST['confirm_password'];

         if($new_password!=$confirm_password)
         {
         	throw new Exception('Confirm Password Does Not Match');
         	
         }


		$statement=$db->prepare("update login set password=? ");
		$statement->execute(array($_POST['confirm_password']));
		$success_message='Password has been successfully Updated';
			
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6" style="background:#F5F5F5;min-height:510px">

	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Update Password';}else{echo'আপডেট পাসওয়ার্ড';};?></h4>
        </div>
         <div class="panel-body" style="height:284px;">
	   

			<form method="post" action="">

				<?php 
				
				if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
				if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
					
				?>

				<table>
					
					<tr>
						<th><h4><?php if($lang_id=='en'){echo'Current Password';}else{echo'বর্তমান পাসওয়ার্ড';};?>:</h4></th>
					</tr>
					<tr>
						<td><input type="text" name="current_password"value="" ></td>
					</tr>
					<tr>
						<th><h4><?php if($lang_id=='en'){echo'New Password';}else{echo'নতুন পাসওয়ার্ড';};?>:</h4></th>
					</tr>
					<tr>
						<td><input type="text" name="new_password"value="" ></td>
					</tr>
					<tr>
						<th><h4><?php if($lang_id=='en'){echo'Confirm Password';}else{echo'কনফরম পাসওয়ার্ড';};?>:</h4></th>
					</tr>
					<tr>
						<td><input type="text" name="confirm_password"value="" ></td>
					</tr>
					<tr>
						<td><br><input type="submit" name="form1" value="Update"></td>
				</tr>

				</table>
			</form>	
        </div>
	</div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

	

		   
		   
		   
		   
		   

		
		
		
		
		
		


