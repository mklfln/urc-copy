<?php
include('../db/connection.php');
$db = new db();

session_start();

$userID = $_SESSION['userid'];
$lName = $_SESSION['lName'];


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

  $fileName = $lName.'-'.$_FILES["fileToUpload"]["name"];
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  /*if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  } */
  if ($_FILES['fileToUpload']['type'] == "application/pdf") {
    $source_file = $target_file.'-'.$userID.'_'.$lName;
    $dest_file = "../uploads/".$target_file.'-'.$userID.'_'.$lName;
}
 $sql = ("SELECT * FROM uploads");
 $stmt = $db->connection->prepare($sql);
 $stmt->execute();
 $row=$stmt->fetch(PDO::FETCH_ASSOC);

  if ($fileName == $row['fileName']) {
    echo "<script>alert('Existing Filename')</script>";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($FileType != "pdf" ) {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../uploads/".$lName.'-'.$_FILES["fileToUpload"]["name"])) {
       $sql = ("INSERT INTO uploads (user_id, fileName, subDate) VALUES('".$userID."', '".$fileName."', NOW())");
       $stmt = $db->connection->prepare($sql);
       $stmt->execute();
      echo "The file ". htmlspecialchars($fileName). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

// Check if file already exists

?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select File to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>