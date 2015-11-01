<?php
	session_start();

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