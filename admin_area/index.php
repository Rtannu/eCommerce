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
<html>
      <head>
                 <title>this is admin area</title>
                 <link rel="stylesheet" href="styles/style.css" media="all" />
      </head>
      <body>

             <div class="main_wrapper">

                   <div id="header">

                  </div>
                   <div id="right">
                      <h2 sytle="text-align:enter;">Manage Content</h2>
                        <a href="index.php?insert_new_product">Insert New Product</a>
			<a href="index.php?View_all_product">View All Product</a>
			<a href="index.php?insert_new_categories">Insert New Categories</a>
                        <a href="index.php?View_all_categores">View All Categories</a>
			<a href="index.php?insert_new_publication">Insert New publicaton</a>
			<a href="index.php?View_all_publicatons">View All Publicaton</a>
			<a href="index.php?View_customers">View Customers</a>
			<a href="index.php?view_orders">View Orders</a>
			<a href="index.php?View_payment">View payments</a>
                        <a href="admin_logout.php?insert_product">Admin logout</a>
                 </div>
                 <div id="left">
                 <h2 style="color:red; text-align:center;"><?php  echo @$_GET['logged_in'];?></h2>
                        <?php
                            if(isset($_GET['insert_new_product']))
                               include("insert_book.php");
                            if(isset($_GET['View_all_product']))
                               include("view_all_product.php");
                            if(isset($_GET['edit_pro']))
                               include("edit.php");
                            if(isset($_GET['insert_new_categories']))
                               include("insert_new_categories.php");
                            if(isset($_GET['View_all_categores']))
                               include("View_all_categores.php");
                            if(isset($_GET['edit_cat']))
                               include("edit_cat.php");
                            if(isset($_GET['insert_new_publication']))
                               include("insert_net_pub.php");
                            if(isset($_GET['View_all_publicatons']))
                               include("view_all_pub.php");
                            if(isset($_GET['edit_pub']))
                               include("edit_pub.php");
                            if(isset($_GET['View_customers']))
                               include("view_all_customer.php");
                        ?>
                 </div>         
  
           </div>





     </body>
</html>
<?php } ?>
