<?php
	require_once 'databaseconnect.php';
	$registerdata = array(	@$_POST["username"],
	                		@$_POST["password"],
	                		@$_POST["firstname"],
	                		@$_POST["lastname"],
	                		@$_POST["email"],
	                		@$_POST["birthdate"],
	                		@$_POST["address"],
	                		@$_POST["city"],
	                		@$_POST["stateprovince"],
	                		@$_POST["country"],
	                		@$_POST["postalcodezip"],
	                		@$_POST["phonenumber"]);
	                 		
	$valid = true;
	for($i = 0 ; $i < count($registerdata) ; $i++)
	{
		if(!isset($registerdata[$i]))
		{
			$valid = false;
		}
	}



	if($valid)
	{
		$options = [
		    'cost' => 11,
		    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
		$hashpassword = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
		$STH = $DBH->prepare("INSERT INTO User (Username, Password, User_Type, Grant_Admin) VALUES (?, ?, 'Customer', 0)");
		$STH->bindParam(1, $_POST["username"]);
		$STH->bindParam(2, $hashpassword);
		$STH->execute();

		$id = $DBH->lastInsertId();


		$STH = $DBH->prepare(
			"INSERT INTO User_Info (User_Id, First_Name, Last_Name, Email, Birthdate, Address, City, State_Province, Country, Postal_Code_Zip, Phone_Number) 
			 VALUES ($id, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$STH->bindParam(1, $_POST["firstname"]);
		$STH->bindParam(2, $_POST["lastname"]);
		$STH->bindParam(3, $_POST["email"]);
		$STH->bindParam(4, $_POST["birthdate"]);
		$STH->bindParam(5, $_POST["address"]);
		$STH->bindParam(6, $_POST["city"]);
		$STH->bindParam(7, $_POST["stateprovince"]);
		$STH->bindParam(8, $_POST["country"]);
		$STH->bindParam(9, $_POST["postalcodezip"]);
		$STH->bindParam(10, $_POST["phonenumber"]);
		$STH->execute();

		header("Location: login.php?success");
		die();
	}
	else
	{
		header("Location: login.php?register&registerfailed");
		die();
	}
?>