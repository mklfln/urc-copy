<?php
session_start();
$test = $_SESSION['loggedin'];
include('../db/connection.php');
$db = new db();

    $sql = ("SELECT fName, lName, email, user_type FROM users ORDER BY fName ASC LIMIT 10");
    $stmt =$db->connection->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetchAll();
    foreach($row as $rows):
            echo '<tr>
            <td>'.$rows[0].'</td>
            <td>'.$rows[1].'</td>
            <td>'.$rows[2].'</td>
            <td>'.$rows[3].'</td>
            <td>'.$test.'</td>
                </tr>';
    endforeach;
    
?>