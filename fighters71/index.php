<?php 
    $title="Fighters71 - Documentation of Freedom Fighters in Bangladesh";
 ?>
<?php 
    include('config.php');  
    include 'includes/head.php';
    include './includes/session.php'; 
?>

<body>
    
	<div class="container-fluid" style="background-color: #BAE6DC;">

		<?php 
            include 'includes/menu.php'; 
            include 'includes/header.php';
        ?>
        <div class="row">
            <?php
                include 'includes/left_menu.php';      
                include 'includes/overall/slider.php';
                include 'includes/news.php'; 
            ?>
        </div>
        


					<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="panel">
                    <div class="panel-body">
                      <img src="img/birsrestho/birsrestho.gif" style="width:100%;height:70%">
                    </div>  
                </div>
				<div class="panel" style="max-height: 700px; min-height: 200px;">
                    <div class="panel-body">
                       <div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/hZoElk0_hLs?rel=0" width="760" height="570" allowfullscreen=""></iframe>
						</div>
						<br>
						<a class="btn btn-samll btn-success" href="video.php"><?php if($lang_id=='bn'){echo "আরও ভিডিও দেখুন";}else{echo "See More Video";}?></a>
                    </div>  
					
                </div>
            </div>


        	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
				<div class="panel" style="max-height:640px;min-height:250px;overflow-y:scroll;">
                    <?php
                        $statement=$db->prepare("select * from  tbl_home where lang_id=?");
                        $statement->execute(array($lang_id));
                        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row)
                        {

                    ?>
                    <h4 class="panel-heading" style="font-size: 18px;"><?php echo $row['home_title']?></h4>
                    <div class="panel-body">
                        <p>

                            <?php echo $row['home_description']?>

                        </p>
                       <?php 
                        }
                    ?> 
                    </div> 
                     
                </div>

			</div>

        <?php
            include 'includes/sociallink.php';
            include 'includes/latest_most.php';
            include 'includes/footer.php'; 
        ?>