<?php
error_reporting(0);
include("connection.php"); 
$uname=$_SESSION['uname'];
switch(@$_GET['con']){
  case 'home': $homea="active";
  break;
  case 'changepass': $cpassa="active";
  break;
  default: $homea="active";
} 
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
  <!-- <a class="navbar-brand" href="#">Company Name</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item" id="dashboard">
        <a class="nav-link <?php echo "$homea"; ?>" href="?con=home">Home</a>
      </li>
      <li class="nav-item" id="cpass">
        <a class="nav-link <?php echo "$cpassa"; ?>" href="?con=changepass">Change Password</a>
      </li>
      <li class="nav-item text-light"><a class="nav-link disabled" href="#">Welcome :<?php echo $uname;?> </a></li>
      <li class="nav-item <?php echo "$logouta"; ?>" id="logout">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>       
  </div>
</nav>

