<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/helper.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
	<form>
		<div class="contain">
			<select name="disease" id="select" onchange="this.nextSibling.value=this.value">
				<option value="">Select disease</option>
				<?php foreach ($disease as $row): ?>
					<option data-id="<?php htmlout($row['id']);?>"><?php htmlout($row['name']);?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="contain">
			<input type="submit" id="submit" name="submit" value="Add Symptom">
		</div>
	</form>
	<script src="../includes/jquery.js"></script>
	<script src="../dist/jquery-editable-select.min.js"></script>
	<script src="../includes/script.js"></script>
</body>
</html>