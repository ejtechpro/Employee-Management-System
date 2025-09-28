<?php
session_start();
include ('../db_connect.php');
if(isset($_POST['submit'])){
  $id = $_GET['id'] ? $_GET['id'] : '';
  $leave_type = mysqli_escape_string($conn, $_POST['leave_type']);
  $sql = "UPDATE leave_type SET leave_type='$leave_type' WHERE id='{$id}'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['success']= "Leave Type Updated Successfully!";
    header("location: dboard.php?page=leave-type");
    exit();
  }else{
    $_SESSION['error']= "Oop!, Something went wrong plese try again!";
    header("location: dboard.php?page=leave-type");
    exit();
  }
}
