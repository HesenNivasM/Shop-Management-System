<?php
  $connection = mysqli_connect('localhost','root','hesennivas','medical');
  if(mysqli_connect_errno()){
    echo "Failed to connect";
  }
  if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($connection,$_POST['uname']);
    $password=mysqli_real_escape_string($connection,$_POST['psw']);

    $query="SELECT * FROM login WHERE username='$username'";

    $result = mysqli_query($connection,$query);
    
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($row['password'] == $password){
        echo "Login Successful";
        header('Location:prj.php');
    }else{
      echo "Enter valid details";
    }
}
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand text-white"><h3>Medical Store<h3><h5>by Dhanusuya and Kaarthiga</h5></a>
</nav>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="container">
        <br>
        <br>
        <br>
        <div class="form-group">
      <label><b>Username</b></label>
      <input class="form-control" type="text" placeholder="Enter Username" name="uname" required>
      <br>
      <label><b>Password</b></label>
      <input class="form-control" type="password" placeholder="Enter Password" name="psw" required>
      <br>
      <input class="btn btn-primary" type="submit" name="submit" value="Login"> 
    </div>
    </div>
    </form>
  </body>
</html>