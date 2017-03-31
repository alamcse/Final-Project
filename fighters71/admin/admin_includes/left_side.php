<?php

     if(isset($_REQUEST['lang_id'])){

          $lang_id=$_REQUEST['lang_id'];
     }

     include('../config.php');

?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="panel panel-default"style="margin-left:-18px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Menu Management';}else{echo'মেনু ম্যানেজমেন্ট';}?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:120px;">
						<ul class="nav nav-list">
							<!-- <li class="active"><a href="index.php">Home</a></li> -->
							<li><a href="home.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'Home';}else{echo'হোম';};?></a></li>
							<li><a href="fighters.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'Fighters';}else{echo'মুক্তিযোদ্ধা';};?></a></li>
							<li><a href="birsrestho.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'Birsrestho';}else{echo'বীরশ্রেষ্ঠ';};?></a></li>
							<li><a href="sectors_list.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'Sectors';}else{echo'সেক্টর';};?></a></li>
						</ul>
                    </div>
                </div>
				<div class="panel panel-default"style="margin-left:-18px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;"><?php if($lang_id=='en'){echo 'Front Page Contents Management';}else{echo'ফ্রন্টপেজ কনটেন্ট ম্যানেজমেন্ট';};?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:100px;">
						<ul class="nav nav-list">
            	<li class="active"><a href="news.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'News Board';}else{echo'নিউজ বোর্ড';};?></a></li>
						</ul>
                    </div>
                </div>
				<div class="panel panel-default"style="margin-left:-18px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;"><?php if($lang_id=='en'){echo 'Footer Management';}else{echo'ফুটার ম্যানেজমেন্ট';};?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:120px;">
						<ul class="nav nav-list">
							<li class="active"><a href="about.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'About Us';}else{echo'আমাদের সম্পর্কে';};?></a></li>
							<li><a href="mission.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'Our Mission';}else{echo'আমাদের লক্ষ্য';};?></a></li>
							<li><a href="contact.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'Contact Us';}else{echo'যোগাযোগ';};?></a></li>
							<li><a href="privacy.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'Terms & Conditions';}else{echo'শর্তাদি ও শর্তাবলী';};?></a></li>
							<li><a href="team.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'Our Team';}else{echo'আমাদের টিম';};?></a></li>
							<li><a href="footer-text.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo 'Footer Text';}else{echo'ফুটার টেক্সট';};?></a></li>
						</ul>
                    </div>
                </div>
				
           </div>
		   