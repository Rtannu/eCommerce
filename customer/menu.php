<?php
$id=$_GET['m_id'];
session_start();
if(isset($_GET['m_id']))
          {
		switch($id)
		    {
			case 1:
			  header("Location:../index.php");
			  exit();
			case 2:
			  header("location:../all_product.php");
			  exit();
			case 3 :
                           if(isset($_SESSION['customer_email']))
                                {
                                   header("location:my_account.php") ;  
                                }
                            else
                                {
                                    header("location:customer/checkout.php");  
                                }
                         exit();
                        case 4:
                               case 4:
                           if(isset($_SESSION['customer_email']))
                                  {
                                      echo "<script>alert('you are already logged in')</script>";
                                      echo "<script>window.open('my_account.php','_self')</script>";
                                  }
                            else
                                  {
                                      echo "<script>window.open('../customer_register.php','_self')</script>";
                                  }
                           exit(); 
                        case 6:
                            header("location:../contact.php");
                            exit();   
                     }
           }
?>
