<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
    if(isset($_GET['action']) && $_GET['action']=="show_cart"){
        if(count($_SESSION['cart'])>0){
          // echo "string";
          // foreach($_SESSION['cart'] as $index_item) {
          //   echo "id";
          //   echo array_search($index_item, $_SESSION['cart']);;
          //   echo "quantity";
          //   echo $index_item;
          // }
        }
        // else{
        //   require("config.php");
        //   $sql_fetch = "SELECT id , price FROM items WHERE id ='$id';";
        //   $_item_query = mysqli_query($con,$sql_fetch);
        //   if(mysqli_num_rows($_item_query) > 0){  
        //       $_results=mysqli_fetch_assoc($_item_query);
        //       $_SESSION['cart'][$_results['id']]=array(
        //           "quantity" => 1,
        //           "price" => $_results['price']
        //         );
        //     }else{
        //       $message="This product id it's invalid!";
        //     }   
        //   }
  }
  else{
          echo "Shopping cart is empty. PLease Go to Products page to add products to shopping cart.";
  } 

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
              <th>
                Item Name
              </th>
              <th>
                Price
              </th>
              <th>
                Description
              </th>
              <th>
                Quantity
              </th>
            </tr>
            <?php 
            require("config.php");
            $count=0;
            foreach($_SESSION['cart'] as $item) { 
            $count = $count+1;
            $id = intval($item);
            $sql="SELECT item_id , item_name , item_description , no_available , price , item_image_name FROM items where id ='$count'"; 
            // echo $sql;
            $fetch_query=mysqli_query($con,$sql);
              if(mysqli_num_rows($fetch_query) > 0) {
                $row=mysqli_fetch_assoc($fetch_query);
                  ?>
                      <tr>
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
                            <?php echo $item?>
                        </td>
                      </tr>
                  <?php
              }
            }
            mysqli_close($con);
            ?>
          </table>
      </div>
</div>
</body>


       