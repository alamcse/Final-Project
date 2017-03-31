<?php
require'../config.php';
if($_POST['del_id'])
{
	$id = $_POST['del_id'];	
	$statement=$db->prepare("DELETE FROM tbl_audio_link WHERE audio_id=?");
	$statement->execute(array($id));	
}
?>