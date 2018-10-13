<?php
$connection=mysqli_connect('localhost','root','hesennivas','medical');
if(mysqli_connect_errno()){
		echo "Failed to connect";
	}
	error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['submit'])){
	$lot_number = mysqli_real_escape_string($connection,$_POST['lot_number']);
	$dose = mysqli_real_escape_string($connection,$_POST['dose']);
	$medicine_name = mysqli_real_escape_string($connection,$_POST['medicine_name']);
	$no_of_boxes = mysqli_real_escape_string($connection,$_POST['no_of_boxes']);
	$no_of_medicines = mysqli_real_escape_string($connection,$_POST['no_of_medicines']);
	$price = mysqli_real_escape_string($connection,$_POST['price']);
	$expiry_date = mysqli_real_escape_string($connection,$_POST['expiry_date']);
$query = "INSERT INTO stock(lot_number,medicine_name,dose,no_of_medicines,no_of_boxes,price,expiry_date) VALUES ('$lot_number','$medicine_name','$dose','$no_of_medicines','$no_of_boxes','$price','$expiry_date')";
$result = mysqli_query($connection,$query);
if ( false===$result ) {
  printf("error: %s\n", mysqli_error($connection));
}
else {
  echo 'done.';
}
}
if(null!==($_POST['stock_available'])){
	header("Location: prj-stock.php"); 
}
if(null!==($_POST['exit'])){
	header("Location: login.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Medicine Stock Site</title>
</head>
<form method="POST">
<body>
<nav class="navbar navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand text-white"><h3>Medical Store<h3><h5>by Dhanusuya and Kaarthiga</h5></a>
 
 		<div class="btn-group">
  	    	 	<button class="btn btn-primary mr-3" name="stock_available">Stock</button>
  	    	 	<button class="btn btn-danger" name="exit">Exit</button>
  	   	</div>
</nav>

<div class="container">
<br>
<label><b><h4>Select the Section</h4></b></label>
<br>
<div class="form-control">
<input type="radio" name="section" onclick="billingsection();">
<label>Billing Section</label>
<br>
</div>
<br>
<div class="form-control">
<input type="radio" name="section" onclick="stocksection();">
<label>Stock Section</label>
<br>
</div>
</div>
<br>
<div class="container" id="Stock_Section">
<label>Lot Number</label>
<input class="form-control" type="number" name="lot_number" id="lot_number" placeholder="Enter the lot number"></input>
<br>
<label>Medicine Name</label>
<input class="form-control" type="text" name="medicine_name" id="medicine_name" placeholder="Enter the name">
<br>
<label>Dose</label>
<input class="form-control" type="text" name="dose" id="dose" placeholder="Enter the dose">
<br>
<label>No of boxes</label>
<input class="form-control" type="number" name="no_of_boxes" id="No_of_boxes" placeholder="Enter the count">
<br>
<label>No of medicines</label>
<input class="form-control" type="number" name="no_of_medicines" id="No_of_medicines" placeholder="Enter the count">
<br>
<label>Expiry Date</label>
<input class="form-control" type="Date" name="expiry_date" id="Expiry_date">
<br>
<label>Price</label>
<input class="form-control" type="float" name="price" id="Price" placeholder="Enter the price for a medicine">
<br>
<input class="btn btn-primary" type="Submit" name="submit" value="Submit">
<br>
</div>

</form>

</body>
</html>
<script type="text/javascript">
var stocksec=document.getElementById("Stock_Section");
stocksec.style.display="none";
function stocksection()
{
stocksec.style.display="block";	
}
function billingsection(n)
{
location.href="prj-cus.php";
}
</script>