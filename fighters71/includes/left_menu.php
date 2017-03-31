<?php include './includes/session.php'; ?>
<?php include'./includes/change_language.php';?>  


            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="panel">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-animations" data-hover="dropdown" data-animations="slideInUp fadeInLeft fadeInUp fadeInRight">
                        <ul class="nav nav-pills nav-stacked" id="nav-stacked">
                            <li role="presentation" class="active"><a href="index.php"><?php if($lang_id=='bn'){echo "মুল পাতা";}else{echo "Home";}?></a></li>
                            <li role="presentation"><a href="document.php"><?php if($lang_id=='bn'){echo "ডকুমেন্ট";}else{echo "Document";}?> </a></li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php if($lang_id=='bn'){echo "সেক্টর";}else{echo "Sectors";}?> <span class="caret"></span></a>
                                <ul id="dropdownhover-bottom" class="dropdown-menu dropdownhover-bottom" role="menu" style="top:-2%;">
                                 <?php
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
        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php if($lang_id=='bn'){echo "বীরশ্রেষ্ঠ";}else{echo "Birsrestho";}?><span class="caret"></span></a>
                            <ul id="dropdownhover-bottom" class="dropdown-menu dropdownhover-bottom" role="menu" style="left:100px;">
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
                            
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php if($lang_id=='bn'){echo "মিডিয়া";}else{echo "Media";}?> <span class="caret"></span></a>
                            <ul id="dropdownhover-bottom" class="dropdown-menu dropdownhover-bottom" role="menu" style="left:100px;">
                                <li><a href="#"><?php if($lang_id=='bn'){echo "অডিও";}else{echo "Audio";}?></a></li>
                                <li><a href="video.php"><?php if($lang_id=='bn'){echo "ভিডিও";}else{echo "Video";}?></a></li>
                                <li><a href="gallery.php"><?php if($lang_id=='bn'){echo "গ্যালারী";}else{echo "Gellary";}?></a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php if($lang_id=='bn'){echo "ডাউনলোড";}else{echo "Downloads";}?><span class="caret"></span></a>
                            <ul id="dropdownhover-bottom" class="dropdown-menu dropdownhover-bottom" role="menu" style="left:100px;">
                                <li><a href="deed.php"><?php if($lang_id=='bn'){echo "দলিল";}else{echo "Deed";}?></a></li>
                                <li><a href="ebook.php"><?php if($lang_id=='bn'){echo "ই-বুক";}else{echo "E-book";}?></a></li>
                            </ul>
                        </li>

                        </ul> 
                    </div>
                </div>
            </div>