<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Supplier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body { padding-top: 0px; padding-bottom: 50px; }
  div .form-group.required.control-label:before{
   color: red;
   content: "*";
   position: absolute;
   margin-left: -10px;
   }
  </style>
</head>
<?php include 'nav_bar.php'; ?>
<body>
<div class="container">
<h2>Add Supplier</h2>
<?php

if(isset($_POST['update_btn'])){
	$sID=$_POST[sID_tb];
	$name=$_POST[name_tb];
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
	echo '<div class="alert alert-success" role="alert">Records updated successfully!</div>';
	}
	echo '<div class="alert alert-warning" role="alert">Missing required input or invalid.</div>';
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
	    <input class="form-control" required="required" type="text" name="name_tb" placeholder="ex: Sunshine Pharmaceutical"/>
	  </div>
	  <div class="form-group required control-label">
	    <label>Phone</label>
	    <input class="form-control" required="required" type="text" name="phone_tb" placeholder="X-(XXX)XXX-XXXX"/>
	  </div>
	  <div class="form-group">
	    <label>Street</label>
	    <input class="form-control" type="text" name="street_tb" placeholder="ex: 123 Dumpy Lane"/>
	  </div>
	  <div class="form-group">
	    <label>City</label>
	    <input class="form-control" type="text" name="city_tb" placeholder="ex: Lafayette"/>
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

</form>
</div>
</div>
</div>
</body>
</html>


