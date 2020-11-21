<?php
	//include_once $_SERVER['DOCUMENT_ROOT'] . '/sitepoint7/includes/magicquotes.php';

	try{
		if (isset($_POST['symptoms'])) {
			include '/symptoms/list.php';
			exit();
		}
	}
	catch(PDOException $e){
		echo $e-getMessage();
		exit();
	}
	try{
		if (isset($_POST['symptoms'])) {
			include '/disease/dislist.php';
			exit();
		}
	}
	catch(PDOException $e){
		echo $e-getMessage();
		exit();
	}
	try {
		if (isset($_POST['start'])) {
			include '/main/search.php';
			exit();
		}
	} catch (PDOException $e) {
		echo $e-getMessage();
		exit();
	}
	include 'index.html';
?>