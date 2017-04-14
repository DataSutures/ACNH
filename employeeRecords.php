<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee</title>
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
  <span>Employees</span>
  <a class="btn btn-success pull-right btn-lg" href="addEmployee.php" role="button">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Employee
</a>
</h1>
<hr/>
<?php
$eID = $_GET[eID];

$servername = "localhost";// sql server name
$username = "root";// sql username
$password = "student";// sql password
$dbname  = "ACNHdb";// database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// if Delete 
if($_GET['mode'] == "delete"){
$sqldelete = "DELETE FROM Employee WHERE eID='$eID'";//delete statement
$delete = $conn->query($sqldelete);//execute the query
if($delete)
 { 
  echo '<div class="alert alert-success" role="alert">Employee Deleted Successfully!</div>';
 }
 else{
  echo '<div class="alert alert-danger" role="alert">Sorry you cannot delete this employee.</div>';
  }
}

$sql = "SELECT * FROM Employee";// embed a select statement in php
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows. If there are records, build a table to show them
 echo "<table class='table table-striped'>
	<thead>
		<tr>
		    <th>ID</th>
		    <th>First</th>
		    <th>Last </th>
		    <th>Phone</th>
		    <th>Street</th>
		    <th>City</th>
		    <th>State</th>
		    <th>Start Date</th>
		    <th>Edit</th>
		    <th>Delete</th>
		</tr>
	</thead>";
		
}

while ($row = $result -> fetch_assoc()){// Fetch the query result and store them in an array
	echo '<tr>
		<td >'.$row['eID'].'</td>
		<td >'.$row['fname'].'</td>
		<td >'.$row['lname'].'</td>
		<td >'.$row['phone'].'</td>
		<td >'.$row['street'].'</td>
		<td >'.$row['city'].'</td>
		<td >'.$row['state'].'</td>
		<td >'.$row['startDate'].'</td>
		<td > <a class="btn btn-default btn-sm" href="editEmployee.php?eID='.$row['eID'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
		<td> <a class="btn btn-default btn-sm" href="employeeRecords.php?eID='.$row['eID'].'&mode=delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
		</tr>';
}
 echo "</table>";

?>
</div>
</body>
</html>

