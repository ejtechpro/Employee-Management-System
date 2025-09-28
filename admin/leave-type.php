<?php 
include ('../db_connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM leave_type WHERE id='{$id}'");
  if(mysqli_num_rows($sql) > 0){
  while($row=mysqli_fetch_array($sql)){
    $leave_type = $row['leave_type'];
  }
}
} 
?>
<section class="manage-leaves">
  <div class="leavetadd">
    <fieldset>
      <legend>Create Leave Type</legend>
      <form action="<?=isset($_GET['id']) ? 'edit_leave_type.php?id='.$id : 'add_leave_type_validation.php' ?>" method="POST" autocomplete="off">
        <label>Leave Name</label>
        <input type="text" name="leave_type" value="<?=isset($leave_type) ? $leave_type : ''?>" required>
        <button type="submit" name="submit">Submit</button>
      </form>
    </fieldset>

  </div>
  <div class="leaveview">
  <fieldset>
      <legend>Leave Type view</legend>
    <div class="viewtable table-responsive">
    <table class="table">
      <thead>
        <tr>
        <th>#</th>
        <th>Leave Type</th>
        <th>Created On</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $n = 1;
        $psql = mysqli_query($conn, "SELECT * FROM leave_type");
        if(mysqli_num_rows($psql) > 0):
        while($row=mysqli_fetch_array($psql)):  
         ?>
        <tr>
          <td><?=$n?></td>
          <td><?= ucwords($row['leave_type'])?></td>
          <td><?= date("d-m-Y", strtotime($row['date_created']))?></td>
          <td class="edit_btn"><a href="dboard.php?page=leave-type&id=<?=$row['id']?>" class="edit"><i class="fa fas fa-pen"></i></a></td>
          <td class="delete_btn"><a href="dboard.php?page=delete_leave_type&id=<?=$row['id']?>" class="delete"><i class="fa fas fa-trash"></i></a></td>
        </tr>
        <?php $n++; endwhile; endif; ?>
      </tbody>
    </table>
  </div>
  </fieldset>
  </div>
</section>
