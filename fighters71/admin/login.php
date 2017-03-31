<?php

if(isset($_POST['form_login'])) 
{
	
	try {
	
		
		if(empty($_POST['username'])) {
			throw new Exception('Username can not be empty.');
		}
		
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty.');
		}
	
		include('../config.php');
		$num=0;
		$statement=$db->prepare("select * from tbl_login where username=? and password=?");
		$statement->execute(array($_POST['username'],$_POST['password']));


		$num=$statement->rowCount();
		
		if($num>0) 
		{
			session_start();
			$_SESSION['name'] = "admin";
			header("location: select_language.php");
		}
		else
		{
			throw new Exception('Invalid Username and/or password');
		}
	
	
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<html>
<head>

	<title>Login Page</title>
</head>
<body>
	<div class="system" style="width:300px;height:150px;background:#ddd; margin-left:450px;margin-top:200px">
		<h3 align="center">Login System</h3>
		<?php 
	
		if(isset($error_message)){ echo $error_message; }
	
	
		?>
		<hr>
		<form action="" method="post">
			<table>
				<tr>
					<td>Username:<td>
					<td><input type="text" name="username">
				</tr>
				<tr>
					<td>Password:<td>
					<td><input type="password" name="password">
				</tr>
				<tr>
					<td><td>
					<td><input type="submit" name="form_login" value="Login"  style="margin-left:125px">
				</tr>
			</table>
		</form>
	</div>
</body>
</html>