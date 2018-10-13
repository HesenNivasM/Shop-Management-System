<?php
$connection=mysqli_connect('localhost','root','hesennivas','medical');
if(mysqli_connect_errno()){
		echo "Failed to connect";
	}
		error_reporting(E_ALL ^ E_NOTICE);

	$lot_number_bill = mysqli_real_escape_string($connection,$_POST["lot_number_bill"]);
if (null!==($_POST['submit_bill'])) {
	$quantity = mysqli_real_escape_string($connection,$_POST["quantity"]);
	$bill_no = mysqli_real_escape_string($connection,$_POST["bill_no"]);
	$result4= mysqli_query($connection, "UPDATE blockchain SET quantity=$quantity WHERE bill_no=$bill_no");
	$result = mysqli_query($connection, "SELECT * FROM stock WHERE lot_number='$lot_number_bill'" );
	$row = mysqli_fetch_array($result);
	$no=$row['No_of_medicines'];
	if ($no<$quantity) {
		echo ("Cannot be processed");
		echo $quantity;
	}
	else
	{
		$answer=$no-$quantity;
		$result1=mysqli_query($connection,"UPDATE stock SET No_of_medicines=No_of_medicines-$quantity WHERE lot_number=$lot_number_bill");
			$result5=mysqli_query($connection, "UPDATE blockchain SET total_price=quantity*price WHERE bill_no=$bill_no");
		header("Location: prj-item.php"); 
	}
}
	
if((null!==($_POST['enter_bill']))&&isset($_POST)){

	// $lot_number_bill = mysqli_real_escape_string($connection,$_POST["lot_number_bill"]);
		echo $lot_number_bill;
	$result = mysqli_query($connection, "SELECT * FROM stock WHERE lot_number='$lot_number_bill'" );
	$row = mysqli_fetch_array($result);
	$name=$row['medicine_name'];
	$dose=$row['Dose'];
	$price=$row['Price'];
	$price=$price-($price*10/100);	
	$bill_no = mysqli_real_escape_string($connection,$_POST["bill_no"]);
	$result3 = mysqli_query($connection, " INSERT INTO blockchain (bill_no,medicine_name,dose,lot_number,price) VALUES ('$bill_no','$name','$dose','$lot_number_bill',$price)");


}
?>
<!DOCTYPE html>
<html>
<head>
<title>Medicine Stock Site</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<nav class="navbar navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand text-white"><h3>Medical Store<h3><h5>by Dhanusuya and Kaarthiga</h5></a>
</nav>
<br>
<form method="POST">
<div class="container" id="Item_Section">
<label>Bill No</label>
<input class="form-control" type="number" name="bill_no" id="bill_no" />
<br>
<label>Lot Number</label>
<input class="form-control" type="number" name="lot_number_bill" id="lot_number_bill"></input>
<br>
<input class="btn btn-primary" type="Submit" name="enter_bill" value="Submit" onclick="set();">
<br>
<br>
<label>Medicine Name</label>
<input class="form-control" type="text" name="medicine_name_bill" id="medicine_name_bill" value="<?php if(is_string($name)){echo($name);}else{echo(" ");} ?>"></input>
<br>
<label>Dose</label>
<input class="form-control" type="text" name="dose_bill" id="dose_bill" value="<?php echo($dose) ?>" />
<br>
<label>Price</label>
<input class="form-control" type="Price" name="price_bill" id="price_bill" value="<?php echo($price) ?>"></input>
<br>
<label>Quantity</label>
<input class="form-control" type="Number" name="quantity" id="quantity" placeholder="Enter the count"></input>
<br>
<input class="btn btn-primary" type="Submit" name="submit_bill" value="Next Entry" />
<a class="btn btn-danger" href="prj-bill.php">Terminate</a>

<br>
</div>
</form>
</body>
<script type="text/javascript">
document.getElementById("bill_no").value=localStorage.getItem("bill_no");
function set(){
var value=document.getElementById("lot_number_bill").value;
localStorage.setItem("lot_no",value);
}
function nextpage(){
	window.location = "localhost/bae/prj-bill.php";
}
document.getElementById("lot_number_bill").value=localStorage.getItem("lot_no");
</script>
</html>