<?php include'./includes/change_language.php';?> 
<!-- saved from url=(0059)http://kybarg.github.io/bootstrap-dropdown-hover/index.html -->

<div class="row">

        <nav class="navbar navbar-default" role="navigation">
            <style>
                nav ul li{
                    font-size: 1.2em;
                }
                .navbar{
                    margin-bottom: 0;
                }

            </style>
            <div class="container-fluid" style="background-color: #BAE6DC;">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-animations">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-animations" data-hover="dropdown" data-animations="slideInLeft fadeInLeft fadeInUp zoomIn">

               <!--  <div class="col-xs-7 col-lg-8 col-md-12 col-sm-12 pull-left"> -->
                
                    <ul class="nav navbar-nav">
                        <li class="nav-item active" style="border-right:2px solid silver;"><a href="index.php" class="nav-link"><?php if($lang_id=='bn'){echo "মুল পাতা";}else{echo "Home";}?> <span class="sr-only">(current)</span> </a></li>
                        <li class="nav-item" style="border-right:2px solid silver;"><a href="document.php" class="nav-link"><?php if($lang_id=='bn'){echo "ডকুমেন্ট";}else{echo "Document";}?> </a></li>

                        <li class="dropdown" style="border-right:2px solid silver;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php if($lang_id=='bn'){echo "সেক্টর";}else{echo "Sectors";}?> <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdownhover-bottom" role="menu">
                            <?php
                                include './config.php';
                                    $i=0;
                                    $statement=$db->prepare("select * from tbl_sectors where lang_id=?  order by sid asc ");
                                    $statement->execute(array($lang_id));
                                    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row)
                                     {
                                        $i++;
                                ?>
                                <li><a href="sector.php?id=<?php echo $row['sid']?>"><?php echo $row['sector_name'];?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>

                        <li class="dropdown" style="border-right:2px solid silver;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php if($lang_id=='bn'){echo "বীরশ্রেষ্ঠ";}else{echo "Birsrestho";}?> <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdownhover-bottom" role="menu">
                            <?php
                                    $i=0;
                                    $statement=$db->prepare("select * from tbl_birsrestho where lang_id=?  order by bid asc ");
                                    $statement->execute(array($lang_id));
                                    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row)
                                     {
                                        $i++;
                                ?>
                                <li><a href="birsrestho.php?id=<?php echo $row['bid']?>"><?php echo $row['bname'];?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>

                        <li class="dropdown" style="border-right:2px solid silver;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php if($lang_id=='bn'){echo "মিডিয়া";}else{echo "Media";}?> <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdownhover-bottom" role="menu">
                                <li><a href="audio.php"><?php if($lang_id=='bn'){echo "অডিও";}else{echo "Audio";}?></a></li>
                                <li><a href="video.php"><?php if($lang_id=='bn'){echo "ভিডিও";}else{echo "Video";}?></a></li>
                                <li><a href="gallery.php"><?php if($lang_id=='bn'){echo "গ্যালারী";}else{echo "Gallery";}?></a></li>
                            </ul>
                        </li>

                        <li class="dropdown" style="border-right:2px solid silver;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php if($lang_id=='bn'){echo "ডাউনলোড";}else{echo "Downloads";}?><span class="caret"></span></a>
                            <ul class="dropdown-menu dropdownhover-bottom" role="menu">
                                <li><a href="deed.php"><?php if($lang_id=='bn'){echo "দলিল";}else{echo "Deed";}?></a></li>
                                <li><a href="ebook.php"><?php if($lang_id=='bn'){echo "ই-বুক";}else{echo "E-book";}?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- </div> -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 pull-right">
                        <div class="col-lg-9 col-md-8 col-sm-8">
                            <style type="text/css">
                                #cse {
                                    width: 60%; /* make sure you don't use inline width */
                                    margin: 0 auto;
                                }
                                .cse .gsc-search-button input.gsc-search-button-v2, input.gsc-search-button-v2 {
                                    -webkit-box-sizing: border-box;
                                    -moz-box-sizing: content-box;
                                    box-sizing: content-box;
                                }
                                .gsc-search-box-tools .gsc-search-box .gsc-input {
                                    text-align: center;
                                    padding-right: 0;
                                }

                                div#gsc-iw-id1 {
                                    height: 30px;
                                }
                                .gsc-control-cse.gsc-control-cse-en {
                                    border: none;
                                    background: #BAE6DC;
                                    padding-bottom: 0;
                                }

                                .cse .gsc-search-button input.gsc-search-button-v2, input.gsc-search-button-v2 {
                                    width: 13px;
                                    height: 15px;
                                    padding: 6px 27px;
                                    min-width: 13px;
                                    margin: 0;
                                }
                                td.gsc-input {
                                    padding-bottom: 4px;
                                }
                            </style>
                            <script>
                                (function() {
                                var cx = '010706482766251113685:ciqhd92lvaq';
                                var gcse = document.createElement('script');
                                gcse.type = 'text/javascript';
                                gcse.async = true;
                                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                                var s = document.getElementsByTagName('script')[0];
                                s.parentNode.insertBefore(gcse, s);
                                })();
                            </script>
                            <gcse:search></gcse:search>
                        </div>
        
                        <div class="col-lg-3 col-md-4 col-sm-4">
                            <?php  
                                if($lang_id=='bn')
                                {

                            ?>
                                <a href="en.php" class="btn btn-default nav-item" type="submit" style="margin-top:13px;height:33px;">English</a>
                            <?php
                                }
                                else
                                {
                            ?>
                                 <a href="bn.php" class="btn btn-default nav-item" type="submit" style="margin-top:13px;height:33px;">Bangla</a>
                            <?php


                                }
                            ?>
                        </div>
                                                    
                    </div> 
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

</div>

