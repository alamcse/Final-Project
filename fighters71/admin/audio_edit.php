<?php
require'../config.php';
if($_GET['edit_id'])
{
	$id = $_GET['edit_id'];	
	$statement=$db->prepare("SELECT * FROM tbl_audio_link WHERE audio_id=?");
	$statement->execute(array($id));	
	$row=$statement->fetch(PDO::FETCH_ASSOC);
}

?>
<style type="text/css">
#disp{
	display:none;
}
</style>


	
    
    <div id="disp">
    
	</div>
        
 	
	 <form method='post' id='emp-UpdateAudio' action='#'>
 
    <table class='table table-bordered'>
 		<input type='hidden' name='id' value='<?php echo $row['audio_id']; ?>' />
        <tr>
            <td>Audio Title</td>
            <td><input type='text' name='audio_title' class='form-control' value='<?php echo $row['audio_title']; ?>' required></td>
        </tr>
 
        <tr>
            <td>Audio Code</td>
            <td><input type='text' name='audio_code' class='form-control' value='<?php echo $row['audio_code']; ?>' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-updateAudio" id="btn-updateAudio">
    		<span class="glyphicon glyphicon-plus"></span> Save Updates
			</button>
            </td>
        </tr>
 
    </table>
</form>
     
