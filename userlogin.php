<?php
	include_once 'databaseconnect.php';
	# Login
	if(isset($_POST["login"]))
	{
		if(isset($_POST["username"]) && isset($_POST["password"]))
		{
			$username = $_POST["username"];
			$password = $_POST["password"];
			# using the shortcut ->query() method here since there are no variable
			# values in the select statement.
			$STH = $DBH->query("SELECT user_id, password, user_type FROM user WHERE username='$username'");

			# setting the fetch mode
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$row = $STH->fetch();
			if(count($row) > 0 && password_verify($password, $row["password"]))	
			{
				$_SESSION["UserSession"] = $row["user_id"];
				$_SESSION["UserType"] = $row["user_type"];
				
				if(isset($_COOKIE['AnonUser']))
				{
					$STH = $DBH->prepare(
					"UPDATE Cart SET User_Id=?, Anon_Id=NULL WHERE Anon_id=?");

					$STH->execute(array($row['user_id'], $_COOKIE['AnonUser']));
					setcookie("AnonUser", "", time() - 3600);
				}
				
				header("Location: index.php");
				die();
			}					
			else			
			{
				header("Location: login.php?loginfailed");
				die();
			}
		}
	}
?>