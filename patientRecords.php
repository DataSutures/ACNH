<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="scripts.js"></script>
</head>
<?php include 'nav_bar.php'; ?>
<body>
<div class="container">
<h1>
  <span>Patients</span>
  <a class="btn btn-success pull-right btn-lg acnh-button" href="addPatient.php" role="button">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Patient
</a>
</h1>
<hr/>
<?php
$pID = $_GET[pID]; //the value of pno is received
$servername = "localhost";// sql server name
$username = "root";// sql username
$password = "student";// sql password
$dbname  = "ACNHdb";// database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// if Delete 
if($_GET['mode'] == "delete"){

$sqldelete = "DELETE FROM Patient WHERE pID='$pID'";//delete statement
$delete = $conn->query($sqldelete);//execute the query
if($delete)
 { 
  echo '<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Patient deleted successfully!
</div>';
 }
 else{
  echo '<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Delete is restricted for that Patient.
</div>';
  }
}

$sql = "SELECT * FROM Patient";// embed a select statement in php
$result = $conn->query($sql);// get result

if($result->num_rows > 0){// check for number of rows. If there are records, build a table to show them
 echo "<table class='table table-striped'>
	<thead>
		<tr>
		    <th>ID</th>
		    <th>Primary Physician</th>
		    <th>First</th>
		    <th>Last </th>
		    <th>Phone</th>
		    <th>Street</th>
		    <th>City</th>
		    <th>State</th>
		    <th>DOB</th>
		    <th>Gender</th>
		    <th>Edit</th>
		    <th>Delete</th>
		</tr>
	</thead>";
		
}

while ($row = $result -> fetch_assoc()){// Fetch the query result and store them in an array
	echo '<tr>
		<td >'.$row['pID'].'</td>
		<td >'.$row['phID'].'</td>
		<td >'.$row['fname'].'</td>
		<td >'.$row['lname'].'</td>
		<td >'.$row['phone'].'</td>
		<td >'.$row['street'].'</td>
		<td >'.$row['city'].'</td>
		<td >'.$row['state'].'</td>
		<td >'.$row['DOB'].'</td>
		<td >'.$row['gender'].'</td>
		<td ><a class="btn btn-default btn-sm" href="editPatient.php?pID='.$row['pID'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
		<td><div><a class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal_'.$row['pID'].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a><div>
<div class="modal fade" id="modal_'.$row['pID'].'" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Delete Patient</h3>
      </div>
      <div class="modal-body">
        <h4 class="text-center"> '.$row['fname'].' '.$row['lname'].'<br/> ID# '.$row['pID'].' ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" href="patientRecords.php?pID='.$row['pID'].'&mode=delete">Delete</a>
      </div>
    </div>
  </div>
 </div
	      </tr>';
}
 echo "</table>";

?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>

