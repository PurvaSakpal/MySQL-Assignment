
<?php 
// session values to get email and user name
$id=$_SESSION['sid'];
$img=$_SESSION['img'];
$imgpath="upload/$img";
?>

<div class="card" style="width: 18rem;">
  <img src="<?php echo "$imgpath";?>" height="250px" width="100%" class="card-img-top" alt="Profile Photo">
<div class="list-group">
  <a href="?con=edit" class="list-group-item list-group-item-action">Edit your profile</a>
  <a href="?con=Category" class="list-group-item list-group-item-action">Category</a>
  <a href="?con=Products" class="list-group-item list-group-item-action">Products</a>
  <a href="?con=Orders" class="list-group-item list-group-item-action">Orders</a>
  <a href="?con=feedback" class="list-group-item list-group-item-action">Feedback</a>
</div>