<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/helper.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Symptoms list</title>
	<link rel="stylesheet" type="text/css" href="../includes/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
	<div class="container">
		<nav class="navbar bg-dark sticky-top">
			<ul class="nav">
				<form class="form-inline" method="post">
    				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
   	 				<input type="submit" value="Search" name="search" class="btn btn-primary my-2 my-sm-0">
  				</form>
				<li><a href="?addnew" class="nav-link">Add New Symptom</a></li>
				<li><a href=".." class="nav-link">Back</a></li>
			</ul>
		</nav>
		<table class="table table-sm table-striped">
			<tr>
				<h4>Symptoms List</h4>
			</tr>
			<tr><th class="th">Symptoms</th><th class="th">Action</th></tr>
			<?php foreach($symptoms as $symptom): ?>
				<form method="post" action="">
						<tr>
						<td  class="thead">
							<input type="hidden" name="id" value="<?php htmlout($symptom['id']); ?>">
							<p><?php htmlout($symptom['sym_name']); ?></p>
						</td>
						<td class="td">
							<input type="submit" name="action" value="Edit" class="btn btn-sm btn-primary">
							<input type="submit" name="action" value="Delete" class="btn btn-sm btn-primary">
						</td>
						</tr>	
				</form>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>
