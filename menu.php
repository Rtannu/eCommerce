<?php
$id=$_GET['m_id'];
session_start();
if(isset($_GET['m_id']))
          {
		switch($id)
		    {
			case 1:
			  header("Location: index.php");
			  exit();
			case 2:
			  header("location:all_product.php");
			  exit();
			case 3 :
                          if(isset($_SESSION['customer_email']))
                              {   echo "i am menu of index if";
                                  header("location:customer/my_account.php");  
                              }
                          else
                               {   echo "i am menu of index else";
                                   header("location:checkout.php");
                               }
                          exit();
                        case 4:
                           if(isset($_SESSION['customer_email']))
                                  {
                                      echo "<script>alert('you are already logged in')</script>";
                                      echo "<script>window.open('customer/my_account.php','_self')</script>";
                                  }
                            else
                                  {
                                      echo "<script>window.open('customer_register.php','_self')</script>";
                                  }
                           exit();  
                        case 6:
                            header("location:contact.php");
                            exit();
                     }
           }
?>
