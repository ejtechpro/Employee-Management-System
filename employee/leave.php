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
  <div class="leavetadd">
    <fieldset>
      <legend>Create New Leave</legend>
      <form action="<?=isset($_GET['id']) ? 'edit_leave.php?id='.$id : 'add_leave_validation.php' ?>" method="POST" autocomplete="off">
        <label>Leave Type</label>
        <select name="leave_type" required>
        <option value="<?=isset($leave_type) ? $leave_type : ''?>" hidden selected><?=isset($leave_type) ? $leave_type : '--Select Leave Type--'?></option>
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM leave_type");
        if(mysqli_num_rows($sql) > 0){
        while($row=mysqli_fetch_array($sql)):?>
         <option value="<?=$row['leave_type']?>"><?=$row['leave_type']?></option>
        <?php endwhile;
        }
        ?>
        </select>
        <label>From Date</label>
        <input type="date" name="start_date" value="<?=isset($start_date) ? $start_date : ''?>" required>
        <label>To Date</label>
        <input type="date" name="end_date" value="<?=isset($end_date) ? $end_date : ''?>" required>
        <label>Description</label>
        <textarea name="description" cols="30" rows="5"><?=isset($description) ? $description : ''?></textarea>
        <button type="submit" name="submit">Submit</button>
      </form>
    </fieldset>

  </div>
  <div class="leaveview">
  <fieldset>
      <legend>Leave view</legend>
    <div class="viewtable table-responsive">
    <table class="table">
      <thead>
        <tr>
        <th>#</th>
        <th>Leave Type</th>
        <th>From Date</th>
        <th>To Date</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created On</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $n = 1;
        $psql = mysqli_query($conn, "SELECT * FROM leave_request WHERE emp_id='{$_SESSION['emp_id']}'");
        if(mysqli_num_rows($psql) > 0):
        while($row=mysqli_fetch_array($psql)):  
         ?>
        <tr>
          <td><?=$n?></td>
          <td><?= $row['leave_type'] ?></td>
          <td><?= $row['start_date'] ?></td>
          <td><?= $row['end_date'] ?></td>
          <td><?= $row['leave_description'] ?></td>
          <td><?php
            if($row['leave_status'] === 'approved'):?>
            <span class="approved"><?=$row['leave_status']?></span>
            <?php elseif($row['leave_status'] === 'rejected'): ?>
              <span class="rejected"><?=$row['leave_status']?></span>
            <?php else: ?>
              <span class="pending"><?=$row['leave_status']?></span>
              <?php endif; ?>
             </td>
          <td><?= date("d-m-Y", strtotime($row['date_create']))?></td>
          <td class="edit_btn"><a href="dboard.php?page=leave&id=<?=$row['id']?>" class="edit"><i class="fa fas fa-pen"></i></a></td>
          <td class="delete_btn"><a href="dboard.php?page=delete_leave&id=<?=$row['id']?>" class="delete"><i class="fa fas fa-trash"></i></a></td>
        </tr>
        <?php $n++; endwhile; endif; ?>
      </tbody>
    </table>
  </div>
  </fieldset>
  </div>
</section>
