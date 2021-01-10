<?php
session_start();
// Include the database configuration file
include ('../db/connection.php');
$statusMsg = '';

// File upload path
$userID = $_SESSION['userid'];
$targetDir = "../uploads/";
$fileName = basename($_FILES["fileToUpload"]["name"]);
$targetPath = $targetDir . $fileName;
$fileType = pathinfo($targetPath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into images (user_id, file_name, subDate) VALUES ('".$userID."','".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Only PDF files are allowed.';
    }


// Display status message
echo $statusMsg;
?>