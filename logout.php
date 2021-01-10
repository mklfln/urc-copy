<?php
ob_start();
require_once('./include/header.php');
session_destroy();
header("location: ./login.php");
ob_end_flush()
?>