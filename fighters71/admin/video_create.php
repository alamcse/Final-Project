<?php
require'../config.php';
	if($_POST)
	{
		$v_title = $_POST['video_title'];
		$v_link = $_POST['video_link'];
		
		try{
			
			$statement = $db->prepare("INSERT INTO tbl_video_link(video_title,video_link) VALUES(?, ?)");
			$stmt=$statement->execute(array($v_title, $v_link));
			
			if($stmt)
			{
				echo "Successfully Added";
			}
			else{
				echo "Query Problem";
			}	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>