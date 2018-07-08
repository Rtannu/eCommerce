<?php
 include("function/function.php");
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
                       <?php
                             if(isset($_SESSION['customer_email']))
                                   {    
                                        $email=$_SESSION['customer_email'];
                                        include("includes/db.php");
                                        $query="select * from customers where customer_email='$email' ";
                                        $run=mysqli_query($con,$query);
                                        $row=mysqli_fetch_array($run);
                                        echo "<h1>"."welcome to ".$row['customer_name']."</h1>";
                                   }
                             else
                               echo "<h1>WELCOME FOR SHOPING</h1>";
                      ?>
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
                                             <b style="color:yellow;">Shopping_Cart-</b>Total Items:<?php get_total_item();?>Total Price:<?php total_price();?><a href='index.php' syle="color:yellow;">Back to Shop</a>
                                 
                                    <?php
                                               if(!isset($_SESSION['customer_email']))
                                                  {
                                                   
                                                    echo" <a href='checkout.php'>Login</a>"; 
                                                  }
                                               else
                                                  {
                                                   
                                                    echo "<a href='logout.php'>Logout</a>" ;  
                                                  }
                                          ?>



                                        </span>
                                  </div>  
                                     
                                       <div id="product_box">
                                          
                                          <form action=" " method="post" enctype="multipart/form-data">
                                              <table width="700" height="auto" align="center" bgcolor="green">
                                                 <tr align="center">
                                                    <td>Remove</td>
                                                    <td>Product</td>
						    <td>Quantity</td>
						    <td>Total Price</td>
                                                 </tr> 
                                             
                                                 <?php

                                                  $total=0;
						  $ip=getIp();
						  global $con;
						  $query="select * from cart where ip_add='$ip'";
						  $run=mysqli_query($con,$query);
                                                  $no=mysqli_num_rows($run);
						  while($row=mysqli_fetch_array($run))
						    {
						      $pro_id=$row['book_id'];
						      $pro_price="select * from books where book_id='$pro_id'";
						      $pro_run=mysqli_query($con,$pro_price);
						      while($pro_row=mysqli_fetch_array($pro_run))
						       {
							 $pro_price=array($pro_row['book_price']);
							 $price_sum=array_sum($pro_price);
							 $single_price=$pro_row['book_price'];
                                                         $title=$pro_row['book_title'];
                                                         $image=$pro_row['book_image'];
                                                         $total+=$price_sum;
						        ?>
						     <tr align="center"> 
                                                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
                                                         <td><?php echo $title;?><br>
                                                         <img src="admin_area/image/<?php echo $image;?>" width="60" /></td>
                                                         <td><input type="text" size="6" name="qty"></td>
                                                           <?php
                                                                  if(isset($_POST['update_cart']))
                                                                     { 
                                                                     
                                                                      if($no==1)
                                                                           $quantity=$_POST['qty']-1;
                                                                      else  
                                                                           $quantity=$_POST['qty'];
                                                                       $query="update cart set qty='$quantity'";
                                                                       mysqli_query($con,$query);
                                                                    //   echo $total."<br>";
                                                                       $total+=($single_price*$quantity);
                                                                    //   echo  $quantity=$_POST['qty']."<br>";
                                                                    //   echo $single_price."<br>";
                                                                   //    echo $single_price *$quantity."<br>";
                                                                     }
                                                           ?>
                                                         <td><?php echo $single_price;?></td>
						     </tr>	   
						
					            <?php }}?>    
                                                     <tr  align="right">
                                                         <td colspan="4"><?echo"Subtotal";?></td>
                                                         <td><?echo "$".$total;?></td>
                                                     <tr>
                                                     <tr align="center">
                                                          <td  colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
                                                          <td><input type="submit" name="continue"  value="Continue Shoping"/></td>
                                                          <td><button><a href="checkout.php" style="text-decoration:none; color:black;">Check Out</a></button></td>
                                                     </tr>

                                              </table>
                                          </form>
                                          <?php
                                             function update(){
                                              $ip=getIp();
                                              global $con;
                                          
                                              if(isset($_POST['update_cart']))
                                                     {
                                                       foreach($_POST['remove'] as $remove_id)
                                                                {
                                                                   $query="delete  from cart where book_id='$remove_id' AND ip_add='$ip'";
                                                                   $run=mysqli_query($con,$query);
                                                                   if($run)
                                                                    {
                                                                      echo"<script>window.open('cart.php','_self')</script>";
                                                                    }
                                                                }
                                                     }
                                             
                                               if(isset($_POST['continue']))
                                                     {
                                                           echo"<script>window.open('index.php','_self')</script>";
                                                     }
                                                 }
                                            echo @$a=update();
                                            
                                           ?>
                                       
                                       </div>
                                 </div>
			 </div>
                        
                         

                         <!-- this is footer area --> 
			 <div> 
                             <?php include("includes/foter.php");?>
                        </div>

              </div>
       </body>
</html>
