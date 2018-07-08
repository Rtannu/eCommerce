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
         <td colspan="6"><h1>VIEW ALL CATEGORY</h1></td>
     </tr>
     <tr align="center">
         <h1><td>Category_id</td></h1>
         <h2><td>Category_title</td></h2>
	 <h3><td>Edit</td></h3>
	 <h4><td>Delete</td></h4>      
             
     </tr>
     <?php
        include("includes/db.php");
        $count=0;
        $query="select * from categories";
        $run=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($run))
              {   
                 $cat_id=$row['cat_id'];
                 $cat_title=$row['cat_title'];
                 $count++;           
     ?>
     <tr align="center">
        
	 <td><?php echo $cat_id ;?></td>	
	 <td><?php echo $cat_title ;?></td>
	 <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</td>
         <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</td>
	 
     </tr>     
    <?php } ?>
</table>

<?php } ?>
