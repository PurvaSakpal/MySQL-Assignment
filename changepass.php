<?php
error_reporting(0);
include("connection.php");
$opass=$_POST['opass'];
$opass1=substr(sha1($opass),0,10);
$npass=$_POST['npass'];
$cpass=$_POST['cpass'];
$sel=mysqli_query($conn,"select * from users where id=$id");
$arr=mysqli_fetch_assoc($sel);
   if(isset($_POST['sub'])) 
   {
       if(!empty($opass) && !empty($npass) && !empty($cpass))
       {
           if($opass1==$arr['password'])
           {
            if($npass==$cpass)
               {
                if(mysqli_query($conn,"update users set password='$opass1' where id=$id")){
                $top="Changed password Successfully";
                setcookie("ecook","");
                setcookie("pcook","");
                }
                else{
                    $top="Error";
                }
            }
            else{
                $cpassE="New password and Confirm Password do not match";
            }
        }
        else{
            $opassE="Old password does not match";
        }
       }
       else{
           $err="Please fill the fields";
       }
   }
?>
    <form method="post">
       <section class="container">
            <div class="form-group has-error text-danger">
                <span class="help-block"><?php echo "$err"; ?></span>
                <span class="help-block"><?php echo "$top"; ?></span>

            </div>
            <div class="form-group row m-2">
                <label for="opass" class="col-sm-2 col-form-label">Old Password</label>
                <div class="col-sm-10 col-md-10">
                    <input type="password" class="form-control" id="opass" placeholder="Old Password" name="opass">
                </div>
            </div>
            <div class="form-group has-error text-danger">
                <span class="help-block"><?php echo "$opassE"; ?></span>
            </div>
            <div class="form-group row m-2">
                <label for="npass" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10 col-md-10">
                    <input type="password" class="form-control" id="npass" placeholder="New Password" name="npass">
                </div>
            </div>
            
            <div class="form-group row m-2">
                <label for="cpass" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10 col-md-10">
                    <input type="password" class="form-control" id="cpass" placeholder="Confirm Password" name="cpass">
                </div>
            </div>
            <div class="form-group has-error text-danger">
                <span class="help-block"><?php echo "$cpassE"; ?></span>
            </div>
            <div class="form-group row m-2">
                <div class="col-sm-10 col-lg-10">
                <button type="submit" class="btn btn-success" name="sub">Submit</button>
                </div>
            </div>      
       </section> 
    </form>
