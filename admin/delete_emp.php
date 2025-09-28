<?php
include ('../db_connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "DELETE FROM employee WHERE emp_id='{$id}'");
  if($sql){
  $_SESSION['success'] = 'Employee Deleted Successfully!';
  header("location:".$_SERVER['HTTP_REFERER']);
  exit();
  }
}