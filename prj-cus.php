<?php
	$connection=mysqli_connect('localhost','root','hesennivas','medical');
	if(mysqli_connect_errno()){
			echo "Failed to connect";
		}
		error_reporting(E_ALL ^ E_NOTICE);
		$lot_number_bill = mysqli_real_escape_string($connection,$_POST["lot_number_bill"]);
	session_start();
	$_SESSION['customer_name']=$customer_name;

	if(null!==($_POST['submit_bill'])){
		session_start();
		$roll_no = mysqli_real_escape_string($connection,$_POST["roll_no"]);
		$customer_name = mysqli_real_escape_string($connection,$_POST["customer_name"]);
		$_SESSION['customer_name']=$customer_name;
		$bill_no = mysqli_real_escape_string($connection,$_POST["bill_no"]);
		$result = mysqli_query($connection, "INSERT INTO customer(roll_no,name,bill_no) VALUES ('$roll_no','$customer_name','$bill_no')" );
		header("Location: prj-item.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Medicine Stock Site</title>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand text-white"><h3>Medical Store<h3><h5>by Dhanusuya and Kaarthiga</h5></a>
</nav>
<br>
<form method="POST">
<div class="container" id="Billing_Section">
<label>Register Number</label>	
<input class="form-control" type="number" name="roll_no" id="roll_no" />
<br>
<label>Name</label>
<input class="form-control" type="name" name="customer_name" id="customer_name" />
<br>
<label>Bill No</label>
<input class="form-control" type="number" name="bill_no" id="bill_no" />
<br>
<br>
<input class="btn btn-primary" type="Submit" name="submit_bill" onclick="generate();" value="Submit">
</div>
</form>
</body>
<script type="text/javascript">
function generate(){
	var bill=document.getElementById("bill_no").value;
	localStorage.setItem("bill_no", bill);
}

</script>
</html>