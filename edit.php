<?php
$id=$_SESSION['id'];
$sel=mysqli_query($conn,"select * from users where id=$id");
$arr=mysqli_fetch_assoc($sel);
$emailE=$nameE=$passE=$unameE=$capE=$imageS=$fileE=$fileS=$top=$success=$emailS=$fem=$mal=$mum=$pun=$chen="";
if(isset($_POST['reg']))
{
    $email=$_POST['email'];
    $uname=$_POST['uname'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=@$_POST['gender'];
    $city=$_POST['city'];
    $tmp=$_FILES['att']['tmp_name'];//temp name
    $fn=$_FILES['att']['name'];//original name

    if(!empty($email) && !empty($uname) && !empty($city) && !empty($name) && !empty($age) && !empty($gender) && !empty($tmp))
    {
        if(preg_match ("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i",$email))
        {
            if(preg_match("/^[a-zA-Z0-9 ]+$/",$uname))
            {
                    if(preg_match("/^[a-zA-Z ]+$/",$name))
                    {
                        $ext=pathinfo($fn,PATHINFO_EXTENSION);
                        if($ext="jpg" || $ext="jpeg" || $ext="png"){     
                                if(move_uploaded_file($tmp,"upload/$fn"))
                                    {
                                    $password=substr(sha1($pass),0,10);
                                    if(mysqli_query($conn,"update users set email='$email',uname='$uname',name='$name',age=$age,gender='$gender',city='$city',image='$fn' where id=$id")){
                                        $success="Updated Successfully";
                                        // header("location:dashboard.php");
                                    }
                                    else {
                                        $error="Updating error";
                                    }
                        }
                        else{
                            $fileS="Uploading error";
                        }
                    }
                        else{
                            $fileE="Only jpg, jpeg and png allowed";
                        }
            }
                else{
                    $nameE="Invalid Name";
                } 
            }
        else{
            $unameE="Invalid username";
        }
}
    else{
        $emailE="Invalid Email";
    }
}
else{
    $top="Enter all the fields";
}
}
if(trim($arr['gender'])=="female"){
    $fem="checked";
}
else{
    $mal="checked";
}
if($arr['city'])=="Mumbai")
{
    $mum="selected";
}
else if($arr['city'])=="Pune")
{
    $pun="selected";
}
else
{
    $chen="selected";
}
?>    
    <h1 class="display-3">Edit Panel</h1>
    <section class="container">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group has-error text-danger">
                <span class="help-block"><?php echo "$top"; ?></span>
                <span class="help-block"><?php echo "$success"; ?></span>
                <span class="help-block"><?php echo "$error"; ?></span>
                
            </div>
            <div class="form-group row">
                <label for="foremail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="foremail" name="email" placeholder="Email" value="<?php echo $arr['email'];?>">
                </div>
            </div>
            <div class="form-group has-error text-danger">
                <span class="help-block"><?php echo "$emailE"; ?></span>
                <span class="help-block"><?php echo "$emailS"; ?></span>
            </div>
            <div class="form-group row">
                <label for="inputUname" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputUname" name="uname" placeholder="Username" value="<?php echo $arr['uname'];?>">
                </div>
            </div>
            <div class="form-group has-error text-danger">
                <span class="help-block"><?php echo "$unameE"; ?></span>
            </div>
            <div class="form-group row">
                <label for="forname" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="forname" name="name" placeholder="Full Name" value="<?php echo $arr['name'];?>">
            </div>
        </div>
        <div class="form-group has-error text-danger">
            <span class="help-block"><?php echo "$nameE"; ?></span>
            </div>
            <div class="form-group row">
                <label for="forage" class="col-sm-2 col-form-label">Age</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="forage" name="age" placeholder="Age" value="<?php echo $arr['age'];?>">
                </div>
            </div>
            
            <div class="form-group row">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="female" <?php echo $fem;?>>
                    <label class="form-check-label" for="gridRadios1">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="male" <?php echo $mal;?>>
                    <label class="form-check-label" for="gridRadios2">Male</label>
                </div>
            </div>
        </div>
            <div class="form-group row mb-3">
                <label for="forCity" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="forCity" name="city">
                        <option disabled>---Select---</option>
                        <option value="Mumbai" <?php echo $mum;?>>Mumbai</option>
                        <option value="Pune" <?php echo $pun;?>>Pune</option>
                        <option value="Chennai" <?php echo $chen;?>>Chennai</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputImage3" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="inputImage3" name="att">
                </div>
            </div>
            <div class="form-group has-error text-danger">
                <span class="help-block"><?php echo "$fileE"; ?></span>
                <span class="help-block"><?php echo "$fileS"; ?></span>
                
            </div>
            <div class="form-group row m-2">
                <div class="col-sm-10 col-lg-10">
                    <button type="submit" class="btn btn-success" name="reg">Edit</button>
                </div>
            </div>
        </form>
    </section>
