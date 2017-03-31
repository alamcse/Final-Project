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
if(!isset($_REQUEST['sid'])){
	header('location:sectors_list.php');
}
else{
	$sid=$_REQUEST['sid'];
}

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;">Delete Sector</h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
        	<a href="sectors_list.php?lang_id=<?php echo $lang_id;?>" class="btn btn-success pull-right"> View Sectors List</a>

		
			<?php
				$statement=$db->prepare("delete from tbl_sectors where sid=? and lang_id=?");
				$statement->execute(array($sid,$lang_id));
				if($lang_id=='en'){echo'Sector has been Successfully deleted';}else{echo'সেক্টর ইনফর্মেশন সফল ভাবে delete হয়েছে  ';}
				

			?>
          </div>
    </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>

