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
                        <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Birsrestho';}else{echo'বীরশ্রেষ্ঠ';}?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	<a href="add_birsrestho.php?lang_id=<?php echo $lang_id;?>" class="btn btn-success pull-right"> Add Birsrestho</a>
                    	<br><br>
                    	<h4 style="text-align:center;color:#4c0f36"><?php if($lang_id=='en'){echo'List of Birsrestho';}else{echo'বীরশ্রেষ্ঠদের তালিকা';}?></h4>
                    	<table class="table table-hover table-bordered">
                    		<thead>
                    			<th><?php if($lang_id=='en'){echo'SL No';}else{echo'ক্র.নং';}?></th>
                    			<th><?php if($lang_id=='en'){echo'Photo';}else{echo'ছবি';}?></th>
                    			<th><?php if($lang_id=='en'){echo'Name';}else{echo'নাম ';}?></th>
                                   <th><?php if($lang_id=='en'){echo'District';}else{echo'জেলা';}?></th>
                                   <th><?php if($lang_id=='en'){echo'Rank';}else{echo'পদ মর্যাদা';}?></th>
                    			<th><?php if($lang_id=='en'){echo'Action';}else{echo'Action';}?></th>
                    		</thead>
                    		<tbody>
                                   <?php
                                             $i=0;
                                             $statement=$db->prepare("select * from tbl_birsrestho where lang_id=? order by bid asc ");
                                             $statement->execute(array($lang_id));
                                             $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                             foreach ($result as $row)
                                              {
                                                  $i++;
                                        ?>
                    			
                    			<tr>
                    				<td><?php echo $i;?></td>
                    				<td><img src="../img/birsrestho/<?php echo $row['bphoto']?>"style="width:50px;height:50px"></td>
                    				<td><?php echo $row['bname']?></td>
                                        <td><?php echo $row['baddress']?></td>
                                        
                                        <td><?php echo $row['brank']?></td>
                                            
                                        <td>
                    				 <a href="edit_birsrestho.php?bid=<?php echo $row['bid'];?>&lang_id=<?php echo $lang_id;?>">Edit</a>
                    					&nbsp;&nbsp;||&nbsp;&nbsp;
                    				 <a href="delete_birsrestho.php?bid=<?php echo $row['bid'];?>&lang_id=<?php echo $lang_id;?>">Delete</a></td>
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
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


