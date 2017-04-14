<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Product</title>
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
<h2>Edit Product</h2>

<?php
$pID_var = $_GET[pID]; //the value of sno is received from the editrecord.php page

$servername = "localhost";
$username = "root";
$password = "student";
$dbname  = "ACNHdb";

// Create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);

//Things to do, after the "update_btn" button is clicked.
if(isset($_POST[update_btn]))
{
	$sql_update= "UPDATE Product SET  price='$_POST[price_tb]', noInStock='$_POST[noInStock_tb]' WHERE pID='$pID_var'";

	$resultupdate = $conn->query($sql_update);

	if($resultupdate) //if the update is done successfully
		{
		echo '<div class="alert alert-success" role="alert">Records updated successfully!</div>';
		}
}

//when the page is loaded (also after the update is effective), the information of the selected (updated) record is loaded
$sql = "SELECT * FROM Product WHERE pID='$pID_var'";
$result = $conn->query($sql);
?>
<div class = "row">
<div class = "col-md-4">
<form action="" method="post">
<?php

while ($row = $result -> fetch_assoc()){//fetch the attributes to put in the designated textboxes
	echo'
	  <div class="form-group">
	    <label>Product ID</label>
	    <input class="form-control" id="disabledInput" type="text" placeholder="'.$row['pID'].'" disabled>
	  </div>
	  <div class="form-group">
	    <label>Supplier ID</label>
	    <input class="form-control" id="disabledInput" type="text" placeholder="'.$row['sID'].'" disabled>
	  </div>
	  <div class="form-group">
	    <label>Product</label>
	    <input class="form-control" id="disabledInput" type="text" placeholder="'.$row['pname'].'" disabled>
	  </div>
	  <div class="form-group">
	    <label>Tablet Count</label>
	    <input class="form-control" id="disabledInput" type="text" placeholder="'.$row['tabCount'].'" disabled>
	  </div>
	  <div class="form-group">
	    <label>Price</label>
	    <input class="form-control" type="text" name="price_tb" value="'.$row['price'].'"/>
	  </div>
	  <div class="form-group">
	    <label>Quantity</label>
	    <input class="form-control" type="text" name="noInStock_tb" value="'.$row['noInStock'].'"/>
	  </div>
	  <div class="form-group">
	    <label>Description</label>
	    <input class="form-control" id="disabledInput" type="text" placeholder="'.$row['description'].'" disabled>
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


