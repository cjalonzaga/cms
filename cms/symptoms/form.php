<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/helper.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../dist/jquery-editable-select.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../includes/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
		<div class="container">
			<nav class="navbar bg-dark sticky-top">
				<a href="." class="btn btn-primary">Back</a>
			</nav>
			<h4>Add New Symptoms</h4>
					<form method="post" id="formField" action="?<?php htmlout($action);?>">
						<div class="form-group">
							<label for="symptom">Symptom Name: </label>
							<select name="symptom" id="symptom" class="form-control">
								<?php foreach ($symptoms as $row): ?>
									<option data-id="<?php htmlout($row['id']);?>"><?php htmlout($row['sym_name']);?></option>
								<?php endforeach; ?>
							</select>
							<small class="form-text text-muted">Please enter new or select symptoms if exist.</small>
						</div>
						<div class="form-group">
							<label for="disease">Select Disease..</label>
							<select name="disease" id="select" class="form-control">
								<?php foreach ($disease as $row): ?>
									<option data-id="<?php htmlout($row['id']);?>"><?php htmlout($row['dis_name']);?></option>
								<?php endforeach; ?>
							</select>
							<small class="form-text text-muted">Please select disease that corresponds to the symptom.</small>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" name="submit" value="Add Symptom">
						</div>
					</form>
			</div>
	<script src="../includes/jquery.js"></script>
	<script src="../dist/jquery-editable-select.min.js"></script>
	<script src="../includes/script.js"></script>
</body>
</html>