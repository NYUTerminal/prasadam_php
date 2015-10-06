<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
    if(isset($_POST['delete_item'])){
      echo "Deleted Item:".$_POST['delete_item']."<br>";
      unset($_SESSION['cart'][$_POST['delete_item']]);
      // foreach($_POST['quantity'] as $item) {
      //   unset($_SESSION['cart'][$_POST['delete_item']]);
      // }
    }
    if(isset($_POST['update_cart'])){
      foreach($_POST['quantity'] as $key => $val) {
          if($val>0){
            $_SESSION['cart'][$key] = $val;
          }else if(isset($_SESSION['cart'][$key])){
            unset($_SESSION['cart'][$key]);
          }
      }
    } 
    if(isset($_POST['checkout'])){
      if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
        header('Location: order_process.php');
        // echo "Proceeding to the checkout";
        // require("config.php");
        // foreach ($_SESSION['cart'] as $item) {

        // }
        // mysqli_close($con);
      }else{
        // echo "cart is empty";
        ?>
        <script> 
          alert("No Items in the cart to Proceed.Please select some items from products screen");
        </script>
        <?php
      }



    }
    if(isset($_SESSION['cart'])>0){
        var_dump($_SESSION['cart']);
        // echo "<br>Array Length".count($_SESSION['cart'])."<br>";
        // for ($i=1; $i < count($_SESSION['cart']); $i++) { 
        //   # Check Cart...
        //    echo "Final key".$i."<br>";
        //    echo "Final value ".$_SESSION['cart'][$i]."<br>";
        // }
    }
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
<title>Shopping Cart</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/prasadam_style.css" rel="stylesheet" type="text/css" />

</head>
<body  style ='color: #585858'>
<form method="post" action="shopping_cart.php?page=update_cart">
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
              <th>Image</th>
              <th>
                Item Name
              </th>
              <th>
                Price
              </th>
              <th>
                Description
              </th>
              <th style="width:100px">
                Quantity
              </th>
            </tr>
            <?php 
            if(isset($_SESSION['cart'])){ 
            require("config.php");
             $total_price = 0; 
              foreach($_SESSION['cart'] as $key => $val){  
                echo "loop";
                $sql="SELECT item_name , item_description , no_available , price , item_image_name FROM items where id ='$key'"; 
                if ($result = $mysqli->query($sql)) {
                    $row = $result->fetch_row();
                // $fetch_query=mysqli_query($con,$sql);
                //   if(mysqli_num_rows($fetch_query) > 0) {
                //     $row=mysqli_fetch_assoc($fetch_query);
                    $total_price = $total_price + intval($_SESSION['cart'][$key])*intval($row[3]);
                    $_SESSION['total_price'] = $total_price
                      ?>
                          <tr>
                            <td>
                                <img class = "cart-image" style ="width:75px;height:75px;" src="images/<?php echo $row[4]; ?>"/><br>
                            </td>
                            <td>
                                <?php echo $row[0]?>
                            </td>
                            <td>
                                <?php echo $row[3]?>
                            </td>
                            <td>
                                <?php echo $row[1]?>
                            </td>
                            <td>
                              <input type="text" name="quantity[<?php echo $key;?>]" value="<?php echo $_SESSION['cart'][$key]; ?>" style="width:75px"><br>
                               <!--  <?php echo $_SESSION['cart'][$item]?> -->
                            </td>
                             <td>
                              <?php echo intval($_SESSION['cart'][$key])*intval($row[3]);?>
                            </td>
                            <td>
                               <button type="submit" name="delete_item" value = "<?php echo $key;?>">Delete Item</button>
                            </td>
                          </tr>
                      <?php
                  }
              }
              $mysqli->close();
              ?>
              <tr>
                <td>Total Price </td>
                <td> <?php echo $total_price; ?></td>
              </tr>
            <?php
            }
            ?>
          </table>
          <button type="submit" name="update_cart">Update Cart</button>
          <button type="submit" name="checkout">Proceed to Check out</button>
      </div>
</div>
</form>
</body>


       