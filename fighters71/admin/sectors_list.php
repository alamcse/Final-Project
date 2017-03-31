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


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">

			 <div class="panel panel-default"style="margin-left:0px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Sectors';}else{echo'সেক্টর';}?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	<a href="add_sector.php?lang_id=<?php echo $lang_id;?>" class="btn btn-success pull-right"> Add a Sector</a>
                    	<br><br>
                    	<h4 style="text-align:center;color:#4c0f36"><?php if($lang_id=='en'){echo'List of Sectors';}else{echo'সেক্টর তালিকা ';}?></h4>
                    	<table class="table table-hover table-bordered">
                    		<thead>
                    			<th><?php if($lang_id=='en'){echo'SL No';}else{echo'ক্র.নং';}?></th>
                    			<th><?php if($lang_id=='en'){echo'Sector Name';}else{echo'সেক্টর নাম ';}?></th>
                    			<th><?php if($lang_id=='en'){echo'Action';}else{echo'Action';}?></th>
                    		</thead>
                    		<tbody>
                    			<?php
									$i=0;
									$statement=$db->prepare("select * from tbl_sectors where lang_id=? order by sid asc ");
									$statement->execute(array($lang_id));
									$result=$statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row)
									 {
										$i++;
								?>
                    			<tr>
                    				<td><?php echo $i; ?></td>
                    				<td><?php echo $row['sector_name'];?></td>
                    				
                    				<td>
                    					<a href="edit_sector.php?sid=<?php echo $row['sid'];?>&lang_id=<?php echo $lang_id;?>">Edit</a>
                    					&nbsp;&nbsp;||&nbsp;&nbsp;
                    					<a href="delete_sector.php?sid=<?php echo $row['sid'];?>&lang_id=<?php echo $lang_id;?>">Delete</a>
                    				</td>
                    			</tr>
                    			<?php
                    				}
                    			?>
                    			
                    		</tbody>
                    	</table>
						

					
                    </div>
                </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


