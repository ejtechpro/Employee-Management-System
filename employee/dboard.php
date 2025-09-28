<?php 
session_start(); 
require_once ('../db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee</title>
  <!--  External css file connection -->
  <link rel="stylesheet" href="../css/style.css">
<!--   fontawesome icons -->
 <link rel="stylesheet" href="../inc/fontawesome/css/all.min.css">
 <link rel="stylesheet" href="../inc/fontawesome/css/fontawesome.min.css">
</head>
<body>
  <?php include ('../inc/error.php'); ?>
  <nav class="navbar">
    <div class="float-left">
   <div class="title">Welcome  <?=  ucwords($_SESSION['fname']); ?> {-Employee-}</div>
   <div class="side-toggler" id="toggler-btn"><i class="fa-solid fa-bars"></i></div>
   <div class="logout"><a href="../logout.php"><small>Logout</small></a></div>
   </div>
   <?php
   $sql = mysqli_query($conn, "SELECT * FROM employee WHERE emp_id='{$_SESSION['emp_id']}'");
       if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $profile = $row['profile'];
        $id = $row['emp_id'];
       }
   ?>
   <div class="user-profile">
    <a href="dboard.php?page=profile"> <img src="<?=!empty($profile) ? '../profiles/'.$profile : '../img/avatur.png'?>" alt="profile"></a>
   </div>
  </nav>

  <div class="sidebar">
    <ul>
      <li><a href="dboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
      <li><hr></li>
      <li><a href="dboard.php?page=profile"><i class="fa-solid fa-user"></i> My Profile</a></li>
      <li><hr></li>
      <li><a href="dboard.php?page=leave"><i class="fa-solid fa-clock"></i> Leave</a></li>
      <li><hr></li>
    </ul>
  </div>
  
  <div class="main-view-panel">
    <?php 
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    include ($page.'.php');
    ?>
    <div class="footer">
    <small>Powered By <span>ejtechpro</span> © <?= date("Y"); ?>.All Rights Reserved.</small>
    </div>
  </div>
  <!--   fontawesome icons -->
  <script src="../inc/fontawesome/js/all.min.js"></script>
  <script src="../inc/fontawesome/js/fontawesome.min.js"></script>
  <!-- main javascript file -->
  <script src="../js/script.js"></script>
</body>
</html>