<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/magicquotes.php'; ?>
<?php
	//add new disease
	if (isset($_GET['add_new_disease'])) {
		$action = 'addDisease';
		$id = '';
		$name = '';
		$discription = '';
		$button = 'Add Disease';
		$pageTitle = 'Add New Disease';

		include 'form.php';
		exit();
	}

	if (isset($_GET['addDisease']) && $_POST['upload'] == 'Add Disease') {
		include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';

		$image = $_FILES['img_file']['name'];
 		$img_type = $_FILES['img_file']['type'];
 		$img_size = $_FILES['img_file']['size'];
		$target = '../images/'. $image;

		if(getImageType($img_type) == true && getImgSize($img_size) == true){
			try {
				if(move_uploaded_file($_FILES['img_file']['tmp_name'], $target)){
					$sql = 'INSERT INTO diseases SET dis_name=:name, datesubmit=CURDATE(), image=:image, discription=:disc';
					$stmt = $pdo->prepare($sql);
					$stmt->bindValue(':name', $_POST['disease']);
					$stmt->bindValue(':image', $image);
					$stmt->bindValue(':disc' , $_POST['text']);
					$stmt->execute();
				}
				else{
					echo 'error uploading file';
				}
			} catch (PDOException $e) {
					$error = 'Error inserting datas '. $e->getMessage();
					include 'error.php';
					exit();
			}
		}
		else{
			$error = 'file type not supported or no selected file';
			include 'error.php';
			exit();
		}
		header('Location: .');
		exit();
	}
	//edit disease data
	if (isset($_POST['action']) && $_POST['action'] =='Edit') {
		include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		try {
			$sql = 'SELECT id,dis_name,discription,image FROM diseases WHERE id = :id';
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':id', $_POST['id']);
			$stmt->execute();
			$res = $stmt->fetch();
		} catch (PDOException $e) {
			$error = 'Error trying to edit ' . $e->getMessage();
			include 'error.php';
			exit();
		}
		$action = 'editDisease';
		$id = $res['id'];
		$name = $res['dis_name'];
		$discription = $res['discription'];
		$button = 'Edit Disease';
		$file = $res['image'];
		$pageTitle = 'Edit Disease';
		include 'form.php';
		exit();
	}
	if (isset($_GET['editDisease']) && $_POST['upload'] == 'Edit Disease') {
		include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		try {
			$sql = 'UPDATE diseases SET dis_name=:name, discription=:discr WHERE id=:id';
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':id', $_POST['id']);
			$stmt->bindValue(':name', $_POST['disease']);
			$stmt->bindValue(':discr', $_POST['text']);
			$stmt->execute();
		} catch (PDOException $e) {
			$error = 'update error '. $e->getMessage();
			include 'error.php';
			exit();
		}
		header('Location: .');
		exit();
	}
	//delete disease// entry confirm
	if (isset($_POST['action']) && $_POST['action'] == 'Delete') {
		try {
			$id = $_POST['id'];
			$name = $_POST['name'];
			$imgId = $_POST['imgId'];
			include 'confirm.php';
			exit();
		} catch (Exception $e) {
			$error = 'confirm error '. $e->getMessage();
			include 'error.php';
			exit();
		}
		header('Location: .');
		exit();
	}
	if (isset($_POST['confirm']) && $_POST['confirm'] == 'Delete') {
		include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';
		try {
			if (array_key_exists('img_id', $_POST)) {
				$filename = $_POST['img_id'];
				if (file_exists($filename)) {
					unlink($filename);
				}
				else{
					$filename = 'cannot delete '. $filename;
					include 'error.php';
					exit();
				}
			}
		} catch (PDOException $e) {
			$error = 'Error deleting image '. $e->getMessage();
			include 'error.php';
			exit();
		}
		try {
			$sql = 'DELETE FROM diseases WHERE id=:id';
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':id' , $_POST['id']);
			$stmt->execute();
		} catch (PDOException $e) {
			$error = 'Error deleting on disease '. $e->getMessage();
			include 'error.php';
			exit();
		}
		header('Location: .');
		exit();
	}
	//output disease list
	try {
		include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/db.php';

		$sql = 'SELECT id,dis_name,image FROM diseases';
		$result = $pdo->query($sql);
		$result->execute();
	} catch (PDOException $e) {
		$error = 'Error query on diseases '. $e->getMessage();
		include 'error.php';
		exit();
	}
	foreach ($result as $row) {
		$diseases[] = array('id'=>$row['id'], 'dis_name'=>$row['dis_name'], 'image' => $row['image']);
	}

	function getImageType($type){
		if($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png'){
			return true;
		}
		return false;
	}
	function getImgSize($size){
		if ($size > 0 && $size < 3000000) {
			return true;
		}
		return false;
	}

	include 'dislist.php';
?>