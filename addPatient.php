<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Patient</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php include 'nav_bar.php'; ?>
<body>
<div class="container">
<h1>Add Patient</h1><hr/>
<?php

if(isset($_POST['update_btn'])){
	$pID=$_POST[pID_tb];
	$phID=$_POST[phID_tb];
	$fname=$_POST[fname_tb];
	$lname=$_POST[lname_tb];
	$phone=$_POST[phone_tb];
	$street=$_POST[street_tb];
	$city=$_POST[city_tb];
	$state = $_POST[state_tb];
	$DOB = $_POST[DOB_tb];
	$gender = $_POST[gender_tb];
	
	$servername = "localhost";
	$username = "root";// mysql username
	$password = "student";// sql password
	$dbname  = "ACNHdb";// database name

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "INSERT INTO Patient (pID, phID, fname, lname, phone, street, city, state, DOB, gender) VALUES ('$pID', '$phID', '$fname', '$lname', '$phone', '$street', '$city', '$state', '$DOB', CASE WHEN '$gender' = '' THEN NULL END)";

	$result = $conn->query($sql); 
	
	
	if($result)
	 { 
	  echo '<div class="alert alert-success" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Patient added successfully!</div>';
	 }
	 else
	 {
	  echo '<div class="alert alert-danger" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Missing or Invalid Input.</div>';
	  }
}
?>
<div class = "row">
<div class = "col-md-4">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	  <div class="form-group required control-label">
	    <label>Patient ID</label>
	    <input class="form-control" required="required" type="text" name="pID_tb" placeholder="ex: 11-1234567"/>
	  </div>
	  <div class="form-group required control-label">
	    <label>Primary Physician ID</label>
	    <input class="form-control" required="required" type="text" name="phID_tb" placeholder="Ex: 05-4140813"/>
	  </div>
	  <div class="form-group required control-label">
	    <label>First Name</label>
	    <input class="form-control" required="required" type="text" name="fname_tb"/>
	  </div>
	  <div class="form-group">
	    <label>Last Name</label>
	    <input class="form-control" type="text" name="lname_tb"/>
	  </div>
	  <div class="form-group required control-label">
	    <label>Phone</label>
	    <input class="form-control" required="required" type="text" name="phone_tb" placeholder="X-(XXX)XXX-XXXX"/>
	  </div>
	  <div class="form-group">
	    <label>Street</label>
	    <input class="form-control" type="text" name="street_tb"/>
	  </div>
	  <div class="form-group">
	    <label>City</label>
	    <input class="form-control" type="text" name="city_tb" />
	  </div>
	  <div class="form-group">
	    <label>State</label>
	    <input class="form-control" type="text" name="state_tb" placeholder="XX"/>
	  </div>
	  <div class="form-group required control-label">
	    <label>DOB</label>
	    <input class="form-control" required="required" type="date" name="DOB_tb" placeholder="YYYY-MM-DD"/>
	  </div>
	  <div class="form-group">
	    <label>Gender</label>
	    <input class="form-control" type="text" name="gender_tb" placeholder="M/F"/>
	  </div>
<input class="btn btn-success" type="submit" value="Submit" name="update_btn"/>
<a class="btn btn-default" href="patientRecords.php" type="button">Cancel</a>
</form>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>


