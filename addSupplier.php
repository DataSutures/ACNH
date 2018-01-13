<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Supplier</title>
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
<h1>Add Supplier</h1>
<?php

if(isset($_POST['update_btn'])){
	$sID=$_POST[sID_tb];
	$name=str_replace("'","''",$_POST[name_tb]);
	$phone=$_POST[phone_tb];
	$street=$_POST[street_tb];
	$city=$_POST[city_tb];
	$state = $_POST[state_tb];
	$url = $_POST[url_tb];
	
	$servername = "localhost";
	$username = "root";// mysql username
	$password = "student";// sql password
	$dbname  = "ACNHdb";// database name

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "INSERT INTO Supplier (sID, name, phone, street, city, state, url) VALUES ('$sID', '$name', '$phone', '$street', '$city', '$state', '$url')";

	$result = $conn->query($sql);

	if($result)
	 { 
	  echo '<div class="alert alert-success" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Supplier added successfully!</div>';
	 }
	 else
	 {
	  echo '<div class="alert alert-danger" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Sorry something went wrong and your form was not submited. Try again.</div>';
	  }
}

?>
<div class = "row">
<div class = "col-md-4">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	  <div class="form-group required control-label">
	    <label>Supplier ID</label>
	    <input class="form-control" required="required" type="text" name="sID_tb" placeholder="ex: s1"/>
	  </div>
	  <div class="form-group required control-label">
	    <label>Company Name</label>
	    <input class="form-control" required="required" type="text" name="name_tb"/>
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
	    <input class="form-control" type="text" name="city_tb"/>
	  </div>
	  <div class="form-group">
	    <label>State</label>
	    <input class="form-control" type="text" name="state_tb" placeholder="XX"/>
	  </div>
	  <div class="form-group">
	    <label>URL</label>
	    <input class="form-control" type="text" name="url_tb" placeholder="url.com"/>
	  </div>
<input class="btn btn-success" type="submit" value="Submit" name="update_btn"/>
<a class="btn btn-default" href="supplierRecords.php" type="button">Cancel</a>

</form>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>


