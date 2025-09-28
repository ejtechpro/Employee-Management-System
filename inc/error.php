<?php
 if (isset($_SESSION['error'])) {
  $error = $_SESSION['error'];
  ?>
  <small class="error"><?= $error ?></small>
  
  <?php unset($_SESSION['error']);}?>

    
<?php if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    ?>
  <small class="success"><?= $success ?></small>
  <?php unset($_SESSION['success']);}?>