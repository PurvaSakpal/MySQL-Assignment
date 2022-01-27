<?php
session_start();
include("connection.php");
$id=$_SESSION['id'];
$email=$_SESSION['email'];
$uname=$_SESSION['uname'];
if(empty($id))
{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include("head.php");
    ?>
    <title>Dashboard</title>
  </head>
  <body>
    <div class="jumbotron m-0">
        <h1 class="display-4">Dashboard</h1>    
    </div>
    <section class="nav-bar">
    <?php
    include("nav.php");
    ?>
    </section>
    <div>
      <section class="container-fluid row">
        <aside class="col-md-3">
          <?php include("sidebar.php") ?>
        </aside>
      <section class="col-md-9">
      <?php
        switch($_GET['con']){
            case 'img': include("img.php");
            break;
            case 'edit':include("edit.php");
            break;
            case 'Category': echo "<h1>Category</h1>";
            break;
            case 'Orders': echo "<h1>Orders Page</h1>";
            break;
            case 'Products': echo "<h1>Products</h1>";
            break;
            case 'changepass': include("changepass.php");
            break;
            case 'feedback':echo "<h1>Feedback Page </h1>";
            break;
            default :include("details.php");
            break;
          }
      ?>
      </section>
       </section>

    </div>
    <?php
    include("script.php");
    ?>
  </body>
</html>