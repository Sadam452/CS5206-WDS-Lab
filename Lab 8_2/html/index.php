<?php include('header.php'); ?>
<div id="main-div">
<form class="row g-3" method="post" action="signup.php">
  <div class="col-12">
    <label for="fname" class="form-label">Full name</label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="John Doe" required>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password"pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$" title="Password policy: length>=8, atleast one lower alpha, one upper alpha, one special character, one digit." class="form-control" id="password" name="password" required>
  </div>
    <div class="col-md-6">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address" required>
  </div>
  <div class="col-md-6">
    <label for="type" class="form-label">User type(Verification required for admin accounts)</label>
    <select id="type" name="type" class="form-select" required>
      <option selected value="">-- Choose user type --</option>
      <option value="users">Non-Admin</option>
      <option value="admins">Admin</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" required>
  </div>
  <div class="col-md-4">
    <label for="state" class="form-label">State</label>
    <select id="state" name="state" class="form-select" required>
      <option selected value="">-- Choose state --</option>
      <option value="Telengana">Telengana</option>
      <option value="Karnataka">Karnataka</option>
      <option value="Tamil Nadu">Tamil Nadu</option>
      <option value="Kerela">Kerela</option>
      <option value="NA">Others</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="zip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="zip" name="zip" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Create account</button>
  </div>
</form>
</div>
<?php include('footer.php');?>
