<?php
require'../config.php';
if($_POST['del_id'])
{
	$id = $_POST['del_id'];	
	$statement=$db->prepare("DELETE FROM tbl_video_link WHERE video_id=?");
	$statement->execute(array($id));	
}
?>