<?php
	$connection = mysqli_connect('localhost','root','dhanusuya16','medical');
	if(mysqli_connect_errno()){
		echo "Failed to connect";
	}
	if(isset($_POST['submit'])){
		$medicine_name=mysqli_real_escape_string($connection,$_POST['medicine_name']);
		$quantity=mysqli_real_escape_string($connection,$_POST['quantity']);
		$expiry_date=mysqli_real_escape_string($connection,$_POST['expiry_date']);
		$price=mysqli_real_escape_string($connection,$_POST['price']);
		$query="INSERT INTO medicine_stock(medicine_name,quantity,expiry_date,price) VALUES('$medicine_name','$quantity','$expiry_date','$price')";
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
				<label>Select the action to be performed:</label>
				<input type="radio" name="section" id="stock_section" onclick="stockselected();">Stock Section
				<input type="radio" name="section" id="billing_section" onclick="billselected();">Billing Section
			</div>
			<br>
			<br>
			<hr>
			<div id="stock_sec">
				<label>Medicine Name</label><input type="text" name="medicine_name" id="medicine_name"><br>
				<label>Quantity</label><input type="number" name="quantity" id="quantity"><br>
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