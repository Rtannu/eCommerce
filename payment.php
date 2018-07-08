
<div>
    <?php
          include("includes/db.php");
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
                                 $product_name=$pro_row['book_title'];
                                 $price_sum=array_sum($pro_price);
                                 $total+=$price_sum;
                              }
                      
                   } 
    ?>     



     <h2 align="center">Pay now with Paypal </h2>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="businesstest@book.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?php echo $product_name;?>">
  <input type="hidden" name="amount" value="<?php echo $total;?>">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="return" value="http://www.online_book.com/mystore/paypal_succes.php">
  <input type="hidden" name="cancel_return" value="http://www.online_book.com/mystore/paypal_cancel.php">


  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
  alt="PayPal- the safer,easier way to pay online">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

</div>
