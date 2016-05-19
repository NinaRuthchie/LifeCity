

    <?php
      $con=mysqli_connect("localhost","root","","lifecity");
      $sql="select * from photos";
      $result=mysqli_query($con,$sql);

      $cnt=mysqli_num_rows($result); echo $cnt;

       while($cnt)
       {
             echo "<img src=display_img.php?id=$cnt>";
             $cnt--;
       }

       ?>