<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/project/includes/helper.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Result</title>
	<link rel="stylesheet" type="text/css" href="../includes/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
	<div class="jumbotron">
		<h4>Search Results..</h4>
	</div>
	<div class="contain">
		<div class="container-sm">
			<?php foreach ($datas as $rows): ?>
				<form method="post">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>
									<input type="hidden" name="dis_id" value="<?php htmlout($rows['diseaseid']); ?>">
									<input type="hidden" name="id" value="<?php htmlout($rows['symptomid']); ?>">
									<p><strong><?php htmlout($rows['name']); ?></strong>
									<p><?php htmlout($rows['dis'].'....') ?></p>
								</td>
								<td>
									<input type="submit" name="action" value="View Details" class="btn btn-primary btn-sm"></p>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>