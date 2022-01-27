<?php
define("host","localhost");
define("uname","root");
define("pass","");
define("dbname","myproject");
$conn=mysqli_connect(host,uname,pass,dbname) or die("Connection Error");
?>