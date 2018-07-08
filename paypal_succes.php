<?php
session_start();
?>
<html>
     <head>
           <title>Payment Successful</title>
     </head>
     <body>
         <h2>Welcome <?php echo $_SESSION['customer_email'] ;?></h2>
         <h3>your payment was successful,please go to account</h3>
         <a  href="http://http://www.online_book.com/mystore/customer/my_account.php">Go to Account</a>
     </body>
</html>
