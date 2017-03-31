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

                              
            $statement=$db->prepare("select * from tbl_sectors where sid=?");
            $statement->execute(array($_POST['fsector']));
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row)
            {
            	$fsector= $row['sector_name'];
            }

                                                  
                                             


		
			$statement=$db->prepare("show table status like 'tbl_fighters'");
			$statement->execute();
			$result=$statement->fetchAll();
			foreach($result as $row)
			$new_id=$row[10]; 
				
				
			$up_filename=$_FILES["fphoto"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename,'.')); //strip extention
			$file_ext=substr($up_filename,strripos($up_filename,'.')); //strip name
			$f1=$new_id.$file_ext;
				
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
			throw new Exception('Only png,jpg,jpeg and gif format images are allowed to upload.');
			move_uploaded_file($_FILES["fphoto"]["tmp_name"],"../img/fighters/".$f1); 


			$fdate=date('Y-m-d');
			$ftime=time(date('Y-m-d'));
			$statement=$db->prepare("insert into tbl_fighters(fname,fdistrict,fdate_of_birth,gadget_no,fighter_id,muktibarta_no,fsector,frank,fsector_commander,fdescription,fphoto,fvideolink,lang_id,ftime,fdate)
				 value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

			$statement->execute(array($_POST['fname'],$_POST['fdistrict'],$_POST['fdate_of_birth'],$_POST['gadget_no'],$_POST['fighter_id'],$_POST['muktibarta_no'],$fsector,$_POST['frank'],$_POST['fsector_commander'],$_POST['fdescription'],$f1,$_POST['fvideolink'],$lang_id,$ftime,$fdate));

			$success_message='Fighters Information has been successfully inserted';
			
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
              <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Add a Freedom Fighters Information ';}else{echo'Add a Freedom Fighters Information';}?></h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
         	<?php 
				
			if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
			if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
				
			?>
		<form action="" method="post" enctype="multipart/form-data">

			

			<table>

				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Freedom Fighters Name';}else{echo'মুক্তিযোদ্ধার নাম ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fname" ></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'District';}else{echo'জেলা ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fdistrict" ></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Fighters Date of Birth';}else{echo'জন্ম তারিখ ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fdate_of_birth" ></td>
				</tr>
				<tr>
					<th><h5> <?php if($lang_id=='en'){echo'Fighters ID';}else{echo'মুক্তিযোদ্ধার আইডি নং ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fighter_id" ></td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Fighters Gadget No';}else{echo'মুক্তিযোদ্ধার গেজেট নং';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="gadget_no" ></td>
				</tr>
				
				<tr>
					<th><h5> <?php if($lang_id=='en'){echo'Muktibarta No';}else{echo'মুক্তিবার্তা নং ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="muktibarta_no" ></td>
				</tr>
				
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Select a Sector';}else{echo'সেক্টর নির্বাচন';}?>:</h5></th>
				</tr>
				<tr>
					<td> 
						<select name="fsector">
							<option value="">------------------</option>
							
							<?php
							$i=0;
							$statement=$db->prepare("select * from tbl_sectors where lang_id=? order by sector_name asc ");
							$statement->execute(array($lang_id));
							$result=$statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
							?>
							<option value="<?php echo $row['sid']; ?>"><?php echo $row['sector_name']; ?></option>
							<?php
							}
							?>
							
						</select>
					</td>
				</tr>

				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Fighters Rank ';}else{echo'মুক্তিযোদ্ধার পদ মর্যাদা';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="frank" value=""> </td>
				</tr>


				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Sectors Commander Name';}else{echo'সেক্টর  কমান্ডার নাম ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fsector_commander" ></td>
				</tr>
				<tr>
				
					<th><h5><?php if($lang_id=='en'){echo'Fighters Description';}else{echo'মুক্তিযোদ্ধার সংক্ষিপ্ত বর্ণনা';}?></h5></th>
				</tr>
				<tr>
					<td>

					<textarea class="ckeditor" id="editor" name="fdescription"cls="30" rows="10"> </textarea>
					</td>
				</tr>
				<tr>
					<td><?php if($lang_id=='en'){echo'Image';}else{echo'ছবি ';}?></td>
		
				</tr>
				<tr>
					<td><input type="file" name="fphoto" value="Upload"> </td>
				</tr>
				<tr>
					<th><h5><?php if($lang_id=='en'){echo'Video link';}else{echo'ভিডিও লিঙ্ক ';}?>:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fvideolink" ></td>
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
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


