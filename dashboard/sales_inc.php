<?php
//insert.php
require "includes/conn.php";
if(isset($_POST["customer"]))
{
 $customer = $_POST["customer"];
 $invoice = $_POST["invoice"];
 $medicine_name = $_POST["medicine_name"];
 $price = $_POST["price"];
 $qty = $_POST["qty"];
 $query = '';
 for($count = 0; $count<count($customer); $count++)
 {
  $customer_clean = mysqli_real_escape_string($conn, $customer[$count]);
  $invoice_clean = mysqli_real_escape_string($conn, $invoice[$count]);
  $medicine_name_clean = mysqli_real_escape_string($conn, $medicine_name[$count]);
  $price_clean = mysqli_real_escape_string($conn, $price[$count]);
  $qty_clean = mysqli_real_escape_string($conn, $qty[$count]);
  if($customer_clean != '' && $invoice_clean != '' && $medicine_name_clean != '' && $price_clean != '' && $qty_clean != '')
  {
   $query .= '
   INSERT INTO sales(customer, invoice, medicine_name, price,qty) 
   VALUES("'.$customer_clean.'", "'.$invoice_clean.'", "'.$medicine_name_clean.'", "'.$price_clean.'", "'.$qty_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query))
  {
   echo 'Medicine Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>