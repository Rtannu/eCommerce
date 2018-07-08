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
                                             <b style="color:yellow;">Shopping_Cart-</b>Total Items:<?php get_total_item();?>Total Price:<?php total_price();?><a href='cart.php' syle="color:yellow;">Go to Cart</a>


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
                                          <?php get_books();?>
                                          <?php dis_cate_books();?>
                                          <?php dis_pub_books();?>
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
