<?php
$connection=mysqli_connect('localhost','root','hesennivas','medical');
// Check connection
session_start();
$customer_name=$_SESSION['customer_name'];
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($connection,"SELECT * FROM blockchain where bill_no=(select bill_no from customer where name='$customer_name')");
$total = mysqli_query($connection,"SELECT sum(total_price) FROM blockchain where bill_no=(select bill_no from customer where name='$customer_name')");
$ans = mysqli_fetch_assoc($total);
echo "<head><title>Medicine Stock Site</title><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'></head><body><nav class='navbar navbar-dark bg-dark justify-content-between'><a class='navbar-brand text-white'><h3>Medical Store<h3><h5>by Dhanusuya and Kaarthiga</h5></a><button class='btn btn-primary' onclick='home();'>Back</button></nav><div class='container'><br><br><h3>Total Bill</h3><br>";
echo "<table border='3' class='table'>";

$i = 0;
while($row = $result->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "<h4>The total amount to be paid: ".$ans['sum(total_price)']."</h4>";
echo "</div></body>";

mysqli_close($connection);
?>

<script type="text/javascript">
  function home()
  {
    location.href = "prj.php";
  }
</script>