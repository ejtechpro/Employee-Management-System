<?php 
include ('../db_connect.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM department WHERE dep_id='{$id}'");
  if(mysqli_num_rows($sql) > 0){
  while($row=mysqli_fetch_array($sql)){
    $dep_name = $row['dep_name'];
  }
}
} 
?>
<section class="manage-departmens">
  <div class="departmentadd">
    <fieldset>
      <legend>Create Department</legend>
      <form action="<?=isset($_GET['id']) ? 'edit_dep.php?id='.$id : 'add_depvalidation.php' ?>" method="POST" autocomplete="off">
        <label>Department Name</label>
        <input type="text" name="dep_name" value="<?=isset($dep_name) ? $dep_name : ''?>" required>
        <button type="submit" name="submit">Submit</button>
      </form>
    </fieldset>

  </div>
  <div class="departmentview">
  <fieldset>
      <legend>Department view</legend>
    <div class="viewtable table-responsive">
    <table class="table">
      <thead>
        <tr>
        <th>#</th>
        <th>Department Name</th>
        <th>Created On</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $n = 1;
        $psql = mysqli_query($conn, "SELECT * FROM department");
        if(mysqli_num_rows($psql) > 0):
        while($row=mysqli_fetch_array($psql)):  
         ?>
        <tr>
          <td><?=$n?></td>
          <td><?= ucwords($row['dep_name']) ?></td>
          <td><?= date("d-m-Y", strtotime($row['created_at']))?></td>
          <td class="edit_btn"><a href="dboard.php?page=add_dep&id=<?=$row['dep_id']?>" class="edit"><i class="fa fas fa-pen"></i></a></td>
          <td class="delete_btn"><a href="dboard.php?page=delete_dep&id=<?=$row['dep_id']?>" class="delete"><i class="fa fas fa-trash"></i></a></td>
        </tr>
        <?php $n++; endwhile; endif; ?>
      </tbody>
    </table>
  </div>
  </fieldset>

  </div>
</section>
