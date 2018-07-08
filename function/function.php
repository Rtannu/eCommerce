<?php
$con=mysqli_connect("localhost","root","","project");

if(mysqli_connect_errno())
      {
         echo"Faild to connect to MySql".mysqli_connect_error();
      } 


//getting ip address of customer
function getIp()
   {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
  }


//adding item in cart 
function cart()
       {
         if(isset($_GET['pro_id']))
                {   echo "raj";
                     $b_id=$_GET['pro_id'];
                     $ip=getIp();
                     global $con;
                     $query="select * from cart where book_id='$b_id' AND ip_add='$ip'";
                     $run=mysqli_query($con,$query);
                     if(mysqli_num_rows($run)>0)
                           echo "";
                     else
                       {
                           $query="insert into cart (book_id,ip_add) values('$b_id','$ip')";
                           $run=mysqli_query($con,$query);
                           echo "<script>window.open('index.php','_self')</script>";
                       } 
                }
       }


function get_total_item()
        {
             global $con;
             if(isset($_GET['pro_id']))
                     {
                         $id=getIp();
                         $query="select *from cart where ip_add='$id'";
                         $run=mysqli_query($con,$query);
                         $count_item=mysqli_num_rows($run);
                         echo $count_item;
                     }
             else
                    {
                         $id=getIp();
                         $query="select *from cart where ip_add='$id'";
                         $run=mysqli_query($con,$query);
                         $count_item=mysqli_num_rows($run);
                         echo $count_item;
                    }
        }

//getting total prices
function total_price()
       {
          $total=0;
          $ip=getIp();
          global $con;
          $query="select * from cart where ip_add='$ip'";
          $run=mysqli_query($con,$query);
          while($row=mysqli_fetch_array($run))
                   {
                      $pro_id=$row['book_id'];
                      $pro_price="select * from books where book_id='$pro_id'";
                      $pro_run=mysqli_query($con,$pro_price);
                      while($pro_row=mysqli_fetch_array($pro_run))
                              {
                                 $pro_price=array($pro_row['book_price']);
                                 $price_sum=array_sum($pro_price);
                                 $total+=$price_sum;
                              }
                      
                   } 
          echo "$".$total;
       }

//getting categories
function get_cats()
     {
        global $con;
        $query="select * from categories";
        $run=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($run))
               {
                  $id=$row['cat_id'];
                  $title=$row['cat_title'];
                   
                  echo "<li><a href='index.php?catg_id=$id'>$title</a></li>";
               }
       
     }


//getting publication

function get_pubs()
     {
        global $con;
        $query="select * from publication";
        $run=mysqli_query($con,$query);
         while($row=mysqli_fetch_array($run))
               {
                  $id=$row['pub_id'];
                  $title=$row['pub_title'];
                   
                  echo "<li><a href='index.php?pub_id=$id'>$title</a></li>";
               }
       
     }



//getting menu

function get_menus()
     {
        global $con;
        $query="select * from menu";
        $run=mysqli_query($con,$query);
         while($row=mysqli_fetch_array($run))
               {
                  $id=$row['m_id'];
                  $title=$row['m_title'];
                  
                  if(isset($_SESSION['customer_email']) and $title=="sign up") 
                          {
                               continue;
                              
                          }
                  else 
                          {
                               echo "<li><a href='menu.php?m_id=$id'>$title</a></li>";
                          }
               }
       
     }

//displaying book on sites

function get_books()
       {
         if(!isset($_GET['catg_id'])AND!isset($_GET['pub_id']))
           {   
                  
		    global $con;
		    $query="select * from books order by RAND() LIMIT 0,6";
		    $run=mysqli_query($con,$query);
		    while($row=mysqli_fetch_array($run))
		             {
		                 $b_id=$row['book_id'];
				 $b_cat=$row['book_cat'];
				 $b_brand=$row['book_brand'];
				 $b_title=$row['book_title'];
				 $b_price=$row['book_price'];
				 $b_image=$row['book_image'];
		                  
		                 echo"<div id='single_product'>
		                       <h3>$b_title</h3>
		                       <a href='details.php?pro_id=$b_id'><img src='admin_area/image/$b_image' widht='180' height='180'></a>
		                       <p>Price: $$b_price</p>
		                       <a href='details.php?pro_id=$b_id' style='float:left;'>Details</a>
		                       <a href='index.php?pro_id=$b_id'><button style='float:right'>Add to Cart</button></a>
		                      </div>
		                     ";
		                      
		             }
       }
    }


//displaying category book on sites

function dis_cate_books()
       {
         if(isset($_GET['catg_id']))
           {   
                    $catg_id=$_GET['catg_id'];
		    global $con;
		    $query="select * from books where book_cat='$catg_id'";
                    
		    $run=mysqli_query($con,$query);
                    if(mysqli_num_rows($run)==0)
                               {
                                   echo"THERE IS NO ITEM  AVAILABLE OF THIS CATEGORY!";
                                  
                               }
                   else
                    {
		    while($row=mysqli_fetch_array($run))
		             {
		                 $b_id=$row['book_id'];
				 $b_cat=$row['book_cat'];
				 $b_brand=$row['book_brand'];
				 $b_title=$row['book_title'];
				 $b_price=$row['book_price'];
				 $b_image=$row['book_image'];
		                  
		                 echo"<div id='single_product'>
		                       <h3>$b_title</h3>
		                       <a href='details.php?pro_id=$b_id'><img src='admin_area/image/$b_image' widht='180' height='180'></a>
		                       <p>Price:$$b_price</p>
		                       <a href='details.php?pro_id=$b_id' style='float:left;'>Details</a>
		                       <a href='index.php?pro_id=$b_id'><button style='float:right'>Add to Cart</button></a>
		                      </div>
		                     ";
		                      
		             }
                    }
           }
    }




//displaying publicaton book on sites

function dis_pub_books()
       {
         if(isset($_GET['pub_id']))
           {   
                    $catg_id=$_GET['pub_id'];
		    global $con;
		    $query="select * from books where book_brand='$catg_id'";
		    $run=mysqli_query($con,$query);
                    if(mysqli_num_rows($run)==0)
                               {
                                   echo"THERE IS NO ITEM  AVAILABLE OF THIS PUBLICATION!";
                                  
                               }
                   else
                    {
		    while($row=mysqli_fetch_array($run))
		             {
		                 $b_id=$row['book_id'];
				 $b_cat=$row['book_cat'];
				 $b_brand=$row['book_brand'];
				 $b_title=$row['book_title'];
				 $b_price=$row['book_price'];
				 $b_image=$row['book_image'];
		                  
		                 echo"<div id='single_product'>
		                       <h3>$b_title</h3>
		                       <a href='details.php?pro_id=$b_id'><img src='admin_area/image/$b_image' widht='180' height='180'></a>
		                       <p>Price:$$b_price</p>
		                       <a href='details.php?pro_id=$b_id' style='float:left;'>Details</a>
		                       <a href='index.php?pro_id=$b_id'><button style='float:right'>Add to Cart</button></a>
		                      </div>
		                     ";
		                      
		             }
                   }
       }
    }



//displaying all books/all product on sites

function get_all_product()
       {
         if(!isset($_GET['catg_id'])AND!isset($_GET['pub_id']))
           {   
                  
		    global $con;
		    $query="select * from books ";
		    $run=mysqli_query($con,$query);
		    while($row=mysqli_fetch_array($run))
		             {
		                 $b_id=$row['book_id'];
				 $b_cat=$row['book_cat'];
				 $b_brand=$row['book_brand'];
				 $b_title=$row['book_title'];
				 $b_price=$row['book_price'];
				 $b_image=$row['book_image'];
		                  
		                 echo"<div id='single_product'>
		                       <h3>$b_title</h3>
		                       <a href='details.php?pro_id=$b_id'><img src='admin_area/image/$b_image' widht='180' height='180'></a>
		                       <p>Price:$$b_price</p>
		                       <a href='details.php?pro_id=$b_id' style='float:left;'>Details</a>
		                       <a href='index.php?pro_id=$b_id'><button style='float:right'>Add to Cart</button></a>
		                      </div>
		                     ";
		                      
		             }
       }
    }





?>
