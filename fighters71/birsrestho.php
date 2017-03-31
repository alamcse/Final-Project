<?php include './includes/session.php'; ?>
<?php include'./includes/change_language.php';?>  
<?php 
    $title="Birsrestho";
    include 'includes/head.php'; 

?>
 <?php
 		if(isset($_REQUEST['id'])){

 			$bid=$_REQUEST['id'];
 		}


 ?>
<body>
    
	<div class="container-fluid" style="background-color: #BAE6DC;">

		<?php 
            include 'includes/menu.php'; 
            include 'includes/header.php';
            

		 ?>

		<?php

			$statement=$db->prepare("update tbl_birsrestho set bview=bview+1 where bid=?");
		    $statement->execute(array($bid));

         ?>
						

		<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="panel" style="max-height:800px; min-height:300px;">
				<h4 class="panel-heading"style="font-size:18px"><?php if($lang_id=='en'){echo'List of Birsrestho in Bangladesh';}else{echo'বাংলাদেশের  বীরশ্রেষ্ঠদের তালিকা';};?></h4>
                    <div class="panel-body">
                        <table class="table table-hover" style="border:1px solid #ddd;margin-bottom:5px;text-align:center">
							<thead >
								<th><?php if($lang_id=='en'){echo'Photo';}else{echo'ছবি';};?></th>
								<th><?php if($lang_id=='en'){echo'Name';}else{echo'নাম';};?></th>
								<th><?php if($lang_id=='en'){echo'Details';}else{echo'বিস্তারিত ';};?></th>
								
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
								
								<td><a href="birsrestho.php?id=<?php echo $row['bid'];?>"><button class="btn btn-primary btn-xs">Details</button></a></td>
							</tr>
							<?php
								}
							?>
						</tbody>
							
						</table>
						
                    </div>
                    
                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
            	<div class="panel" style="min-height:600px;overflow-y: scroll;height:120px;">
                	<?php
			                      $statement=$db->prepare("select * from tbl_birsrestho where bid=? ");
			                      $statement->execute(array($bid));
			                      $result=$statement->fetchAll(PDO::FETCH_ASSOC);
			                      foreach ($result as $row)
			                      {
			            				$bname=$row['bname'];
			            				$bphoto=$row['bphoto'];
			            				$baddress=$row['baddress'];
			            				$bdate_of_birth=$row['bdate_of_birth'];
			            				$brank=$row['brank'];
			            				$bsector=$row['bsector'];
			            				$bdescription=$row['bdescription'];
			            				$bview=$row['bview'];

			                      }
			                      
			                	?>
                    <h4 class="panel-heading" style="font-size: 18px;text-align:center"><?php if($lang_id=='en'){echo'Details of The  Birsrestho '.$bname;}else{echo'বীরশ্রেষ্ঠ '.$bname.' এর বিস্তারিত';};?></h4>
                    <div class="panel-body">
						<div class="row">
							
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							
							<p>
								<h5><b><?php if($lang_id=='en'){echo'Name';}else{echo'নাম';};?>:</b><?php echo $bname;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Address';}else{echo'ঠিকানা';};?>:</b><?php echo $baddress;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Date of Birth';}else{echo'জন্ম তারিখ';};?>:</b><?php echo $bdate_of_birth;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Rank';}else{echo'পদ মর্যাদা';};?>:</b><?php echo $brank;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Sector No';}else{echo'সেক্টর নং';};?>:</b><?php echo $bsector;?></h5>
								
								
							</p>
							
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<img src="img/birsrestho/<?php echo $bphoto;?>" style="width:90%; height:30%;float:right">
							</div>
						</div>
						<div class="row">
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<hr>
						
								<?php echo $bdescription;?> 
								<br/>
								
								<!-- AddToAny BEGIN -->
								<div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="margin-top: 25px;">
									<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
									<a class="a2a_button_facebook"></a>
									<a class="a2a_button_twitter"></a>
									<a class="a2a_button_google_plus"></a>
									<a class="a2a_button_linkedin"></a>
									<h5 align="right"><b>View:</b><?php if($lang_id=='en'){echo $bview.'Times';}else{echo $bview.' বার';};?> </h5>
								</div>
								<script>
									var a2a_config = a2a_config || {};
									a2a_config.num_services = 8;
								</script>
								<script async src="https://static.addtoany.com/menu/page.js"></script>
								<!-- AddToAny END -->

							</div>
						</div>

						
                    </div>  
                    
                </div>
            </div>

        <?php
            include 'includes/sociallink.php';
            include 'includes/latest_most.php';
            include 'includes/footer.php'; 
        ?>