<!DOCTYPE>
<?php

if(!isset($_SESSION['user_email']))
     {
     
      echo "<script>window.open('admin_login.php?logged_in=you are not logged in','_self')</script>";
     }
else
   {
?>
<?php
include("includes/db.php");
?>
<html>
      <head>
             <title>Inserting_Book</title>
      </head>
     
       <body bgcolor='green'>
              <form action="insert_book.php" method="post" enctype="multipart/form-data" > 
                         <table width='790' border='3' align='center'  >
                                	<tr color='yellow'>
                                            <th colspan='6'>Inserting new Book here</th>
                                        </tr>
                                         <tr>
                                              <td align='right'>Book_Title</td>
                                             <td> <input type='text' name='book_title' size='40'></td>
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
									  $id=$row['cat_id'];
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
							               $id=$row['pub_id'];
								        $title=$row['pub_title'];
									 									        echo "<option value='$id'>$title</option>";
								    }
                                                          ?>
                                                   </select>   
                                             </td>
                                        </tr>
                                       
                                         <tr>
                                              <td align='right'>Book_Price</td>
                                              <td><input type='text' name='book_price'></td>
                                        </tr>
                                        <tr>
                                              <td align='right'>Book_Desc</td>
                                             <td> <textarea name='book_desc' cols='10' rows='8'></textarea></td>
                                        </tr>
                                        <tr>
                                              <td align='right'>Book_Image</td>
                                             <td> <input type='file' name='book_image'></td>
                                        </tr>
                                        <tr>
                                              <td align='right'>Book_keyword</td>
                                             <td> <input type='text' name='book_keyword' size='40'></td>
                                        </tr>
                                        <tr align='center'>
                                             
                                             <td colspan='6'> <input type='submit' name='s' value='upload the Book'></td>
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
       
       $query="insert into books (book_cat,book_brand,book_title,book_price,book_desc,book_image,book_keywords) values('$b_cat','$b_brand','$b_title','$b_price','$b_desc','$i_name','$b_keyword')";
      if(mysqli_query($con,$query));
           {
              echo"<script>alert('product has been inserted')</script>";
              echo "<script>window.open('index.php','_self')</script>";
           }
  }

?>
<?php } ?>
