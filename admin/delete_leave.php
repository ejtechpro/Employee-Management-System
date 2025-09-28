<?php
include ('../db_connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $delete = mysqli_query($conn, "DELETE FROM leave_request WHERE id='{$id}'");

  if($delete){
    $_SESSION['success']= "Leave Deleted Successfully!";
    header("location: dboard.php?page=leave-request");
    exit();
  }
}