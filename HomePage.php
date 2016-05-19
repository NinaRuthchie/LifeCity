<?php

session_start();
include_once 'conn.php';

if(!isset($_SESSION['userSession']))
{
 //header("Location: login.php");


}

?>

<!doctype>
<html>
<head>

<title>Home Page</title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!--<link rel="stylesheet" type="text/css" href="home.css">-->

</head>

<style type="text/css">


body
{
	background-image: url("homepic.jpg");
	background-size: 100% ;
	background-repeat: no-repeat;
}

.nav
{
	padding: 30px;
}

p
{
	font-family: cursive;
	font-size: 30px;
}

ul
{
    list-style-type: none;
    margin: 30px;
    padding: 0;
    overflow: hidden;
    background-color: #008B8B;
}

li 
{
    float: left;
    font-size: 20px;

}

li a 
{
    display: block;
    color: white;
    text-align: center;
    padding: 30px 16px;
    text-decoration: none;
    font-family: cursive;
}

a:hover:not(.active) 
{
    background-color: #00688B;
}

.active 
{
background-color:#4CAF50;
}

.search
{
margin-left: 1000px; 

}

.sidenav
{
	
	width: 200%; 
	 height:10px;
	 margin-left: 30px ;
	 
	
}

.progress
{
	width: 10%;
	margin: 10%;
}

.container
{
	background-color: #E0EEEE ;
	margin-left: 400px;
	width: 900px;
    height: 390px; 
    opacity: 0.8;
}

th, td {
    padding: 7%;
    text-align: left;


}

.happiness
{

}


</style>




<body>

<div class="homepage">
 
<!--<img src="logo.png"/>-->

</div>


<div class ="search">
 <form class="navbar-form navbar-left" role="search" >
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>

 
<div class="nav">
  <ul>
  
  <li><a class="active" href="#home">L.I.F.E</a></li>
  <li><a class="active" href="ProfilePage.php">My Profile</a></li>
  
  <li><a href="#shop">Shop</a></li>
  <li></li>

  <li><a href="#neighbor">Neighbor</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#help">Help</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="login.php">Logout</a></li>

</ul>
</div>

<div class ="sidenav">

<?php
$conn = new mysqli("localhost","root","","lifecity");

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows> 0)
  {

?>
<br><table  style= "background-color: 99FFCC; color: #761a9b; " >
      <thead>
        <tr >
         <!-- <th>id</th>-->
          <th>Your Life</th>
          <th>Happiness</th>
          <th>Your Money</th>
        </tr>
      </thead>
      <tbody>

      <?php
      
     foreach ($result as $result) {
      
     }
    {
      ?>
       
            <tr>
              <!--<td><?php //print($result['id']);?></td>-->
              <td><?php print($result['life']);?>%</td>
              <td ><?php print ($result['happiness']);?>%</td>
             <td >$<?php print ($result['money']);?></td>
              
            </tr>
            <?php
          }
        }
        ?>
        
      </tbody>
    </table>
      	
 </div>     	



</div>


<div class="container">

<h1 align = "center" >Hi, Welcome!!</h1>

</div>

  




</body>

</html>