<?php
require'../config.php';

	if($_POST)
	{
		$id = $_POST['id'];
		$a_title = $_POST['audio_title'];
		$a_code = $_POST['audio_code'];

		$statement = $db->prepare("UPDATE tbl_audio_link SET audio_title=?, audio_code=? WHERE audio_id=?");
		$stmt 	   = $statement->execute(array($a_title, $a_code, $id));
		
		if($stmt)
		{
			echo "Successfully updated";
		}
		else{
			echo "Query Problem";
		}
	}

?>