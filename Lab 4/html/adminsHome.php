<?php
include('header.php');
if(!isset($_SESSION['email']))
header('location:/index.php');

//include db connection file
Include ("./php/db_connection.php");
$mail = $_SESSION['email'];
//$result = $connect->query("select * from users");
$result = $connect->query("SELECT * FROM admins WHERE email='$mail'");
?>
<div id="search-div">
<h2>Search a user</h2>
<form class="row g-3" action="adminsHome.php" method="post">
  <div class="col-auto">
    <label for="name">Enter Name(any characters)</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Eg., John" required pattern=".{2,}" title="Enter atleast 2 characters to search a user.">
  </div>
  <div class="col-auto">
    <button type="submit" style="margin-top:24px;"onclick="displayUser();"class="btn btn-primary mb-3">Search</button>
  </div>
</form>
</div>
<div id="main-div-admin">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$search_input = $_POST['name'];
    	$search_query = $connect->query("SELECT * FROM users WHERE name LIKE '%$search_input%'");
	if($search_query->num_rows > 0){ 
	echo "Found ".$search_query->num_rows." users.";
?>
	<table class="table table-striped table-hover">
	<tr>
	<b><td>#SNo</td><td>#Name</td><td>#Email</td><td>#Address</td><td>#City</td><td>#State</td></b>
	</tr>
<?php
$i = 1;
while($row_data = $search_query->fetch_assoc()) {
echo "<tr><td>".$i."</td><td>".$row_data['name']."</td><td>".$row_data['email']."</td><td>".$row_data['address']."</td><td>".$row_data['city']."</td><td>".$row_data['state']."</td></tr>";
$i +=1 ;
}
echo "</table>";
	}
	else{
    	echo "<div class=\"alert alert-danger\" role=\"alert\">Your search query doesn't return anything. No such user found.</div>";
	}
}

if($result->num_rows > 0){
$row = $result->fetch_assoc();
?>
<h2>Admin Profile. Welcome<p style="color:#65be41;"> <?php echo $row['name'] ?></p></h2>
<form class="row g-3">
  <div class="col-12">
    <label for="fname" class="form-label">Full name</label>
    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['name']; ?>" disabled>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" disabled>
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['email']; ?>" disabled>
  </div>
  <div class="col-12">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" disabled>
  </div>
  <div class="col-md-6">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>" disabled>
  </div>
  <div class="col-md-4">
    <label for="state" class="form-label">State</label>
    <select id="state" name="state" class="form-select"disabled>
      <option selected value=""><?php echo $row['state']; ?></option>
     </select>
  </div>
  <div class="col-md-2">
    <label for="zip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $row['zip']; ?>" disabled>
  </div>
</form>
<?php
}
else{?>
<div class="alert alert-secondary" role="alert">
Unable to display the profile details.
 </div>
<?php
}

        $search_all = $connect->query("SELECT * FROM users");
        if($search_all->num_rows > 0){ 
?>
         <h2>User<p style="color:#65be41;">Details</p></h2>
<?php echo "<b>Total users = ".$search_all->num_rows."</b>"; ?>
        <table class="table table-striped table-hover">
        <tr>
        <b><td>#SNo</td><td>#Name</td><td>#Email</td><td>#Address</td><td>#City</td><td>#State</td></b>
        </tr>
<?php
$it = 1;
while($row_data = $search_all->fetch_assoc()) {
echo "<tr><td>".$it."</td><td>".$row_data['name']."</td><td>".$row_data['email']."</td><td>".$row_data['address']."</td><td>".$row_data['city']."</td><td>".$row_data['state']."</td></tr>";
$it +=1 ;
}
echo "</table>";
        }
        else{
        echo "<div class=\"alert alert-danger\" role=\"alert\">No user found.</div>";
        }

?>
</div>
<?php
include('footer.php');
?>
