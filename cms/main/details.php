<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/helper.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	<link rel="stylesheet" type="text/css" href="../includes/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div>
			<a href="." class="btn btn-primary btn-sm">Search again..</a>
		</div>
	</nav>
	<div class="container-md">
		<div>
			<h3><?php htmlout($results['dis_name']); ?></h3>
		</div>
		<div>
			<p><?php htmlout($results['discription']); ?></p>
		</div>
		<div>
			<img src="<?php htmlout('../images/'.$results['image']); ?>">
		</div>
		<div>
			<h4>Other Related Symptoms</h4>
		</div>
		<div>
			<?php foreach($record as $records): ?>
				<li class="list-group-item"><?php htmlout($records['sym_name']); ?></li>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>