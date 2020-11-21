<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/helper.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link href="../dist/jquery-editable-select.min.css" rel="stylesheet">
	<script src="../includes/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../includes/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
	<div class="cont">
		<div class="jumbotron">
			<h1>Dog Disease CMS</h1>
			<form method="post" action="" >
				<select name="search" id="search">
					<?php foreach($datas as $row): ?>
						<option><?php htmlout($row['name']); ?></option>
					<?php endforeach; ?>
				</select>
				<input type="submit" name="btn_search" value="Search" class="btn btn-primary btn-sm">
				<a href=".." class="btn btn-secondary btn-sm">Back</a>
			</form>
		</div>
	</div>
	<script src="../dist/jquery-editable-select.min.js"></script>
	<script src="../includes/script.js"></script>
</body>
</html>