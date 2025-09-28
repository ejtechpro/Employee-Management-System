<?php include ('../db_connect.php'); ?>
<section class="viewemp">
  <div class="viewtable table-responsive">
    <div class="empinfomation">
      <a href="dboard.php?page=add_emp">Add New</a>
      <a href="dboard.php?page=view_wkinfo">Employee Working Information</a>
    </div>
    <h4>Employee Personal Information</h4>
    <div class="searchemp">
      <label>Search</label>
      <input type="search" id="searchInput" onkeyup="searchEmployee()" placeholder="Filter Employee Here...">
    </div>
    <table id="empTable" class="table">
      <thead>
        <tr>
        <th>#</th>
        <th>PF NO</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Date Of Birth</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Status</th>
        <th>Birth Place</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
         $n = 1;
        $psql = mysqli_query($conn, "SELECT * FROM employee");
        if(mysqli_num_rows($psql) > 0):
        while($row=mysqli_fetch_array($psql)):  
         ?>
        <tr>
          <td><?= $n ?></td>
          <td><?= $row['emp_id'] ?></td>
          <td><?= $row['emp_fname'] .' '.$row['emp_lname'] ?></td>
          <td><?= $row['emp_email'] ?></td>
          <td><?= $row['emp_dob'] ?></td>
          <td><?= $row['emp_contact'] ?></td>
          <td><?= $row['emp_address'] ?></td>
          <td><?= $row['emp_maritalstatus'] ?></td>
          <td><?= $row['emp_birthplace'] ?></td>
          <td><?= $row['emp_gender'] ?></td>
          <td><?= $row['emp_age'] ?></td>
          <td class="edit_btn"><a href="dboard.php?page=add_emp&id=<?=$row['emp_id']?>" class="edit"><i class="fa fas fa-pen"></i></a></td>
          <td class="delete_btn"><a href="dboard.php?page=delete_emp&id=<?=$row['emp_id']?>" class="delete"><i class="fa fas fa-trash"></i></a></td>
        </tr>
        <?php $n++; endwhile; endif; ?>
      </tbody>
    </table>
  </div>
</section>
