<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
    if(isset($_GET['action']) && $_GET['action']=="add"){
        $id=intval($_GET['id']);
        if(isset($_SESSION['cart'])){
          $_SESSION['cart'][$id]++;
          echo "cart is set";
          foreach ($_SESSION['cart'] as $items) {
            echo $items;
          }
        }else{
          $_SESSION['cart'] = [];
          require("config.php");
          $_SESSION['cart'][$id]=1;
          echo "adding first";
          // $sql_fetch = "SELECT id,price FROM items WHERE id ='$id';";
          // $_item_query = mysqli_query($con,$sql_fetch);
          // if(mysqli_num_rows($_item_query) > 0){  
              // $_results=mysqli_fetch_assoc($_item_query);
          // $_SESSION['cart'][$id]=array(
          //         "quantity" => 1,
          //         // "price" => $_results['price']
          //       );
          }
    }else{
          $message="This product id it's invalid!";
    } 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 
    Template 2047 Brown Field
    by www.tooplate.com 
-->
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
                <th>Name</th> 
                <th>Description</th> 
                <th>Price</th> 
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
                <img class = "cart-image" src="images/<?php echo $image_name; ?>"/><br>
                <?php echo $row['item_name'] ?><br>
                <?php echo $row['item_description'] ?><br>
                <?php echo $row['price'] ?>$<br>
                <a href="shopping.php?action=add&id=<?php echo $row['id']?>">Add to cart</a>
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
</body>


       