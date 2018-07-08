<div>
          <form action=" " method="post">
             <table width="600" align="center">
               <tr>
                <h1 style="text-align:center;">Do you want to delete account?<h1><br>
              </tr>
              <tr>
                  <td ><input type="submit" name="yes" value="Yes i want" ></td>
                  <td><input type="submit" name="no" value="No,i want"></td>
              </tr> 
             </table>
          </form>
</div>
<?php
            echo "outside";
           if(isset($_POST['yes']))
              {     echo "yes";
                   include("includes/db.php");
                   $email=$_SESSION['customer_email'];
                   $delete_account="delete from customers where customer_email='$email' ";
                   $run_delete_account=mysqli_query($con,$delete_account);
                   echo "<script>alert('your account is successfully deleted..!')</script>";
                   echo "<script>window.open('../index.php','_self')</script>";
                  
              }
           if(isset($_POST['no']))
                  { echo "no";
                    echo "<script>alert('your account is not deleted..!')</script>";
                    echo "<script>window.open('my_account.php','_self')</script>";
                  }

?>
