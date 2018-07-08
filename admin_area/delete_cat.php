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

if(isset($_GET['delete_cat']))
       {     
              $pro_id=$_GET['delete_cat'];
              $query="delete  from categories where cat_id='$pro_id'";
              $run=mysqli_query($con,$query);
              if($run)
                 {
                    echo "<script>alert('A categorie is successfully deleted')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                 }
              
       }

?>
<?php } ?>
