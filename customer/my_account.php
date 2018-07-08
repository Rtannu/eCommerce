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
				     <img style="float:left;" src='../images/raj.jpg' height="130">
				     
                          </div>



                         <!-- this is menu area -->
                         <div class="menubar">                                     
                                         <ul id="menu">
		                                 <?php get_menus();?>
                                          </ul>						 						
                                  
                                         <div id="form">
                                               <form action='../results.php' method='get' enctype='multipart/form-data'>
                                                      <input type='text' name='search' placeholder='search by product'>
                                                      <input type='submit' name='s' value='Search'>
                                                </form>
                                         </div>
                                 
                        </div>



                         <!-- this is body area -->
                         <div class="content_wrapper">
                                
                               
                                  <!-- this is sidebar area -->
			        <div id="sidebar"> 
                                      <div id="sidebar_title"><b>My Account</b></div>
                                        <ul id='cats'>
                                                 <?php
                                                   $e=$_SESSION['customer_email'];
                                                   $query="select * from  customers where customer_email='$e'";
                                                   $run=mysqli_query($con,$query);
                                                   $row=mysqli_fetch_array($run);
                                                   $ig=$row['customer_image'];
                                                   $name=$row['customer_name'];
                                        echo "<p style='text-align:center; border:6px solid white;'><img src='c_images/$ig' width='150' height='150' /></p>";
                                                 ?>
                                                
						 <li><a href="my_account.php?my_orders">My Orders</a></li>
						 <li><a href="my_account.php?edit_account">Edit Account</a></li>
						 <li><a href="my_account.php?change_pass">Change_Password</a></li>
						 <li><a href="my_account.php?delete">Delete Account</a></li>
                                                 <li><a href="logout.php">Logout</a></li>
                                       </ul>
                                     
                                </div>
                                
                                


                                 <!-- this is content area -->
			         <div id="content_area"> 
                                     <?php cart();?>
                                  <div id="shopping_cart">
                                         <span style="float:right ;font-size:18px; line-length:30px; padding:10px ; ">
                                             <b style="color:yellow;">Shopping_Cart-</b><a href='../cart.php' syle="color:yellow;">Go to Cart</a>


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
                                           
                                          <h1 style='padding:10px;'> WELCOME TO <?php echo $name;?></h1><br>
                                           <?php
                                             if((!isset($_GET['my_orders'])) AND (!isset($_GET['edit_account']))AND(!isset($_GET['change_pass']))AND(!isset($_GET['delete'])))
                                              
                                             echo "<b>click to see order progress <a href='my_account.php?my_orders'>link</a>";
                                              ?>
                                             <?php
                                                if(isset($_GET['edit_account']))
                                                     include("edit.php");
                                               
                                                 if(isset($_GET['change_pass']))
                                                      include("change_pass.php");
                                                 if(isset($_GET['delete']))
                                                      include("delete_acc.php");
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
