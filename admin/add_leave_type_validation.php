<?php
session_start();
include ('../db_connect.php');
if(isset($_POST['submit'])){
  $leave_type = mysqli_escape_string($conn, $_POST['leave_type']);

  $sql =mysqli_query($conn, "SELECT leave_type FROM leave_type WHERE leave_type='$leave_type'");
  if(mysqli_num_rows($sql) > 0){
    $_SESSION['error']= "Leave Type name already Exist!";
    header("location: dboard.php?page=leave-type");
    exit();
  }else{

  $sql = "INSERT INTO leave_type(leave_type) VALUES ('$leave_type')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['success']= "Leave Type Inserted Successfully!";
    header("location: dboard.php?page=leave-type");
    exit();
  }else{
    $_SESSION['error']= "Oop!, Something went wrong plese try again!";
    header("location: dboard.php?page=leave-type");
    exit();

  }
}
}