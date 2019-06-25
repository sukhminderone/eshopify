<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="sign up.css">
</head>
<body>
<form action="signupconfig.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="repeatpassword" required>
    <label for="dob"><b>Date of birth</b></label>
    <input type="text" placeholder="dd-mm-yy" name="dob" required>
    <label for="gender"><b>Gender</b></label>
    <input type="text" placeholder="M 0R F" name="gender" required>
    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>
    <label for="psw"><b>Phone number</b></label>
    <input type="text" placeholder="Enter phone number" name="phone" required>
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
</body>
</html>
