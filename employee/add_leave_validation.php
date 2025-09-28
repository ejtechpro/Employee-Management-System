<?php
session_start();
include ('../db_connect.php');
if(isset($_POST['submit'])){
  $id = $_SESSION['emp_id'];
  $leave_type = mysqli_escape_string($conn, $_POST['leave_type']);
  $start_date = mysqli_escape_string($conn, $_POST['start_date']);
  $end_date = mysqli_escape_string($conn, $_POST['end_date']);
  $description = mysqli_escape_string($conn, $_POST['description']);

  $sql = "INSERT INTO leave_request(emp_id,leave_type,start_date,end_date,leave_description) VALUES('$id','$leave_type','$start_date','$end_date','$description')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['success']= "Leave Inserted Successfully!";
    header("location: dboard.php?page=leave");
    exit();
  }else{
    $_SESSION['error']= "Oop!, Something went wrong plese try again!";
    header("location: dboard.php?page=leave");
    exit();

  }
}
