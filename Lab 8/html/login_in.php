<?php include('header.php');
if(isset($_SESSION['email']))
header('location:/index.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $type = $_POST['type'];

    // Include connection file
    include('./php/db_connection.php');

    // Use prepared statement to check credentials
echo $email;echo $pass;
    $stmt = $connect->query("SELECT * FROM $type WHERE email = '$email' && password='$pass'");
    if ($stmt->num_rows > 0) {
    echo "<div class=\"alert alert-success\" role=\"alert\">Login Successfull.</div>";
    $_SESSION['email']=$email;
    $_SESSION['role']=$type;
    header('location:/'.$type.'Home.php');}
    else{
    echo "<div class=\"alert alert-danger\" role=\"alert\">Login failed. Please enter correct credentials.</div>";
    }
    $stmt->close();
    $connect->close();
}
?>
<div id="main-div">
<div>
  <h2>Login[SQL Injectin Scenario]</h2>
</div>
<form class="row g-3" method="post" action="login_in.php">
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" required>
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="col-md-4">
    <label for="state" class="form-label">Login type</label>
    <select id="type" name="type" class="form-select" required>
      <option selected value="">-- Choose login type --</option>
      <option value="users">Non-admin</option>
      <option value="admins">Admin</option>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Login</button>
  </div>
</form>
</div>
<?php include('footer.php');?>
