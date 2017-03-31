<?php
require'../config.php';
	if($_POST)
	{
		$a_title = $_POST['audio_title'];
		$a_code = $_POST['audio_code'];
		
		try{
			
			$statement = $db->prepare("INSERT INTO tbl_audio_link(audio_title,audio_code) VALUES(?, ?)");
			$stmt=$statement->execute(array($a_title, $a_code));
			
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