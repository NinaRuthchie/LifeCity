<?php
session_start();


if(isset($_SESSION['user'])!="")
{
 header("Location: ");
}
include_once 'conn.php';


if(isset($_POST['signup']))
{

 $username = mysqli_real_escape_string($conn,$_POST['username']);
 $password = mysqli_real_escape_string($conn,$_POST['password'] );	
 $fname = mysqli_real_escape_string($conn,$_POST['fname']);
 $lname = mysqli_real_escape_string($conn,$_POST['lname']);
 $eadd = mysqli_real_escape_string($conn,$_POST['eadd']);

 $query = "INSERT INTO login (username,password,fname,lname,eadd) VALUES('$username','$password','$fname','$lname','$eadd')";
 
  if($conn->query($query))
  {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }
  else
  {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
  }
 }
 else{
  
  
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
    </div>";
   
 }
 
 $conn->close();

?>



<!DOCTYPE html>
<html>
<head>
	<title>Life City</title>
</head>
<style type="text/css">
body{
	background-image: url("image/bground.jpg");
	background-size: 90%;
}	

div.box{
	background-color: #333300;
	opacity: 0.5;
	filter: Alpha(opacity=50);
	height: 650px;
	width: 50%;
	font-family: Georgia, "serif";
	font-size: 30px
	padding: 20px;

}

input[type="text"] {
  padding: 10px;
  border: solid 5px #c9c9c9;
  transition: border 0.3s;
  opacity: 20;
}
input[type="password"] {
  padding: 10px;
  border: solid 5px #c9c9c9;
  transition: border 0.3s;
}

.myButton {
  -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
  -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
  box-shadow:inset 0px 1px 0px 0px #ffffff;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9));
  background:-moz-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
  background:-webkit-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
  background:-o-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
  background:-ms-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
  background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9',GradientType=0);
  background-color:#f9f9f9;
  -moz-border-radius:6px;
  -webkit-border-radius:6px;
  border-radius:6px;
  border:1px solid #dcdcdc;
  display:inline-block;
  cursor:pointer;
  color:#666666;
  font-family:Arial;
  font-size:15px;
  font-weight:bold;
  padding:6px 24px;
  text-decoration:none;
  text-shadow:0px 1px 0px #ffffff;
}
.myButton:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9));
  background:-moz-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
  background:-webkit-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
  background:-o-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
  background:-ms-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
  background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9',GradientType=0);
  background-color:#e9e9e9;
}
.myButton:active {
  position:relative;
  top:1px;
}

label
{
  color:white;
  margin-top: 5px;
  font-size: 20px;
}
</style>
<body>
<center>

<div class="box">
<form method="post" class="form-signin">

	<form action="" method="POST" name="elegant-aero">
      <input type="text" name="username" id="username" value="" placeholder="username" />
       <br><br>
      <input type="password" name="password" id="password" value="" placeholder="password" />
      <br><br>
    
      <input type="text" name="fname" id="fname" value="" placeholder="First Name"/>
    <br><br>
      <input type="text" name="lname" id="lname" value=""  placeholder="Last Name" />
      <br><br>
 
      <input type="text" name="eadd" id="eadd" value="" placeholder="Emaill Address" />
      <br><br>
   <input type="submit" name="signup" id="submit" value="Submit"  class="myButton"/>
    <input type="reset" name="Reset" id="Reset" value="Reset" class="myButton" /> <br/>

    <label>Has an account already? <a href="login.php">LogIn Here</a></label>
        </form>
</div>
</form>
</form>



</center>
</body>
</html>