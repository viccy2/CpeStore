<?php
session_start();
require 'dc.php';
function validateData($data)
{
    $resultData = htmlspecialchars(stripslashes(trim($data)));
    return $resultData;
}
$id = strtolower(validateData($_POST['id']));  
$f = strtolower(validateData($_POST['newquantity'])); 
$t = $_POST['tquantity']; 

if($t>0){
	$st=mysqli_query($con,"update product_tb set product_quantity='$f' where  product_id = '$id'");
	echo "purchase successfull ";

}
else{
echo "Out of Stock";
}

			
			




?>