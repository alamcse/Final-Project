<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	include('../config.php');

?>

<?php
if(!isset($_REQUEST['nid'])){
	header('location:news.php');
}
else{
	$nid=$_REQUEST['nid'];
}

?>


<?php
if(isset($_POST['news'])) 
{
	
	try {
	
		
		if(empty($_POST['news_title'])){
			throw new Exception('News Title Can not be empty');
			
		}
		if(empty($_POST['news_description'])){
			throw new Exception('News  Description Can not be empty');
			
		}

		$statement=$db->prepare("select * from tbl_news where news_title=?");
		$statement->execute(array($_POST['news_title']));

		$total=$statement->rowCount();
		if($total>0){
			$statement=$db->prepare("update tbl_news set  news_description=? where nid=?");
			$statement->execute(array($_POST['news_description'],$nid));
			
		}
		else{

		$statement=$db->prepare("update tbl_news set news_title=?, news_description=? where nid=?");
		$statement->execute(array($_POST['news_title'],$_POST['news_description'],$nid));

	}
		$success_message='News has been successfully updated';
			
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
              <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Update News';}else{echo'আপডেট নিউজ ';}?></h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
		<form method="post" action="">

			<?php 
				
			if(isset($error_message)){ echo '<div class="error">'.$error_message.'</div>'; }
			if(isset($success_message)){ echo '<div class="success">'.$success_message.'</div>'; }
				
			?>

			<table>
			<?php
						$i=0;
						$statement=$db->prepare("select * from tbl_news where nid=? ");
						$statement->execute(array($nid));
						$result=$statement->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result as $row)
						{
							$i++;
						?>

				<tr>
					<th><h4><?php if($lang_id=='en'){echo'News Title';}else{echo'নিউজের নাম ';}?>:</h4></th>
				</tr>
				<tr>
					<td><input type="text" name="news_title" value="<?php echo $row['news_title'];?>"></td>
				</tr>
				<tr>
					<th><h4><?php if($lang_id=='en'){echo'News Description';}else{echo'নিউজের বর্ণনা ';}?></h4></th>
				</tr>
				<tr>
					<td>

				<textarea class="ckeditor" id="editor" name="news_description"cls="30" rows="10" >

					<?php echo $row['news_description'];?>
				 </textarea>
			</td>
		</tr>
				
			
			<tr>
					<td><input type="submit" name="news" value="Save"></td>
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
					var editor = CKEDITOR.replace( 'news_description' );
					//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
				}

				</script>
					<br>
        </div>
	</div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	
	


	

		   
		   
		   
		   
		   

		
		
		
		
		
		


