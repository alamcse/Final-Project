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
if(isset($_POST['privacy_policy'])) 
{
	
	try {
	
		
		if(empty($_POST['privacy_title'])){
			throw new Exception('Title can not be empty.');	
		}
		else if(empty($_POST['privacy_text'])){
			throw new Exception('Text can not be empty.');	
		}
		

			$statement=$db->prepare("update tbl_privacy set privacy_title=?, privacy_text=? where lang_id=?");
			$statement->execute(array($_POST['privacy_title'],$_POST['privacy_text'],$lang_id));
			
	
			$success_message='Data has been updated successfully.';
			
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
              <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Our privacy';}else{echo'আমাদের গোপনীয়তা ';}?></h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
		<form method="post" action="">

			<?php 
				
			if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
			if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
				
			?>

			<table>
			<?php
						
						$statement=$db->prepare("select * from tbl_privacy where lang_id=? ");
						$statement->execute(array($lang_id));
						$result=$statement->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result as $row)
						{
							
						?>

		
				<tr>
					<th>
						<h4><?php if($lang_id=='en'){echo'Privacy Title';}else{echo'গোপনীয়তা লিখুন';}?>:</h4>
					</th>
				</tr>
				<tr>
					<td>
						<input type="text" name="privacy_title" value="<?php echo $row['privacy_title'];?>">
					</td>
				</tr>

				<tr>
					<th>
						<h4>
							<?php if($lang_id=='en'){echo'Privacy Text';}else{echo'গোপনীয়তা সম্পর্কে লিখুন';}?>:
						</h4>
					</th>
				</tr>
				<tr>
					<td>
						<textarea class="ckeditor" id="editor" name="privacy_text"cls="30" rows="10" >
							<?php echo $row['privacy_text'];?>
						</textarea>
					</td>
				</tr>
				
			
				<tr>
					<td>
						<input type="submit" name="privacy_policy" value="Save">
					</td>
				</tr>

				<?php 
					}
				?>
		</table>
	

		</form>
		<script type="text/javascript">
				if ( typeof CKEDITOR == 'undefined' )
				{
					document.write(
						'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
						'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
						'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
						'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
						'value (line 32).' ) ;
				}
				else
				{
					var editor = CKEDITOR.replace( 'privacy_text' );
					//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
				}

				</script>
					<br>
        </div>
	</div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>