<?php
session_start();
include ('../db_connect.php');
if(isset($_POST['submit'])){
  $dep_name = mysqli_escape_string($conn, $_POST['dep_name']);

  $sql =mysqli_query($conn, "SELECT dep_name FROM department WHERE dep_name='$dep_name'");
  if(mysqli_num_rows($sql) > 0){
    $_SESSION['error']= "Department name already Exist!";
    header("location: dboard.php?page=add_dep");
    exit();
  }else{

  $sql = "INSERT INTO department(dep_name) VALUES ('$dep_name')";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['success']= "Department Inserted Successfully!";
    header("location: dboard.php?page=add_dep");
    exit();
  }else{
    $_SESSION['error']= "Oop!, Something went wrong plese try again!";
    header("location: dboard.php?page=add_dep");
    exit();

  }
}
}