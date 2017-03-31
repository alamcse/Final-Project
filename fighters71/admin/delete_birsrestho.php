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


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;">Delete Fighters</h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
        	<a href="birsrestho.php?lang_id=<?php echo $lang_id;?>" class="btn btn-success pull-right">  View Birsrestho  List</a>

		
			<?php
				$statement=$db->prepare("delete from tbl_birsrestho where bid=?");
				$statement->execute(array($bid));
				if($lang_id=='en'){echo'Birsrestho information has been delete successfully';}else{echo'বীরশ্রেষ্ঠের তথ্য গুলো  সফলভাবে ডিলিট করা হয়েছে ';}



			?>
          </div>
    </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>