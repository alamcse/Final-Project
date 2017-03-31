<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4 col-lg-3 col-lg-offset-0">
<!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4"> -->
<div class="panel panel-default">
                    <div class="panel-heading text-center"><h4><?php if($lang_id=='bn'){echo "অনুসরণ করুন";}else{echo "Follow Us";}?></h4></div>
	                <div class="panel-body text-center">

	                   <div class="social-link">
                        <?php
                          $statement=$db->prepare("select * from tbl_social where link_id=1 ");
                          $statement->execute(array());
                          $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                          foreach ($result as $row)
                          {
                          
                        ?>
    						<div class="box" id="facebook"><a href="<?php echo $row['fb_link'];?>" target="_blank">&#62220;</a></div>
                            <div class="box" id="twitter"><a href="<?php echo $row['tt_link'];?>" target="_blank">&#62217;</a></div>
                            <div class="box" id="google"><a href="<?php echo $row['gp_link'];?>" target="_blank">&#62223;</a></div>
                            <div class="box" id="linkedin"><a href="<?php echo $row['li_link'];?>" target="_blank">&#62232;</a></div>
                        <?php
                            }
                        ?>
					   </div> <!--  social-link  -->

	                </div>                      
                </div>