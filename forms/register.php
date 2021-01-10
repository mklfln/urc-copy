<?php

include('../db/connection.php');
$db = new db();

// form variables
$FORM_USERNAME = $_POST['USERNAME'];
$FORM_PASSWORD = password_hash(trim($_POST['PASSWORD']), PASSWORD_DEFAULT);
$FORM_EMAIL = $_POST['EMAIL'];
$FORM_FIRSTNAME = $_POST['FIRST_NAME'];
$FORM_LASTNAME = $_POST['LAST_NAME'];
$USERTYPE = 'user';
$TOKEN = bin2hex(random_bytes(50)); //Generate token used for email verification

 try {
     $sql=("SELECT username, email  FROM users WHERE username = :username or email = :email ");
     $stmt = $db->connection->prepare($sql);
     $stmt->bindParam(':username', $FORM_USERNAME);
     $stmt->bindParam(':email', $FORM_EMAIL);
     $stmt->execute();
     $row=$stmt->fetch(PDO::FETCH_ASSOC);

     if (is_array($row)) {
         // Check if username is existing in database
         if ($row['username']==$FORM_USERNAME) {
             die(json_encode(array(
               'error' => array(
                   'msg' => 'Username already exist',
                   'code' => 401,
               ),
           )));
         }

         // Check if email is existing in database
         if ($row['email']==$FORM_EMAIL) {
             die(json_encode(array(
               'error' => array(
                  'msg'  => 'Email already exist'
               ),
           )));
         }
     } else {
         //if email or username is not existing in database run this code
         $sql = "INSERT INTO users (username, fName, lName, email, user_type, password, token) VALUES (?, ?, ?, ?, ?, ?, ?)";
         $stmt = $db->connection->prepare($sql);
         $stmt->bindParam(1, $FORM_USERNAME);
         $stmt->bindParam(2, $FORM_FIRSTNAME);
         $stmt->bindParam(3, $FORM_LASTNAME);
         $stmt->bindParam(4, $FORM_EMAIL);
         $stmt->bindParam(5, $USERTYPE);
         $stmt->bindParam(6, $FORM_PASSWORD);
         $stmt->bindParam(7, $TOKEN);
         $stmt->execute();

         
$to_email = $FORM_EMAIL;
$subject = 'Verify Account';
$message = 'Please click this link to verify account http://127.0.0.1/urc/pages/confirmation.php?token='.$TOKEN;
$headers = 'From: mfaulan@gmail.com';
if(mail($to_email,$subject,$message,$headers)){
    die(json_encode(array('result' => 'User registered successfully' )));
//echo "success";
}
     }
 } catch (PDOException $e) {
     die(json_encode(array(
         'error' => array(
             'msg' => $e->getMessage(),
             'code' => $e->getCode(),
         ),
     )));
 }
?> 