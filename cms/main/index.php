<?php
	if (isset($_POST['search'])) {
		try {
			include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/functions.php';
			$data = $_POST['search'];
			if (validateSymptoms($data) == true) {
				$id = validateSymptoms($data);
				$qry = 'SELECT dis_name AS name,LEFT(discription,40) AS dis,symptomid,diseaseid FROM diseases INNER JOIN dise_symp ON diseases.id = diseaseid WHERE symptomid = :id';
				$stmt = $pdo->prepare($qry);
				$stmt->bindValue(':id', $id);
				$stmt->execute();
				$res = $stmt->fetchAll();
			}
			if (validateDisease($data) == true) {
				$id = validateDisease($data);
				$qry = 'SELECT dis_name as name ,LEFT(discription,40) AS dis, sym_name, diseaseid, symptomid FROM diseases INNER JOIN dise_symp ON diseases.id = diseaseid INNER JOIN symptoms ON symptomid=symptoms.id WHERE TRUE AND diseaseid = :id LIMIT 1';
				$stmt = $pdo->prepare($qry);
				$stmt->bindValue(':id', $id);
				$stmt->execute();
				$res = $stmt->fetchAll();
			}
			if (isset($res)) {
				foreach ($res as $row) {
				$datas[] = array('name' => $row['name'],
								 'dis' => $row['dis'],
								 'symptomid' => $row['symptomid'],
								 'diseaseid' => $row['diseaseid']);
				}
			}
			include 'result.php';
			exit();
		} catch (Exception $e) {
			$error = 'error query on ' . $e->getMessage();
			include 'error.php';
			exit();
		}
	}
	if (isset($_POST['action']) && $_POST['action'] == 'View Details') {
		try {
			include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';

			$qry = 'SELECT dis_name,discription,image FROM diseases INNER JOIN dise_symp ON diseases.id=diseaseid WHERE diseaseid = :id';
			$s = $pdo->prepare($qry);
			$s->bindValue(':id', $_POST['dis_id']);
			$s->execute();
			$results = $s->fetch();
		} catch (PDOException $e) {
			$error = 'error viewing details ' . $e->getMessage();
			include 'error.php';
			exit();
		}
		try {
			include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
			$sql = 'SELECT sym_name FROM symptoms INNER JOIN dise_symp ON symptoms.id=symptomid WHERE diseaseid = :id';
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':id' , $_POST['dis_id']);
			$stmt->execute();
			$rec = $stmt->fetchAll();
		} catch (PDOException $e) {
			$error = 'error query on symptoms list ' . $e->getMessage();
			include 'error.php';
			exit();
		}
		foreach ($rec as $records) {
			$record[] = array('sym_name' => $records['sym_name']);
		}
		include 'details.php';
		exit();
	}
	//
	try {
		include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		$sql = 'SELECT sym_name AS name FROM symptoms UNION SELECT dis_name AS name FROM diseases';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	foreach ($result as $rows) {
		$datas[] = array('name' => $rows['name']);
	}
	include 'search.php';
?>