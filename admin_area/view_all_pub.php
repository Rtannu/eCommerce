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
         <td colspan="6"><h1>VIEW ALL PUBLICATION</h1></td>
     </tr>
     <tr align="center">
         <h1><td>Publication_id</td></h1>
         <h2><td>Publication_title</td></h2>
	 <h3><td>Edit</td></h3>
	 <h4><td>Delete</td></h4>      
             
     </tr>
     <?php
        include("includes/db.php");
        $count=0;
        $query="select * from publication";
        $run=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($run))
              {   
                 $pub_id=$row['pub_id'];
                 $pub_title=$row['pub_title'];
                 $count++;           
     ?>
     <tr align="center">
        
	 <td><?php echo $pub_id ;?></td>	
	 <td><?php echo $pub_title ;?></td>
	 <td><a href="index.php?edit_pub=<?php echo $pub_id; ?>">Edit</td>
         <td><a href="delete_pub.php?delete_pub=<?php echo $pub_id; ?>">Delete</td>
	 
     </tr>     
    <?php } ?>
</table>

<?php } ?>
