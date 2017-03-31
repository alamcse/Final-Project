<?php include './includes/session.php'; ?>
<?php include'./includes/change_language.php';?> 
<?php 
    $title="Freedom Fighter of Bangladesh";
 ?>
 <?php
 		if(isset($_REQUEST['fid'])){

 			$fid=$_REQUEST['fid'];
 		}


 ?>
 <?php

		$statement=$db->prepare("update tbl_fighters set fview=fview+1 where fid=?");
		$statement->execute(array($fid));

?>

<?php 
	include 'includes/head.php'; 

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
				<h4 class="panel-heading"style="font-size:18px"><?php if($lang_id=='en'){echo'Freedom Fighters in Bangladesh';}else{echo'বাংলাদেশের মুক্তিযোদ্ধাদের তালিকা';};?></h4>
                    <div class="panel-body">
                        <div id="sector_page_data"></div>
						<span class="sector_flash"></span>
						
                    </div>  
                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
                <div class="panel" style="min-height:600px;overflow-y: scroll;height:120px;">
                	<?php
			                      $statement=$db->prepare("select * from tbl_fighters where fid=? ");
			                      $statement->execute(array($fid));
			                      $result=$statement->fetchAll(PDO::FETCH_ASSOC);
			                      foreach ($result as $row)
			                      {
			                      	$fname=$row['fname'];
			                      	$fdistrict=$row['fdistrict'];
			                      	$fdate_of_birth=$row['fdate_of_birth'];
			                      	$gadget_no=$row['gadget_no'];
			                      	$frank=$row['frank'];
			                      	$fsector=$row['fsector'];
			                      	$fsector_commander=$row['fsector_commander'];
			                      	$fphoto=$row['fphoto'];
			                      	$fdescription=$row['fdescription'];
			                      	$fvideolink=$row['fvideolink'];
			                      	$fview=$row['fview'];
			                      }

			                      
			                	?>
                    <h4 class="panel-heading" style="font-size: 18px;text-align:center"><?php if($lang_id=='en'){echo'Freedom Fighter '.$fname.'\'s Speech';}else{echo'মুক্তিযোদ্ধা '.$fname.' এর কথা';};?></h4>
                    <div class="panel-body">
						<div class="row">
							
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							
							<p>
								<h5><b><?php if($lang_id=='en'){echo'Name';}else{echo'নাম';};?>:</b><?php echo $fname ;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Address';}else{echo'ঠিকানা';};?>:</b><?php echo $fdistrict;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Date of Birth';}else{echo'জন্ম তারিখ';};?>:</b><?php echo $fdate_of_birth;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Gadget No';}else{echo'গেজেট নং';};?>:</b><?php echo $gadget_no;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Rank';}else{echo'পদ মর্যাদা ';};?>:</b><?php echo $frank;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Sector No';}else{echo'সেক্টর নং';};?>:</b><?php echo $fsector;?></h5>
								<h5><b><?php if($lang_id=='en'){echo'Sector Commander';}else{echo'সেক্টর কমান্ডার';};?>:</b><?php echo $fsector_commander;?></h5>

								
							</p>
							
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<img src="img/fighters/<?php echo $fphoto;?>" style="width:90%; height:30%;float:right">
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<hr>
								<?php echo $fdescription;?>
							
								</br>
								<hr>
								<h4><b><?php echo $fname;?><?php if($lang_id=='en'){echo'\'s Video';}else{echo'এর ভিডিও';};?></b></h4>
								<br/>
									
									<div class="embed-responsive embed-responsive-16by9"style="width:75%">
	                                    <?php 
	                                        $ytarray=explode("/", $fvideolink);
	                                        $ytendstring=end($ytarray);
	                                        $ytendarray=explode("?v=", $ytendstring);
	                                        $ytendstring=end($ytendarray);
	                                        $ytendarray=explode("&", $ytendstring);
	                                        $ytcode=$ytendarray[0];
	                                        echo "<iframe width=\"760\" height=\"570\" src=\"http://www.youtube.com/embed/$ytcode\" frameborder=\"0\" allowfullscreen></iframe>";
	                                    ?>
	                                    
	                                </div>
	                            
	                                <!-- AddToAny BEGIN -->
					<div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="margin-top: 25px;">
						<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
						<a class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
						<a class="a2a_button_google_plus"></a>
						<a class="a2a_button_linkedin"></a><br>
					<h5 align="right"><b>View:</b><?php if($lang_id=='en'){echo $fview.'Times';}else{echo $fview.' বার';};?></h5>
					</div>
					<script>
					var a2a_config = a2a_config || {};
					a2a_config.num_services = 8;
					</script>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
					<!-- AddToAny END --> 
									
									<!-- Share This START-->
									<!--<span class='st_sharethis_large' displayText='ShareThis'></span>
									<span class='st_facebook_large' displayText='Facebook'></span>
									<span class='st_twitter_large' displayText='Tweet'></span>
									<span class='st_linkedin_large' displayText='LinkedIn'></span>
									<span class='st_googleplus_large' displayText='Google +'></span>
									<span class='st_email_large' displayText='Email'></span>-->
									<!-- Share This END-->

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

        <script type="text/javascript">
$(document).ready(function(){
    change_sector_page('0');
});
function change_sector_page(sector_page_id){
     $(".sector_flash").show();
     $(".sector_flash").fadeIn(400).html('Loading <img src="img/ajax-loader.gif" />');
     var dataString = 'sector_page_id='+ sector_page_id;
     $.ajax({
           type: "POST",
           url: "sector_fighters_load.php",
           data: dataString,
           cache: false,
           success: function(result){
           $(".sector_flash").hide();
                 $("#sector_page_data").html(result);
           }
      });
}
</script>