<?php include ('../db_connect.php'); ?>
<section class="viewemp">
  <div class="viewtable table-responsive">
    <div class="empinfomation">
      <a href="dboard.php?page=view_emp">Back</a>
    </div>
    <h4>Employee Working Information</h4>
    <div class="searchemp">
      <label>Search</label>
      <input type="search" id="searchInput" onkeyup="searchEmployee()" placeholder="Filter Employee Here...">
    </div>
    <table id="empTable" class="table">
      <thead>
        <tr>
        <th>#</th>
        <th>PF NO</th>
        <th>Department</th>
        <th>Job</th>
        <th>Daily Rate</th>
        <th>Payement Method</th>
        <th>Position</th>
        <th>Role</th>
        <th>Status</th>
        <th>Hired Date</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $n = 1;
        $psql = mysqli_query($conn, "SELECT ep.*,ew.* FROM employee ep JOIN emp_working_info ew ON ep.emp_id=ew.emp_id");
        if(mysqli_num_rows($psql) > 0):
        while($row=mysqli_fetch_array($psql)):  
         ?>
        <tr>
          <td><?= $n ?></td>
          <td><?= $row['emp_id'] ?></td>
          <td><?= $row['dep_name'] ?></td>
          <td><?= $row['job'] ?></td>
          <td><?= $row['emp_daily_rate'] ?></td>
          <td><?= $row['emp_pay_method'] ?></td>
          <td><?= $row['emp_position'] ?></td>
          <td><?= $row['emp_role'] ?></td>
          <td><?= $row['emp_status'] ?></td>
          <td><?= date("d/m/Y", strtotime($row['emp_hired_date'])) ?></td>
          <td class="edit_btn"><a href="dboard.php?page=add_emp&id=<?=$row['emp_id']?>" class="edit"><i class="fa fas fa-pen"></i></a></td>
          <td class="delete_btn"><a href="dboard.php?page=delete_emp&id=<?=$row['emp_id']?>" class="delete"><i class="fa fas fa-trash"></i></a></td>
        </tr>
        <?php $n++; endwhile; endif; ?>
      </tbody>
    </table>
  </div>
</section>
