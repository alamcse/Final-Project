<?php
    ob_start();
    
    if ($_SESSION['lang_name']=='bangla') {
        $lang_id = 'bn';
    }
    else{
        ob_start();
        $_SESSION['lang_name'] = 'english';
        $lang_id = 'en';
    }
 ?>
 <?php 
         if (isset($_REQUEST['id'])) {
            $bid = $_REQUEST['id'];
    }
 ?>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="panel" style="max-height:800px; min-height:300px;">
				<h4 class="panel-heading" style="font-size:18px;text-align:center;">The Most Valiant Hero</h4>
                
                    <div class="panel-body">
                        <table class="table table-hover" style="border:1px solid #ddd;margin-bottom:5px;text-align:center">
							<thead >
								<th>Photo</th>
								<th>Name</th>
								<th></th>
								
							</thead>
							<tbody>
							<?php
			                      $statement=$db->prepare("select * from tbl_birsrestho where lang_id=?");
			                      $statement->execute(array($lang_id));
			                      $result=$statement->fetchAll(PDO::FETCH_ASSOC);
			                      foreach ($result as $row)
			                      {
			                      	
			                	?>
							<tr>
								
								<td><img src="img/birsrestho/<?php echo $row['bphoto'];?>" style="width:50px;height:50px"></td>
								<td><?php echo $row['bname'];?></td>
								
								<td><a href="birsrestho_details.php?bid=<?php echo $row['bid'];?>"><button class="btn btn-primary btn-xs">Details</button></a></td>
							</tr>
							<?php
								}
							?>
						</tbody>
							
						</table>
						
                    </div> 
                </div>

            </div>