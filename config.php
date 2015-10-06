<?php
// $currency = '&#8377; '; //Currency Character or code
// $shipping_cost      = 1.50; //shipping cost
// $taxes              = array( //List your Taxes percent here.
//                             'VAT' => 12, 
//                             'Service Tax' => 5
//                             );                     
 	// $server = "localhost"; 
  //   $user = "praveen"; 
  //   $pass = "prasadam123"; 
  //   $db = "prasadam"; 
  //   global $con;  
  //   // connect to mysql 
  //   $con = mysqli_connect($server,$user,$pass,$db);
  //   // $con->autocommit(false);
  //   if (mysqli_connect_errno())
  //   {
  //        echo "Failed to connect to MySQL: " . mysqli_connect_error();
  //   }


    // Object Oriented
    $server = "localhost"; 
    $user = "praveen"; 
    $pass = "prasadam123"; 
    $db = "prasadam"; 
    global $mysqli; 
    $mysqli = new mysqli($server,$user,$pass,$db);
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    // $mysqli->autocommit(FALSE);
?>