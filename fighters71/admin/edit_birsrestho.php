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
if(!isset($_REQUEST['bid'])){
	header('location:birsrestho.php');
}
else{
	$bid=$_REQUEST['bid'];
}

?>

<?php
if(isset($_POST['form1'])) 
{
	
	try {
	
		
			if(empty($_POST['bname'])){
				throw new Exception('Birsrestho Name Can not be empty');
				
			}
			if(empty($_POST['baddress'])){
				throw new Exception('Birsrestho Address Can not be empty');
				
			}
			if(empty($_POST['bdate_of_birth'])){
				throw new Exception('Birsrestho Date of Birth Can not be empty');
				
			}
			
			if(empty($_POST['brank'])){
				throw new Exception('Birsrestho Rank Can not be empty');
				
			}
			if(empty($_POST['bsector'])){
				throw new Exception('Birsrestho Sector Can not be empty');
				
			}
			if(empty($_POST['bdescription'])){
				throw new Exception('Birsrestho Description Can not be empty');
				
			}

			if(empty($_FILES["bphoto"]["name"])){

				
			$statement=$db->prepare("update tbl_birsrestho set bname=?, baddress=?,bdate_of_birth=?,brank=?,bsector=?,bdescription=? where bid=?");
			$statement->execute(array($_POST['bname'],$_POST['baddress'],$_POST['bdate_of_birth'],$_POST['brank'],$_POST['bsector'],$_POST['bdescription'],$bid));

			}

			else{

			$up_filename=$_FILES["bphoto"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename,'.')); //strip extention
			$file_ext=substr($up_filename,strripos($up_filename,'.')); //strip name
			$f1=$fid.$file_ext;
				
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
			throw new Exception('Only png,jpg,jpeg and gif format images are allowed to upload.');

			$statement=$db->prepare("select * from tbl_birsrestho where bid=?");
			$statement->execute(array($bid));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) 
			{
				$real_path="../img/birsrestho/".$row['bphoto'];
				unlink($real_path);

			}


			move_uploaded_file($_FILES["bphoto"]["tmp_name"],"../img/birsrestho/".$f1); 
				

			$statement=$db->prepare("update tbl_birsrestho set bname=?, baddress=?,bdate_of_birth=?,brank=?,bsector=?,bdescription=?, bphoto=? where bid=?");
			$statement->execute(array($_POST['bname'],$_POST['baddress'],$_POST['bdate_of_birth'],$_POST['brank'],$_POST['bsector'],$_POST['bdescription'],$f1, $bid));



			}

			$success_message='Birsrestho Information has been updated successfully.';
			
		}
		
			catch(Exception $e) {
				$error_message = $e->getMessage();
		}
	
}

?>

<?php
			$statement=$db->prepare("select * from tbl_birsrestho where bid=?");
			$statement->execute(array($bid));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$bname=$row['bname'];
				$baddress=$row['baddress'];
				$bdate_of_birth=$row['bdate_of_birth'];
				$brank=$row['brank'];
				$bsector=$row['bsector'];
				$bdescription=$row['bdescription'];
				$bphoto=$row['bphoto'];
						
			}

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Update Birsrestho Information';}else{echo'আপডেট বীরশ্রেষ্ঠের তথ্য ';}?></h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
         	<?php 
				
			if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
			if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
				
			?>
		<form action="" method="post" enctype="multipart/form-data">

			

			<table>

				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Birsrestho Name';}else{echo'বীরশ্রেষ্ঠের নাম ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="bname"value="<?php echo $bname?>"></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'District';}else{echo'জেলা ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="baddress" value="<?php echo $baddress?>"></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Birsrestho Date of Birth';}else{echo'বীরশ্রেষ্ঠের  জন্ম তারিখ ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="bdate_of_birth" value="<?php echo $bdate_of_birth?>" ></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Birsrestho Rank';}else{echo'বীরশ্রেষ্ঠের  পদ মর্যাদা ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="brank"value="<?php echo $brank?>"></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Select a Sector';}else{echo'সেক্টর নির্বাচন';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="bsector"value="<?php echo $bsector?>"></td>
				</tr>
					
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Birsrestho Description';}else{echo'বীরশ্রেষ্ঠের  বর্ণনা ';}?></h5></th>
				</tr>
				<tr>
					<td>

					<textarea class="ckeditor" id="editor" name="bdescription"cls="30" rows="10">
							<?php echo $bdescription?> 
					</textarea>
					</td>
				</tr>
				<tr>
					<td><br> <?php if($lang_id=='en'){echo'Previous Photo Preview';}else{echo'বীরশ্রেষ্ঠের  পূর্বের ছবি';}?></td>
		
				</tr>
				<tr>
					<td><img src="../img/birsrestho/<?php echo $bphoto; ?>" alt="" width="30%"></td>
		
				</tr>
				<tr>
					<td><?php if($lang_id=='en'){echo'Birsrestho New Photo';}else{echo'বীরশ্রেষ্ঠের  নতুন ছবি ';}?></td>
		
				</tr>
				<tr>
					<td><input type="file" name="bphoto" value="Upload"> </td>
				</tr>
					
				<tr>
						<td><br><input type="submit" name="form1" value="Save"></td>
				</tr>
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
					var editor = CKEDITOR.replace( 'fdescription' );
					//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
				}

				</script>
				<br>
		
        </div>
	</div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


