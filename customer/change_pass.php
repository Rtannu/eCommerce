<div>
 <form action=" " method="post">
    <table width="600"  bgcolor="pink" align="center">
        <tr align ="center">
           <td colspan="4"><h2>Change Your password<h2></td>
        </tr>
        <tr>
            <td align="right"">Enter Current Password:</td>
            <td><input type="password" name="curr" placeholder="enter current Password" required><td>
        </tr>
        <tr>
            <td align="right">Enter New Password:</td>
            <td><input type="password" name="new" placeholder="Enter New Password" required><td>
        </tr>
        <tr>
            <td align="right">Enter new Password Again:</td>
            <td><input type="password" name="con" placeholder="Enter new Password Again:" required><td>
        </tr>
        <tr align="center">
            <td colspan="4"><input type="submit" name="s" value="Change Password"><td>
        </tr>
    </table>
  
 </form>
</div>

<?php

if(isset($_POST['s']))
          {
           include("includes/db.php");
           global $con;
             $email=$_SESSION['customer_email'];
             $c_pass=$_POST['curr'];
             $n_pass=$_POST['new'];
             $corfm_pass=$_POST['con'];
             $query="select * from customers where customer_email='$email' AND customer_pass='$c_pass'";
             $run=mysqli_query($con,$query);
             echo $no_row=mysqli_num_rows($run);
             if($no_row==0)
                    {
                        echo "<script>alert('password  is incorrect,please try again!')</script>";
                         
                    }
             else if($n_pass!=$corfm_pass)
                    {
                         echo "<script>alert('new password not match')</script>";
                    } 
             else
                   {
                         $update_query="update customers set customer_pass='$n_pass' where customer_email='$email'";
                         $run_update=mysqli_query($con,$update_query);
                         echo "<script>alert('your password was updated successfully!')</script>";                         
                         echo "<script>window.open('my_account.php','_self')</script>";
                   }
            
          }

?>
