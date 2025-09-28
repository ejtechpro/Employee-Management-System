<?php
session_start();
include ('../db_connect.php');
if(isset($_POST['submit'])){
  $id = $_GET['id'] ? $_GET['id'] : '';

  $leave_type = mysqli_escape_string($conn, $_POST['leave_type']);
  $start_date = mysqli_escape_string($conn, $_POST['start_date']);
  $end_date = mysqli_escape_string($conn, $_POST['end_date']);
  $description = mysqli_escape_string($conn, $_POST['description']);
  
  $sql = "UPDATE leave_request SET leave_type='$leave_type', start_date='$start_date', end_date='$end_date', leave_description='$description' WHERE id='{$id}'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['success']= "Leave Updated Successfully!";
    header("location: dboard.php?page=leave&id=".$id);
    exit();
  }else{
    $_SESSION['error']= "Oop!, Something went wrong plese try again!";
    header("location: dboard.php?page=leave&id=".$id);
    exit();
  }
}
