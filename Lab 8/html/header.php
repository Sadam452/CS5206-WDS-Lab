<?php
session_start();
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Assign - Lab3</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
  </li>
  <?php if(!isset($_SESSION['email'])){ ?>
   <li class="nav-item">
    <a class="nav-link" href="index.php#main-div">Sign up</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Login</a>
  </li>
  <li class ="nav-item">
    <a class="nav-link" href="login_in.php">Insecure Login</a>
   </li>
  <?php }else{ ?>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo $_SESSION['role']?>Home.php"><?php echo $_SESSION['role']?> home</a>
  </li>
  <?php } ?>
  <li class="nav-item">
    <a class="nav-link" href="#" >About us</a>
  </li>
</ul>
<hr>
