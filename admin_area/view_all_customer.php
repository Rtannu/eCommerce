<!DOCTYPE>
<?php

if(!isset($_SESSION['user_email']))
     {
     
      echo "<script>window.open('admin_login.php?logged_in=you are not logged in','_self')</script>";
     }
else
   {
?>
<table width="790" align="center">
     <tr align="center">
         <td colspan="6"><h1>VIEW ALL CUSTOMERS</h1></td>
     </tr>
     <tr align="center"  bgcolor="green">
        <td>S.NO</td>
	 <td>Name</td>
	 <td>Email</td>
	 <td>Image</td>
	<td>Delete</td>      
	     
     </tr>
     <?php
        include("includes/db.php");
        $count=0;
        $query="select * from customers";
        $run=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($run))
              {   
                 $c_id=$row['customer_id'];
                 $c_name=$row['customer_name'];
                 $c_email=$row['customer_email'];
                 $c_image=$row['customer_image'];
                 $count++;           
     ?>
     <tr>
         <td><?php echo $count ;?></td>
	 <td><?php echo $c_name ;?></td>
          <td><?php echo $c_email;?></td>
	 <td> <img src="../customer/c_images/<?php echo $c_image ;?>" width="60" height="60"> </td>
	
         <td><a href="delete_cus.php?delete_cus=<?php echo $c_id; ?>">Delete</td>
	 
     </tr>     
    <?php } ?>
</table>

<?php } ?>
