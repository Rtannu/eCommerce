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
                                  <div id="shopping_cart">
                                         <span style="float:right ;font-size:18px; line-length:40px; padding:10px; margin-left:6.25em;">
                                             Welcome_User<b style="color:yellow;">Shopping_Cart-</b>Total Items:Total Price:<a href='cart.php' syle="color:yellow;">Go to Cart</a>
                                         &nbsp;</span>
                                  </div>     
                                       <div id="product_box">
                                         <?php
                                          if(isset($_GET['pro_id']))
                                             {     
                                             $b_id=$_GET['pro_id']; 
                                             $query="select * from books where book_id='$b_id'";
                                             $run=mysqli_query($con,$query);
                                             while($row=mysqli_fetch_array($run))
                                                     {
							 $b_id=$row['book_id'];
							 $b_cat=$row['book_cat'];
							 $b_brand=$row['book_brand'];
							 $b_title=$row['book_title'];
							 $b_price=$row['book_price'];
							 $b_image=$row['book_image'];
                                                         $b_desc=$row['book_desc'];
							  
							 echo"<div id='single_product'>
							       <h3>$b_title</h3>
							       <img src='admin_area/image/$b_image' widht='400' height='300'>
							       <p>$ $b_price</p>
                                                                <p>$b_desc</p>
							       <a href='index.php?pro_id=$b_id' style='float:left;'>Go Back</a>
							       <a href='index.php?pro_id=$b_id'><button style='float:right'>Add to Cart</button></a>
							      </div>
							     ";
                              
                                                     }
                                                }
                                          ?>
                                       </div>
                                 </div>
			 </div>
                        
                         

                         <!-- this is footer area --> 
			 <div id="foter"> 
                              <h2 style="text-align:center; color:pink; padding-top:30px;">&copy;2016 by ROUSHAN_RAJ&SHUBHAM_KUMAR</h2>
                        </div>

              </div>
       </body>
</html>
