<?php
include("includes/db.php");

if(isset($_GET['delete_pub']))
       {     
              $pub_id=$_GET['delete_pub'];
              $query="delete  from publication where pub_id='$pub_id'";
              $run=mysqli_query($con,$query);
              if($run)
                 {
                    echo "<script>alert('A publication is successfully deleted!!')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                 }
              
       }

?>
<?php } ?>
