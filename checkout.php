<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
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
<form method="post" action="order_process.php?page=order_process">
  <div class="mainwrapper">
<!-- <div class="dashboard"> -->
      <div class = "box">
      <a href="home.html">Home</a>
      </div>
      <div class = "box prasadam_tile">
      <a href="home.html">Prasadam Title</a>
      </div>
      <div id="white_canvas1">
          Order Placed Successfully!!
      </div>
</div>
</form>
</body>


       