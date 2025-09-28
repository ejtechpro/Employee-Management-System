<?php include ('../db_connect.php'); ?>
<section class="main-page">
<?php 
$psql = mysqli_query($conn, "SELECT COUNT(*) FROM employee WHERE emp_role='employee'");
$empno=mysqli_fetch_array($psql)[0];
?>
  <div class="empinfo">
    <p>Emloyees No.</p>
    <h4><?= $empno ?></h4>
  </div>
  <?php 
  $admins = mysqli_query($conn, "SELECT COUNT(*) FROM employee WHERE emp_role='admin'");
  $adminsno=mysqli_fetch_array($admins)[0];
  ?>
  <div class="empinfo">
    <p>Admins</p>
    <h4><?= $adminsno ?></h4>
  </div>
  <?php 
  $dep = mysqli_query($conn, "SELECT COUNT(*) FROM department");
  $depno=mysqli_fetch_array($dep)[0];
  ?>
  <div class="empinfo">
    <p>Departments</p>
    <h4><?= $depno?></h4>
  </div>
  <?php 
   $leavetotal = mysqli_query($conn, "SELECT COUNT(*) FROM leave_request");
   $result_total=mysqli_fetch_array($leavetotal)[0];
  ?>
  <div class="empinfo">
    <p>Leave Applied</p>
    <h4><?=$result_total?></h4>
  </div>
  <?php 
  $newleave = mysqli_query($conn, "SELECT COUNT(*) FROM leave_request WHERE leave_status='pending'");
  $new_result=mysqli_fetch_array($newleave)[0];
  ?>
  <div class="empinfo">
    <p>New Leave Request</p>
    <h4><?=$new_result?></h4>
  </div>
  <?php 
  $approveLeaves = mysqli_query($conn, "SELECT COUNT(*) FROM leave_request WHERE leave_status='approved'");
  $approved_result=mysqli_fetch_array($approveLeaves)[0];
  ?>
  <div class="empinfo">
    <p>Leave Approved</p>
    <h4><?=$approved_result?></h4>
  </div>
  <?php 
  $rejectedleave = mysqli_query($conn, "SELECT COUNT(*) FROM leave_request WHERE leave_status='rejected'");
  $rejectedleaveno=mysqli_fetch_array($rejectedleave)[0];
  ?>
  <div class="empinfo">
    <p>Leave Rejected</p>
    <h4><?=$rejectedleaveno?></h4>
  </div>
</section>
