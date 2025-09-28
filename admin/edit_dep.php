<?php
session_start();
include ('../db_connect.php');
if(isset($_POST['submit'])){
  $id = $_GET['id'] ? $_GET['id'] : '';
  $dep_name = mysqli_escape_string($conn, $_POST['dep_name']);
  $sql = "UPDATE department SET dep_name='$dep_name' WHERE dep_id='{$id}'";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['success']= "Department Updated Successfully!";
    header("location: dboard.php?page=add_dep");
    exit();
  }else{
    $_SESSION['error']= "Oop!, Something went wrong plese try again!";
    header("location: dboard.php?page=add_dep");
    exit();
  }
}
