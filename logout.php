<?php
//Close user session and direct to login.php
session_start();
session_destroy();
header("Location: index.php");
?>