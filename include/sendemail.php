<?php
require_once '../vendor/swiftmailer/autoload.php';
include('../db/connection.php');
$db = new db();



    $sql = ("SELECT username, token, verified, email FROM users WHERE username  = '".$_SESSION['username']."',
     token'".$_SESSION['token']."', verified = '".$_SESSION['verified']."',  email = '".$_SESSION['usermail']."'");
    $stmt-> $db->connection->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row > 0 && $row['verified'] !== '1'){
        //mailer transport config
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('urc.thesis@gmail.com') // USERNAME AND PASSWORD USED FOR SENDING EMAIL CONFIRMATION
    ->setPassword('urc.thesistest');

    $mailer = new Swift_Mailer($transport);
    
    //contents of the verification email that will be sent to the user with the token which is unique for every user
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Thank you for signing up on our site. Please click on the link below to verify your account:.</p>
        <a href="http://localhost/urc/include/sendemail.php?token=' . $_SESSION['token'] . '">Verify Email!</a>
      </div>
    </body>

    </html>';

    //create verification message
    $message = (new Swift_Message('Verify your account'))
        ->setFrom('urc.thesis@gmail.com')
        ->setTo($_SESSION['useremail'])
        ->setBody($body, 'text/html');

        //send message
        $result = $mailer->send('$message');

        if($result > 0){
            return true;
        } else {
            return false;
        }

    };
?>