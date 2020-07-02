<?php
session_start();
//session_destroy();
unset($_SESSION["ID"]);
header("location:login.php");


?>