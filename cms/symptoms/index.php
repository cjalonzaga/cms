
<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/magicquotes.php';

	try {
		include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';

		$result = $pdo->query('SELECT id,sym_name FROM symptoms');
	} catch (PDOException $e) {
		$error = 'Error symptoms query ' . $e->getMessage();
		include 'error.php';
		exit();
	}
	foreach ($result as $rows) {
		$symptoms[] = array('id' => $rows['id'] , 'sym_name' => $rows['sym_name'] );
	}

	if (isset($_GET['addnew'])) {
		include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		$action = 'add_new';
		try {
			$sql = 'SELECT id,dis_name FROM diseases';
			$stmt = $pdo->query($sql);
			$stmt->execute();
		} catch (PDOException $e) {
			$error = 'Error disease query ' . $e->getMessage();
			include 'error.php';
			exit();
		}
		foreach ($stmt as $row) {
			$disease[] = array('id' => $row['id'], 'dis_name' => $row['dis_name']);
		}
		include 'form.php';
		exit();
	}
	//delete symtoms
	if (isset($_POST['action']) && $_POST['action'] == 'Delete') {
		include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		try {
			$sql = 'DELETE FROM symptoms WHERE id = :id';
			$res = $pdo->prepare($sql);
			$res->bindValue(':id', $_POST['id']);
			$res->execute();	
		} catch (PDOException $e) {
			$error = 'Error deleting symptoms ' . $e->getMessage();
			include 'error.php';
			exit();
		}
		header('Location: .');
		exit();
	}
	//add
	if (isset($_GET['add_new']) && $_POST['symptom'] != '') {
		include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/project/includes/functions.php';

		$data = $_POST['symptom'];
		//validate if symptoms exist
		if(validateSymptoms($data) == false){
			try {
				$sql = 'INSERT INTO symptoms SET sym_name = :name';
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue(':name' , $_POST['symptom']);
				$stmt->execute();
				$symptomId = $pdo->lastInsertId();
			} catch (PDOException $e) {
				$error = 'Error inserting new symptoms ' . $e->getMessage();
				include 'error.php';
				exit();
			}
		}
		else{
			$symptomId = validateSymptoms($data);
		}

		if ($_POST['disease'] != '') {
			try {
				$query=$pdo->prepare('SELECT id FROM diseases WHERE dis_name = :name');
				$query->bindValue(':name', $_POST['disease']);
				$query->execute();
				$id = $query->fetch();
			} catch (Exception $e) {
				$error = 'Error getting disease id ' . $e->getMessage();
				include 'error.php';
				exit();
			}
		}
		else{
			echo "<script>alert('No symptom or disease entered');</script>";
		}

		try{
			$s = 'INSERT INTO dise_symp SET diseaseid = :diseaseid, symptomid = :symptomid';
			$stmt = $pdo->prepare($s);
			$stmt->bindValue(':diseaseid', $id['id']);
			$stmt->bindValue(':symptomid', $symptomId);
			$stmt->execute();
		} catch (PDOException $e) {
			$error = 'Error on look up table query ' . $e->getMessage();
			include 'error.php';
			exit();
		}
		
		header('Location: .');
		exit();
	}
	include 'list.php';
?>