<?php
include ('../db_connect.php');
if(isset($_GET['id'])){
  $uid = $_GET['id'];
  $sql =mysqli_query($conn, "SELECT e.*,w.* FROM employee e JOIN emp_working_info w ON e.emp_id=w.emp_id WHERE e.emp_id='{$uid}'");
  if(mysqli_num_rows($sql) > 0){
    while($row=mysqli_fetch_array($sql)){
      foreach($row as $key => $value){
        $$key = $value; 
      }
    }
  }
  
}
 ?>
<section class="addemp">
<div class="empinfomation">
  <a href="dboard.php?page=view_emp">Employees Details</a>
    </div>
  <form action="<?=isset($_GET['id']) ? 'edit_emp.php?id='.$uid : 'addemp_validation.php'?>" Method="POST" autocomplete="off">
    <fieldset>
      <legend>Personal Information</legend>
      <div class="formfields">
        <div class="field">
          <label>PF Number</label>
          <input type="text" name="empId"  value="<?=isset($emp_id) ?  $emp_id : 'Autogenarated' ?>" required disabled>
        </div>
        <div class="field">
          <label>First Name</label>
          <input type="text" name="fname" required value="<?= isset($emp_fname) ? $emp_fname : '' ?>">
        </div>
        <div class="field">
          <label>Last Name</label>
          <input type="text" name="lname" required value="<?= isset($emp_lname) ? $emp_lname : '' ?>">
        </div>
        <div class="field">
          <label>Email</label>
          <input type="email" name="email" required value="<?= isset($emp_email) ? $emp_email : '' ?>">
        </div>
        <div class="field">
          <label>Date of birth</label>
          <input type="date" name="dob" required value="<?= isset($emp_dob) ? $emp_dob : '' ?>">
        </div>
        <div class="field">
          <label>Contact</label>
          <input type="number" name="contact" min="0" required value="<?= isset($emp_contact) ? $emp_contact : '' ?>">
        </div>
        <div class="field">
          <label>Address</label>
          <input type="text" name="address" required value="<?= isset($emp_address) ? $emp_address : '' ?>">
        </div>
        <div class="field">
          <label>Marital Status</label>
          <select name="maritalstatus" required>
            <option value="<?= isset($emp_maritalstatus) ? $emp_maritalstatus : '' ?>" hidden selected><?= isset($emp_maritalstatus) ? $emp_maritalstatus : '--Choose Status--' ?></option>
            <option value="married">Married</option>
            <option value="single">Single</option>
            <option value="widow">Widow</option>
          </select>
        </div>
        <div class="field">
          <label>Birth Place</label>
          <input type="text" name="birthplace" required value="<?= isset($emp_birthplace) ? $emp_birthplace : '' ?>">
        </div>
        <div class="field">
          <label>Gender</label>
          <div class="gender">
            <div class="male">
            <input type="radio" name="gender" value="male" required <?= isset($emp_gender) &&$emp_gender==='male' ? 'checked' : '' ?>> Male
            </div>
          <div class="female">
          <input type="radio" name="gender" value="female" required <?= isset($emp_gender) && $emp_gender ==='female' ? 'checked' : '' ?>> Female
          </div>
          <div class="other">
          <input type="radio" name="gender" value="other" required <?= isset($emp_gender) && $emp_gender==='other' ? 'checked' : '' ?>> Other
          </div>
          </div>
        </div>
        <div class="field">
          <label>Age</label>
          <input type="number" name="age" min="0" max="100"  required value="<?= isset($emp_age) ? $emp_age : '' ?>">
        </div>
        <div class="field">
          <label>Role</label>
          <select name="role" required>
            <option value="<?= isset($emp_role) ? $emp_role : '' ?>" hidden selected><?= isset($emp_role) ? $emp_role : '--Choose Role--' ?></option>
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
          </select>
        </div>
        <div class="field">
          <label>Password</label>
          <input type="password" name="password" required value="<?= isset($emp_password) ? $emp_password : '' ?>">
        </div>
        <div class="field">
          <label>Cornfirm Password</label>
          <input type="password" name="cpassword" required value="<?= isset($emp_password) ? $emp_password : '' ?>">
        </div>
        <div class="field"></div>
        <div class="field"></div>
      </div>
    </fieldset>
    <fieldset>
      <legend>Working Information</legend>
      <div class="formfields">
        <div class="field">
          <label>Department</label>
          <select name="dep_name" required>
          <option value="<?= isset($dep_name) ? $dep_name: '' ?>" hidden selected><?= isset($dep_name) ? $dep_name : '--Choose Department--' ?></option>
            <?php $sql = mysqli_query($conn, "SELECT * FROM department");
             if(mysqli_num_rows($sql) > 0):
              while($row=mysqli_fetch_array($sql)):?>
             <option value="<?=$row['dep_name']?>"><?=$row['dep_name']?></option>
              <?php endwhile; endif; ?>
          </select>
        </div>
        <div class="field">
          <label>Job</label>
          <input type="text" name="job" required value="<?= isset($job) ? $job : '' ?>">
        </div>
        <div class="field">
          <label>Daily Rate</label>
          <input type="number" name="dailyrate" min="0" required value="<?= isset($emp_daily_rate) ? $emp_daily_rate : '' ?>">
        </div>
        <div class="field">
          <label>Pay Method</label>
          <select name="paymethod" required>
            <option value="<?= isset($emp_pay_method) ? $emp_pay_method: '' ?>" hidden selected><?= isset($emp_pay_method) ? $emp_pay_method : '--Choose Pay Method--' ?></option>
            <option value="daily">Daily</option>
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
            <option value="yearly">Yearly</option>
          </select>
          
        </div>
        <div class="field">
          <label>Position</label>
          <select name="position" required>
            <option value="<?= isset($emp_position) ? $emp_position : '' ?>" hidden selected><?= isset($emp_position) ? $emp_position : '--Choose Position--' ?></option>
            <option value="reqular">Reqular</option>
            <option value="member">Member</option>
            <option value="stuff">Stuff</option>
          </select>
        </div>
        <div class="field">
          <label>Status</label>
          <select name="workingstatus" required>
            <option value="<?= isset($emp_status) ? $emp_status : '--Choose Status--' ?>" hidden selected><?= isset($emp_status) ? $emp_status : '--Choose Status--' ?></option>
            <option value="active">Active</option>
            <option value="retired">Retired</option>
          </select>
        </div>
        <div class="field">
          <label>Hired Date</label>
          <input type="datetime-local" name="hireddate" required value="<?=
          isset($emp_hired_date) ? $emp_hired_date : '' ?>">
        </div>
        <div class="field" hidden></div>
        <div class="field" hidden></div>
      </div>
      </fieldset>
      <div class="addempbtn">
      <button type="submit" name="submit">Submit</button>
      <!-- <button class="submit">New</button> -->
      </div>
  </form>
</section>
