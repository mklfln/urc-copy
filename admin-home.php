<?php
require_once('./include/header.php');

// Check if usertype is admin
if($_SESSION['user_type'] !== 'Admin') {
  header("location: ./index.php");  
}

$userid = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="../css/profile.css">
<body>
<?php
  require_once('./include/profile-nav.php');
?>
  <div>
  <?php 
  require_once('./pages/profile.php');
  ?>
</div>
<?php
  require_once('./include/footer.html');
?>
</body>
</html>