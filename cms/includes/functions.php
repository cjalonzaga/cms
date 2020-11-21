<?php 
	function validateSymptoms($data){
		include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		try {
			$s = $pdo->prepare('SELECT id,sym_name FROM symptoms WHERE sym_name=:name');
			$s->bindValue(':name', $data);
			$s->execute();
			$stmt = $s->fetch();
		} catch (PDOException $e) {
			$error = 'Error validation ' . $e->getMessage();
			include 'error.php';
			exit();
		}
		if ($stmt['sym_name'] == $data) {
			return $stmt['id'];
		}
		return false;
	}
	function validateDisease($data){
		include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		try {
			$s = $pdo->prepare('SELECT id,dis_name FROM diseases WHERE dis_name=:name');
			$s->bindValue(':name', $data);
			$s->execute();
			$stmt = $s->fetch();
		} catch (PDOException $e) {
			$error = 'Error validation ' . $e->getMessage();
			include 'error.php';
			exit();
		}
		if ($stmt['dis_name'] == $data) {
			return $stmt['id'];
		}
		return false;
	}
	function getRelatedSymptoms($data){
		include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		try {
			$s = $pdo->prepare('SELECT id,name FROM diseases WHERE name=:name');
			$s->bindValue(':name', $data);
			$s->execute();
			$stmt = $s->fetch();
		} catch (PDOException $e) {
			$error = 'Error validation ' . $e->getMessage();
			include 'error.php';
			exit();
		}
	}
?>