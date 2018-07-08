<?php
 include("function/function.php");
 include("includes/db.php");
 session_start();
?>
<html>
        <head>
                <title>online book shoping</title>
                <link rel="stylesheet" href="styles/style.css" media="all" />
        </head>
       <body>
               <!-- this is top area -->
                 <div id="top">
                       <h1> Welcome_User</h1>
                 </div>
             
              <div class="main_wrapper">
                      
                    
                         <!-- this is header area -->
                          <div class="header_wrapper">
				     <img style="float:left;" src='images/raj.jpg' height="130">
				    
                          </div>



                         <!-- this is menu area -->
                         <div class="menubar">                                     
                                         <ul id="menu">
		                                 <?php get_menus();?>
                                          </ul>						 						
                                  
                                         <div id="form">
                                               <form action='results.php' method='get' enctype='multipart/form-data'>
                                                      <input type='text' name='search' placeholder='search by product'>
                                                      <input type='submit' name='s' value='Search'>
                                                </form>
                                         </div>
                                 
                        </div>



                         <!-- this is body area -->
                         <div class="content_wrapper">
                                
                               
                                  <!-- this is sidebar area -->
			        <div id="sidebar"> 
                                      <div id="sidebar_title">Categories</div>
                                        <ul id='cats'>
                                            <?php get_cats();?>
                                       </ul>
                                      
                                      <div id="sidebar_title">Publication</div>
                                           <ul id='cats'>
                                               <?php get_pubs();?>
                                           </ul>
                                </div>
                                
                                


                                 <!-- this is content area -->
			         <div id="content_area"> 
                                     <?php cart();?>
                                  <div id="shopping_cart">
                                         <span style="float:right ;font-size:18px; line-length:30px; padding:10px ; ">
                                             <b style="color:yellow;">Shopping_Cart-</b>Total Items:<?php get_total_item();?>Total Price:<?php total_price();?><a href='cart.php' syle="color:yellow;">Go to Cart</a>
                                        </span>
                                 </div>  
                                      <form action="customer_register.php" method="post" enctype="multipart/form-data">  
                                        <table width="750" align="center">
                                          <tr>
                                            <h2 align="center">Create Account</h2>
                                          </tr> 
                                          <tr >
                                               <td align="right">Customer Name:</td>
                                               <td ><input type="text" name="c_name" required></td>
                                          </tr>
                                          <tr>
                                               <td align="right">Customer Email:</td>
                                               <td><input type="text" name="c_email" required></td>
                                          </tr>
                                          <tr>
                                               <td align="right">Customer Password:</td>
                                               <td><input type="password" name="c_pass" required></td>
                                          </tr>
                     			  <tr>
                                               <td align="right">Customer Image:</td>
                                               <td><input type="file" name="c_image"></td>
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
                                               <td><input type="text" name="c_city" required></td>
                                          </tr>
                                          <tr>
                                               <td align="right">Customer Contact:</td>
                                               <td><input type="text" name="c_contact" required></td>
                                          </tr>
                                          <tr>
                                               <td align="right">Customer Address:</td>
                                               <td><textarea  cols="5" rows="5"name="c_add" required></textarea></td>
                                          </tr> 
                                          <tr align="center">
                                              <td colspan="4"><input type="submit" name="s" value="Create Account"></td>
                                          </tr>	
                                        </table>
                                      </form>
                                 </div>
			 </div>
                        
                         

                         <!-- this is footer area --> 
			 <div> 
                             <?php include("includes/foter.php");?>
                        </div>

              </div>
       </body>
</html>

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

                         move_uploaded_file($i_tmp, "customer/c_images/$i_name");                         

                         $query="insert into customers(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_add,customer_image) values('$ip','$c_name','$c_e','$c_p','$c_cou','$c_c','$c_con','$c_ad','$i_name') ";
                         $run=mysqli_query($con,$query);
                         $cart_item="select * from cart where ip_add='$ip'";
                         $q_run=mysqli_query($con,$cart_item);
                         if(mysqli_num_rows($q_run)==0)
                             {
                                   $_SESSION['customer_email']=$c_e;
                                   echo"<script>alert('Account has been created')</script>";
                                   echo "<script>window.open('customer/my_account.php','_self')</script>";
                             } 
                         else
                             {
                                   $_SESSION['customer_email']=$c_e;
                                   echo"<script>alert('Account has been created')</script>";
                                   echo "<script>window.open('checkout.php','_self')</script>";
                             }       
                      
                    }      
?>
