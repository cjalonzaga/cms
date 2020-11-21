<?php 
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=meddog','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');
		//echo "Connected Successfully";
	}
	catch(PDOException $e){
		$error = 'Database Connection Failed '.$e->getMessage();
		include 'error.php';
		exit(); 
	}
?>	