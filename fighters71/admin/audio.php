<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	
     $audio_id = ''; 
	if( isset( $_GET['audio_id'])) {
	    $audio_id = $_GET['audio_id']; 
	} 
	include('../config.php');

?>
<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;">List of Audio</h4>
        </div>
        <script type="text/javascript">
			$(document).ready(function(){
				
				$("#btn-viewAudio").hide();
				
				$("#btn-addAudio").click(function(){
					$(".content-loaderAudio").fadeOut('slow', function()
					{
						$(".content-loaderAudio").fadeIn('slow');
						$(".content-loaderAudio").load('audio_add.php');
						$("#btn-addAudio").hide();
						$("#btn-viewAudio").show();
					});
				});
				
				$("#btn-viewAudio").click(function(){
					
					$("body").fadeOut('slow', function()
					{
						$("body").load('audio.php');
						$("body").fadeIn('slow');
						window.location.href="audio.php";
					});
				});
				
			});
		</script>
        <div class="panel-body" style="overflow-y: scroll;height:450px;">
            <button class="btn btn-info" type="button" id="btn-addAudio"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Add Audio</button>
	        <button class="btn btn-info" type="button" id="btn-viewAudio"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View Audio</button>
	        <hr />
	        
	        <div class="content-loaderAudio">
	        
	        <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
	        <thead>
	        <tr>
	        <th>#</th>
	        <th>Audio Title</th>
	        <th>Audio Code</th>
	        <th></th>
	        </tr>
	        </thead>
	        <tbody>
	        <?php
	        $i=0;
	        $statement = $db->prepare("SELECT * FROM tbl_audio_link ORDER BY audio_id ASC");
	        $statement->execute();
			while($row=$statement->fetch(PDO::FETCH_ASSOC))
			{
				$i++;
				?>
				<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['audio_title']; ?></td>
				<td><?php echo $row['audio_code']; ?></td>
				<td>
					<a id="<?php echo $row['audio_id']; ?>" class="edit-linkAudio" href="#" title="Edit">
						<i class="glyphicon glyphicon-pencil"></i>
		            </a><br><br>
		            <a id="<?php echo $row['audio_id']; ?>" class="delete-linkAudio" href="#" title="Delete">
						<i class="glyphicon glyphicon-trash"></i>
		            </a>
	            </td>
				</tr>
				<?php
			}
			?>
	        </tbody>
	        </table>
	        
	        </div>
            
        </div>
</div>
</div>

          	
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>



