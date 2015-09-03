<?php
require_once('PhpCrate.class.php');

$crate = new PhpCrate();
//$crate->setServers(array("hldk-weave-we-1.cloudapp.net:4200","hldk-weave-ne-2.cloudapp.net:4200","hldk-weave-eu-3.cloudapp.net:4200"));
//$crate->setServers(array("10.10.10.10:4200","10.10.10.20:4200","10.10.10.30:4200"));
$crate->setServers(array(getenv("LB_CRATE_ADDR")));
$crate->setPort(getenv("LB_CRATE_PORT"));
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<link href="" rel="shortcut icon">
 
	<title>Registration form</title><!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
        <!--
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
        -->
 
</head>
 
<body>
<?php
//$crate->query("set global stats.enabled = true");
//foreach ($crate->query("select name, hostname from sys.nodes") as $row) {
//   echo $row['name']." - ".$row['hostname']."<br>";
//}
//foreach ($crate->query("select _node['name'] as rname, job_id, name, used_bytes from sys.operations order by name") as $row) {
//   echo $row['rname']." - ".$row['name']."<br>";
//}
//$crate->query("set global stats.enabled = false");
?>
<div class="container">
<div class="row">
    <div class="col-md-12">
		<div class="well">
			<h2 class="text-center">List of Products</h2>
			<hr width="70%">
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="6%" align="left">ID</th>
							<th width="15%" align="left">Name</th>
							<th width="7%" align="left">Packing</th>
							<th width="7%" align="center">Price</th>
							<th width="7%" align="center">Stock</th>
							<th width="7%" align="left">Status</th>
 
						</tr>
					</thead>
					<tbody>
					<?php
                            foreach ($crate->query("SELECT * FROM products") as $row) {
                              echo ' <tr> ';
		                      echo ' <td> ';
		                      echo $row['id'];
		                      echo ' <td> ';
		                      echo $row['name'];
		                      echo ' <td> ';
		                      echo $row['packing'];
		                      echo ' <td> ';
		                      echo $row['price'];
		                      echo ' <td> ';
		                      echo $row['stock'];
		                      echo ' <td> ';
		                      echo $row['status'];
                            }
                     ?>
					</tbody>
				</table>
		</div>
	</div>
</div>
</div>
</html>
