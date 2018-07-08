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
         <td colspan="6"><h1>VIEW ALL PRODUCT</h1></td>
     </tr>
     <tr align="center">
        <td>S.NO</td>
	 <td>Title</td>
	 <td>Image</td>
	 <td>Price</td>
	 <td>Edit</td>
	<td>Delete</td>      
	     
     </tr>
     <?php
        include("includes/db.php");
        $count=0;
        $query="select * from books";
        $run=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($run))
              {   
                 $b_id=$row['book_id'];
                 $t=$row['book_title'];
                 $i=$row['book_image'];
                 $p=$row['book_price'];  
                 $count++;           
     ?>
     <tr>
         <td><?php echo $count ;?></td>
	 <td><?php echo $t ;?></td>
	 <td> <img src="image/<?php echo $i ;?>" width="60" height="60"> </td>
	 <td><?php echo $p;?></td>
	 <td><a href="index.php?edit_pro=<?php echo $b_id; ?>">Edit</td>
         <td><a href="delete.php?delete_pro=<?php echo $b_id; ?>">Delete</td>
	 
     </tr>     
    <?php } ?>
</table>

<?php } ?>
