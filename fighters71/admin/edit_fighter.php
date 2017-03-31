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
if(!isset($_REQUEST['fid'])){
	header('location:fighters.php');
}
else{
	$fid=$_REQUEST['fid'];
}

?>

<?php
if(isset($_POST['form1'])) 
{
	
	try {
	
		
			if(empty($_POST['fname'])){
				throw new Exception('Fighters Name Can not be empty');
				
			}
			if(empty($_POST['fdistrict'])){
				throw new Exception('Fighters District Can not be empty');
				
			}
			if(empty($_POST['fdate_of_birth'])){
				throw new Exception('Fighters Date of Birth Can not be empty');
				
			}
			
			if(empty($_POST['fsector'])){
				throw new Exception('Fighters Sector Can not be empty');
				
			}
			if(empty($_POST['frank'])){
				throw new Exception('Fighters Rank Can not be empty');
				
			}
			if(empty($_POST['fsector_commander'])){
				throw new Exception('Fighters Sector Commander Name Can not be empty');
				
			}
			
			if(empty($_POST['fdescription'])){
				throw new Exception('Fighters Description Can not be empty');
				
			}
			
			
			if(empty($_POST['fvideolink'])){
				throw new Exception('Fighters Video Can not be empty');
				
			}

			if(empty($_FILES["fphoto"]["name"])){

				
			$statement=$db->prepare("update tbl_fighters set fname=?, fdistrict=?,gadget_no=?,muktibarta_no=?, fighter_id=?,fdate_of_birth=?,fsector=?,frank=?,fsector_commander=?,fdescription=?,fvideolink=? where fid=?");
			$statement->execute(array($_POST['fname'],$_POST['fdistrict'],$_POST['gadget_no'],$_POST['muktibarta_no'],$_POST['fighter_id'],$_POST['fdate_of_birth'],$_POST['fsector'],$_POST['frank'],$_POST['fsector_commander'],$_POST['fdescription'],$_POST['fvideolink'],$fid));

			}

			else{

			$up_filename=$_FILES["fphoto"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename,'.')); //strip extention
			$file_ext=substr($up_filename,strripos($up_filename,'.')); //strip name
			$f1=$fid.$file_ext;
				
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
			throw new Exception('Only png,jpg,jpeg and gif format images are allowed to upload.');

			$statement=$db->prepare("select * from tbl_fighters where fid=?");
			$statement->execute(array($fid));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) 
			{
				$real_path="../img/fighters/".$row['fphoto'];
				unlink($real_path);

			}


			move_uploaded_file($_FILES["fphoto"]["tmp_name"],"../img/fighters/".$f1); 
				

			$statement=$db->prepare("update tbl_fighters set fname=?, fdistrict=? ,gadget_no=?, muktibarta_no=?, fighter_id=?, fdate_of_birth=?, fsector=?, fsector_commander=?, fdescription=?, fphoto=?, fvideolink=? where fid=?");
			$statement->execute(array($_POST['fname'],$_POST['fdistrict'],$_POST['gadget_no'],$_POST['muktibarta_no'],$_POST['fighter_id'],$_POST['fdate_of_birth'],$_POST['fsector'],$_POST['fsector_commander'],$_POST['fdescription'],$f1,$_POST['fvideolink'],$fid));



			}

			$success_message='Fighters Information has been successfully updated';
			
		}
		
			catch(Exception $e) {
				$error_message = $e->getMessage();
		}
	
}

?>

<?php
			$statement=$db->prepare("select * from tbl_fighters where fid=?");
			$statement->execute(array($fid));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$fname=$row['fname'];
				$fdistrict=$row['fdistrict'];
				$fdate_of_birth=$row['fdate_of_birth'];
				$gadget_no=$row['gadget_no'];
				$muktibarta_no=$row['muktibarta_no'];
				$fighter_id=$row['fighter_id'];
				$fsector=$row['fsector'];
				$frank=$row['frank'];
				$fsector_commander=$row['fsector_commander'];
				$fdescription=$row['fdescription'];
				$fphoto=$row['fphoto'];
				$fvideolink=$row['fvideolink'];
				
						
			}

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Update Freedom Fighters Information';}else{echo'মুক্তিযোদ্ধার তথ্য সমুহ আপডেট';}?></h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
         	<?php 
				
			if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
			if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
				
			?>
		<form action="" method="post" enctype="multipart/form-data">

			

			<table>

				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Freedom Fighters Name';}else{echo'মুক্তিযোদ্ধার নাম';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fname"value="<?php echo $fname?>"></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'District';}else{echo'জেলা';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fdistrict" value="<?php echo $fdistrict?>"></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Fighters Date of Birth';}else{echo'জন্ম তারিখ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fdate_of_birth" value="<?php echo $fdate_of_birth?>" ></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Fighters ID';}else{echo'মুক্তিযোদ্ধার আইডি নং ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fighter_id" value="<?php echo $fighter_id?>"></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Fighters Gadget No';}else{echo'মুক্তিযোদ্ধার গেজেট নং';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="gadget_no"value="<?php echo $gadget_no?>"></td>
				</tr>
				<tr>
					<th><h5> <?php if($lang_id=='en'){echo'Muktibarta No';}else{echo'মুক্তিবার্তা নং ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="muktibarta_no"value="<?php echo $muktibarta_no?>" ></td>
				</tr>
				
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Select a Sector';}else{echo'সেক্টর নির্বাচন';}?>:</h5></th>
				</tr>
				<tr>
					<td> 
						<select name="fsector">
							<option value="">------------------</option>
							
							<?php  
								$statement=$db->prepare("select * from tbl_sectors where lang_id=? order by sid asc");
								$statement->execute(array($lang_id));
								$result=$statement->fetchAll(PDO::FETCH_ASSOC);
								foreach ($result as $row) 
								{
									if($row['sector_name']==$fsector){

										?><option value="<?php echo $row['sector_name']; ?>" selected> <?php echo $row['sector_name']; ?> </option> <?php
									}

									else{

									?><option value="<?php echo $row['sector_name']; ?>"> <?php echo $row['sector_name']; ?> </option><?php
									}

								}
								?>
							
						</select>
					</td>
				</tr>



				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Fighters Rank';}else{echo'মুক্তিযোদ্ধার পদ মর্যাদা';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="frank" value="<?php echo $frank?>"></td>
				</tr>

				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Sectors Commander Name';}else{echo'সেক্টর কমান্ডার নাম ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fsector_commander" value="<?php echo $fsector_commander?>"></td>
				</tr>
					
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Fighters Description';}else{echo'মুক্তিযোদ্ধার সংক্ষিপ্ত বর্ণনা ';}?></h5></th>
				</tr>
				<tr>
					<td>

					<textarea class="ckeditor" id="editor" name="fdescription"cls="30" rows="10"><?php echo $fdescription?> </textarea>
					</td>
				</tr>
				<tr>
					<td><?php if($lang_id=='en'){echo'Previous Photo Preview';}else{echo'পূর্বের ছবি';}?></td>
		
				</tr>
				<tr>
					<td><img src="../img/fighters/<?php echo $fphoto; ?>" alt="" width="30%"></td>
		
				</tr>
				<tr>
					<td><?php if($lang_id=='en'){echo'Fighters New Photo';}else{echo'মুক্তিযোদ্ধার নতুন ছবি';}?></td>
		
				</tr>
				<tr>
					<td><input type="file" name="fphoto" value="Upload"> </td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Video link';}else{echo'ভিডিও লিঙ্ক  ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fvideolink" value="<?php echo $fvideolink?>" ></td>
				</tr>
					
				
				<tr>
						<td><input type="submit" name="form1" value="Save"></td>
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
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


