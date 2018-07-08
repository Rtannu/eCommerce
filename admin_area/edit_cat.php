<!DOCTYPE>
<?php
session_start();
if(!isset($_SESSION['user_email']))
     {
     
      echo "<script>window.open('admin_login.php?logged_in=you are not logged in','_self')</script>";
     }
else
   {
?>
<?php
include("includes/db.php");
if(isset($_GET['edit_cat']))
         {
            $cat_id=$_GET['edit_cat'];
            $get_cat="select * from categories where cat_id='$cat_id'";
            $run_cat=mysqli_query($con,$get_cat);
            $row_cat=mysqli_fetch_array($run_cat);
            $cat_id=$row_cat['cat_id'];
            $cat_title=$row_cat['cat_title'];
            
         }
?>
<html>
     <head>
           <title>
               UPDATE CATEGORY
           </title>
     <head>
     <body>
         <form action="" method="post">
          <table width="500" align="center" border="4">
              <tr>
                  <h1 align="center">UPDATE CATEGORY</h1>
              </tr>
              <tr align="center">
                        <td>Update_Category</td>
                        <td><input type="text" name="update_cat" size="40" value="<?php echo $cat_title; ?>" ><td>
                        <td><input type="submit" name="update" value="UPDATE_CATEGORY"></td>
              </tr>
          </able>
         </form>
     </body>
<html>
<?php

 if(isset($_POST['update']))
        {
            $new_cat=$_POST['update_cat'];
            $update_query="update categories set cat_title='$new_cat' where cat_id='$cat_id'";
            $run_update=mysqli_query($con,$update_query);
            if($run_update)
                {
                  echo "<script>alert('category has been update!!')</script>";
                  echo "<script>window.open('index.php','_self')</script>";
                }
        }

?>
<?php } ?>
