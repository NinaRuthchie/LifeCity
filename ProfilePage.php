
<!doctype>


<html>
<head>

<title>Profile Page</title>

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

.pic
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

table
{
  padding:2%;
}

.upload
{
  
  margin-left: 10px;
  width: 2%;
  height: 5%; 
    

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

 


</ul>
</div>

<div class="nav">
  <ul>
  
  <li><a class="active" href="HomePage.php">L.I.F.E</a></li>
  <li><a href="#shop">Shop</a></li>
  <li><a href="#neighbor">Neighbor</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#help">Help</a></li>
  <li><a href="#about">About</a></li>


</ul>
</div>

<div class ="pic">


<?php

$conn = new mysqli ('localhost','root','','lifecity');

$sql = "SELECT image FROM image_upload";
$result= $conn->query($sql);

    if($row = mysqli_query($conn, $sql)){

    //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //mysqli_free_result($result);
$row = $result->fetch_assoc();

      echo'<table>';
      echo'<td>';
      echo'<img src = "data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
      echo'</td>';
      echo'</table>';

    }
 ?>
 
 </div>

 <div class="container">

<?php
include_once'conn.php';

$sql = "SELECT username, fname, lname FROM login ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row


    if($row = $result->fetch_assoc()) {
        echo "<h1>Username: ". $row["username"]."</h1><br>";
        echo "<h1>Name: " . $row["fname"]. " " . $row["lname"]. "</h1><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>  



 </div>


<div>

<form class="upload" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
 <div class="form-group">

 <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
 <input name="userfile" type="file" />
                    
 </div>
 <input type="submit" class="btn btn-lg btn-primary" value="Submit">
 </form>




<?php


if(!isset($_FILES['userfile']))
{
    echo '';
}
else
{
    try {
    $msg= upload();  
    echo $msg;  
    }
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}



function upload() {
    
    $maxsize = 10000000; 

  
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

            
            if( $_FILES['userfile']['size'] < $maxsize) {  
  
               $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

                   
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

                   
                    $conn = mysqli_connect('localhost','root','','lifecity') OR DIE (mysqli_error());
                   
                    $sql = "INSERT INTO image_upload
                    (image, image_name)
                    VALUES
                    ('{$imgData}', '{$_FILES['userfile']['name']}');";

                    
                    mysqli_query($conn,$sql) or die("Error in Query: " . mysqli_error($conn));
                    $msg='<p></p>';
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             
        }
        else
            $msg="Error uploading file!";

    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
    return $msg;
}

function file_upload_error_message($error_code) {
    switch ($error_code) {
       
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the Maximum File  Size';
        case UPLOAD_ERR_NO_FILE:
            return 'No file uploaded';
        default:
            return 'Unknown upload error';
    }
}

  
?>

</div>





</body>

</html>