<?php 
require_once('./include/header.php');

// Check if usertype is user
if(!isset($_SESSION['loggedin']) && $_SESSION['user_type'] !== 'user') {
  header("location: ./index.php");
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
<body>
<?php
  require_once('./include/navbar.php');
  require_once('./pages/user-home.html');
  require_once('./include/footer.html');
?>
</body>
</html>