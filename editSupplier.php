<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Supplier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body { padding-top: 0px; padding-bottom: 50px; }
  </style>
</head>
<?php include 'nav_bar.php'; ?>
<body>
<div class="container">
<h2>Edit Supplier</h2>

<?php
$sID_var = $_GET[sID]; //the value of sno is received from the editrecord.php page

$servername = "localhost";
$username = "root";
$password = "student";
$dbname  = "ACNHdb";

// Create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);

//Things to do, after the "update_btn" button is clicked.
if(isset($_POST[update_btn]))
{
	$sql_update= "UPDATE Supplier SET  phone='$_POST[phone_tb]', street='$_POST[street_tb]', city='$_POST[city_tb]', state='$_POST[state_tb]', url='$_POST[url_tb]' WHERE sID='$sID_var'";

	$resultupdate = $conn->query($sql_update);

	if($resultupdate) //if the update is done successfully
		{
		echo '<div class="alert alert-success" role="alert">Records updated successfully!</div>';
		}
}

//when the page is loaded (also after the update is effective), the information of the selected (updated) record is loaded
$sql = "SELECT * FROM Supplier WHERE sID='$sID_var'";
$result = $conn->query($sql);
?>
<div class = "row">
<div class = "col-md-4">
<form action="" method="post">
<?php

while ($row = $result -> fetch_assoc()){//fetch the attributes to put in the designated textboxes
	echo'
	  <div class="form-group">
	    <label>Supplier ID</label>
	    <input class="form-control" id="disabledInput" type="text" placeholder="'.$row['sID'].'" disabled>
	  </div>
	  <div class="form-group">
	    <label>Company Name</label>
	    <input class="form-control" id="disabledInput" type="text" placeholder="'.$row['name'].'" disabled>
	  </div>
	  <div class="form-group">
	    <label>Phone</label>
	    <input class="form-control" type="text" name="phone_tb" value="'.$row['phone'].'"/>
	  </div>
	  <div class="form-group">
	    <label>Street</label>
	    <input class="form-control" type="text" name="street_tb" value="'.$row['street'].'"/>
	  </div>
	  <div class="form-group">
	    <label>City</label>
	    <input class="form-control" type="text" name="city_tb" value="'.$row['city'].'"/>
	  </div>
	  <div class="form-group">
	    <label>State</label>
	    <input class="form-control" type="text" name="state_tb" value="'.$row['state'].'"/>
	  </div>
	  <div class="form-group">
	    <label>URL</label>
	    <input class="form-control" type="text" name="url_tb" value="'.$row['url'].'"/>
	  </div>'
	  ;
}
?>
<input class="btn btn-success" type="submit" value="Submit" name="update_btn"/>

</form>
</div>
</div>
</div>
</body>
</html>


