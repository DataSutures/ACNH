<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body { padding-bottom: 50px; }
  </style>
</head>
<?php include 'nav_bar.php'; ?>
<body>
<div class="container">
<h1>
  <span>Products</span>
  <a class="btn btn-success pull-right btn-lg" href="addProduct.php" role="button">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Product
</a>
</h1>
<hr/>
<?php
$pID = $_GET[pID]; //the value of sno is received
$servername = "localhost";// sql server name
$username = "root";// sql username
$password = "student";// sql password
$dbname  = "ACNHdb";// database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// if Delete 
if($_GET['mode'] == "delete"){

$sqldelete = "DELETE FROM Product WHERE pID='$pID'";//delete statement
$delete = $conn->query($sqldelete);//execute the query
if($delete)
 { 
  echo '<div class="alert alert-success" role="alert">Product Deleted Successfully!</div>';
 }
 else{
  echo '<div class="alert alert-danger" role="alert">Sorry, you cannot delette this Product.</div>';
  }
}

$sql = "SELECT * FROM Product";// embed a select statement in php
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows. If there are records, build a table to show them
 echo "<table class='table table-striped'>
	<thead>
		<tr>
		    <th>Product ID</th>
		    <th>Supplier ID</th>
		    <th>Tablets </th>
		    <th>Count</th>
		    <th>Price</th>
		    <th>Quantity</th>
		    <th>Description</th>
		    <th>Edit</th>
		    <th>Delete</th>
		</tr>
	</thead>";
		
}

while ($row = $result -> fetch_assoc()){// Fetch the query result and store them in an array
	echo '<tr>
		<td >'.$row['pID'].'</td>
		<td >'.$row['sID'].'</td>
		<td >'.$row['pname'].'</td>
		<td >'.$row['tabCount'].'</td>
		<td >'.$row['price'].'</td>
		<td >'.$row['noInStock'].'</td>
		<td >'.$row['description'].'</td>
		<td ><a class="btn btn-default btn-sm" href="editProduct.php?pID='.$row['pID'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
		<td> <a class="btn btn-default btn-sm" href="productRecords.php?pID='.$row['pID'].'&mode=delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
	      </tr>';
}
 echo "</table>";

?>
</div>
</body>
</html>
