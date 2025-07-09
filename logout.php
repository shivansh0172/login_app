<?php
session_start();
$_SESSION=[];  //This line is intended to clear all session variables
session_destroy();
header("Location: login.php");
exit();