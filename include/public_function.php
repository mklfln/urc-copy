<?php
include('../db/connection.php');
$db = new db();

function test() {
    $sql = ("SELECT * FROM users");
    $stmt->$db->connection->prepare($sql);
    $stmt->execute();
}

$test = test();

echo $test;
?>