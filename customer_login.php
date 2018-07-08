<?php
  
  include("includes/db.php");
   //include("function/function.php");
?>
<div padding="100">
 <form action="" method="post">
    <table width="500" bgcolor="yellow" align="center">
        <tr align ="center">
           <td colspan="4"><h2>Login or Registar to Buy<h2></td>
        </tr>
        <tr>
            <td align="right"">Email:</td>
            <td><input type="text" name="email" placeholder="enter email" required><td>
        </tr>
        <tr>
            <td align="right">Password:</td>
            <td><input type="password" name="pass" placeholder="enter password" required><td>
        </tr>
        <tr>
            <td colspan="4" align="center"><a href="checkout.php" style="text-decoration:none;" >Forget Password? </a></td>
        </tr>
        <tr align="center">
            <td colspan="4"><input type="submit" name="s" value="login"><td>
        </tr>
    </table>
    <table>
        <h2 style="float:right "><a href="customer_register.php">New? Register Here<h2>
    </table>
 </form>
</div>

<?php

if(isset($_POST['s']))
          {
             $email=$_POST['email'];
             $pass=$_POST['pass'];
             $query="select * from customers where customer_email='$email' AND customer_pass='$pass'";
             $run=mysqli_query($con,$query);
             $no_row=mysqli_num_rows($run);
             

             $ip=getIp();
             $c_query="select * from cart where ip_add='$ip'";
             $c_run=mysqli_query($con,$c_query);
             $c_no=mysqli_num_rows($c_run);
            
             if($no_row==0)
                    {
                        echo "<script>alert('password or email is incorrect,please try again!')</script>";
                       
                       
                    } 
            
            else if($c_no==0 AND $no_row>0)
                    { 
                        $_SESSION['customer_email']=$email;
                        echo "<script>alert('you logged in successfully')</script>"   ;
                        echo "<script>window.open('customer/my_account.php','_self')</script>";
                    } 
             else
                    {
                        
                        $_SESSION['customer_email']=$email;
                        echo "<script>alert('you logged in successfully')</script>"   ;
                        echo "<script>window.open('checkout.php','_self')</script>"; 
                      
                       
                    }
          }

?>
