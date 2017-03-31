<?php
require'../config.php';

	if($_POST)
	{
		$id = $_POST['id'];
		$v_title = $_POST['video_title'];
		$v_link = $_POST['video_link'];

		$statement = $db->prepare("UPDATE tbl_video_link SET video_title=?, video_link=? WHERE video_id=?");
		$stmt 	   = $statement->execute(array($v_title, $v_link, $id));
		
		if($stmt)
		{
			echo "Successfully updated";
		}
		else{
			echo "Query Problem";
		}
	}

?>