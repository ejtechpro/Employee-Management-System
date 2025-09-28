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

  //->pf no. generator
  $str = 'emp';
  $pfno = '';
  for($n=1; $n < 7; $n++){
   $pfno .= rand(0, 9);
  }
  $empId =  'emp'.$pfno;
 
 if($cpassword != $password){
  $_SESSION['error']= "Password does not mutch!";
  header("location: dboard.php?page=add_emp");
  exit();
 }else{

  $sql =mysqli_query($conn, "SELECT emp_id, emp_email FROM employee WHERE emp_id='$empId' OR emp_email='$email'");
    $row = mysqli_fetch_array($sql);
      if($row['emp_email'] === $email){
        $_SESSION['error']= "Email Id already Exist!";
        header("location: dboard.php?page=add_emp");
        exit();
      }else if($row['emp_id'] === $empId){
        $_SESSION['error']= "Parse error plese try again!";
        header("location: dboard.php?page=add_emp");
        exit();

      }else{

  $psql = "INSERT INTO employee(emp_id, emp_fname, emp_lname, emp_email, emp_dob, emp_contact, emp_address, emp_maritalstatus, emp_birthplace, emp_gender, emp_age, emp_role,emp_password) VALUES('$empId','$fname','$lname','$email','$dob','$contact','$address','$maritalstatus','$birthplace','$gender','$age','$role','$password')";
   $p_result = mysqli_query($conn, $psql);

   $wsql = "INSERT INTO emp_working_info(emp_id, dep_name,job,emp_daily_rate, emp_pay_method, emp_position, emp_status, emp_hired_date) VALUES ('$empId','$depname','$job','$dailyrate','$paymethod','  $position',' $workingstatus','$hireddate')";
   $w_result = mysqli_query($conn, $wsql);

  if($p_result && $w_result){
    $_SESSION['success']= "Employee Data Inserted Successfully!";
    header("location: dboard.php?page=add_emp");
    exit();
  }else{
    $_SESSION['error']= "Oop!, Something went wrong plese try again!";
    header("location: dboard.php?page=add_emp");
    exit();
  }
 }
 }
}
