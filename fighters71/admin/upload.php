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
	include'admin_includes/header.php';
 	include'admin_includes/left_side.php';
?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:180px">

<?php 
	if (isset($_POST['deed_upload'])) {
		try {
			$file 		= $_FILES['file']['name'];
		    $file_loc 	= $_FILES['file']['tmp_name'];
			$file_size 	= $_FILES['file']['size'];
			$folder		= "../uploads/deed/";
			$file_ext	= end(explode('.', $file));
			// new file size in KB
			$new_size = $file_size/(1024*1024);  
			// new file size in KB

			if (($file_ext != 'pdf') && ($file_ext != 'doc') && ($file_ext != 'docx')) {
				throw new Exception("File must be pdf, doc or docx.");
			}
			// Check if file already exists
			/*if (file_exists($file)) {
				throw new Exception("Sorry, file already exists.");
    			$uploadOk = 0;
			}*/
			
			move_uploaded_file($file_loc,$folder.$file);
			
			$statement=$db->prepare("insert into tbl_deed(deed_file,deed_size) values(?,?)");
			$statement->execute(array($file,$new_size));

			$success_message='File has been uploaded successfully.';


		} catch (Exception $e) {
			$error_message = $e->getMessage();
		}
	}
 ?>
 
<h3>Upload Deed</h3>

<?php 
	if (isset($error_message)) { echo $error_message."</br></br>"; } 
	if (isset($success_message)) { echo $success_message."</br></br>"; } 
?>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="file"  style="width:195px;display: inline;"/>
		<button type="submit" name="deed_upload" class="pull-right" style="width: 75px; height: 25px; cursor: pointer;">
			Upload
		</button>
	</form>
    <br /><br /><hr style="border-top: 1px solid #000000;">
<?php 
	if (isset($_POST['book_upload'])) {
		try {
			$file 		= $_FILES['file']['name'];
		    $file_loc 	= $_FILES['file']['tmp_name'];
			$file_size 	= $_FILES['file']['size'];
			$folder		= "../uploads/book/";
			$file_ext	= end(explode('.', $file));
			// new file size in KB
			$new_size = $file_size/(1024*1024);  
			// new file size in KB

			if (($file_ext != 'pdf') && ($file_ext != 'doc') && ($file_ext != 'docx')) {
				throw new Exception("File must be pdf, doc or docx.");
			}
			// Check if file already exists
			/*if (file_exists($file)) {
				throw new Exception("Sorry, file already exists.");
    			$uploadOk = 0;
			}*/
			
			move_uploaded_file($file_loc,$folder.$file);
			
			$statement=$db->prepare("insert into tbl_book(book_name,book_size) values(?,?)");
			$statement->execute(array($file,$new_size));

			$success_message='Book has been uploaded successfully.';


		} catch (Exception $e) {
			$error_message = $e->getMessage();
		}
	}
 ?>
 <h3>Upload Book</h3>
 <?php 
	if (isset($error_message)) { echo $error_message."</br></br>"; } 
	if (isset($success_message)) { echo $success_message."</br></br>"; } 
?>

    <form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="file"  style="width:195px;display: inline;"/>
		<button type="submit" name="book_upload" class="pull-right" style="width: 75px; height: 25px; cursor: pointer;">
			Upload
		</button>

	</form>
    <br/>   
    <br />
    <hr style="border-top: 1px solid #000000;">
     <a class="btn btn-large btn-success" href="deed_list.php?lang_id=<?php echo $lang_id;?>">View Deeds List</a>
     <a class="btn btn-large btn-success pull-right" href="book_list.php?lang_id=<?php echo $lang_id;?>">View Books List</a>


</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>