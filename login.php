
<!DOCTYPE html>
<html lang="en">
  <title>Login</title>
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
      <h1>Login here..</h1>
        <br><br><br><br><br><br>
        <?php
if (!isset($_POST['submit'])){
?>
<!-- The HTML login form -->
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    Username: <input type="text" class="form-control" name="username" /><br/><br/>
    Password: <input type="password" class="form-control" name="password" /><br /><br/>
 
    <input type="submit" name="submit" class="myButton"  value="Login" />
  </form>
<?php
} else {
  
  $mysqli = new mysqli("localhost","root","","lifecity");
  # check connection
  if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
  }
 
  $username = $_POST['username'];
  $password = $_POST['password'];
 
  $sql = "SELECT * from login WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
  $result = $mysqli->query($sql);
  if (!$result->num_rows == 1) {
    echo "<p>Invalid username/password combination</p>";
  } else {
    //echo "<p>Logged in successfully</p>";
    

    header("Location: HomePage.php");
  }
}
?>    
           
     <label>Register First! <a href="index.php">Click Here!</a></label>
                
           
        </form>
        </div>
        </center>
  </body>
</html>
