<?php 

if(isset($_POST['submit'])){
	session_start();
	
	require "conn.php";
	
	
	$id = $_POST['id'];
	$price = $_POST['price'];
	$qty = $_POST['qty'];
	$medicine_name = $_POST['name'];
	$expiryDate = $_POST['expiryDate'];
	
	//echo $name;
	//echo $expiryDate
	
	$sql = "UPDATE  store SET
	
	price = '$price',
	qty = '$qty',
	medicine_name = '$medicine_name',
	expiry_date= '$expiryDate'
	WHERE id = $id
	
	";
	
	$res = mysqli_query($conn, $sql);
	
	
	
	
	if($res = true){
		$sql2 = "UPDATE  pharmacy_stock SET
	
	price = '$price'
	WHERE id = $id
	
	";
	
		$res2 = mysqli_query($conn, $sql2);	
		}if ($res2 = true){
			$_SESSION['updated_price'] = "<div class='alert alert-success'> Medicine Price Updated successifuly </div>";
							header ("Location:../receiving.php");
	}else{
		$_SESSION['failed_price'] = "<div class='alert alert-danger'> Failed to Update Medicine Price </div>";
		header ("Location:../receiving.php");
		}
		
}
	
?>

						
						