<?php
session_start();
include ('../db_connect.php');
if(isset($_POST['submit'])){
/*  
|--------------------------------------------------------------------------------------
|Personal info
|--------------------------------------------------------------------------------------
*/
  $fname         = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname         = mysqli_real_escape_string($conn, $_POST['lname']);
  $email         = mysqli_real_escape_string($conn, $_POST['email']);
  $dob           = mysqli_real_escape_string($conn, $_POST['dob']);
  $contact       = mysqli_real_escape_string($conn, $_POST['contact']);
  $address       = mysqli_real_escape_string($conn, $_POST['address']);
  $maritalstatus = mysqli_real_escape_string($conn, $_POST['maritalstatus']);
  $birthplace    = mysqli_real_escape_string($conn, $_POST['birthplace']);
  $gender        = mysqli_real_escape_string($conn, $_POST['gender']);
  $age           = mysqli_real_escape_string($conn, $_POST['age']);
  $role          = mysqli_real_escape_string($conn, $_POST['role']);
  $password      = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword     = mysqli_real_escape_string($conn, $_POST['cpassword']);
/*  
|--------------------------------------------------------------------------------------
|working Info
|--------------------------------------------------------------------------------------
*/
  $depname       = mysqli_real_escape_string($conn, $_POST['dep_name']);
  $job           = mysqli_real_escape_string($conn, $_POST['job']);
  $dailyrate     = mysqli_real_escape_string($conn, $_POST['dailyrate']);
  $paymethod     = mysqli_real_escape_string($conn, $_POST['paymethod']);
  $position      = mysqli_real_escape_string($conn, $_POST['position']);
  $workingstatus = mysqli_real_escape_string($conn, $_POST['workingstatus']);
  $hireddate     = mysqli_real_escape_string($conn, $_POST['hireddate']);

  
  $id = $_GET['id'] ? $_GET['id'] : '';
 
 if($cpassword != $password){
  $_SESSION['error']= "Password does not mutch!";
  header("location: dboard.php?page=add_emp");
  exit();
 }else{

  $psql = "UPDATE employee SET emp_fname='$fname', emp_lname='$lname', emp_email='$email', emp_dob='$dob', emp_contact='$contact', emp_address='$address', emp_maritalstatus='$maritalstatus', emp_birthplace='$birthplace', emp_gender='$gender', emp_age='$age', emp_role='$role', emp_password='$password' WHERE emp_id='$id'";
  $p_result = mysqli_query($conn, $psql);

   $wsql = "UPDATE emp_working_info SET dep_name='$depname', job='$job', emp_daily_rate='$dailyrate', emp_pay_method='$paymethod', emp_position='$position', emp_status='$workingstatus', emp_hired_date='$hireddate' WHERE emp_id='$id'";
   $w_result = mysqli_query($conn, $wsql);

  if($p_result && $w_result){
    $_SESSION['success']= "Employee Data Updated Successfully!";
    header("location: dboard.php?page=add_emp&id=".$id);
    exit();
  }else{
    $_SESSION['error']= "Oop!, Something went wrong plese try again!";
    header("location: dboard.php?page=add_emp&id=".$id);
    exit();
  }
 }
 }

