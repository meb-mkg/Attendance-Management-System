<?php
session_start();

header('location: login.php');

unset($_SESSION['uname']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['dept']);
?>