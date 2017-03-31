 <?php 
    $title="Sector";
 ?>
<?php
	
 	include 'includes/head.php'; 
 	include './includes/session.php';
 ?>
<body>
    
	<div class="container-fluid" style="background-color: #BAE6DC;">

		<?php 
            include 'includes/menu.php'; 
            include 'includes/header.php';
            include 'config.php';
		    ob_start();
		    if ($_SESSION['lang_name']=='bangla') {
		        $lang_id = 'bn';
		    }
		    else{
		        ob_start();
		        $_SESSION['lang_name'] = 'english';
		        $lang_id = 'en';
		    }
	         if (isset($_REQUEST['id'])) {
	            $sid = $_REQUEST['id'];
		    }
		 ?>
         <?php

            $statement=$db->prepare("update tbl_sectors set sview=sview+1 where sid=?");
            $statement->execute(array($sid));

        ?>

            <?php
                    $i=0;
                    $statement=$db->prepare("select * from tbl_sectors where sid=?");
                    $statement->execute(array($sid));
                    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row)
                     {
                        $sector_name=$row['sector_name'];
                        $sector_description=$row['sector_description'];
                        $sview=$row['sview'];
                    }

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
                
                
                    <h4 class="panel-heading" style="font-size: 18px;text-align:center"><?php if($lang_id=='en'){echo 'Description of '.$sector_name;}else{echo $sector_name.' এর বিস্তারিত';};?> <hr></h4>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <p style="margin-top:-40px"> <?php echo $sector_description;?> </p>
                                 <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="margin-top: 25px;">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_google_plus"></a>
                                <a class="a2a_button_linkedin"></a>
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <h5 align="right"><b>View:</b><?php if($lang_id=='en'){echo $sview.'Times';}else{echo $sview.' বার';};?> </h5>
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