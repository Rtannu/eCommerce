<!DOCTYPE>
<html>
      <head>
             <title> 
                    Admin_Login_Form
             </title>
             <link rel="stylesheet" href="styles/admin_sytle.css" media="all"/>
      </head>
          <body>
		<div class="login">
                    <h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_in'];?></h2>
                     <h2 style="color:white; text-align:center;"><?php echo @$_GET['logout'];?></h2>
		    <h1>Admin Login</h1>
		    <form method="post">
		    	<input type="text" name="email" placeholder="Email" required="required" />
			<input type="password" name="p" placeholder="Password" required="required" />
			<button type="submit" name="sub" value="Login" class="btn btn-primary btn-block btn-large">Login</button>
		    </form>
		</div>
          </body>
</html>
<?php
include("includes/db.php");
session_start();
if(isset($_POST['sub']))
         {
               $email=mysql_real_escape_string($_POST['email']);
               $pass=mysql_real_escape_string($_POST['p']);
               $encrypt=md5($pass);//security purpose
               $query="select * from admin where user_email='$email' AND user_pass='$pass'";
               $run=mysqli_query($con,$query);
               $check_user=mysqli_num_rows($run);
               if($check_user==0)
                      {
                           echo "<script>alert('Password or Email is wrong,try again!')<script>";
                      }
               else
                      {
                           $_SESSION['user_email']=$email;
                           echo "<script>window.open('index.php?logged_in=you have successfully logged in','_self')</script>";
                      }
               
         }
?>
