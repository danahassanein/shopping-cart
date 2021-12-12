<?php
include_once('config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['fullname'];
$userid=$_POST['userid'];
$emailid=$_POST['emailid'];
$password=$_POST['password'];
$cpassword=$_POST['confirmpassword'];
//Serverside Validation

 if(empty($fname))
 {
  $error = "Enter name!";
  $code = 1;
 }
  else if(empty($userid))
 {
  $error = "Enter your ID!";
  $code = 2;
 }

else if(empty($emailid))
 {
  $error = "Enter email !";
  $code = 3;
 }

else if(empty($password))
 {
  $error = "Enter password";
  $code = 4;
 }
 else if(strlen($password) < 5 )
 {
  $error = "Password must be more than 4 characters!";
  $code = 4;
 }

else if(empty($cpassword))
 {
  $error = "Confirm password";
  $code = 5;
 }

else if($cpassword!=$password)
 {
  $error = "Password doesnot match";
  $code = 5;
 }

else{
//Checking emailid and mobile number if already registered

$ret=mysqli_query($con, "select id from tblregistration where EmailId='$emailid' || userid='$userid'");
$result=mysqli_fetch_array($ret);
if($result>0){
 echo "<script>alert('This user already exist');</script>";
}
else{
$query=mysqli_query($con,"insert into tblregistration(FullName,userid,EmailId,Password) values('$fname','$mnumber','$emailid','$password')");
if($query){
echo "<script>alert('Congratulations! Your online shopping account was created')</script>";
echo "<script>window.location.href='items.php';</script>";
} else {
echo "<script>alert('Something went wrong. Please try again.')</script>";
echo "<script>window.location.href='registration.php';</script>";
}
}
}
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="PHPGurukul">
    <meta name="keywords" content="PHPGurukul Scripts">

    <!-- Title Page-->
    <title>Online Shopping</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-10 p-b-50">
        <div class="wrapper wrapper--w900">
               <form method="post">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Create Account for Online Shopping</h2>
                </div>
                <div class="card-body">
 <p style="color:red;" align="center"><?php if(isset($error)) { echo $error; }?> </p>                
                        
<div class="form-row">
<div class="name">Full name</div>
<div class="value">
<input type="text" name="fullname" class="input--style-6" value="<?php if(isset($fname)){echo $fname;} ?>"  <?php if(isset($code) && $code == 1){ echo "autofocus"; }  ?> />
</div>
</div>
                        
<div class="form-row">
<div class="name">Your ID</div>
<div class="value">
<div class="input-group">
<input type="text" name="userid" class="input--style-6" value="<?php if(isset($userid)){echo $userid;} ?>"  <?php if(isset($code) && $code == 2){ echo "autofocus"; } ?> />
 </div>
</div>
</div>
                       
<div class="form-row">
<div class="name">Email</div>
<div class="value">
<div class="input-group">
 <input type="text" name="emailid" class="input--style-6" value="<?php if(isset($emailid)){echo $emailid;} ?>"  <?php if(isset($code) && $code ==3){ echo "autofocus"; } ?> />
</div>
</div>
</div>
                      
<div class="form-row">
<div class="name">Password</div>
<div class="value">
<div class="input-group">
<input type="password" name="password" class="input--style-6" value="<?php if(isset($password)){echo $password;} ?>"  <?php if(isset($code) && $code ==4){ echo "autofocus"; } ?> />
</div>
</div>
</div>

 <div class="form-row">
<div class="name">Confirm Password</div>
<div class="value">
<div class="input-group">
<input type="text" name="confirmpassword" class="input--style-6" value="<?php if(isset($cpassword)){echo $cpassword;} ?>" <?php if(isset($code) && $code ==5){ echo "autofocus"; } ?> />
</div>
</div>
</div>

</div>

<div class="card-footer">
<button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Sign up</button>
</div>
</div>
</form>

        </div>
    </div>
</body>
</html>
