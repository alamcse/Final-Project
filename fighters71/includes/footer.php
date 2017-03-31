<?php include './includes/session.php'; ?>
<?php include'./includes/change_language.php';?>  

<!--......................................    Footer     .........................................-->
        <div class="row">
            <footer class="navbar navbar-inverse text-center" style=" background-color:#949090; border-radius:0; border:0;margin-bottom:0;">

                    <div class="col-lg-9 col-lg-offset-2 col-xs-12">
                        <div class="col-md-3 col-xs-12">
                            <div class="col-xs-12" id="footer-section-title-info"><?php if($lang_id=='bn'){echo "তথ্য সমূহ";}else{echo "Information";}?></div>
                            <a  href="about.php" title="About Us" class="footer_nav">
                                <div class="col-xs-12">
                                    <div class="footer-links info-links">
                                        <?php if($lang_id=='bn'){echo "আমাদের সম্পর্কে";}else{echo "About Us";}?>
                                    </div>
                                </div>
                            </a>
                            <a href="mission.php" title="Our Mission"class="footer_nav">
                                <div class="col-xs-12">
                                    <div class="footer-links info-links">
                                         <?php if($lang_id=='bn'){echo "আমাদের লক্ষ্য";}else{echo "Our Mission";}?>
                                    </div>
                                </div>
                            </a>
                            <a href="contact.php" title="Contact Us" class="footer_nav">
                                <div class="col-xs-12">
                                    <div class="footer-links info-links">
                                         <?php if($lang_id=='bn'){echo "যোগাযোগ";}else{echo "Contact Us";}?>
                                    </div>
                                </div>
                            </a>
                            <a title="Privacy Policy" data-toggle="modal" data-target="#ModalName" aria-hidden="true">
                                <div class="col-xs-12">
                                    <div class="footer-links info-links">
                                         <?php if($lang_id=='bn'){echo "শর্তাদি ও শর্তাবলী";}else{echo "Terms and Conditions";}?>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            
                        </div>


                    <style>
                        #load_section{
                         border: 1px solid #949090;
                        }
                    </style>

                        <div class="col-md-6 col-xs-12 footer-message" id="load_section">
                            <div class="col-xs-12" id="footer-section-title-big-info"></div>
                            <div class="col-xs-12" id="footer-big-info-body">
                                
                                 <?php
                                    $i=0;
                                    $statement=$db->prepare("select * from tbl_footer_logo order by  footer_logo_id desc");
                                    $statement->execute();
                                    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row)
                                    {
                                        $i++;
                                        ?>

                                       <img id="site-logo" src="img/<?php echo $row['footer_logo_image']; ?>" alt="Footer Logo"> 

                                       <?php   
                                       if($i==1){
                                        break;
                                       }      

                                    }
                                ?>
                            </div>
                        </div>

                        <div class="col-xs-12 copyright">
                        <a class="" data-toggle="modal" data-target=".bs-example-modal-lg" id="footer-dff" href="" title="Check out the team who made this site">
                        <?php
                        
                            $statement=$db->prepare("select * from tbl_footer where footer_id=1");
                            $statement->execute();
                            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row)
                            {
                                echo $row['footer_text'];               
                            }
                        ?>
                        </a>
                        </div>

                        <!-- Large modal for Our Team  -->

                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <?php
                                    $statement=$db->prepare("select * from tbl_team where lang_id=?");
                                    $statement->execute(array($lang_id));
                                    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($result as $row)
                                    { 
                                    ?>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title" id="ModalNameLabel"><?php echo $row['team_title']; ?></h4>
                                </div>    
                                <div class="modal-body">


                                    <?php
                                        echo $row['our_team']; 
                                    }
                                ?>
                                
                            </div>
                          </div>
                        </div>
                    </div><!-- End Large modal> Our Team  -->
            </footer>

            <!-- Large modal for Privacy Policy  -->
            <div class="modal fade" id="ModalName" tabindex="-1" role="dialog" aria-labelledby="ModalNameLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <?php
                            $statement=$db->prepare("select * from tbl_privacy where lang_id=? ");
                            $statement->execute(array($lang_id));
                            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row)
                            { 
                            ?>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="ModalNameLabel"><?php echo $row['privacy_title']; ?></h4>
                        </div>    
                        <div class="modal-body">


                            <?php
                                echo $row['privacy_text']; 
                            }
                        ?>
                    
                        </div>    
                    </div>
                </div>
            </div> <!--End Large modal > Privacy Policy  -->
        </div>
	</div> <!-- container -->	

<script>
$(document).ready(function(){ 
    //loading different pages
    $(".footer_nav").click(function(){
        var menu_url=$(this).attr('href');
            //$("#load_section").fadeOut('fast').load(menu_url,
            $("#load_section").hide('fast').load(menu_url,
                function(){
                    //$(this).fadeIn('slow');
                    $(this).show('slow');
                }
            );
        
        return false;
    });
});

</script>

    
    
	<!-- Load JavaScript files -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>  -->
	
  
</body>
</html>