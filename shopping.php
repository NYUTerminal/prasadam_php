<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
    
    if(isset($_POST['addtocart'])){
      foreach($_POST['quantity'] as $key => $val) { 
            //if quantity is zero then ignore the product.
            // echo "key".$key."<br>";
            // echo "value".$val."<br>";
            if($val!=0){ 
              if(isset($_SESSION['cart'])){
                if(isset($_SESSION['cart'][$key]) && $_SESSION['cart'][$key]>0){
                  $_SESSION['cart'][$key] = $_SESSION['cart'][$key] + $val;
                }else{
                  $_SESSION['cart'][$key] =  $val;
                }
              }else{
                $_SESSION['cart'] = [];
                $_SESSION['cart'][$key]= $val;
              }
            } 
        } 
    }
    var_dump($_SESSION['cart']);
    // if(isset($_SESSION['cart'])){
    //   for ($i=1; $i < count($_SESSION['cart']); $i++) { 
    //   # Check Cart...
    //    echo "Final key".$i."<br>";
    //    echo "Final value ".$_SESSION['cart'][$i]."<br>";
    //    }
    // }

?>
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

<form method="post" action="shopping.php?page=add_to_cart">
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
                <th>Name</th> 
                <th>Description</th> 
                <th>Price</th> 
                <th style="width:250px">Quantity</th> 
                <th>Action</th> 
            </tr> 
          <?php
            require("config.php");
            $sql="SELECT id,item_id , item_name , item_description , no_available , price , item_image_name FROM items"; 
            $fetch_query=mysqli_query($con,$sql);
            if (mysqli_num_rows($fetch_query) > 0) {
            while ($row=mysqli_fetch_assoc($fetch_query)){ 
            $image_name = $row['item_image_name']
            ?>
              <tr> 
                </div>
                <td>
                <img class = "cart-image" style ="width:100px;height:100px;" src="images/<?php echo $image_name; ?>"/><br>
                </td>
                <td>
                  <?php echo $row['item_name'] ?><br>
                </td>
                <td>
                  <?php echo $row['item_description'] ?><br>
                </td>
                <td>
                  <?php echo $row['price'] ?>$<br>
                </td>
                <td>
                  <input type="text" name="quantity[<?php echo intval($row['id']);?>]" value="0" style="width:200px"><br>
                </td>
                <td>
                <button type="submit" name="addtocart">Add to Cart</button>
                <!-- <a href="shopping.php?action=add&id=<?php echo $row['id']?>&quantity<?php echo intval($row['id']);?>=document.getElementById('quantity<?php echo intval($row['id']);?>').value">Add to cart</a> -->
                </td>
                </div>
              </tr> 
            <?php 
            }
            mysqli_close($con);
          }?>

           <a href="shopping_cart.php?action=show_cart">GO TO CART</a>
        </table>
      </div>
    </div>

</form>

</body>


       