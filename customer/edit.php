<?php
//NOTE FOR IMGE DISPLAY: <?php echo "<img src='c_images/$img' width='50' height='50'/>";>
include("includes/db.php");
$ip=$_SESSION['customer_email'];
$query="select * from customers where customer_email='$ip'";
$run=mysqli_query($con,$query);
$row=mysqli_fetch_array($run);
$img=$row['customer_image'];
$c_id=$row['customer_id'];
?>


                                      <form action=" " method="post" enctype="multipart/form-data">  
                                        <table width="750" align="center">
                                          <tr>
                                            <h2 align="center">Update Account</h2>
                                          </tr> 
                                          <tr >
                                               <td align="right">Customer Name:</td>
                                               <td ><input type="text" name="c_name" value="<?php echo $row['customer_name'];?>"required></td>
                                          </tr>
                                          <tr>
                                               <td align="right">Customer Email:</td>
                                               <td><input type="text" name="c_email" value="<?php echo $row['customer_email'];?>" required></td>
                                          </tr>
                                          <tr>
                                               <td align="right">Customer Password:</td>
                                               <td><input type="password" name="c_pass" value="<?php echo $row['customer_pass'];?>" required></td>
                                          </tr>
                     			  <tr>
                                               <td align="right">Customer Image:</td>
                                               <td><input type="file" name="c_image"><img src="c_images/<?php echo $img ;?>" width="50" height="50"/></td>
                                          </tr>
					  <tr>
                                               <td align="right">Customer Country:</td>
                                               <td>
                                                      <select name="c_country" >
                                                         <option>select country</option>
                                                         <option>japan</option>
							 <option>america</option>
							 <option>china</option>
							 <option>nepal</option>
							 <option>pakistan</option>
							 <option>frans</option>
							 <option>canada</option>
							 <option>england</option>                                                         
                                                      </select>
                                               </td>
                                          </tr>
                                          <tr>
                                               <td align="right">Customer City:</td>
                                               <td><input type="text" name="c_city" value="<?php echo $row['customer_city'];?>"required></td>
                                          </tr>
                                          <tr>
                                               <td align="right">Customer Contact:</td>
                                               <td><input type="text" name="c_contact" value="<?php echo $row['customer_contact'];?>"required></td>
                                          </tr>
                                          <tr>
                                               <td align="right">Customer Address:</td>
                                               <td><input  cols="5" rows="5"name="c_add" value="<?php echo $row['customer_add'];?>" required></td>
                                          </tr> 
                                          <tr align="center">
                                              <td colspan="4"><input type="submit" name="s" value="Update Account"></td>
                                          </tr>	
                                        </table>
                                      </form>
                                
			

<?php
 
           if(isset($_POST['s']))
                    {
                         $ip=getIp();
                         $c_name=$_POST['c_name'];
			 $c_e=$_POST['c_email'];
			 $c_p=$_POST['c_pass'];
			 $c_c=$_POST['c_city'];
			 $c_cou=$_POST['c_country'];
			 $c_con=$_POST['c_contact'];
			 $c_ad=$_POST['c_add'];

                         $i_name=$_FILES['c_image']['name'];
			 $i_tmp=$_FILES['c_image']['tmp_name'];

                         move_uploaded_file($i_tmp, "c_images/$i_name");                         

                         $query="update customers set customer_ip='$ip' , customer_name='$c_name',customer_email='$c_e', customer_pass='$c_p',customer_country='$c_cou' , customer_city='$c_c', customer_contact='$c_con',customer_add='$c_ad', customer_image='$i_name' where customer_id='$c_id'";
                         $run=mysqli_query($con,$query);
                         if($run)
                            {
                                echo "<script>alert('your account is succesfully update...!')</script>";
                                echo "<script>window.open('my_account.php','_self')</script>";
                            }
                    }
?>                        








