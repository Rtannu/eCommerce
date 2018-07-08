<!DOCTYPE>
<?php

if(!isset($_SESSION['user_email']))
     {
     
      echo "<script>window.open('admin_login.php?logged_in=you are not logged in','_self')</script>";
     }
else
   {
?>
<html>
     <head>
           <title>
               INSERT NEW CATEGORY
           </title>
     <head>
     <body>
         <form action="" method="post">
          <table width="500" align="center" border="4">
              <tr>
                  <h1 align="center">INSERTING NEW CATEGORY</h1>
              </tr>
              <tr align="center">
                        <td><input type="text" name="cat_n" size="40"><td>
                        <td><input type="submit" name="sub" value="ADD_NEW_CATEGORY"></td>
              </tr>
          </able>
         </form>
     </body>
<html>
<?php
include("includes/db.php");
 if(isset($_POST['sub']))
        {
            $new_cat=$_POST['cat_n'];
            $query="insert into categories (cat_title)  values('$new_cat')";
            $run=mysqli_query($con,$query);
            if($run)
                {
                  echo "<script>alert('new category has been inserted')</script>";
                  echo "<script>window.open('index.php','_self')</script>";
                }
        }

?>
<?php } ?>
