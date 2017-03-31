<?php
require'../config.php';
if($_GET['edit_id'])
{
	$id = $_GET['edit_id'];	
	$statement=$db->prepare("SELECT * FROM tbl_video_link WHERE video_id=?");
	$statement->execute(array($id));	
	$row=$statement->fetch(PDO::FETCH_ASSOC);
}

?>
<style type="text/css">
#dis{
	display:none;
}
</style>


	
    
    <div id="dis">
    
	</div>
        
 	
	 <form method='post' id='emp-UpdateForm' action='#'>
 
    <table class='table table-bordered'>
 		<input type='hidden' name='id' value='<?php echo $row['video_id']; ?>' />
        <tr>
            <td>Video Title</td>
            <td><input type='text' name='video_title' class='form-control' value='<?php echo $row['video_title']; ?>' required></td>
        </tr>
 
        <tr>
            <td>Video Link</td>
            <td><input type='text' name='video_link' class='form-control' value='<?php echo $row['video_link']; ?>' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">
    		<span class="glyphicon glyphicon-plus"></span> Save Updates
			</button>
            </td>
        </tr>
 
    </table>
</form>
     
