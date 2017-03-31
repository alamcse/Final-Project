<?php
     if(isset($_REQUEST['lang_id'])){

          $lang_id =$_REQUEST['lang_id'];
     }
     include('../config.php');

?>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="panel panel-default"style="margin-right:-18px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Social Media Management';}else{echo'সোশ্যাল মিডিয়া ম্যানেজমেন্ট';}?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:120px;">
						<ul class="nav nav-list">
							<li><a href="social_link.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo'Social Media';}else{echo'সোশ্যাল মিডিয়া';}?></a></li>
						</ul>
                    </div>
                </div>
				<div class="panel panel-default"style="margin-right:-18px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Upload';}else{echo'আপলোড';}?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:100px;">
						<ul class="nav nav-list">
							<li class="active"><a href="video.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo'Video';}else{echo'ভিডিও';}?></a></li>
							<li><a href="audio.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo'Audio';}else{echo'অডিও';}?></a></li>
							<li><a href="upload.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo'Books / Deeds';}else{echo'বই/ দলিল';}?></a></li>
							<li><a href="image.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo'Picture / Slider';}else{echo'ছবি/ স্লাইডার';}?></a></li>
						</ul>
                    </div>
                </div>
				<div class="panel panel-default"style="margin-right:-18px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;"><?php if($lang_id=='en'){echo'Settings';}else{echo'সেটিংস';}?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:120px;">
						<ul class="nav nav-list">
							<li class="active"><a href="change_username.php?lang_id=<?php echo$_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo'Change Username';}else{echo'ইউজার নাম পরিবর্তন';}?></a></li>
							<li><a href="change_password.php?lang_id=<?php echo $_SESSION['lang_id']; ?>"><?php if($lang_id=='en'){echo'Change Password';}else{echo'পাসওয়ার্ড পরিবর্তন';}?></a></li>
							<li><a href="logout.php"><?php if($lang_id=='en'){echo'Logout';}else{echo'লগ আউট';}?></a></li>
						</ul>
                    </div>
                </div>
		</div>
	</div>
</div>