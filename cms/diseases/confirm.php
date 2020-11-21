<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sitepoint7/includes/magicquotes.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sitepoint7/includes/helper.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Confrim Deletion</title>
	<link rel="stylesheet" type="text/css" href="../includes/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
	<div class="contain">
		<form method="post" action="">
			<h3 class="danger">Are you want to delete?</h3>
			<input type="hidden" name="id" value="<?php htmlout($id); ?>">
			<input type="hidden" name="img_id" value="<?php htmlout('../images/'.$imgId); ?>">
			<input type="text" name="name" value="<?php htmlout($name); ?>" readonly>
			<input type="submit" name="confirm" value="Delete" class="btn btn-danger btn-sm">
			<a href="." class="btn btn-secondary btn-sm">Cancel</a>
		</form>
	</div>
</body>
</html>