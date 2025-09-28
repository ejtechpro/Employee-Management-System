<?php
session_start();
include ('../db_connect.php');
if(isset($_POST['submit'])){
  $id = $_GET['id'] ? $_GET['id'] : '';

  $status = $_POST['status'];
  
  $sql = "UPDATE leave_request SET leave_status='$status' WHERE id='{$id}'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['success']= "Leave Status Updated Successfully!";
    header("location: dboard.php?page=leave-request");
    exit();
  }else{
    $_SESSION['error']= "Oop!, Something went wrong plese try again!";
    header("location: dboard.php?page=leave-request");
    exit();
  }
}
