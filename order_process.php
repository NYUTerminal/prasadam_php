<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
    if(isset($_POST['checkout'])){
      if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0 && isset($_SESSION['total_price'])){
      require("config.php");
      //prasadam_orders
      $mysqli->autocommit(false);
      $mysqli->query("INSERT INTO prasadam_orders (order_date,total_price,payment_status) values (now(),$_SESSION['total_price'],'pending')");
      $id = $mysqli->insert_id;
      echo $id;
      foreach($_SESSION['cart'] as $key => $value) {
         $mysqli->query("INSERT INTO prasadam_order_items (order_id,item_id,price) values ('1')");
      }
      
      $id2 = $mysqli->insert_id;
      echo $id2;
      $mysqli->commit();
      //prasadam_orders_items
      // $mysqli->query("insert into prasadam_order_items");

      //shipping_details.

      //Payment.


      //Decrease number of items available.
      $mysqli->close();
      // header('Location: checkout.php');
      // header('Location: checkout.php');
      // exit;
      }else{
      // echo "cart is empty";
        ?>
        <script> 
          alert("No Items in the cart to Proceed.Please select some items from products screen");
        </script>
        <?php
        }
    }
    // if(isset($_SESSION['cart'])>0){
    //     var_dump($_SESSION['cart']);
    // }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
table, th, td {
    border: 1px solid black;
    color: #585858;
}
</style>
<title>Order Process</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/prasadam_style.css" rel="stylesheet" type="text/css" />

</head>
<body  style ='color: #585858'>
<form method="post" action="order_process.php">
  <div class="mainwrapper">
<!-- <div class="dashboard"> -->
      <div class = "box">
      <a href="home.html">Home</a>
      </div>
      <div class = "box prasadam_tile">
      <a href="home.html">Prasadam Title</a>
      </div>
      <div id="white_canvas1">
          <table>
           <tr>
               <input type="text" name="fname" placeholder="First name *"><br>
               <input type="text" name="lname" placeholder="Last name *"><br>
            </tr>
            <tr>
               <input type="text" name="addressline1" placeholder="address line 1"><br>
            </tr>
            <tr>
               <input type="text" name="addressline2" placeholder="address line 2"><br>
            </tr>
            <tr>
               <input type="text" name="city" placeholder="City"><br>
            </tr>
            <tr>
               <input type="text" name="State" placeholder="State"><br>
               <input type="text" name="Country" placeholder="Country"><br>
            </tr>
            <tr>
               <input type="text" name="zip" placeholder="Zip Code"><br>
               <input type="text" name="phone" placeholder="Phone"><br>
               <input type="text" name="email" placeholder="email"><br>
            </tr>
          </table>
          <button type="submit" name="checkout">Place My Order</button>
      </div>
</div>
</form>
</body>


       