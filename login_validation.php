<?php
session_start();
include ('db_connect.php');
if(isset($_POST['username']) && isset($_POST['password'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = mysqli_query($conn, "SELECT * FROM employee WHERE emp_email ='$username' && emp_password='$password'");
  if(mysqli_num_rows($sql) > 0){
    $row=mysqli_fetch_array($sql);
      if($row['emp_email'] === $username && $row['emp_password'] === $password){

        $_SESSION['emp_id'] = $row['emp_id'];
        $_SESSION['fname'] = $row['emp_fname'];
        $_SESSION['lname'] = $row['emp_lname'];
        $_SESSION['username'] = $row['emp_email'];
        $_SESSION['profile'] = $row['profile'];

        
        if(isset($_POST['rememberMe'])){
          setcookie('employee', $row['emp_email'], time() + (60 * 60 * 24));
          setcookie('password', $row['emp_password'], time() + (60 * 60 * 24));
        }else{
          setcookie('employee', $row['emp_email'], time() - (60 * 60 * 24));
          setcookie('password', $row['emp_password'], time() - (60 * 60 * 24));
        }
        //directing the employee
        if(trim($row['emp_role']) === 'admin'){
          header("location: admin/dboard.php");
          exit();

        }elseif(trim($row['emp_role']) === 'employee'){
          header("location: employee/dboard.php");
          exit();
        }else{
          $_SESSION['error']= "Error! Please conduct admin!";
          header("location: index.php");
          exit();
        }

    }else{
      $_SESSION['error']= "Incorrect username or password!";
      header("location: index.php");
      exit();
    }
  }else{
    $_SESSION['error']= "Incorrect username or password!";
    header("location: index.php");
    exit();
  }
}