<?php require_once ('../db_connect.php') ?>
<section class="profile">
 <div class="content">
  <?php 
  $sql = mysqli_query($conn, "SELECT * FROM employee WHERE emp_id='{$_SESSION['emp_id']}'");
       if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $profile = $row['profile'];
        $id = $row['emp_id'];
       }
   ?>
  <img class="profile-preview" src="<?=!empty($profile) ? '../profiles/'.$profile : '../img/avatur.png'?>"  alt="profile">
  <form action="edit_profile.php" method="POST" enctype="multipart/form-data"  autocomplete="off">
    <h4><?=$_SESSION['fname']. ' ' .$_SESSION['lname']?></h4>
    <label>  
      <p>Select Picture</p>
      <input type="file" name="file" onchange="displayIMG(this.files[0])" hidden required>
      <input type="text" name="oldProfile" value="<?=$profile?>" hidden>
   </label>
  <div class="action_btn">
    <button type="submit" class="edit">Edit</button>
    <a href="delete_profile.php?id=<?=$id?>" class="delete">Delete</a>
  </div>
  </form>
 </div>
</section>
