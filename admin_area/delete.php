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

if(isset($_GET['delete_pro']))
       {     
              $pro_id=$_GET['delete_pro'];
              $query="delete  from books where book_id='$pro_id'";
              $run=mysqli_query($con,$query);
              if($run)
                 {
                    echo "<script>alert('A product is successfully deleted')</script>";
                    echo "<script>window.open('index.php?view_products','_self')</script>";
                 }
              
       }

?>
<?php } ?>
