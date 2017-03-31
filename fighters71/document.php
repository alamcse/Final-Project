

<?php 
    $title="Documents of Freedom Fighter";
 ?>
<?php 
include 'includes/head.php';
include './includes/session.php';
include'./includes/change_language.php';
 ?>

<body>
    
	<div class="container-fluid" style="background-color: #BAE6DC;">

		<?php 
            include 'includes/menu.php'; 
            include 'includes/header.php';
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
                <div class="panel" style="max-height: 800px; min-height: 250px;">
                    <h4 class="panel-heading" style="font-size: 18px;text-align:center"><?php if($lang_id=='en'){echo'List of The Freedom Fighters in Bangladesh';}else{echo'বাংলাদেশের মুক্তিযোদ্ধাদের তালিকা';};?></h4>
                    <div class="panel-body">
			

						<div id="page_data"></div>
						<span class="flash"></span>


			

                    </div>  
                </div>
            </div>

        <?php
            include 'includes/sociallink.php';
            include 'includes/latest_most.php';
            include 'includes/footer.php'; 
        ?>