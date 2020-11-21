<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/magicquotes.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/helper.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../includes/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
	<div class="container">
		<nav class="navbar bg-dark sticky-top">
			<ul class="nav">
				<form class="form-inline">
    				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
   	 				<input type="submit" value="Search" name="text_search" class="btn btn-primary my-2 my-sm-0">
  				</form>
				<li><a href="?add_new_disease" class="nav-link">Add New Disease</a></li>
				<li><a href=".." class="nav-link">Back</a></li>
			</ul>
		</nav>
		<table class="table table-sm table-striped">
			<tr>
				<thead>
					<h4>Disease list..</h4>
				</thead>
			</tr>
			<tr>
				<th class="th">Diseases</th>
				<th class="th">Action</th>
			</tr>
			<?php foreach($diseases as $rows): ?>
				<form method="post" action="">
					<tr>
						<td class="thead">
							<input type="hidden" name="id" value="<?php htmlout($rows['id']);?>">
							<input type="hidden" name="imgId" value="<?php htmlout('../images/'.$rows['image']); ?>">
							<input type="hidden" name="name" value="<?php htmlout($rows['dis_name']); ?>">
							<p><?php htmlout($rows['dis_name']);?></p>
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