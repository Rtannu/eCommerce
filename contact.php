<?php
 include("function/function.php");
  session_start();
?>
<html>
        <head>
                <title>online book shopping</title>
                <link rel="stylesheet" href="styles/style.css" media="all" />
        </head>
       <body>
               <!-- this is top area -->
                 <div id="top">
                         <!--<p>&nbsp;&nbsp;<?php echo date("l jS \of F Y h:i:s A") . "<br>";?></p>-->
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
				  <!--   <img style="float:middle;" src='images/04.png' height="130">-->
				  <!--   <img style="float:right;" src='images/c.jpg' height="130">-->
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
                                          <form action="contact.php" method="post">
                                             <table width="600" align="center">
                                                <tr align="center">
                                                   <td colspan="5"><h2><strong>Contact Us</strong></h2></td>
                                                </tr>
                                                <tr>
                                                   <td align="right"><strong>your email:</strong></td>
                                                   <td><input type="text" name="email"></td>
                                                </tr>
                                                <tr>
                                                   <td align="right"><strong>Subject:</strong></td>
                                                   <td><input type="text" name="subject"></td>
                                                </tr>
                                                <tr>
                                                   <td align="right"><strong>Your message:</strong></td>
                                                   <td><textarea cols="15" rows="10" name="message"></textarea></td>
                                                </tr>
                                                <tr>
                                                   <td align="center" colspan="5"><input type="submit" name="sub" value="send"></td>
                                                </tr>
                                             </table>
                                          </form>
                                       
                                          <?php
                                             if(isset($_POST['sub']))
                                                 {
                                                     $cus_email=$_POST['email'];
                                                     $cus_sub=$_POST['subject'];
                                                     $cus_sms=$_POST['message'];
                                                     $to="rrajbittu420@gmail.com";
                                                     $message="Email From:<br>".$cus_sms;
                                                     if($cus_email=='' or $cus_sub=='' or $cus_sms=='')
                                                               {
                                                                 echo "<script>alert('please fill the blank space!')</script>";
                                                                 echo "<script>window.open('contact.php','_self')<script>";
                                                               }
                                                     mail($to,$cus_sub,$message,$cus_email);
                                                     $to_sender=$_POST['email'];
                                                     $sub="online_book.com<br>";
                                                     $sms="thank for contacting,i will contact to you as soon as!";
                                                     $from="rrajbittu420@gmail.com";
                                                     mail($to_sender,$sub,$sms,$from);
                                                     echo "<script>alert('message has been sent')</script>";

                                                 }
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
