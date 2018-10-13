<?php
$connection=mysqli_connect('localhost','root','dhanusuya16','medical');
if(isset($_POST['submit']))
{
$lot_number=mysqli_real_escape_string($connection,$_POST['lot_number']);

$medicine_name=mysqli_real_escape_string($connection,$_POST['medicine_name']);
$No_of_boxes=mysqli_real_escape_string($connection,$_POST['No_of_boxes']);
$No_of_medicines=mysqli_real_escape_string($connection,$_POST['No_of_medicines']);
$Price=mysqli_real_escape_string($connection,$_POST['Price']);
$Expiry_date=mysqli_real_escape_string($connection,$_POST['Expiry_date']);
$query="INSERT INTO stock(lot_number,medicine_name,No_of_medicines,No_of_boxes,Price,Expiry_date)VALUES('$lot_number','$medicine_name','$No_of_medicines','$No_of_boxes','$Price','$Expiry_date')";
$result=mysqli_query($connection,$query);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Medicine Stock Site</title>
</head>
<body>
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
<p>SECTION</p>
<input type="radio" name="section" onclick="billingsection();">
<label>Billing Section</label>
<br>
<input type="radio" name="section" onclick="stocksection();">
<label>Stock Section</label>
<br>
<br>
<div id=Stock_Section>
<label>lot_number</label>
<input type="Number" name="lot_number"></input>
<br>
<br>
<label>Medicine Name</label>
<input type="text" name="medicine_name" placeholder="Enter the name"></input>
<br>
<br>
<label>No of boxes</label>
<input type="Number" name="No_of_boxes" placeholder="Enter the count"></input>
<br>
<br>
<label>No of medicines</label>
<input type="Number" name="No_of_medicines" placeholder="Enter the count"></input>
<br>
<br>
<label>Expiry Date</label>
<input type="Date" name="Expiry_date"></input>
<br>
<br>
<label>Price</label>
<input type="Price" name="Price"></input>
<br>
<br>
<input type="Submit" name="submit" value="Submit">
<br>
</div>
<div id=Billing_Section>
<label>Medicine Name</label>
<input type="text" placeholder="Enter the name"></input>
<br>
<br>
<label>No of medicines</label>
<input type="Number" placeholder="Enter the count"></input>
<br>
<br>
<label>Price</label>
<input type="Price"></input>
<br>
<br>
<label>Price with discount</label>
<input type="Price"></input>
<br>
<br>
</div>
</form>
</body>
<script type="text/javascript">
var stocksec=document.getElementById("Stock_Section");
var billingsec=document.getElementById("Billing_Section");
stocksec.style.display="none";
billingsec.style.display="none";
function stocksection()
{
stocksec.style.display="block";
billingsec.style.display="none";	
}
function billingsection(n)
{
stocksec.style.display="none";
billingsec.style.display="block";
}
</script>
</html>