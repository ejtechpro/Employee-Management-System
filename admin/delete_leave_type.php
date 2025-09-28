<?php
include ('../db_connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $delete = mysqli_query($conn, "DELETE FROM leave_type WHERE id='{$id}'");

  if($delete){
    $_SESSION['success']= "Leave Type Deleted Successfully!";
    header("location: dboard.php?page=leave-type");
    exit();
  }
}