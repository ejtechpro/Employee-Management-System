<?php
include ('../db_connect.php');
  $sql =mysqli_query($conn, "SELECT e.*,w.* FROM employee e JOIN emp_working_info w ON e.emp_id=w.emp_id WHERE e.emp_id='{$_SESSION['emp_id']}'");
  if(mysqli_num_rows($sql) > 0){
    while($row=mysqli_fetch_array($sql)){
      foreach($row as $key => $value){
        $$key = $value; 
      }
    }
  }
  $salary = '';
  if($emp_pay_method === 'daily'){

    $salary = $emp_daily_rate * 1;

  }elseif($emp_pay_method === 'weekly'){

    $salary = $emp_daily_rate * 7;

  }elseif($emp_pay_method === 'monthly'){

    $salary = $emp_daily_rate * 30;

  }elseif($emp_pay_method === 'yearly'){

    $salary = $emp_daily_rate * 356;

  }else{
   $salary = 00;
  }

 ?>
<section class="emp-home-section">
   <div class="details">
    <h4>My Info</h4>
    <div class="my-info">
      <fieldset>
        <legend>Personal Infomation</legend>
        <h3><b>First Name:</b> <span><?=$emp_fname?></span></h3>
        <h3><b>Latst Name:</b> <span><?=$emp_lname?></span></h3>
        <h3><b>Email Address:</b> <span><?=$emp_email?></span></h3>
        <h3><b>Contact:</b> <span><?=$emp_contact?></span></h3>
        <h3><b>Age:</b> <span><?=$emp_age?></span></h3>
        <h3><b>DOB:</b> <span><?=$emp_dob?></span></h3>
        <h3><b>Gender:</b> <span><?=$emp_gender?></span></h3>
        <h3><b>Place Of Birth:</b> <span><?=$emp_birthplace?></span></h3>
        <h3><b>Marital Status:</b> <span><?=$emp_maritalstatus?></span></h3>
        <div class="edit-btn">
        <a href="dboard.php?page=edit_my_data&id=<?=$_SESSION['emp_id']?>" class="edit">Edit</a>
        </div>
      </fieldset>
      <fieldset>
        <legend>Work Infomation:</legend>
        <h3><b>PF No:</b> <span><?=$emp_id?></span></h3>
        <h3><b>Department Name:</b> <span><?=$dep_name?></span></h3>
        <h3><b>Job:</b> <span><?=$job?></span></h3>
        <h3><b>Daily Rate:</b> <span><?=$emp_daily_rate?></span></h3>
        <h3><b>Payment Method:</b> <span><?=$emp_pay_method?></span></h3>
        <h3><b>Position:</b> <span><?=$emp_position?></span></h3>
        <h3><b>Status:</b> <span><?=$emp_status?></span></h3>
        <h3><b>Hired Date:</b> <span><?=$emp_hired_date?></span></h3>
        <div class="salary">
        <input type="text" value="Salary: <?=$salary?> Ksh." disabled>
        </div>
      </fieldset>
    </div>
   </div>
</section>