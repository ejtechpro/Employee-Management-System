<?php 
session_start();
include ('inc/error.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
 <!--  External css file connection -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar">
   <div class="title">Employee Management System</div>
</nav>

<div class="container">
  <form action="login_validation.php" method="POST" autocomplete="off">
    <h4>LOGIN</h4>
    <label>Email</label>
    <input type="email" name="username" value="<?= isset($_COOKIE['employee']) ? $_COOKIE['employee'] : '' ?>" placeholder="username@domain.com"  required>
    <label>Password</label>
    <input type="password" name="password" id="pass" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" required required>

    <div class="radio-group">
    <span><input type="checkbox" name="rememberMe" <?= isset($_COOKIE['employee']) ? 'checked' : '' ?>> <small>Remember Me</small></span>
    <span><input type="checkbox" id="show"><small>Show password</small></span>
    </div>

    <button type="submit">Submit</button>
  </form>
</div>
<script>
 var show = document.getElementById("show");
 var input = document.getElementById("pass");
  show.onchange = ()=>{
    if(show.checked){
    input.type = 'text';
    }else{
      input.type = 'password';
    }
  }
</script>
  
</body>
</html>