<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Product</title>
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
<h1>Add Product</h1>
<?php

if(isset($_POST['update_btn'])){
	$pID=$_POST[pID_tb];
	$sID=$_POST[sID_tb];
	$pname=$_POST[pname_tb];
	$tabCount=$_POST[tabCount_tb];
	$price=$_POST[price_tb];
	$noInStock=$_POST[noInStock_tb];
	$description = $_POST[description_tb];
	
	$servername = "localhost";
	$username = "root";// mysql username
	$password = "student";// sql password
	$dbname  = "ACNHdb";// database name

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "INSERT INTO Product (pID, sID, pname, tabCount, price, noInStock, description) VALUES ('$pID', '$sID', '$pname', CASE WHEN '$tabCount' = '' THEN NULL END, '$price', CASE WHEN '$noInStock' = '' THEN 0 END, '$description')";

	$result = $conn->query($sql);

	if($result)
	 { 
	  echo '<div class="alert alert-success" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Product added successfully!</div>';
	 }
	 else
	 {
	  echo '<div class="alert alert-danger" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Missing or Invalid Input. Try again.</div>';
	  }
}

?>
<div class = "row">
<div class = "col-md-4">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	  <div class="form-group required control-label">
	    <label>Product ID</label>
	    <input class="form-control" required="required" type="text" name="pID_tb" placeholder="ex: p1"/>
	  </div>
	  <div class="form-group required control-label">
	    <label>Supplier ID</label>
	    <input class="form-control" required="required" type="text" name="sID_tb" placeholder="ex: s1"/>
	  </div>
	  <div class="form-group required control-label">
	    <label>Product Name</label>
	    <input class="form-control" required="required" type="text" name="pname_tb"/>
	  </div>
	  <div class="form-group">
	    <label>Count</label>
	    <input class="form-control" type="text" name="tabCount_tb"/>
	  </div>
	  <div class="form-group required control-label">
	    <label>Price</label>
	    <input class="form-control" required="required" type="float" name="price_tb"/>
	  </div>
	  <div class="form-group">
	    <label>Quantity</label>
	    <input class="form-control" type="number" name="noInStock_tb"/>
	  </div>
	  <div class="form-group">
	    <label>Description</label>
	    <input class="form-control" type="text" name="description_tb"/>
	  </div>
<input class="btn btn-success" type="submit" value="Submit" name="update_btn"/>
<a class="btn btn-default" href="productRecords.php" type="button">Cancel</a>
</form>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>


