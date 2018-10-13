<?php
	$connection = mysqli_connect('localhost','root','hesennivas','medical');
	if(mysqli_connect_errno()){
		echo "Failed to connect";
	}
	if(isset($_POST['submit'])){
		$lot_number=mysqli_real_escape_string($connection,$_POST['lot_number']);
		$medicine_name=mysqli_real_escape_string($connection,$_POST['medicine_name']);
		$no_of_boxes=mysqli_real_escape_string($connection,$_POST['no_of_boxes']);
		$no_of_medicines=mysqli_real_escape_string($connection,$_POST['no_of_medicines']);
		$expiry_date=mysqli_real_escape_string($connection,$_POST['expiry_date']);
		$price=mysqli_real_escape_string($connection,$_POST['price']);
		$query="INSERT INTO stock(lot_number,medicine_name,no_of_medicines,no_of_boxes,price,expiry_date) VALUES('lot_number','$medicine_name','$no_of_medicines','$no_of_boxes','$price','$expiry_date')";
		$result = mysqli_query($connection,$query);
		echo $result;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Medicine Stock Site</title>
	</head>
	<body>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div id="selection">
				<p>SECTION</p>
				<input type="radio" name="section" id="billing_section" onclick="billselected();">Billing Section<br>
				<input type="radio" name="section" id="stock_section" onclick="stockselected();">Stock Section
				
			</div>
			<br>
			<br>
			<div id="stock_sec">
				<label>Lot Number</label><input type="number" name="lot_number"><br>
				<label>Medicine Name</label><input type="text" name="medicine_name" id="medicine_name"><br>
				<label>No of boxes</label><input type="number" name="no_of_boxes"><br>
				<label>No of medicines</label><input type="number" name="no_of_medicines"><br>
				<label>Expiry Date</label><input type="Date" name="expiry_date" id="expiry_date"><br>
				<label>Price in Rupees</label><input type="number" name="price" id="price"><br>
				<input type="submit" name="submit" id="stock_submit" onclick=""><br>
			</div>
			<br>
			<div id="bill_sec">
				<label>Medicine Name</label><input type="text" name="medicine_name_bill"><br>
				<label>Quantity</label><input type="number" name="quantity_bill"><br>
				<label>Individual Price</label><input type="number" name="indi_price_bill"><br>
				<label>Price</label><input type="number" name="price_bill"><br>
				<input type="submit" name="submit" id="bill_submit"><br>
			</div>
		</form>
	</body>


	<script type="text/javascript">
		var stocksec=document.getElementById("stock_sec");
		var billsec=document.getElementById("bill_sec");
		stocksec.style.display="none";
		billsec.style.display="none";


		function stockselected(){
			stocksec.style.display="block";
			billsec.style.display="none";
		}


		function billselected(){
			stocksec.style.display="none";
			billsec.style.display="block";
		}
	</script>

</html>