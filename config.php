<?php
// $currency = '&#8377; '; //Currency Character or code
// $shipping_cost      = 1.50; //shipping cost
// $taxes              = array( //List your Taxes percent here.
//                             'VAT' => 12, 
//                             'Service Tax' => 5
//                             );                     
 	$server = "localhost"; 
    $user = "praveen"; 
    $pass = "prasadam123"; 
    $db = "prasadam"; 
    global $con;  
    // connect to mysql 
    $con = mysqli_connect($server,$user,$pass,$db);

    if (mysqli_connect_errno())
    {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
      
?>