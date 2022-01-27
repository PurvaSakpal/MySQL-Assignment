<?php
session_start();
session_destroy();
// setcookie("ecook","");
// setcookie("pcook","");
header("location:index.php");
?>