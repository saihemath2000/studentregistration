<?php
include('../registration/functions.php');
session_destroy();
unset($_SESSION['user']);
header("location: ./homepage.php");
?>