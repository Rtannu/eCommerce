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
if(isset($_GET['edit_pub']))
         {
            $pub_id=$_GET['edit_pub'];
            $get_pub="select * from publication where pub_id='$pub_id'";
            $run_pub=mysqli_query($con,$get_pub);
            $row_pub=mysqli_fetch_array($run_pub);
            $pub_id=$row_pub['pub_id'];
            $pub_title=$row_pub['pub_title'];
            
         }
?>
<html>
     <head>
           <title>
               UPDATE PUBLICATION
           </title>
     <head>
     <body>
         <form action="" method="post">
          <table width="500" align="center" border="4">
              <tr>
                  <h1 align="center">UPDATE PUBLICATION</h1>
              </tr>
              <tr align="center">
                        <td>Update_Publication</td>
                        <td><input type="text" name="update_pub" size="40" value="<?php echo $pub_title; ?>" ><td>
                        <td><input type="submit" name="update" value="UPDATE_PUBLICATION"></td>
              </tr>
          </able>
         </form>
     </body>
<html>
<?php

 if(isset($_POST['update']))
        {
            $new_pub=$_POST['update_pub'];
            $update_query="update publication set pub_title='$new_pub' where pub_id='$pub_id'";
            $run_update=mysqli_query($con,$update_query);
            if($run_update)
                {
                  echo "<script>alert('publication has been update!!')</script>";
                  echo "<script>window.open('index.php','_self')</script>";
                }
        }

?>
<?php } ?>
