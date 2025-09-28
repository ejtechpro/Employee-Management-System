<?php 
include ('../db_connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM leave_request WHERE id='{$id}'");
  if(mysqli_num_rows($sql) > 0){
  while($row=mysqli_fetch_array($sql)){
    $leave_type = $row['leave_type'];
    $start_date = $row['start_date'];
    $end_date = $row['end_date'];
    $status = $row['leave_status'];
    $description = $row['leave_description'];
  }
}
} 
?>
<section class="manage-leaves">
  <div class="leaveview approve-leave" style="width: 100%;">
  <fieldset>
      <legend>Leave Requests</legend>
    <div class="viewtable table-responsive">
    <table class="table">
      <thead>
        <tr>
        <th>#</th>
        <th>Employee</th>
        <th>Leave Type</th>
        <th>From Date</th>
        <th>To Date</th>
        <th>Description</th>
        <th>Created On</th>
        <th>Status</th>
        <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $n = 1;
        $psql = mysqli_query($conn, "SELECT e.*,el.* FROM employee e JOIN leave_request el ON e.emp_id=el.emp_id");
        if(mysqli_num_rows($psql) > 0):
        while($row=mysqli_fetch_array($psql)):  
         ?>
        <tr>
          <td><?=$n?></td>
          <td><?= ucwords($row['emp_fname'] ." ". $row['emp_lname']) ?></td>
          <td><?= $row['leave_type'] ?></td>
          <td><?= $row['start_date'] ?></td>
          <td><?= $row['end_date'] ?></td>
          <td><?= $row['leave_description'] ?></td>
          <td><?= date("d-m-Y", strtotime($row['date_create']))?></td>
          <td>
            <form action="approve_leave.php?id=<?=$row['id']?>" method="POST">
              <select name="status" required>
                <option value="" hidden selected>Current Status: <?=$row['leave_status']?></option>
                <option value="approved">Approve</option>
                <option value="rejected">Reject</option>
              </select><br>
              <div class="approve-btn">
              <button type="submit" name="submit">Change</button>
              </div>
            </form>
          </td>
          <td class="delete_btn"><a href="dboard.php?page=delete_leave&id=<?=$row['id']?>" class="delete"><i class="fa fas fa-trash"></i></a></td>
        </tr>
        <?php $n++; endwhile; endif; ?>
      </tbody>
    </table>
  </div>
  </fieldset>
  </div>
</section>
