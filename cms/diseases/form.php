<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/magicquotes.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/helper.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Disease</title>
	<link rel="stylesheet" type="text/css" href="../includes/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
	<div class="container-sm">
			<nav class="navbar bg-dark"><a href="." class="btn btn-secondary btn-sm">Back</a></nav>
			<h4><?php htmlout($pageTitle); ?></h4>

				<form method="post" action="?<?php htmlout($action);?>" enctype="multipart/form-data">
					<input class="form-control" type="hidden" name="id" value="<?php htmlout($id); ?>">
					<div class="form-group">
						<label for="disease">Disease Name:</label>
						<input type="text" name="disease" required="" value="<?php htmlout($name); ?>" class="form-control">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="8" placeholder="Disease discription.." name="text" required=""><?php htmlout($discription); ?></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" name="file" value="<?php htmlout('../images/'.$file); ?>">
						<input type="file" name="img_file" class="form-control-file">
					</div>
					<div class="form-group">
						<input type="submit"  class="btn btn-primary btn-sm" name="upload" value="<?php htmlout($button); ?>">
					</div>
				</form>
		
	</div>
</body>
</html>