<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
    if(isset($_POST['delete_item'])){
      echo $_POST['delete_item'];
      foreach($_POST['quantity'] as $item) {
        unset($_SESSION['cart'][$_POST['delete_item']]);
      }
    }
    for ($i=1; $i < count($_SESSION['cart']); $i++) { 
      # Check Cart...
       echo "Final key".$i."<br>";
       echo "Final value ".$_SESSION['cart'][$i]."<br>";
    }
  // else{
  //         echo "Shopping cart is empty. PLease Go to Products page to add products to shopping cart.";
  // } 

  // mysqli_close($con);
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
<title>Brown Field Template</title>
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
            require("config.php");
            $count=0;

            for ($item=1; $item < count($_SESSION['cart']) ; $item++) { 
            $sql="SELECT item_id , item_name , item_description , no_available , price , item_image_name FROM items where id ='$item'"; 
            // echo $sql;
            $fetch_query=mysqli_query($con,$sql);
              if(mysqli_num_rows($fetch_query) > 0) {
                $row=mysqli_fetch_assoc($fetch_query);
                  ?>
                      <tr>
                        <td>
                            <img class = "cart-image" src="images/<?php echo $row['item_image_name']; ?>"/><br>
                        </td>
                        <td>
                            <?php echo $row['item_name']?>
                        </td>
                        <td>
                            <?php echo $row['price']?>
                        </td>
                        <td>
                            <?php echo $row['item_description']?>
                        </td>
                        <td>
                          <input type="text" name="quantity[<?php echo $item;?>]" value="<?php echo $_SESSION['cart'][$item]; ?>" style="width:75px"><br>
                           <!--  <?php echo $_SESSION['cart'][$item]?> -->
                        </td>
                        <td>
                           <button type="submit" name="delete_item" value = "<?php echo $item;?>">Delete Item</button>
                        </td>
                      </tr>
                  <?php
              }
            }
            mysqli_close($con);
            ?>
          </table>
          <button type="submit" name="update_cart">Update Cart</button>
      </div>
</div>
</form>
</body>


       