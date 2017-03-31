<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	
     $video_id = ''; 
	if( isset( $_GET['video_id'])) {
	    $video_id = $_GET['video_id']; 
	} 
	include('../config.php');

?>
<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;">List of Video</h4>
        </div>
        <script type="text/javascript">
			$(document).ready(function(){
				
				$("#btn-view").hide();
				
				$("#btn-add").click(function(){
					$(".content-loader").fadeOut('slow', function()
					{
						$(".content-loader").fadeIn('slow');
						$(".content-loader").load('video_add.php');
						$("#btn-add").hide();
						$("#btn-view").show();
					});
				});
				
				$("#btn-view").click(function(){
					
					$("body").fadeOut('slow', function()
					{
						$("body").load('video.php');
						$("body").fadeIn('slow');
						window.location.href="video.php";
					});
				});
				
			});
		</script>
        <div class="panel-body" style="overflow-y: scroll;height:450px;">
            <button class="btn btn-info" type="button" id="btn-add"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Add Video</button>
	        <button class="btn btn-info" type="button" id="btn-view"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View Video</button>
	        <hr />
	        
	        <div class="content-loader">
	        
	        <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
	        <thead>
	        <tr>
	        <th>#</th>
	        <th>Video Title</th>
	        <th>Video Link</th>
	        <th></th>
	        </tr>
	        </thead>
	        <tbody>
	        <?php
	        $i=0;
	        $statement = $db->prepare("SELECT * FROM tbl_video_link ORDER BY video_id ASC");
	        $statement->execute();
			while($row=$statement->fetch(PDO::FETCH_ASSOC))
			{
				$i++;
				?>
				<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['video_title']; ?></td>
				<td><?php echo $row['video_link']; ?></td>
				<td>
					<a id="<?php echo $row['video_id']; ?>" class="edit-link" href="#" title="Edit">
						<i class="glyphicon glyphicon-pencil"></i>
		            </a><br><br>
		            <a id="<?php echo $row['video_id']; ?>" class="delete-link" href="#" title="Delete">
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



