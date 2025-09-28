<?php
include ('../db_connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $delete = mysqli_query($conn, "DELETE FROM department WHERE dep_id='{$id}'");

  if($delete){
    $_SESSION['success']= "Department Deleted Successfully!";
    header("location: dboard.php?page=add_dep");
    exit();
  }
}