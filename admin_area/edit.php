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
$b_id=$_GET['edit_pro'];
$query="select * from books where book_id='$b_id'";
$run=mysqli_query($con,$query);
$row=mysqli_fetch_array($run);
$b_title=$row['book_title'];
$b_cat=$row['book_cat'];
$b_b=$row['book_brand'];
$b_price=$row['book_price'];
$b_desc=$row['book_desc'];
$b_image=$row['book_image'];
$b_key=$row['book_keywords'];

?>
<html>
      <head>
             <title>updateing&editing_Book</title>
      </head>
     
       <body bgcolor='green'>
              <form action=" " method="post" enctype="multipart/form-data" > 
                         <table width='790' height="600" border='3' align='center'  >
                                	<tr color='yellow'>
                                            <th colspan='6'>Updating&Inseting new Book here</th>
                                        </tr>
                                         <tr>
                                              <td align='right'>Book_Title</td>
                                             <td> <input type='text' name='book_title' size='40' value= "<?php echo $b_title ;?>" </td>
                                        </tr>
                                        <tr>
                                              <td  align='right'>Book_category:</td>
                                              <td>
                                                   <select name='book_cat'>
                                                        <option>
                                                                   select a category
                                                        </option>
                                                         <?php
                                                              $query="select * from categories";
							      $run=mysqli_query($con,$query);
							       while($row=mysqli_fetch_array($run))
								       {
									  $c_id=$row['cat_id'];
									  $title=$row['cat_title'];
									 									          echo "<option value='$id'>$title</option>";
								       }
                                                          ?>
                                                   </select>   
                                             </td>
                                        </tr>
                                        <tr>
                                              <td align='right'>Book_Brand</td>
                                              <td> 
                                                   <select name='book_brand'>
                                                        <option>
                                                                   select a publication
                                                        </option>
                                                         <?php
                                                               $query="select * from publication";
							       $run=mysqli_query($con,$query);
							       while($row=mysqli_fetch_array($run))
								    {
							               $p_id=$row['pub_id'];
								        $title=$row['pub_title'];
									 									        echo "<option value='$id'>$title</option>";
								    }
                                                          ?>
                                                   </select>   
                                             </td>
                                        </tr>
                                       
                                        <tr>
                                              <td align='right'>Book_Price</td>
                                              <td><input type='text' name='book_price' value= "<?php echo $b_price ;?>"></td>
                                        </tr>
                                        <tr>
                                              <td align='right'>Book_Desc</td>
                                             <td> <input name='book_desc' cols='10' rows='8' value= "<?php echo $b_desc ;?>"></td>
                                        </tr>
                                        <tr>
                                              <td align='right'>Book_Image</td>
                                             <td> <input type='file' name='book_image'><img src="image/<?php echo $b_image ;?>" widht="60" height="60"/></td>
                                        </tr>
                                        <tr>
                                              <td align='right'>Book_keyword</td>
                                             <td> <textarea type='text' name='book_keyword' size='40' ><?php echo $b_key ;?></textarea></td>
                                        </tr>
                                        <tr align='center'>
                                             
                                             <td colspan='6'> <input type='submit' name='s' value='update the Book'></td>
                                        </tr>
                         </table>
              </form>  
       </body>
<html>


<?php

if(isset($_POST['s']))
  {
        //  taking text part
  
         $b_title=$_POST['book_title'];
         $b_cat=$_POST['book_cat'];
         $b_brand=$_POST['book_brand'];
         $b_price=$_POST['book_price'];
         $b_desc=$_POST['book_desc'];
         $b_keyword=$_POST['book_keyword'];
       
      //taking image
        $i_name=$_FILES['book_image']['name'];
        $i_tmp=$_FILES['book_image']['tmp_name'];

                     move_uploaded_file($i_tmp,"image/$i_name");
                 //   echo "<img src='image/$i_name'>";
       
       $query="update books set book_cat='$b_cat' , book_brand='$b_brand',book_title='$b_title' ,book_price='$b_price', book_desc='$b_desc' ,book_image='$i_name', book_keywords='$b_keyeyword' where book_id='$b_id'";
      if(mysqli_query($con,$query));
           {
              echo"<script>alert('product has been updated')</script>";
              echo "<script>window.open('index.php','_self')</script>";
           }
  }


?>
<?php } ?>
