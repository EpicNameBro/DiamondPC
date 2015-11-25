<?php
	session_start();

	if(!isset($_COOKIE['AnonUser']))
	{
		$id = uniqid();
		setcookie("AnonUser", $id);
		$_COOKIE['AnonUser'] = $id;
	}

	$host = 'localhost';
	$dbname = 'DiamondPC';
	$user = 'root';
	$pass = '';

	try {
		 # MySQL with PDO_MYSQL
		 $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		 $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(PDOException $e) {
		 echo $e->getMessage();
	}
?>