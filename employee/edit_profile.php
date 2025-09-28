<?php
session_start();
require_once ('../db_connect.php');
 if(isset($_FILES['file'])){
  $file = $_FILES['file'];

  /*   find file name */
  $name = $_FILES['file']['name'];
  
  /*  temporaly location */
  $tmp_name = $_FILES['file']['tmp_name'];
  
  /* find file size */
  $size = $_FILES['file']['size'];
  
  /* find error */
  $error = $_FILES['file']['error'];

  /*   Exploade from punctuation mark */
  $tempExtension = explode('.', $name);

  $fileExtension = strtolower(end($tempExtension));

  /*   Allowed extention */
  $isAllowed = array('jpg', 'png', 'jpeg', 'gif');

  $newFileName = "";
  $oldProfile = isset($_POST['oldProfile']) ? $_POST['oldProfile'] : '';

  if(!empty($name)){

    if(in_array($fileExtension, $isAllowed)){

      if($error === 0){

        if($size < 50000){

          $newFileName = uniqid('', true) . "." .  $fileExtension;

          $fileDestination = '../profiles/'. $newFileName;

          move_uploaded_file($tmp_name, $fileDestination);

        }else{

          $_SESSION['error'] = "Sorry, your profile size is too big";
          header("location: dboard.php?page=profile");
          exit();
        }

      }else{

        $_SESSION['error'] = "Sorry, there was an error! Try it again";
        header("location: dboard.php?page=profile");
        exit();
      }

    }else{

      $_SESSION['error'] = "Sorry, your profile type is not allowed";
      header("location: dboard.php?page=profile");
      exit();
    }

  }else{
   $newFileName = $oldProfile;
  }

  $sql = mysqli_query($conn, "UPDATE employee SET profile='{$newFileName}' WHERE emp_id='{$_SESSION['emp_id']}'");

  if($sql){
    $_SESSION['success'] = "Profile Picture Updated Successfully!";
    header("location: dboard.php?page=profile");
    exit();

  }else{
    $_SESSION['error'] = "Something Went Wrong!";
    header("location: dboard.php?page=profile");
    exit(); 
  }

}