<?php
include ('../db_connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $profile = NULL;
  $sql = mysqli_query($conn, "UPDATE employee SET profile='{$profile}' WHERE emp_id='{$id}'");
  if($sql){
  $_SESSION['success'] = 'Employee Profile Deleted Successfully!';
  header("location:".$_SERVER['HTTP_REFERER']);
  exit();
  }
}